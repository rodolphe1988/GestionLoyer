<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelMaison;
use App\Models\ModelTypeappartement;
use App\Models\ModelDetenteurs;
use App\Models\Modelpaiementloyer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    //

        public function index() {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
      
        $detenteurs=ModelDetenteurs::select(['id','libelledetenteurs','etat'])->where('etat', 1)->get();;
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return view('index', compact('detenteurs'));
    }


public function totauxFluxSortantsParDetenteur(Request $request)

{
    // validation du mois
    $request->validate([
        'mois' => 'nullable|date_format:Y-m'
    ]);

    $mois = $request->input('mois', Carbon::now()->format('Y-m'));

    // Début et fin du mois
    $debut = $mois . "-01";
    $fin   = date('Y-m-t', strtotime($debut));

    // Totaux par détenteur pour les flux sortants
    $totaux = DB::table('table_detenteurs as d')
        ->select(
            'd.id',
            'd.libelledetenteurs as detenteur',
            DB::raw("(SELECT COALESCE(SUM(f.montant),0)
                      FROM table_flux_sortants f
                      WHERE f.detenteurs = d.id
                      AND f.dateereng BETWEEN '{$debut}' AND '{$fin}'
                     ) as totalVerse")
        )
        ->get();

    // Total global (somme des dépenses du mois)
    $totalGlobal = $totaux->sum('totalVerse');
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    Carbon::setLocale('fr');

    return response()->json([
        'mois'          => $mois,
        'moisTexte'     => ucfirst(Carbon::createFromFormat('Y-m', $mois)->translatedFormat('F Y')),
        'totalGlobal'   => $totalGlobal,
        'parDetenteur'  => $totaux
    ]);
}

    public function totauxParDetenteur(Request $request)
{

    $mois = $request->input('mois', Carbon::now()->format('Y-m'));

    $totaux = Modelpaiementloyer::where('moisenregloyer', $mois)
    
    ->join('table_maison as m', 'table_paiement_loyer.idmaison', '=', 'm.id')
        ->join('table_detenteurs as d', 'm.detenteur', '=', 'd.id') // vérifie bien que c’est "detenteur" et pas "id_detenteur"
        ->selectRaw('
            d.id,
            d.libelledetenteurs as detenteur,
            SUM(table_paiement_loyer.montantmensuelverse) as totalVerse,
            SUM(table_paiement_loyer.relicatloyer) as totalReliquat
        ')
        ->groupBy('d.id', 'd.libelledetenteurs')
        ->get();

setlocale(LC_TIME, 'fr_FR.UTF-8');
Carbon::setLocale('fr');

    // Totaux globaux
    $totauxGlobaux = [
        'mois'          => $mois,
        'moisTexte'     => Carbon::createFromFormat('Y-m', $mois)->translatedFormat('F Y'),
        'totalVerse'   => $totaux->sum('totalVerse'),
        'totalReliquat'=> $totaux->sum('totalReliquat')
    ];

    return response()->json([
        'totauxGlobaux' => $totauxGlobaux,
        'parDetenteur'  => $totaux
    ]);
}


public function totauxParDetenteursecond(Request $request)
{
      // validation du format du mois (ex: 2025-10)
    $request->validate([
        'mois' => 'nullable|date_format:Y-m'
    ]);

    $mois = $request->input('mois', Carbon::now()->format('Y-m'));

    // Requête principale : pour chaque détenteur on calcule via des sous-requêtes
    $totaux = DB::table('table_detenteurs as d')
        ->select(
            'd.id',
            'd.libelledetenteurs as detenteur',
            // nb appartements actifs pour ce détenteur
            DB::raw("(SELECT COUNT(a.id)
                      FROM table_appartement a
                      JOIN table_maison m1 ON m1.id = a.idmaison
                      WHERE m1.detenteur = d.id
                        AND a.etatappartement = 1) as nb_appartements_actifs"),
            // total attendu = somme des montants de loyer des appartements actifs du détenteur
            DB::raw("(SELECT COALESCE(SUM(a2.montantloyer),0)
                      FROM table_appartement a2
                      JOIN table_maison m2 ON m2.id = a2.idmaison
                      WHERE m2.detenteur = d.id
                        AND a2.etatappartement = 1) as total_attendu"),
            // total encaissé pour le mois (somme des paiements pour les maisons du détenteur pour le mois donné)
            DB::raw("(SELECT COALESCE(SUM(p.montantmensuelverse),0)
                      FROM table_paiement_loyer p
                      JOIN table_maison m3 ON m3.id = p.idmaison
                      WHERE m3.detenteur = d.id
                        AND p.moisenregloyer = '{$mois}') as totalVerse"),
            // total reliquat pour le mois
            DB::raw("(SELECT COALESCE(SUM(p2.relicatloyer),0)
                      FROM table_paiement_loyer p2
                      JOIN table_maison m4 ON m4.id = p2.idmaison
                      WHERE m4.detenteur = d.id
                        AND p2.moisenregloyer = '{$mois}') as totalReliquat")
        )
        ->get();

          setlocale(LC_TIME, 'fr_FR.UTF-8');
          Carbon::setLocale('fr');

    // Totaux globaux
    $totauxGlobaux = [
        'mois'          => $mois,
        'moisTexte'     => ucfirst(Carbon::createFromFormat('Y-m', $mois)->translatedFormat('F Y')),
        'totalAttendu'  => $totaux->sum('total_attendu'),
        'totalVerse'    => $totaux->sum('totalVerse'),
        'totalReliquat' => $totaux->sum('totalReliquat'),
    ];

    return response()->json([
        'totauxGlobaux' => $totauxGlobaux,
        'parDetenteur'  => $totaux
    ]);
}


public function progressionParDetenteur(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->format('Y'));

    // Liste complète des mois de l'année (Jan -> Déc)
    $moisList = collect(range(1, 12))->map(function ($m) use ($annee) {
        return Carbon::createFromDate($annee, $m, 1)->format('Y-m');
    });

    // 1️⃣ Total attendu par détenteur (fixe)
    $attendus = DB::table('table_detenteurs as d')
        ->join('table_maison as m', 'd.id', '=', 'm.detenteur')
        ->join('table_appartement as a', function ($join) {
            $join->on('m.id', '=', 'a.idmaison')
                 ->where('a.etatappartement', '=', 1);
        })
        ->selectRaw('
            d.id,
            d.libelledetenteurs as detenteur,
            COALESCE(SUM(a.montantloyer), 0) as total_attendu
        ')
        ->groupBy('d.id', 'd.libelledetenteurs')
        ->get();

    // 2️⃣ Total versé par mois et détenteur
    $versements = DB::table('table_detenteurs as d')
        ->join('table_maison as m', 'd.id', '=', 'm.detenteur')
        ->join('table_paiement_loyer as p', 'm.id', '=', 'p.idmaison')
        ->selectRaw('
            d.id,
            d.libelledetenteurs as detenteur,
            p.moisenregloyer as mois,
            COALESCE(SUM(p.montantmensuelverse), 0) as totalVerse
        ')
        ->whereBetween('p.moisenregloyer', ["{$annee}-01", "{$annee}-12"])
        ->groupBy('d.id', 'd.libelledetenteurs', 'mois')
        ->get();

    // 3️⃣ Assemblage + calcul du ratio
    $result = $attendus->map(function ($detenteur) use ($moisList, $versements) {
        $dataMois = $moisList->map(function ($mois) use ($versements, $detenteur) {
            $row = $versements
                ->where('detenteur', $detenteur->detenteur)
                ->where('mois', $mois)
                ->first();

            $totalVerse = $row ? $row->totalVerse : 0;
            $ratio = $detenteur->total_attendu > 0
                ? round(($totalVerse / $detenteur->total_attendu) * 100, 2)
                : 0;

            return [
                'mois' => $mois,
                'ratio' => $ratio
            ];
        });

        return [
            'detenteur' => $detenteur->detenteur,
            'total_attendu' => $detenteur->total_attendu,
            'data' => $dataMois
        ];
    });

    return response()->json([
        'annee' => $annee,
        'moisList' => $moisList,
        'data' => $result
    ]);
}


public function progressionParDetenteurAmeliore(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->year);

    // Génère : 2025-01, 2025-02, ..., 2025-12
    $moisList = collect(range(1, 12))->map(function ($m) use ($annee) {
        return sprintf("%d-%02d", $annee, $m);
    });

    // 1️⃣ TOTAL ATTENDU MENSUEL PAR DÉTENTEUR
    // (Les loyers ne changent pas chaque mois = même total pour chaque mois)
    $attendus = DB::table('table_detenteurs as d')
        ->join('table_maison as m', 'd.id', '=', 'm.detenteur')
        ->join('table_appartement as a', function ($join) {
            $join->on('m.id', '=', 'a.idmaison')
                 ->where('a.etatappartement', '=', 1);
        })
        ->selectRaw('
            d.id,
            d.libelledetenteurs as detenteur,
            COALESCE(SUM(a.montantloyer), 0) as total_attendu_mensuel
        ')
        ->groupBy('d.id', 'd.libelledetenteurs')
        ->get();

    // 2️⃣ TOTAL VERSE PAR MOIS BASÉ SUR moispaieloyer
    $versements = DB::table('table_detenteurs as d')
        ->join('table_maison as m', 'd.id', '=', 'm.detenteur')
        ->join('table_paiement_loyer as p', 'm.id', '=', 'p.idmaison')
        ->selectRaw('
            d.id,
            d.libelledetenteurs as detenteur,
            p.moispaieloyer as mois,
            COALESCE(SUM(p.montantmensuelverse), 0) as totalVerse
        ')
        ->where('p.moispaieloyer', '>=', "$annee-01")
        ->where('p.moispaieloyer', '<=', "$annee-12")
        ->groupBy('d.id', 'd.libelledetenteurs', 'p.moispaieloyer')
        ->get();

    // 3️⃣ CALCUL DU RATIO MOIS / MOIS
    $result = $attendus->map(function ($detenteur) use ($moisList, $versements) {

        $dataMois = $moisList->map(function ($mois) use ($versements, $detenteur) {

            $row = $versements
                ->where('id', $detenteur->id)
                ->where('mois', $mois)
                ->first();

            $totalVerse = $row->totalVerse ?? 0;
            $totalAttendu = $detenteur->total_attendu_mensuel;

            $ratio = $totalAttendu > 0
                ? round(($totalVerse / $totalAttendu) * 100, 2)
                : 0;

            return [
                'mois' => $mois,
                'totalVerse' => $totalVerse,
                'totalAttendu' => $totalAttendu,
                'ratio' => $ratio
            ];
        });

        return [
            'detenteur' => $detenteur->detenteur,
            'total_attendu_mensuel' => $detenteur->total_attendu_mensuel,
            'data' => $dataMois
        ];
    });

    return response()->json([
        'annee' => $annee,
        'moisList' => $moisList,
        'data' => $result
    ]);
}

public function top10LocatairesAnnuelParDetenteur(Request $request)
{

    $annee = $request->input('annee', Carbon::now()->format('Y'));
    $moisCourant = (int) Carbon::now()->format('m');
    $nbMois = $moisCourant;
    $idDetenteur = $request->input('id_detenteur'); // 🔹 optionnel

    // 🔹 Récupération des locataires (filtrés par détenteur si fourni)
    $locatairesQuery = DB::table('table_paiement_loyer as p')
        ->join('table_locataire as l', 'l.id', '=', 'p.idlocataire')
        ->join('table_maison as m', 'p.idmaison', '=', 'm.id')
        ->where('p.annule', 0)
        ->whereBetween('p.moispaieloyer', ["{$annee}-01", "{$annee}-" . str_pad($moisCourant, 2, '0', STR_PAD_LEFT)]);

    // 🔹 Filtrer par détenteur s’il est spécifié
    if (!empty($idDetenteur)) {
        $locatairesQuery->where('m.detenteur', $idDetenteur);
    }

    $locataires = $locatairesQuery
        ->select(
            'l.id',
            DB::raw("CONCAT(l.nom, ' ', COALESCE(l.prenom, '')) as nom_complet"),
            DB::raw('MAX(p.montantloyer) as montantloyer'),
            DB::raw('SUM(p.montantmensuelverse) as totalVerse')
        )
        ->groupBy('l.id', 'l.nom', 'l.prenom')
        ->get();

    // 🔹 Calcul du total attendu et du ratio
    $result = $locataires->map(function ($loc) use ($nbMois) {
        $totalAttendu = $loc->montantloyer * $nbMois;
        $ratio = $totalAttendu > 0 ? round(($loc->totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'locataire' => $loc->nom_complet,
            'totalAttendu' => $totalAttendu,
            'totalVerse' => $loc->totalVerse,
            'ratio' => $ratio
        ];
    })
    ->sortByDesc('ratio')
    ->take(10)
    ->values();

    // 🔹 Facultatif : récupérer le nom du détenteur
    $detenteurNom = null;
    if (!empty($idDetenteur)) {
        $detenteurNom = DB::table('table_detenteurs')
            ->where('id', $idDetenteur)
            ->value('libelledetenteurs');
    }

    return response()->json([
        'annee' => $annee,
        'periode' => "Janvier à " . Carbon::createFromDate(null, $moisCourant)->locale('fr')->monthName,
        'top10' => $result,
        'detenteur' => $detenteurNom ?? 'Tous les détenteurs',
    ]);

}


public function top10LocatairesAnnuelParDetenteurSecond(Request $request)
{
    $moisSelect = $request->input('mois', Carbon::now()->format('Y-m')); 
    $annee = substr($moisSelect, 0, 4);
    $moisCourant = intval(substr($moisSelect, 5, 2));

    $nbMois = $moisCourant;

    $idDetenteur = $request->input('id_detenteur');

    $locatairesQuery = DB::table('table_paiement_loyer as p')
        ->join('table_locataire as l', 'l.id', '=', 'p.idlocataire')
        ->join('table_maison as m', 'p.idmaison', '=', 'm.id')
        ->where('p.annule', 0)
        ->whereBetween('p.moispaieloyer', ["{$annee}-01", "{$annee}-".str_pad($moisCourant, 2, '0', STR_PAD_LEFT)]);

    if (!empty($idDetenteur)) {
        $locatairesQuery->where('m.detenteur', $idDetenteur);
    }

    $locataires = $locatairesQuery
        ->select(
            'l.id',
            DB::raw("CONCAT(l.nom, ' ', COALESCE(l.prenom, '')) AS nom_complet"),
            DB::raw('MAX(p.montantloyer) AS montantloyer'),
            DB::raw('SUM(p.montantmensuelverse) AS totalVerse')
        )
        ->groupBy('l.id', 'l.nom', 'l.prenom')
        ->get();

    $result = $locataires->map(function ($loc) use ($nbMois) {
        $totalAttendu = $loc->montantloyer * $nbMois;
        $ratio = $totalAttendu > 0 ? round(($loc->totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'locataire' => $loc->nom_complet,
            'ratio' => $ratio
        ];
    })
    ->sortByDesc('ratio')
    ->take(10)
    ->values();

    $detenteurNom = $idDetenteur
        ? DB::table('table_detenteurs')->where('id', $idDetenteur)->value('libelledetenteurs')
        : "Tous les détenteurs";

    return response()->json([
        'annee' => $annee,
        'periode' => "Janvier à " . ucfirst(Carbon::createFromDate(null, $moisCourant)->locale('fr')->monthName),
        'top10' => $result,
        'detenteur' => $detenteurNom,
    ]);
}

public function top10LocatairesAnnuelParDetenteurE(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->year);
    $moisCourant = (int) Carbon::now()->format('m');
   // $idDetenteur = $request->input('id_detenteur'); // filtre dynamique
  $idDetenteur = $request->get('detenteur');
    // 🔹 Étape 1 : récupérer les paiements selon l’année et le détenteur
    $paiements = DB::table('table_paiement_loyer as p')
        ->join('table_locataire as l', 'p.idlocataire', '=', 'l.id')
        ->join('table_maison as m', 'p.idmaison', '=', 'm.id')
        ->join('table_detenteurs as d', 'm.detenteur', '=', 'd.id')
        ->when($idDetenteur, fn($q) => $q->where('d.id', $idDetenteur))
        ->whereYear('p.moispaieloyer', $annee)
        ->whereMonth('p.moispaieloyer', '<=', $moisCourant)
        ->select(
            'l.id as idlocataire',
            'l.nom as locataire',
            'd.libelledetenteurs as detenteur',
            DB::raw('SUM(p.montantmensuelverse) as totalVerse')
        )
        ->groupBy('l.id', 'l.nom', 'd.libelledetenteurs')
        ->get();

    // 🔹 Étape 2 : récupérer les loyers de référence pour chaque locataire
    $loyers = DB::table('table_appartement as a')
        ->join('table_maison as m', 'a.idmaison', '=', 'm.id')
        ->join('table_detenteurs as d', 'm.detenteur', '=', 'd.id')
        ->join('table_locataire as l', 'a.numappartement', '=', 'l.numappartement')
        ->when($idDetenteur, fn($q) => $q->where('d.id', $idDetenteur))
        ->where('a.etatappartement', 1)
        ->select('l.id as idlocataire', 'a.montantloyer', 'd.libelledetenteurs')
        ->get()
        ->groupBy('idlocataire')
        ->map(fn($items) => [
            'loyer' => $items->sum('montantloyer'),
            'detenteur' => $items->first()->libelledetenteurs ?? null
        ]);

    // 🔹 Étape 3 : calculer le ratio pour chaque locataire
    $result = $paiements->map(function ($p) use ($loyers, $moisCourant) {
        $loyerData = $loyers->get($p->idlocataire, ['loyer' => 0]);
        $totalAttendu = $loyerData['loyer'] * $moisCourant;
        $ratio = $totalAttendu > 0 ? round(($p->totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'detenteur' => $p->detenteur,
            'locataire' => $p->locataire,
            'totalVerse' => $p->totalVerse,
            'totalAttendu' => $totalAttendu,
            'ratio' => $ratio,
            'mois_calcules' => $moisCourant,
        ];
    });

    // 🔹 Étape 4 : trier et garder le top 10
    $top10 = $result->sortByDesc('ratio')->take(10)->values();

    return response()->json([
        'annee' => $annee,
        'periode' => "Janvier à {$moisCourant} - {$annee}",
        'detenteur' => $idDetenteur
            ? ModelDetenteurs::find($idDetenteur)->libelledetenteurs ?? 'Inconnu'
            : 'Tous',
        'top10' => $top10,
    ]);
}


public function top10LocatairesAnnuel(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->format('Y'));
    $moisCourant = Carbon::now()->format('m');

    $nbMois = (int)$moisCourant;

    // Récupération de tous les locataires ayant des paiements
    $locataires = DB::table('table_locataire as l')
        ->join('table_paiement_loyer as p', 'l.id', '=', 'p.idlocataire')
        ->whereBetween('p.moispaieloyer', ["{$annee}-01", "{$annee}-{$moisCourant}"])
        ->select('l.id', 'l.nom', DB::raw('SUM(p.montantmensuelverse) as totalVerse'))
        ->groupBy('l.id', 'l.nom')
        ->get();

    // Maintenant on calcule le total attendu par locataire
    $result = $locataires->map(function($loc) use ($nbMois) {
        // Ici on récupère le montant du loyer par appartement actif
        $totalLoyer = DB::table('table_appartement')
            ->where('etatappartement', 1)
            ->where('numappartement', function($q) use ($loc) {
                $q->select('numappart')
                  ->from('table_paiement_loyer')
                  ->where('idlocataire', $loc->id)
                  ->limit(1);
            })
            ->sum('montantloyer');

        $totalAttendu = $totalLoyer * $nbMois;

        $ratio = $totalAttendu > 0 ? round(($loc->totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'locataire' => $loc->nom,
            'totalAttendu' => $totalAttendu,
            'totalVerse' => $loc->totalVerse,
            'ratio' => $ratio,
            'moisc' => $nbMois
        ];
    });

    $top10 = $result->sortByDesc('ratio')->take(10)->values();

    return response()->json([
        'periode' => "Janvier {$annee} à Mois courant {$annee}",
        'top10' => $top10,
         'moisc' => $nbMois
    ]);

} 



public function top10LocatairesAnnuelthird(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->format('Y'));
    $moisCourant = (int) Carbon::now()->format('m');

    // Nombre de mois depuis janvier jusqu'au mois courant
    $nbMois = $moisCourant;

    // Récupération de tous les locataires présents dans les paiements
    $locataires = DB::table('table_paiement_loyer as p')
        ->join('table_locataire as l', 'l.id', '=', 'p.idlocataire')
        ->where('p.annule', 0)
        ->whereBetween('p.moispaieloyer', ["{$annee}-01", "{$annee}-" . str_pad($moisCourant, 2, '0', STR_PAD_LEFT)])
        ->select(
            'l.id',
            DB::raw("CONCAT(l.nom, ' ', COALESCE(l.prenom, '')) as nom_complet"),
            DB::raw('MAX(p.montantloyer) as montantloyer'), // on prend un seul montantloyer de référence
            DB::raw('SUM(p.montantmensuelverse) as totalVerse')
        )
        ->groupBy('l.id', 'l.nom', 'l.prenom')
        ->get();

    // Calcul du total attendu, du ratio et classement
    $result = $locataires->map(function ($loc) use ($nbMois) {
        $totalAttendu = $loc->montantloyer * $nbMois;
        $ratio = $totalAttendu > 0 ? round(($loc->totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'locataire' => $loc->nom_complet,
            'totalAttendu' => $totalAttendu,
            'totalVerse' => $loc->totalVerse,
            'ratio' => $ratio
        ];
    })
    ->sortByDesc('ratio')
    ->take(10)
    ->values();

    return response()->json([
        'annee' => $annee,
        'periode' => "Janvier à " . Carbon::createFromDate(null, $moisCourant)->locale('fr')->monthName,
        'top10' => $result
    ]);
}

public function montantParMaisonMoisCourantParDetenteur(Request $request)
{
    // 🔹 Mois à analyser (par défaut, le mois courant)
    $moisCourant = $request->input('mois', Carbon::now()->format('Y-m'));
$moisCourant='2025-10';
    // 🔹 Détenteur optionnel
    $idDetenteur = $request->input('id_detenteur');

    // 🔹 Requête principale : somme des paiements par maison
    $query = Modelpaiementloyer::select(
            'p.idmaison',
            DB::raw('SUM(p.montantmensuelverse) as sommeTotalVerse'),
            DB::raw('SUM(p.relicatloyer) as sommeTotalRelicat')
        )
        ->from('table_paiement_loyer as p')
        ->join('table_maison as m', 'p.idmaison', '=', 'm.id')
        ->where('p.moisenregloyer', $moisCourant)
        ->where('p.annule', 0);

    // 🔹 Filtrer si un détenteur est précisé
    if (!empty($idDetenteur)) {
        $query->where('m.detenteur', $idDetenteur);
    }

    $data = $query->groupBy('p.idmaison')->get();

    // 🔹 Ajouter le nom de la maison
    $result = $data->map(function ($item) {
        $maison = \App\Models\ModelMaison::find($item->idmaison);
        return [
            'maison' => $maison ? $maison->denomination : 'Inconnue',
            'sommeTotalVerse' => $item->sommeTotalVerse,
            'sommeTotalRelicat' => $item->sommeTotalRelicat,
        ];
    });

    // 🔹 Facultatif : récupérer le nom du détenteur
    $detenteurNom = null;
    if (!empty($idDetenteur)) {
        $detenteurNom = DB::table('table_detenteurs')
            ->where('id', $idDetenteur)
            ->value('libelledetenteurs');
    }

    return response()->json([
        'mois' => $moisCourant,
        'detenteur' => $detenteurNom ?? 'Tous les détenteurs',
        'resultats' => $result,
    ]);
}

public function montantParMaisonMoisCourantParDetenteursecond(Request $request)
{
    // 🔹 Mois à analyser (par défaut, le mois courant)
    $moisCourant = $request->input('mois', Carbon::now()->format('Y'));
    //$moisCourant = '2025-10'; // Exemple pour test

    // 🔹 Détenteur optionnel
    $idDetenteur = $request->input('id_detenteur');

    // 🔹 Requête principale : somme des paiements par maison
    $query = Modelpaiementloyer::select(
            'p.idmaison',
            DB::raw('SUM(p.montantmensuelverse) as sommeTotalVerse'),
            DB::raw('SUM(p.relicatloyer) as sommeTotalRelicat')
        )
        ->from('table_paiement_loyer as p')
        ->join('table_maison as m', 'p.idmaison', '=', 'm.id')
        ->where('p.moisenregloyer', $moisCourant)
        ->where('p.annule', 0);

    // 🔹 Filtrer si un détenteur est précisé
    if (!empty($idDetenteur)) {
        $query->where('m.detenteur', $idDetenteur);
    }

    $data = $query->groupBy('p.idmaison')->get();

    // 🔹 Ajouter le nom de la maison + montant attendu
    $result = $data->map(function ($item) {
        $maison = \App\Models\ModelMaison::find($item->idmaison);

        // ✅ Calcul du montant total attendu : somme des loyers des appartements actifs dans la maison
        $montantAttendu = DB::table('table_appartement')
            ->where('idmaison', $item->idmaison)
            ->where('etatappartement', 1)
            ->sum('montantloyer');

        return [
            'maison' => $maison ? $maison->denomination : 'Inconnue',
            'sommeTotalVerse' => (float) $item->sommeTotalVerse,
            'sommeTotalRelicat' => (float) $item->sommeTotalRelicat,
            'montantAttendu' => (float) $montantAttendu,
        ];
    });

    // 🔹 Facultatif : récupérer le nom du détenteur
    $detenteurNom = null;
    if (!empty($idDetenteur)) {
        $detenteurNom = DB::table('table_detenteurs')
            ->where('id', $idDetenteur)
            ->value('libelledetenteurs');
    }

    return response()->json([
        'mois' => $moisCourant,
        'detenteur' => $detenteurNom ?? 'Tous les détenteurs',
        'resultats' => $result,
    ]);
}

public function montantParMaisonMoisCourantParDetenteurthird(Request $request)
{
    // 🔹 Mois du rapport (par défaut = mois courant)
    $moisCourant = $request->input('mois', Carbon::now()->format('Y-m'));

   // $moisCourant = '2025-10';
    // 🔹 Détenteur optionnel
    $idDetenteur = $request->input('id_detenteur');

    // 🔹 Requête : toutes les maisons, même sans paiement
    $query = DB::table('table_maison as m')
        ->leftJoin('table_paiement_loyer as p', function ($join) use ($moisCourant) {
            $join->on('m.id', '=', 'p.idmaison')
                 ->where('p.moisenregloyer', '=', $moisCourant)
                 ->where('p.annule', '=', 0);
        })
        ->select(
            'm.id as idmaison',
            'm.denomination',
            DB::raw('COALESCE(SUM(p.montantmensuelverse), 0) as sommeTotalVerse'),
            DB::raw('COALESCE(SUM(p.relicatloyer), 0) as sommeTotalRelicat')
        )
        ->groupBy('m.id', 'm.denomination');

    // 🔹 Filtrer si un détenteur est spécifié
    if (!empty($idDetenteur)) {
        $query->where('m.detenteur', $idDetenteur);
    }

    $data = $query->get();

    // 🔹 Calcul du montant attendu = somme des loyers des appartements rattachés à la maison
    $result = $data->map(function ($item) {
        $montantAttendu = DB::table('table_appartement')
            ->where('idmaison', $item->idmaison)
            ->sum('montantloyer');

        return [
            'maison' => $item->denomination,
            'montantAttendu' => $montantAttendu,
            'sommeTotalVerse' => $item->sommeTotalVerse,
            'sommeTotalRelicat' => $item->sommeTotalRelicat,
        ];
    });

    // 🔹 Nom du détenteur (facultatif)
    $detenteurNom = null;
    if (!empty($idDetenteur)) {
        $detenteurNom = DB::table('table_detenteurs')
            ->where('id', $idDetenteur)
            ->value('libelledetenteurs');
    }

    return response()->json([
        'mois' => $moisCourant,
        'detenteur' => $detenteurNom ?? 'Tous les détenteurs',
        'resultats' => $result,
    ]);
}

public function montantParMaisonMoisCourantParDetenteurfourth(Request $request)
{
    // 🔹 Mois du rapport (par défaut = mois courant)
    $moisCourant = $request->input('mois', Carbon::now()->format('Y-m'));

   // $moisCourant = '2025-10';
    // 🔹 Détenteur optionnel
    $idDetenteur = $request->input('id_detenteur');

    // 🔹 Requête : toutes les maisons, même sans paiement
    $query = DB::table('table_maison as m')
        ->leftJoin('table_paiement_loyer as p', function ($join) use ($moisCourant) {
            $join->on('m.id', '=', 'p.idmaison')
                 ->where('p.moisenregloyer', '=', $moisCourant)
                 ->where('p.annule', '=', 0);
        })
        ->select(
            'm.id as idmaison',
            'm.denomination',
            DB::raw('COALESCE(SUM(p.montantmensuelverse), 0) as sommeTotalVerse'),
            DB::raw('COALESCE(SUM(p.relicatloyer), 0) as sommeTotalRelicat')
        )
        ->groupBy('m.id', 'm.denomination');

    // 🔹 Filtrer si un détenteur est spécifié
    if (!empty($idDetenteur)) {
        $query->where('m.detenteur', $idDetenteur);
    }

    $data = $query->get();

    // 🔹 Calcul du montant attendu = somme des loyers des appartements rattachés à la maison
    $result = $data->map(function ($item) {
        $montantAttendu = DB::table('table_appartement')
            ->where('idmaison', $item->idmaison)
            ->sum('montantloyer');

        return [
            'maison' => $item->denomination,
            'montantAttendu' => $montantAttendu,
            'sommeTotalVerse' => $item->sommeTotalVerse,
            'sommeTotalRelicat' => $item->sommeTotalRelicat,
        ];
    });

    // 🔹 Nom du détenteur (facultatif)
    $detenteurNom = null;
    if (!empty($idDetenteur)) {
        $detenteurNom = DB::table('table_detenteurs')
            ->where('id', $idDetenteur)
            ->value('libelledetenteurs');
    }

    return response()->json([
        'mois' => $moisCourant,
        'detenteur' => $detenteurNom ?? 'Tous les détenteurs',
        'resultats' => $result,
    ]);
}

public function top10LocatairesAnnuelsecond(Request $request)
{
    $annee = $request->input('annee', Carbon::now()->format('Y'));
    $moisCourant = Carbon::now()->format('m');

    // 1️⃣ Récupérer les locataires avec leurs appartements actifs
    $locataires = DB::table('table_locataire as l')
        ->join('table_appartement as a', 'l.id', '=', 'a.idlocataire')
        ->where('a.etatappartement', 1)
        ->select('l.id', 'l.nom', DB::raw('SUM(a.montantloyer) as totalLoyerParMois'))
        ->groupBy('l.id', 'l.nom')
        ->get();

    $result = $locataires->map(function($loc) use ($annee, $moisCourant) {

        // Total attendu = somme des loyers des appartements * nombre de mois depuis janvier
        $totalAttendu = $loc->totalLoyerParMois * (int)$moisCourant;

        // Total versé depuis janvier jusqu'au mois courant, paiements annulés ignorés
        $totalVerse = DB::table('table_paiement_loyer')
            ->where('idlocataire', $loc->id)
            ->where('annule', 0)
            ->whereBetween('moisenregloyer', ["{$annee}-01", "{$annee}-{$moisCourant}"])
            ->sum('montantmensuelverse');

        $ratio = $totalAttendu > 0 ? round(($totalVerse / $totalAttendu) * 100, 2) : 0;

        return [
            'locataire' => $loc->nom,
            'totalAttendu' => $totalAttendu,
            'totalVerse' => $totalVerse,
            'ratio' => $ratio
        ];
    });

    // Trier par ratio décroissant, puis par totalVerse pour départager les égalités, puis prendre le Top 10
    $top10 = $result->sortByDesc(function($item) {
            return [$item['ratio'], $item['totalVerse']];
        })
        ->take(10)
        ->values();

    return response()->json([
        'periode' => "Janvier {$annee} à Mois courant {$annee}",
        'top10' => $top10
    ]);
}





public function totalLoyerParDetenteur(Request $request)
{
    // Mois courant ou sélectionné
    $mois = $request->input('mois', Carbon::now()->format('Y-m'));

    $totaux = DB::table('table_detenteurs as d')
        ->join('table_maison as m', 'd.id', '=', 'm.detenteur')
        ->join('table_appartement as a', 'm.id', '=', 'a.idmaison')
        ->where('a.etatappartement', '=', 1) //  Appartements actifs uniquement
        ->select(
            'd.id as idDetenteur',
            'd.libelledetenteurs as detenteur',
            DB::raw('COUNT(a.id) as nb_appartements_actifs'),
            DB::raw('SUM(a.montantloyer) as total_attendu')
        )
        ->groupBy('d.id', 'd.libelledetenteurs')
        ->get();

    //  Total global attendu
    $totalGlobal = $totaux->sum('total_attendu');

    return response()->json([
        'mois' => $mois,
        'totalGlobal' => $totalGlobal,
        'parDetenteur' => $totaux
    ]);
}



public function listeDetenteurs() {
    return response()->json(
        DB::table('table_detenteurs')->select('id', 'libelledetenteurs as nom')->distinct()->get()
    );
}

public function montantParMaisonMoisCourant(Request $request)
{
    // On récupère le mois courant (ex: "2025-10")
    //$moisCourant = Carbon::now()->format('Y-m');

     $moisCourant = $request->input('mois', Carbon::now()->format('Y-m'));

    // Regrouper les paiements par maison pour le mois courant
    $data = Modelpaiementloyer::select(
            'idmaison',
            DB::raw('SUM(montantmensuelverse) as sommeTotalVerse'),
            DB::raw('SUM(relicatloyer) as sommeTotalRelicat')
        )
        ->where('moisenregloyer', $moisCourant)
        ->groupBy('idmaison')
        ->get();

    // Ajouter le nom de la maison
    $result = $data->map(function ($item) {
        $maison = \App\Models\ModelMaison::find($item->idmaison);
        return [
            'maison' => $maison ? $maison->denomination : 'Inconnue',
            'sommeTotalVerse' => $item->sommeTotalVerse,
            'sommeTotalRelicat' => $item->sommeTotalRelicat
        ];
    });

    return response()->json($result);
}


public function montantParMaisonMoisCourantSecond(Request $request)
{
  $moisCourant = date('Y-m'); // Exemple : "2025-11"
$idDetenteur = request()->get('idDetenteur'); // Optionnel

$query = DB::table('table_maison as m')
    ->leftJoin('table_paiement_loyer as p', function ($join) use ($moisCourant) {
        $join->on('m.id', '=', 'p.idmaison')
             ->where('p.moisenregloyer', '=', $moisCourant)
             ->where('p.annule', '=', 0);
    })
    ->select(
        'm.id as idmaison',
        'm.denomination',
        'm.detenteur',
        DB::raw('COALESCE(SUM(p.montantmensuelverse), 0) as sommeTotalVerse'),
        DB::raw('COALESCE(SUM(p.relicatloyer), 0) as sommeTotalRelicat')
    )
    ->groupBy('m.id', 'm.denomination', 'm.detenteur');

// 🔹 Si un détenteur est précisé, filtrer
if (!empty($idDetenteur)) {
    $query->where('m.detenteur', $idDetenteur);
}

$data = $query->get();

// 🔹 Calcul du montant attendu pour chaque maison
$result = $data->map(function ($item) {
    $montantAttendu = DB::table('table_appartement')
        ->where('idmaison', $item->idmaison)
        ->sum('montantloyer');

    return [
        'maison' => $item->denomination,
        'detenteur' => $item->detenteur,
        'montantAttendu' => $montantAttendu,
        'sommeTotalVerse' => $item->sommeTotalVerse,
        'sommeTotalRelicat' => $item->sommeTotalRelicat,
        'tauxRecouvrement' => $montantAttendu > 0
            ? round(($item->sommeTotalVerse / $montantAttendu) * 100, 2)
            : 0
    ];
});

// 🔹 Si aucun détenteur n’est précisé → récupérer pour tous
if (empty($idDetenteur)) {
    $detenteurNom = 'Tous les détenteurs';
} else {
    $detenteurNom = DB::table('table_detenteurs')
        ->where('id', $idDetenteur)
        ->value('libelledetenteurs');
}

// 🔹 Résultat final
/*return response()->json([
    'detenteur' => $detenteurNom,
    'data' => $result
]);*/

return response()->json($result);

}


}
