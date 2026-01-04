<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\ModelConstruction;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelDetenteurs;
use App\Models\ModelAppartement;
use App\Models\ModelTypeappartement;
use App\Models\ModelMaison;
use App\Models\ModelTypelocation;
use App\Models\ModelLocataire;
use App\Models\ModelModepaiement;
use App\Models\Modelpaiementloyer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Facades\DB;

class Controllerpaiementloyer extends Controller
{
    //


    public function index(Request $request){


App::setLocale('fr'); // Pour Laravel
setlocale(LC_TIME, 'fr_FR.UTF-8'); 

if ($request->ajax()) {
           

           /* $paiementloyer = Modelpaiementloyer::select(['id','idmaison','numappart','idlocataire','nomlocataire','montantloyer','montantmensuelverse','modepaiement','moispaieloyer','relicatloyer','daterengloyer','moisenregloyer']);
           
           
           
           
            // 🔍 Appliquer les filtres si le formulaire est rempli
        if ($request->filled('denomination')) {
           $paiementloyer->where('idmaison', $request->denomination);
           // $paiementloyer->where('idmaison', 5);
        }

           if ($request->filled('detenteur')) {
           $paiementloyer->where('idmaison', $request->detenteur);
           // $paiementloyer->where('idmaison', 5);
        }

        if ($request->filled('nomlocataire')) {
            $paiementloyer->where('idlocataire', $request->nomlocataire);
            //$paiementloyer->where('idlocataire',30);
        }

        if ($request->filled('numappartement')) {
            $paiementloyer->where('numappart', $request->numappartement);
           // $paiementloyer->where('numappart', 1);
        }

        if ($request->filled('annee')) {
          //  $paiementloyer->where('daterengloyer', $request->annee);
        }
           */

        $paiementloyer = Modelpaiementloyer::query()
        ->select([
            'table_paiement_loyer.id',
            'table_paiement_loyer.idmaison',
            'table_paiement_loyer.numappart',
            'table_paiement_loyer.idlocataire',
            'table_paiement_loyer.nomlocataire',
            'table_paiement_loyer.montantloyer',
            'table_paiement_loyer.montantmensuelverse',
            'table_paiement_loyer.modepaiement',
            'table_paiement_loyer.moispaieloyer',
            'table_paiement_loyer.relicatloyer',
            'table_paiement_loyer.daterengloyer',
            'table_paiement_loyer.moisenregloyer',
            'table_maison.denomination',
            'table_maison.detenteur',
        ])
        ->join('table_maison', 'table_paiement_loyer.idmaison', '=', 'table_maison.id');
        // on joint maison pour avoir accès au champ detenteur

    



    // 🔍 Appliquer les filtres
    if ($request->filled('denomination')) {
        $paiementloyer->where('table_paiement_loyer.idmaison', $request->denomination);
    }

    if ($request->filled('detenteur')) {
        $paiementloyer->where('table_maison.detenteur', $request->detenteur);
    }

    if ($request->filled('nomlocataire')) {
        $paiementloyer->where('table_paiement_loyer.idlocataire', $request->nomlocataire);
    }

    if ($request->filled('numappartement')) {
        $paiementloyer->where('table_paiement_loyer.numappart', $request->numappartement);
    }

    if ($request->filled('perioderech')) {
            $periode = str_replace(' to ', ' au ', $request->perioderech);
    $dates = explode(' au ', $periode);

    $debut = $dates[0] ?? null;
    $fin = $dates[1] ?? $dates[0]; // si un seul mois sélectionné

    if ($debut && $fin) {
        $paiementloyer->whereBetween('table_paiement_loyer.moisenregloyer', [$debut, $fin]);
    }

    $paiementloyer->orderBy('table_paiement_loyer.daterengloyer', 'asc')
        ->orderBy('table_paiement_loyer.id', 'asc') ;
}
    if(!($request->filled('perioderech'))) {
$paiementloyer->orderBy('table_paiement_loyer.daterengloyer', 'desc')->orderBy('table_paiement_loyer.id', 'desc') ;
        }

    $totalVerse=0;
    $totalReliquat=0;
  
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($paiementloyer)
                ->addIndexColumn() // Adds index numbers
                ->addColumn('detenteur', function($row) {

     $detenteur=ModelMaison::select(['id','denomination','detenteur','etat'])->where('etat', 1)->where('id',  $row->idmaison)->first();

     $detenteurid=$detenteur->detenteur;

     $detentfrommodel=ModelDetenteurs::select(['libelledetenteurs','etat','id'])->where('etat', 1)->where('id',$detenteurid)->first();

     //$detenteurlabel= ucfirst(strtolower($detentfrommodel->libelledetenteurs));

                return $detentfrommodel ? ucfirst(strtolower($detentfrommodel->libelledetenteurs)) : 'N/A';
                      })
                 ->addColumn('modepaiementloyer', function($row) {

                    $modepaie=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->where('id',  $row->modepaiement)->first();

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                   
       
                    return $modepaie ? ucwords(strtolower($modepaie->libellemodepaiement)) : 'N/A';
   


                 })
             ->addColumn('denomination', function($row) {

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                    $detenteur=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->where('id',  $row->idmaison)->first();

                    return $detenteur ? ucwords(strtolower($detenteur->denomination)) : 'N/A';
      


                 }) ->addColumn('moispaieloyere', function($row) {


                    $formattedMois = '';
if (!empty($row->moispaieloyer)) {
    try {
        $date = $row->moispaieloyer ? Carbon::createFromFormat('Y-m-d', $row->moispaieloyer.'-01') : 'N/A';
        if($date=='N/A'){
            $formattedMois='N/A';
        }
        else{
 $formattedMois = $date->translatedFormat('F Y');
        }
       
    } catch (\Exception $e) {
        $formattedMois = $row->moispaieloyer; // fallback brut
    }
}

  
                   



                    $btn = '<div class="">'.$formattedMois.'</div>';


                    

                     return $btn;
      


                 })

          ->addColumn('montantloyer', function($row) {

                   $formattedMontant = number_format($row->montantloyer, 0, ',', ' ');



                    $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })
           ->addColumn('montantverse', function($row) {

                   $formattedMontant = number_format($row->montantmensuelverse, 0, ',', ' ');


                      if($row->montantloyer>$row->montantmensuelverse){

            $btn = '<div class="montanttotalcautionclass" style="color:red;font-weight:bold;" >'.$formattedMontant.'</div>';
 
                    }
                    else{
          $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';

                    }

                 //   $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })
           ->addColumn('reliquatverse', function($row) {

                   $formattedMontant = number_format($row->relicatloyer, 0, ',', ' ');

                 

                    $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })
                ->addColumn('action', function($row) {


$date = Carbon::createFromFormat('Y-m', $row->moispaieloyer);

// Formater en "avril 2025"
$formattedMois = $date->translatedFormat('F Y');


                        $btn = ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletepaiementmensuel" data-id="' . $row->id . '" data-name="' . $row->id . '" data-numappart="' . $row->numappart. '" data-maison="' . $row->id . '"  data-locataire="' . $row->nomlocataire . '" data-paie="' . $row->montantmensuelverse . '" data-mois="' . $formattedMois. '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';




                    return $btn;
                })
                ->rawColumns(['action','etat','reliquatverse','montantloyer','moispaieloyere','montantverse','modepaiementloyer'])
           ->with([
        'totalVerse'   => number_format($totalVerse ?? 0, 0, ',', ' '),
        'totalReliquat'=> number_format($totalReliquat ?? 0, 0, ',', ' ')
    ])
               
                ->make(true);
        }



        Log::info('Méthode index atteinte.');




    }


    public function rechercheAvanceLoyer(Request $request)
    {
        if ($request->ajax()) {

            $detenteur = $request->detenteurrechavance;
            $denomination = $request->denominationavancerech;
          //  $optionrechavance = $request->optionrechavance;
           // $mois = $request->perioderechavance;

            $mois = $request->input('perioderechavance', Carbon::now()->format('Y-m'));
            $optionrechavance = $request->input('optionrechavance', 'impaye');


            // Base : tous les locataires + apparts + maisons
            $query = DB::table('table_locataire')
                ->leftJoin('table_appartement as a', function ($join) {
                    $join->on('a.numappartement', '=', 'table_locataire.numappartement')
                         ->on('a.idmaison', '=', 'table_locataire.iddenomination');
                })
                ->leftJoin('table_maison as m', 'm.id', '=', 'a.idmaison')
                ->leftJoin('table_paiement_loyer as p', function ($join) use ($mois) {
                    $join->on('p.idlocataire', '=', 'table_locataire.id')
                         ->where('p.moispaieloyer', '=', $mois);
                })
                ->select(
                    'table_locataire.id as locataire_id',
                    DB::raw("CONCAT(table_locataire.nom, ' ', table_locataire.prenom) as nomlocataire"),
                    'a.numappartement',
                    'a.montantloyer',
                    'a.idmaison',
                    'm.denomination',
                    'm.detenteur',
                    DB::raw('COALESCE(p.montantmensuelverse, 0) as montantmensuelverse'),
                    DB::raw('COALESCE(p.relicatloyer, 0) as relicatloyer'),
                    'p.moisenregloyer',
                    'p.moispaieloyer',
                    'p.modepaiement',
                    'p.daterengloyer'
                );

            // 🧩 Filtres
            if (!empty($detenteur)) {
                $query->where('m.detenteur', $detenteur);
            }

            if (!empty($denomination)) {
                $query->where('m.id', $denomination);
            }

            if (!empty($optionrechavance)) {
                switch ($optionrechavance) {
                    case 'paye':
                        $query->whereNotNull('p.id')
                              ->whereColumn('p.montantmensuelverse', '>=', 'a.montantloyer');
                        break;

                    case 'impaye':
                        // Aucun paiement trouvé pour ce mois
                        $query->whereNull('p.id');
                        break;

                    case 'partiel':
                        $query->whereNotNull('p.id')
                              ->whereColumn('p.montantmensuelverse', '<', 'a.montantloyer');
                        break;
                }
            }

            // 🔧 Corrige l’erreur ORDER BY id ambiguë
            $query->orderBy('table_locataire.id', 'asc');

            // ✅ Retour DataTables
            return DataTables::of($query)
                ->editColumn('moisenregloyer', function ($row) {
                    return $row->moispaieloyer ?? '-';
                })
                ->addColumn('detenteur', function($row) {

     $detenteur=ModelMaison::select(['id','denomination','detenteur','etat'])->where('etat', 1)->where('id',  $row->idmaison)->first();

     $detenteurid=$detenteur->detenteur;

     $detentfrommodel=ModelDetenteurs::select(['libelledetenteurs','etat','id'])->where('etat', 1)->where('id',$detenteurid)->first();

     //$detenteurlabel= ucfirst(strtolower($detentfrommodel->libelledetenteurs));

                return $detentfrommodel ? ucfirst(strtolower($detentfrommodel->libelledetenteurs)) : 'N/A';
                      })
                ->editColumn('modepaiement', function ($row) {
                   // return $row->modepaiement ?? '-';

                     $modepaie=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->where('id',  $row->modepaiement)->first();

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                   
       
                    return $modepaie ? ucwords(strtolower($modepaie->libellemodepaiement)) : '-';
                })
                ->editColumn('daterengloyer', function ($row) {
                    return $row->daterengloyer ? date('d/m/Y', strtotime($row->daterengloyer)) : '-';
                })
                ->make(true);
        }

      //  return abort(404);
    }



    public function totauxfirst(Request $request)
{
     // Jointure avec la table maison pour accéder au champ detenteur
    $paiementloyer = Modelpaiementloyer::query()
        ->join('table_maison', 'table_paiement_loyer.idmaison', '=', 'table_maison.id');

    // Appliquer les filtres
    if ($request->filled('denomination')) {
        $paiementloyer->where('table_paiement_loyer.idmaison', $request->denomination);
    }

    if ($request->filled('detenteur')) {
        $paiementloyer->where('table_maison.detenteur', $request->detenteur);
    }

    if ($request->filled('nomlocataire')) {
        $paiementloyer->where('table_paiement_loyer.idlocataire', $request->nomlocataire);
    }

    if ($request->filled('numappartement')) {
        $paiementloyer->where('table_paiement_loyer.numappart', $request->numappartement);
    }

    if ($request->filled('annee')) {
       // $paiementloyer->whereYear('table_paiement_loyer.daterengloyer', $request->annee);
    }

        if ($request->filled('perioderech')) {
   // $dates = explode(' to ', $request->periode); // ["2025-01", "2025-06"]
       $periode = str_replace(' to ', ' au ', $request->perioderech);
    $dates = explode(' au ', $periode);

    $debut = $dates[0] ?? null;
    $fin = $dates[1] ?? $dates[0]; // si un seul mois sélectionné

    if ($debut && $fin) {
        $paiementloyer->whereBetween('table_paiement_loyer.moisenregloyer', [$debut, $fin]);
    }
}

    // Calcul des totaux
    $totaux = $paiementloyer->selectRaw('
        SUM(table_paiement_loyer.montantmensuelverse) as total_verse,
        SUM(table_paiement_loyer.relicatloyer) as total_relicat
    ')->first();

   

    // Retourner les totaux formatés en JSON
    return response()->json([
        'totalVerse' => number_format($totaux->total_verse ?? 0, 0, ',', ' '),
        'totalReliquat' => number_format($totaux->total_relicat ?? 0, 0, ',', ' '),
        'totalReliquatvrai' => $totaux->total_relicat ?? 0
    ]);
}



public function totaux(Request $request)
{
    $paiementloyer = Modelpaiementloyer::query()
        ->join('table_maison', 'table_paiement_loyer.idmaison', '=', 'table_maison.id');

    // Appliquer les filtres
    if ($request->filled('denomination')) {
        $paiementloyer->where('table_paiement_loyer.idmaison', $request->denomination);
    }

    if ($request->filled('detenteur')) {
        $paiementloyer->where('table_maison.detenteur', $request->detenteur);
    }

    if ($request->filled('nomlocataire')) {
        $paiementloyer->where('table_paiement_loyer.idlocataire', $request->nomlocataire);
    }

    if ($request->filled('numappartement')) {
        $paiementloyer->where('table_paiement_loyer.numappart', $request->numappartement);
    }

    if ($request->filled('perioderech')) {
        $periode = str_replace(' to ', ' au ', $request->perioderech);
        $dates = explode(' au ', $periode);
        $debut = $dates[0] ?? null;
        $fin = $dates[1] ?? $dates[0];
        if ($debut && $fin) {
            $paiementloyer->whereBetween('table_paiement_loyer.moisenregloyer', [$debut, $fin]);
        }
    }

    // ⚙️ Étape 1 : récupérer les paiements groupés par mois pour le locataire / maison
    $paiementsParMois = $paiementloyer
        ->selectRaw('
            table_paiement_loyer.idlocataire,
            table_paiement_loyer.idmaison,
            table_paiement_loyer.moispaieloyer,
            SUM(table_paiement_loyer.montantmensuelverse) as total_verse,
            MAX(table_paiement_loyer.id) as dernier_id
        ')
        ->groupBy('table_paiement_loyer.idlocataire', 'table_paiement_loyer.idmaison', 'table_paiement_loyer.moispaieloyer')
        ->get();

    $totalVerse = 0;
    $totalReliquat = 0;

    foreach ($paiementsParMois as $paiement) {
        $totalVerse += $paiement->total_verse;

        // Récupérer le dernier reliquat pour ce mois précis
        $dernierPaiement = Modelpaiementloyer::find($paiement->dernier_id);
        if ($dernierPaiement) {
            $totalReliquat += $dernierPaiement->relicatloyer;
        }
    }

    return response()->json([
        'totalVerse' => number_format($totalVerse ?? 0, 0, ',', ' '),
        'totalReliquat' => number_format($totalReliquat ?? 0, 0, ',', ' '),
        'totalReliquatvrai' => $totalReliquat ?? 0
    ]);
}


    public function store(Request $request){


        $mois =$request->mois ;
        $denomination=$request->denomination;
        $numappartement=$request->numappartement;
        $nom=$request->nom;
        $montantloyer=$request->montantloyer;
        $montantmensverse=$request->montantmensverse;
        $modepaie=$request->modepaiement;
        $annee=$request->annee;
        $datevers=$request->datevers;
       // $datevers=$request->datevers;
        //$tab=explode(",",$mois);
        $count=count($mois);

        $datevers = Carbon::parse($datevers)->format('Y-m-d');

         $moisdatevers = Carbon::parse($datevers)->format('Y-m');

         $locataire=ModelLocataire::select(['id','iddenomination','numappartement'])->where('iddenomination',$denomination)->where('numappartement',$numappartement)->first();
         $idloc=$locataire->id;

         $relicat=$montantloyer-$montantmensverse;

   

           $res="";

         
        for($i=0;$i<$count;$i++){

              $resmois=$annee.'-'.$mois[$i];

    Modelpaiementloyer::create([
        'idmaison' => $denomination, // Enregistrer en majuscules
        'numappart' => $numappartement,
        'idlocataire' => $idloc,
        'nomlocataire' => $nom,
        'montantloyer' =>$montantloyer,
        'montantmensuelverse' => $montantmensverse,
        'modepaiement'=> $modepaie,
        'moispaieloyer'=> $resmois,
        'relicatloyer' => $relicat,
        'daterengloyer' => $datevers,
        'moisenregloyer' => $moisdatevers,
        
        
    ]);
        }

         return response()->json([
        'success' => true,
        'message' =>"Enregistrement effectué",
    ], 200);
    }


public function storethird(Request $request)
{
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $nom = $request->nom;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $modepaie = $request->modepaiement;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');
    $moisdatevers = Carbon::parse($datevers)->format('Y-m');

    // Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;

    // Récupérer le dernier paiement (mois le plus récent)
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->first();

    if ($dernierPaiement) {
        //$anneeMois = Carbon::parse($dernierPaiement->moispaieloyer.'-01')->addMonth();
       $anneeMois = Carbon::createFromFormat('Y-m-d',$dernierPaiement->moispaieloyer.'-01');

       // $anneeMois->addMonth();
    } else {
        // Premier paiement => commencer janvier de l'année choisie
        $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');
    }

      $listePaiements = [];

    // Si dernier paiement partiel, on commence par ce mois
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
       /* $manquant = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $manquant);

        // Mettre à jour le reliquat de ce mois
        $dernierPaiement->montantmensuelverse += $verse;
        $dernierPaiement->relicatloyer = $montantloyer - $dernierPaiement->montantmensuelverse;
        $dernierPaiement->save();

        $montantRestant -= $verse;*/

           $manquant = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $manquant);
       $typeVersement = ($verse == $montantloyer) ? 'complet' : 'partiel';
        Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $dernierPaiement->moispaieloyer, // même mois
            'relicatloyer' => $manquant - $verse, // reliquat restant
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
            'type_versement' => $typeVersement,
            'dateversementrelicatloyer' => $datevers,
        ]);

        $montantRestant -= $verse;

    }

    // Ensuite, distribuer le reste sur les mois suivants
    while ($montantRestant > 0) {
       
        if ($dernierPaiement) {
            $anneeMois->addMonth();
            $dernierPaiement = null; // pour éviter d'ajouter plusieurs fois
        }
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;

        $typeVersement = ($verse == $montantloyer) ? 'complet' : 'partiel';

        Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $anneeMois->format('Y-m'),
            'relicatloyer' => $relicat,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
             'type_versement' => $typeVersement,
             'dateversementrelicatloyer' => $relicat > 0 ? $datevers : null,
        ]);

        $montantRestant -= $verse;
         $anneeMois->addMonth();
    }

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué",
    ], 200);
}





public function verifierPaiementfirst(Request $request)
{
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');

    // Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;

    // Dernier mois payé
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->first();

    if ($dernierPaiement) {
        $anneeMois = Carbon::parse($dernierPaiement->moispaieloyer.'-01')->addMonth();
    } else {
        // Premier paiement → janvier de l’année choisie
       // $anneeMois = Carbon::createFromFormat('Y-m', $request->annee.'-01')->addMonth();
       $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');
    }
    //$anneeMois->addMonth();
    $moisCouverts = [];
    $montantRestant = $montantverse;

    Carbon::setLocale('fr');

    while ($montantRestant > 0) {
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;

      /*  $moisCouverts[] = [
          //  'mois' => $anneeMois->format('F Y'), // Exemple: Mars 2025
            'mois' => $anneeMois->translatedFormat('F Y'),
            'verse' => $verse,
            'relicat' => $relicat
        ];

        $montantRestant -= $verse;
        $anneeMois->addMonth();*/

         // clone() pour ne pas perdre le mois courant
    $moisCouverts[] = [
        'mois' => $anneeMois->translatedFormat('F Y'),
        'verse' => $verse,
        'relicat' => $relicat
    ];

    $montantRestant -= $verse;
    $anneeMois=$anneeMois->addMonth(); // avance au mois suivant

    }

    return response()->json([
        'success' => 'preview',
        'message' => 'Le paiement couvre les mois suivants :',
        'mois' => $moisCouverts
    ]);
}


public function verifierPaiement(Request $request)
{

   /* $request->validate([
    'periodeversement'     => 'sometimes|required|string'
], [
    'periodeversement.required'     => 'Selectionner le mois debut versement .']);*/

    $periodeversement = $request->periodeversement;
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');

    

    // 🔹 Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;
    $moisCouverts = [];

    // 🔹 Récupérer le dernier paiement
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->orderBy('id', 'desc') // Pour gérer les paiements multiples dans le même mois
        ->first();

    Carbon::setLocale('fr');

    if ($dernierPaiement) {

        $anneeMois = Carbon::createFromFormat('Y-m', $dernierPaiement->moispaieloyer);

    } else {
         if ($request->filled('periodeversement')) {
                $anneeMois = Carbon::createFromFormat('Y-m-d',$request->periodeversement.'-01');

         }
         else{
                    $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');

         }
    }

    // 1️⃣ Si reliquat du dernier paiement
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        $reliquat = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $reliquat);
        $nouveauReliquat = $reliquat - $verse;

        $moisCouverts[] = [
            'mois' => $anneeMois->translatedFormat('F Y'),
            'verse' => $verse,
            'relicat' => $nouveauReliquat,
            'etat' => ($nouveauReliquat == 0) ? 'solder' : 'incomplet'
        ];

        $montantRestant -= $verse;

        // Si le reliquat est soldé, passer au mois suivant
        if ($nouveauReliquat == 0) {
            $anneeMois->addMonth();
        }
    } elseif ($dernierPaiement) {
        // Pas de reliquat : passer directement au mois suivant
        $anneeMois->addMonth();
    }

    // 2️⃣ Traiter les nouveaux mois tant qu’il reste de l’argent
    while ($montantRestant > 0) {
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;

        $moisCouverts[] = [
            'mois' => $anneeMois->translatedFormat('F Y'),
            'verse' => $verse,
            'relicat' => $relicat,
            'etat' => ($relicat == 0) ? 'solder' : 'incomplet'
        ];

        $montantRestant -= $verse;

        // Si le loyer du mois est totalement payé, passer au suivant
        if ($relicat == 0) {
            $anneeMois->addMonth();
        } else {
            break; // Stop si le dernier mois n’est pas soldé
        }
    }

    return response()->json([
        'success' => 'preview',
        'message' => 'Le paiement couvre les mois suivants :',
        'mois' => $moisCouverts
    ]);
}

public function verifierPaiementsecond(Request $request)
{
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');

    // 🔹 Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;
    $moisCouverts = [];

    // 🔹 Récupérer le dernier paiement
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->orderBy('id', 'desc') 
        ->first();

    Carbon::setLocale('fr');

    // 🔹 Déterminer le mois de départ
    if ($dernierPaiement) {
        $anneeMois = Carbon::createFromFormat('Y-m-d', $dernierPaiement->moispaieloyer . '-01');
    } else {
        $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');
    }

    // 1️⃣ Si reliquat du dernier paiement, solder d'abord ce mois
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        $reliquat = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $reliquat);
        $nouveauReliquat = $reliquat - $verse;

        $moisCouverts[] = [
            'mois' => $anneeMois->translatedFormat('F Y'),
            'verse' => $verse,
            'relicat' => $nouveauReliquat,
            'etat' => ($nouveauReliquat == 0) ? 'solder' : 'incomplet'
        ];

        $montantRestant -= $verse;

        // Passer au mois suivant seulement si reliquat soldé
        if ($nouveauReliquat == 0) {
            $anneeMois->addMonth();
        }
    } else {
        // Pas de reliquat : on passe directement au mois suivant si un paiement existe
        if ($dernierPaiement) {
            $anneeMois->addMonth();
        }
    }

    // 2️⃣ Traiter les nouveaux mois tant qu’il reste de l’argent
    while ($montantRestant > 0) {
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;

        $moisCouverts[] = [
            'mois' => $anneeMois->translatedFormat('F Y'),
            'verse' => $verse,
            'relicat' => $relicat,
            'etat' => ($relicat == 0) ? 'solder' : 'incomplet'
        ];

        $montantRestant -= $verse;

        // Si tout le loyer du mois est payé, passer au suivant
        if ($relicat == 0) {
            $anneeMois->addMonth();
        } else {
            break; // on s’arrête s’il y a un reliquat non soldé
        }
    }

    return response()->json([
        'success' => 'preview',
        'message' => 'Le paiement couvre les mois suivants :',
        'mois' => $moisCouverts
    ]);
}


public function storefourth(Request $request)
{
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $nom = $request->nom;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $modepaie = $request->modepaiement;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');
    $moisdatevers = Carbon::parse($datevers)->format('Y-m');

    // Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;

    // Récupérer le dernier paiement
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->first();

    if ($dernierPaiement) {
        //$anneeMois = Carbon::parse($dernierPaiement->moispaieloyer.'-01')->addMonth();
        $anneeMois = Carbon::createFromFormat('Y-m-d',$dernierPaiement->moispaieloyer.'-01')->addMonth();
    } else {
        $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');
    }

    // Paiement partiel précédent
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        $manquant = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $manquant);

        $dernierPaiement->montantmensuelverse += $verse;
        $dernierPaiement->relicatloyer = $montantloyer - $dernierPaiement->montantmensuelverse;
        $dernierPaiement->save();

        $montantRestant -= $verse;
    }

    // Nouveau paiements
    $listePaiements = [];
    while ($montantRestant > 0) {

          if ($dernierPaiement) {
            $anneeMois->addMonth();
            $dernierPaiement = null; // pour éviter d'ajouter plusieurs fois
        }
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;

        $paiement = Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $anneeMois->format('Y-m'),
            'relicatloyer' => $relicat,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
        ]);

        $listePaiements[] = $paiement;

        $montantRestant -= $verse;
        $anneeMois->addMonth();
    }

     $etat=1;
            $cachet = DB::table('cachet_paiement_loyers')
            ->where('etat', $etat)
            ->first();
    // ✅ Générer le reçu PDF
    //$pdf = PDF::loadView('recus.paiement', [
    $pdf = PDF::loadView('recupaiement', [
        'locataire' => $locataire,
        'paiements' => $listePaiements,
        'datevers' => $datevers,
        'modepaie' => $modepaie,
        'cachet' => $cachet,
    ]);

    $filename = 'recu_paiement_'.$locataire->id.'_'.time().'.pdf';
    $pdf->save(storage_path('app/public/recus/'.$filename));

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué et reçu généré",
        'recu_url' => asset('storage/recus/'.$filename)
    ], 200);
}


public function storefourthsecond(Request $request)
{
    $denomination = $request->denomination;
    $numappartement = $request->numappartement;
    $nom = $request->nom;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $modepaie = $request->modepaiement;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');
    $moisdatevers = Carbon::parse($datevers)->format('Y-m');

    // Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;

    // Récupérer le dernier paiement
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->first();

    /*$anneeMois = $dernierPaiement 
        ? Carbon::createFromFormat('Y-m-d', $dernierPaiement->moispaieloyer . '-01')
        : Carbon::createFromFormat('Y-m-d', $request->annee . '-01-01');*/


       if ($dernierPaiement) {
        //$anneeMois = Carbon::parse($dernierPaiement->moispaieloyer.'-01')->addMonth();
       $anneeMois = Carbon::createFromFormat('Y-m-d',$dernierPaiement->moispaieloyer.'-01');

       // $anneeMois->addMonth();
    } else {
        // Premier paiement => commencer janvier de l'année choisie
        $anneeMois = Carbon::createFromFormat('Y-m-d', $request->annee.'-01-01');
    }

    $listePaiements = [];

    // Paiement pour reliquat précédent (nouvelle insertion)
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        $manquant = $dernierPaiement->relicatloyer;
        $verse = min($montantRestant, $manquant);
        $typeVersement = ($verse == $manquant) ? 'complet' : 'partiel';

        $paiement = Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $dernierPaiement->moispaieloyer,
            'relicatloyer' => $manquant - $verse,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
            'type_versement' => $typeVersement,
            'dateversementrelicatloyer' => $datevers,
        ]);

        $listePaiements[] = $paiement;
        $montantRestant -= $verse;
      
    }

    // Nouveaux paiements sur les mois suivants
    while ($montantRestant > 0) {

          if ($dernierPaiement) {
            $anneeMois->addMonth();
            $dernierPaiement = null; // pour éviter d'ajouter plusieurs fois
        }

        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;
        $typeVersement = ($verse == $montantloyer) ? 'complet' : 'partiel';

        $paiement = Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $anneeMois->format('Y-m'),
            'relicatloyer' => $relicat,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
            'type_versement' => $typeVersement,
            'dateversementrelicatloyer' => $relicat > 0 ? $datevers : null,
        ]);

        $listePaiements[] = $paiement;
        $montantRestant -= $verse;
        $anneeMois->addMonth();
    }

 $modepaiemodel=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->where('id', $modepaie)->first();

    // Générer le reçu PDF
    $pdf = PDF::loadView('recupaiement', [
        'locataire' => $locataire,
        'paiements' => $listePaiements,
        'datevers' => $datevers,
        'modepaie' => $modepaiemodel->libellemodepaiement ?? 'N/A',
    ]);

    $filename = 'recu_paiement_' . $locataire->id . '_' . time() . '.pdf';
    $pdf->save(storage_path('app/public/recus/' . $filename));

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué et reçu généré",
        'recu_url' => asset('storage/recus/' . $filename)
    ], 200);
}



public function storefourththird(Request $request)
{
   $denomination = $request->denomination;
   $periodeversement=$request->periodeversement;
    $numappartement = $request->numappartement;
    $nom = $request->nom;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $modepaie = $request->modepaiement;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');
    $moisdatevers = Carbon::parse($datevers)->format('Y-m');

    // Récupérer le locataire
    $locataire = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    $idloc = $locataire->id;
    $montantRestant = $montantverse;

    // Récupérer le dernier paiement
    $dernierPaiement = Modelpaiementloyer::where('idlocataire', $idloc)
        ->orderBy('moispaieloyer', 'desc')
        ->orderBy('id', 'desc') // Pour gérer les paiements multiples dans le même mois
        ->first();

    // Déterminer le mois de départ pour l'insertion
    /*$anneeMois = $dernierPaiement
        ? Carbon::createFromFormat('Y-m-d', $dernierPaiement->moispaieloyer . '-01')
        : Carbon::createFromFormat('Y-m-d', $request->annee . '-01-01');*/

        $anneeMois = $dernierPaiement
    ? Carbon::createFromFormat('Y-m-d', $dernierPaiement->moispaieloyer . '-01')
    : ($request->filled('periodeversement')
        ? Carbon::createFromFormat('Y-m-d', $request->periodeversement . '-01')
        : Carbon::createFromFormat('Y-m-d', $request->annee . '-01-01'));

    $listePaiements = [];

    // 1️⃣ Gestion du reliquat du dernier paiement
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        while ($montantRestant > 0 && $dernierPaiement->relicatloyer > 0) {
            $verse = min($montantRestant, $dernierPaiement->relicatloyer);
            $nouveauReliquat = $dernierPaiement->relicatloyer - $verse;
            $typeVersement = ($nouveauReliquat == 0) ? 'complet' : 'partiel';

            $paiement = Modelpaiementloyer::create([
                'idmaison' => $denomination,
                'numappart' => $numappartement,
                'idlocataire' => $idloc,
                'nomlocataire' => $nom,
                'montantloyer' => $montantloyer,
                'montantmensuelverse' => $verse,
                'modepaiement' => $modepaie,
                'moispaieloyer' => $dernierPaiement->moispaieloyer,
                'relicatloyer' => $nouveauReliquat,
                'daterengloyer' => $datevers,
                'moisenregloyer' => $moisdatevers,
                'type_versement' => $typeVersement,
                'dateversementrelicatloyer' => $datevers,
            ]);

            $listePaiements[] = $paiement;
            $montantRestant -= $verse;
            $dernierPaiement->relicatloyer = $nouveauReliquat;

            if ($nouveauReliquat == 0) {
               // $anneeMois->addMonth(); // avancer seulement si reliquat soldé
                break;
            }
        }
    }

    // 2️⃣ Nouveaux paiements pour les mois suivants
    while ($montantRestant > 0) {

            if ($dernierPaiement) {
            $anneeMois->addMonth();
            $dernierPaiement = null; // pour éviter d'ajouter plusieurs fois
        }
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;
        $typeVersement = ($relicat == 0) ? 'complet' : 'partiel';

        $paiement = Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $anneeMois->format('Y-m'),
            'relicatloyer' => $relicat,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
            'type_versement' => $typeVersement,
            'dateversementrelicatloyer' => $relicat > 0 ? $datevers : null,
        ]);

        $listePaiements[] = $paiement;
        $montantRestant -= $verse;

        // Avancer le mois seulement si reliquat = 0
        if ($relicat == 0) {
            $anneeMois->addMonth();
        } else {
            break; // reste sur ce mois tant que reliquat > 0
        }
    }

    // 3️⃣ Récupérer le mode de paiement
    $modepaiemodel = ModelModepaiement::select(['id','libellemodepaiement','etat'])
        ->where('etat', 1)
        ->where('id', $modepaie)
        ->first();
        
      $etat=1;
            $cachet = DB::table('cachet_paiement_loyers')
            ->where('etat', $etat)
            ->first();

    // 4️⃣ Générer le PDF
    $pdf = PDF::loadView('recupaiement', [
        'locataire' => $locataire,
        'paiements' => $listePaiements,
        'datevers' => $datevers,
        'cachet'=> $cachet,
        'modepaie' => $modepaiemodel->libellemodepaiement ?? 'N/A',
    ]);

    $filename = 'recu_paiement_' . $locataire->id . '_' . time() . '.pdf';
    $pdf->save(storage_path('app/public/recus/' . $filename));

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué,Souhaitez Vous Visualiser le recu??",
        'recu_url' => asset('storage/recus/' . $filename)
    ], 200);

}


public function genererrecu(Request $request)
{
   /*$denomination = $request->denomination;
   $periodeversement=$request->periodeversement;
    $numappartement = $request->numappartement;
    $nom = $request->nom;
    $montantloyer = (int) $request->montantloyer;
    $montantverse = (int) $request->montantmensverse;
    $modepaie = $request->modepaiement;
    $datevers = Carbon::parse($request->datevers)->format('Y-m-d');
    $moisdatevers = Carbon::parse($datevers)->format('Y-m');*/

    // Récupérer le locataire
   /* $locataire = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom'])
        ->where('iddenomination', $denomination)
        ->where('numappartement', $numappartement)
        ->first();*/
$idloc = $request->idlocataire;
$dateversement = $request->periode;
$locataire = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom'])
        ->where('id', $idloc)
        
        ->first();

    if (!$locataire) {
        return response()->json(['success' => false, 'message' => 'Locataire introuvable'], 404);
    }

    
   

    // Récupérer le dernier paiement
    $paiement = Modelpaiementloyer::where('idlocataire', $idloc)
            ->where('daterengloyer', $dateversement)
        ->orderBy('moispaieloyer', 'desc')
        ->orderBy('id', 'desc') // Pour gérer les paiements multiples dans le même mois
        ->get();

        if($paiement && count($paiement)>0){

        $modepaie=$paiement[0]->modepaiement;
      $modepaiemodel = ModelModepaiement::select(['id','libellemodepaiement','etat'])
        ->where('etat', 1)
        ->where('id', $modepaie)
        ->first();

           $etat=1;
            $cachet = DB::table('cachet_paiement_loyers')
            ->where('etat', $etat)
            ->first();

 //$listePaiements= $paiement;
        // 4️⃣ Générer le PDF
    $pdf = PDF::loadView('recuapartpaiement', [
        'locataire' => $locataire,
        'paiements' => $paiement,
        'datevers' => $dateversement,
        'cachet'=> $cachet,
        'modepaie' => $modepaiemodel->libellemodepaiement ?? 'N/A',
    ]);

    $filename = 'recu_paiement_' . $locataire->id . '_' . time() . '.pdf';
    $pdf->save(storage_path('app/public/recus/' . $filename));

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué,Souhaitez Vous Visualiser le recu??",
        'recu_url' => asset('storage/recus/' . $filename)
    ], 200);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Aucun paiement trouvé pour ce locataire à cette date'], 404);
        }

  /*
        $anneeMois = $dernierPaiement
    ? Carbon::createFromFormat('Y-m-d', $dernierPaiement->moispaieloyer . '-01')
    : ($request->filled('periodeversement')
        ? Carbon::createFromFormat('Y-m-d', $request->periodeversement . '-01')
        : Carbon::createFromFormat('Y-m-d', $request->annee . '-01-01'));

    $listePaiements = [];

    // 1️⃣ Gestion du reliquat du dernier paiement
    if ($dernierPaiement && $dernierPaiement->relicatloyer > 0) {
        while ($montantRestant > 0 && $dernierPaiement->relicatloyer > 0) {
            $verse = min($montantRestant, $dernierPaiement->relicatloyer);
            $nouveauReliquat = $dernierPaiement->relicatloyer - $verse;
            $typeVersement = ($nouveauReliquat == 0) ? 'complet' : 'partiel';

            $paiement = Modelpaiementloyer::create([
                'idmaison' => $denomination,
                'numappart' => $numappartement,
                'idlocataire' => $idloc,
                'nomlocataire' => $nom,
                'montantloyer' => $montantloyer,
                'montantmensuelverse' => $verse,
                'modepaiement' => $modepaie,
                'moispaieloyer' => $dernierPaiement->moispaieloyer,
                'relicatloyer' => $nouveauReliquat,
                'daterengloyer' => $datevers,
                'moisenregloyer' => $moisdatevers,
                'type_versement' => $typeVersement,
                'dateversementrelicatloyer' => $datevers,
            ]);

            $listePaiements[] = $paiement;
            $montantRestant -= $verse;
            $dernierPaiement->relicatloyer = $nouveauReliquat;

            if ($nouveauReliquat == 0) {
               // $anneeMois->addMonth(); // avancer seulement si reliquat soldé
                break;
            }
        }
    }

    // 2️⃣ Nouveaux paiements pour les mois suivants
    while ($montantRestant > 0) {

            if ($dernierPaiement) {
            $anneeMois->addMonth();
            $dernierPaiement = null; // pour éviter d'ajouter plusieurs fois
        }
        $verse = min($montantRestant, $montantloyer);
        $relicat = $montantloyer - $verse;
        $typeVersement = ($relicat == 0) ? 'complet' : 'partiel';

        $paiement = Modelpaiementloyer::create([
            'idmaison' => $denomination,
            'numappart' => $numappartement,
            'idlocataire' => $idloc,
            'nomlocataire' => $nom,
            'montantloyer' => $montantloyer,
            'montantmensuelverse' => $verse,
            'modepaiement' => $modepaie,
            'moispaieloyer' => $anneeMois->format('Y-m'),
            'relicatloyer' => $relicat,
            'daterengloyer' => $datevers,
            'moisenregloyer' => $moisdatevers,
            'type_versement' => $typeVersement,
            'dateversementrelicatloyer' => $relicat > 0 ? $datevers : null,
        ]);

        $listePaiements[] = $paiement;
        $montantRestant -= $verse;

        // Avancer le mois seulement si reliquat = 0
        if ($relicat == 0) {
            $anneeMois->addMonth();
        } else {
            break; // reste sur ce mois tant que reliquat > 0
        }
    }

    // 3️⃣ Récupérer le mode de paiement
    $modepaiemodel = ModelModepaiement::select(['id','libellemodepaiement','etat'])
        ->where('etat', 1)
        ->where('id', $modepaie)
        ->first();

    // 4️⃣ Générer le PDF
    $pdf = PDF::loadView('recupaiement', [
        'locataire' => $locataire,
        'paiements' => $listePaiements,
        'datevers' => $datevers,
        'modepaie' => $modepaiemodel->libellemodepaiement ?? 'N/A',
    ]);

    $filename = 'recu_paiement_' . $locataire->id . '_' . time() . '.pdf';
    $pdf->save(storage_path('app/public/recus/' . $filename));

    return response()->json([
        'success' => true,
        'message' => "Enregistrement effectué,Souhaitez Vous Visualiser le recu??",
        'recu_url' => asset('storage/recus/' . $filename)
    ], 200);*/

}

    public function destroy($id)

{
    // Find the famille by ID
    $paiementloyer = Modelpaiementloyer::find($id);

    // Check if the famille exists
    if ($paiementloyer) {
        

        // A Delete 
        $paiementloyer->delete();

      

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Enregistrement Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Enregistrement Introuvable'], 404);
    }
}

public function exportBilanLocataireExcel(Request $request)
    {
        $idLocataire = $request->get('idlocataire');
        if (!$idLocataire) {
            return response()->json(['error' => 'Locataire manquant'], 400);
        }

        $locataire = ModelLocataire::find($idLocataire);
        $paiements = Modelpaiementloyer::where('idlocataire', $idLocataire)
            ->orderBy('daterengloyer', 'asc')
            ->get(['moispaieloyer','moisenregloyer', 'daterengloyer', 'montantmensuelverse', 'relicatloyer', 'montantloyer']);

        // 📘 Création du fichier Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Bilan Locataire');

        // En-têtes
        $sheet->fromArray(['Mois Loyer','Mois Paiement', 'Date Paiement', 'Montant Versé', 'Reliquat', 'Montant Loyer'], null, 'A1');
        $row = 2;
// définir la locale en français
setlocale(LC_TIME, 'fr_FR.UTF-8');
Carbon::setLocale('fr');

// Style des entêtes
$style = $sheet->getStyle('A1:F1');
$style->getFont()->setBold(true)->getColor()->setRGB('FFFFFF'); // texte blanc
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('007ACC'); // bleu
$style->getAlignment()->setHorizontal('center');
        foreach ($paiements as $p) {

        $formattedDate = \Carbon\Carbon::parse($p->daterengloyer)->format('d/m/Y');
        $moisFormatte = Carbon::parse($p->moispaieloyer . '-01')->translatedFormat('F Y');

            $sheet->fromArray([
                $moisFormatte,
                $p->moisenregloyer,
                $formattedDate,
                $p->montantmensuelverse,
                $p->relicatloyer,
                $p->montantloyer
            ], null, 'A' . $row);
            $row++;
        }

        // Ajustement automatique des colonnes
        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = 'bilan_locataire_' . ($locataire->nom ?? 'inconnu') . '_' . Carbon::now()->format('Ymd_His') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $tempPath = storage_path('app/public/' . $filename);
        $writer->save($tempPath);

        return response()->download($tempPath)->deleteFileAfterSend(true);
    }


    public function exportBilanLocataireExcelsecond(Request $request)
{
    $idLocataire = $request->get('idlocataire');
    if (!$idLocataire) {
        return response()->json(['error' => 'Locataire manquant'], 400);
    }

    $locataire = ModelLocataire::find($idLocataire);
    if (!$locataire) {
        return response()->json(['error' => 'Locataire introuvable'], 404);
    }

    $paiements = Modelpaiementloyer::with('modePaiementInfo')
        ->where('idlocataire', $idLocataire)
        ->where('annule', 0)
        ->orderBy('daterengloyer', 'asc')
        ->get(['moispaieloyer','moisenregloyer', 'daterengloyer', 'montantmensuelverse', 'relicatloyer', 'montantloyer', 'modepaiement']);

    // Localisation française
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    Carbon::setLocale('fr');

     // Totaux
    $totalVerse = $paiements->sum('montantmensuelverse');
    $totalReliquat = $paiements->sum('relicatloyer');

    // Création du fichier Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Bilan Locataire');

    // === INFOS LOCATAIRE ===
    $sheet->setCellValue('A1', 'BILAN DU LOCATAIRE');
    $sheet->mergeCells('A1:F1');
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $nom=$locataire->nom.' '.$locataire->prenom;
    $numero=$locataire->numero1.'/'.$locataire->numero2;
    $sheet->setCellValue('A3', 'Nom complet :');
    $sheet->setCellValue('B3', $nom ?? 'N/A');
    $sheet->setCellValue('A4', 'Téléphone :');
    $sheet->setCellValue('B4', $numero ?? 'N/A');
    $sheet->setCellValue('A5', 'Adresse Mail :');
    $sheet->setCellValue('B5', $locataire->adresseemail ?? 'N/A');
    $sheet->setCellValue('A6', 'Date d’édition :');
    $sheet->setCellValue('B6', Carbon::now()->translatedFormat('d F Y à H:i'));

    // === EN-TÊTES DU TABLEAU ===
    $headers = ['Mois Loyer','Mois Paiement', 'Date Paiement', 'Montant Versé (FCFA)', 'Reliquat (FCFA)', 'Montant Loyer (FCFA)','Mode Paiement'];
    $sheet->fromArray($headers, null, 'A8');

    // Style des entêtes
    $headerStyle = $sheet->getStyle('A8:G8');
    $headerStyle->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
    $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('007ACC');
    $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // === CONTENU ===
    $row = 9;
    foreach ($paiements as $p) {
        $formattedDate = Carbon::parse($p->daterengloyer)->translatedFormat('d F Y');
        $moisLoyer = Carbon::parse($p->moispaieloyer . '-01')->translatedFormat('F Y');
        $moisPaiement = Carbon::parse($p->moisenregloyer . '-01')->translatedFormat('F Y');
        $modepaiement = $p->modePaiementInfo->libellemodepaiement ?? 'Non défini';

        $sheet->fromArray([
            ucfirst($moisLoyer),
            ucfirst($moisPaiement),
            $formattedDate,
            number_format($p->montantmensuelverse, 0, ',', ' '),
            number_format($p->relicatloyer, 0, ',', ' '),
            number_format($p->montantloyer, 0, ',', ' '),
            $modepaiement
        ], null, 'A' . $row);
        $row++;
    }

$row=$row + 1;
    // Totaux
    $sheet->setCellValue('C' . $row, 'Total Versé :');
    $sheet->setCellValue('D' . $row, number_format($totalVerse, 0, ',', ' ') );
    $sheet->setCellValue('E' . $row, 'Total Relicat :');
    $sheet->setCellValue('F' . $row,number_format($totalReliquat , 0, ',', ' ') );


    // Style totaux
    $sheet->getStyle("C{$row}:F{$row}")->getFont()->setBold(true);
    $sheet->getStyle("C{$row}:F{$row}")->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setRGB('E6E6E6');

    // === AJUSTEMENT AUTO DES COLONNES ===
    foreach (range('A', 'G') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // === FICHIER FINAL ===
    $filename = 'bilan_locataire_' . str_replace(' ', '_', $locataire->nom ?? 'inconnu') . '_' . Carbon::now()->format('Ymd_His') . '.xlsx';
    $path = storage_path('app/public/' . $filename);

    $writer = new Xlsx($spreadsheet);
    $writer->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
}

    public function exportBilanLocatairePdf(Request $request)
    {
        $idLocataire = $request->get('idlocataire');
        if (!$idLocataire) {
            return response()->json(['error' => 'Locataire manquant'], 400);
        }

        $locataire = ModelLocataire::find($idLocataire);
        $paiements = Modelpaiementloyer::where('idlocataire', $idLocataire)
            ->orderBy('daterengloyer', 'asc')
            ->get();

        $pdf = PDF::loadView('pdf.bilan_locataire', [
            'locataire' => $locataire,
            'paiements' => $paiements
        ]);

        $filename = 'bilan_locataire_' . ($locataire->nom ?? 'inconnu') . '_' . Carbon::now()->format('Ymd_His') . '.pdf';
        return $pdf->download($filename);
    }



     public function exportBilanLocatairefirst(Request $request)
    {
        $idLocataire = $request->get('idlocataire');
        $periode = $request->get('periode'); // format "YYYY-MM to YYYY-MM"
      $format = $request->get('format', 'excel');

    if (!$idLocataire || !$periode) {
        return response()->json(['error' => 'Locataire ou période manquante'], 400);
    }

    $locataire = ModelLocataire::find($idLocataire);
    if (!$locataire) {
        return response()->json(['error' => 'Locataire introuvable'], 404);
    }

    // ✅ Normalisation de la période
    $periode = str_replace(' to ', ' au ', $periode);
    $dates = explode(' au ', $periode);

    // ✅ Si un seul mois est donné (ex: "2025-03")
    if (count($dates) === 1) {
        $debut = $fin = Carbon::parse(trim($dates[0]) . '-01');
    } 
    // ✅ Si deux mois sont donnés (ex: "2025-03 au 2025-06")
    else 
        if (count($dates) !== 2)
        {
 // ✅ Sécuriser les dates
    $dateDebutStr = trim($dates[0]);
    $dateFinStr = trim($dates[1]);
    //if (count($dates) !== 2) {
       // 
    }
    else{

return response()->json(['error' => 'Format de période invalide'], 400);
    }

   

    // Ajoute "-01" seulement si ce n’est pas déjà une date complète
    $dateDebut = strlen($dateDebutStr) === 7 ? $dateDebutStr . '-01' : $dateDebutStr;
    $dateFin = strlen($dateFinStr) === 7 ? $dateFinStr . '-01' : $dateFinStr;

    $debut = Carbon::parse($dateDebut);
    $fin = Carbon::parse($dateFin);

    $periodeMois = CarbonPeriod::create($debut, '1 month', $fin);

    // 🔹 Récupérer les paiements
    $paiements = Modelpaiementloyer::where('idlocataire', $idLocataire)
        ->whereBetween('moispaieloyer', [$debut->format('Y-m'), $fin->format('Y-m')])
            ->get()
            ->keyBy('moispaieloyer'); // clé = mois

        // Générer les lignes pour Excel/PDF
 $rows = [];
    $totalVerse = 0;
    $totalReliquat = 0;

    foreach ($periodeMois as $mois) {
        $moisStr = $mois->format('Y-m');
        if (isset($paiements[$moisStr])) {
            $p = $paiements[$moisStr];
            $rows[] = [
                'moisLoyer' => ucfirst($mois->translatedFormat('F Y')),
                'moisPaiement' => Carbon::parse($p->moisenregloyer . '-01')->translatedFormat('F Y'),
                'datePaiement' => Carbon::parse($p->daterengloyer)->translatedFormat('d F Y'),
                'montantVerse' => $p->montantmensuelverse,
                'relicat' => $p->relicatloyer,
                'montantLoyer' => $p->montantloyer,
                'modePaiement' => $p->modePaiementInfo->libellemodepaiement ?? 'Non défini'
            ];
            $totalVerse += $p->montantmensuelverse;
            $totalReliquat += $p->relicatloyer;
        } else {
            $rows[] = [
                'moisLoyer' => ucfirst($mois->translatedFormat('F Y')),
                'moisPaiement' => '-',
                'datePaiement' => '-',
                'montantVerse' => 0,
                'relicat' => $locataire->montantloyer ?? 0,
                'montantLoyer' => $locataire->montantloyer ?? 0,
                'modePaiement' => '-'
            ];
            $totalReliquat += $locataire->montantloyer ?? 0;
        }
    }

        if ($format === 'excel') {
            return $this->exportExcel($locataire, $rows,$debut,$fin,$totalVerse,$totalReliquat);
        } else {
            $etat=1;
            $cachet = DB::table('cachet_paiement_loyers')
            ->where('etat', $etat)
            ->first();

            return $this->exportPDF($locataire, $rows,$debut,$fin,$cachet);
        }
    }


    public function exportBilanLocataire(Request $request)
{
    $idLocataire = $request->get('idlocataire');
    $periode = $request->get('periode'); // format "YYYY-MM" ou "YYYY-MM to YYYY-MM"
    $format = $request->get('format', 'excel');

    if (!$idLocataire || !$periode) {
        return response()->json(['error' => 'Locataire ou période manquante'], 400);
    }

    $locataire = ModelLocataire::find($idLocataire);
    if (!$locataire) {
        return response()->json(['error' => 'Locataire introuvable'], 404);
    }

    $locatairesecond = ModelLocataire::with('appartement')->find($idLocataire);
 if ($locatairesecond) {
    $appartement = ModelAppartement::where('numappartement', $locatairesecond->numappartement)
        ->where('idmaison', $locatairesecond->iddenomination)
        ->first();

    $montantLoyerei = $appartement->montantloyer ?? 0;
} else {
    $montantLoyerei = 0;
}
    // ✅ Normalisation de la période
    $periode = str_replace(' to ', ' au ', $periode);
    $dates = explode(' au ', $periode);

    // ✅ Cas 1 : Un seul mois ou une seule date
    if (count($dates) === 1) {
        $dateUniqueStr = trim($dates[0]);
        $dateUnique = strlen($dateUniqueStr) === 7 ? $dateUniqueStr . '-01' : $dateUniqueStr;
        try {
            $debut = Carbon::parse($dateUnique)->startOfMonth();
            $fin = Carbon::parse($dateUnique)->endOfMonth();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Format de date invalide'], 400);
        }

        $periodeMois = CarbonPeriod::create($debut, '1 month', $fin);

    } 
    // ✅ Cas 2 : Période complète (ex: "2025-03 au 2025-06")
    elseif (count($dates) === 2) {
        $dateDebutStr = trim($dates[0]);
        $dateFinStr = trim($dates[1]);

        // Ajoute "-01" seulement si ce n’est pas déjà une date complète
        $dateDebut = strlen($dateDebutStr) === 7 ? $dateDebutStr . '-01' : $dateDebutStr;
        $dateFin = strlen($dateFinStr) === 7 ? $dateFinStr . '-01' : $dateFinStr;

        try {
            $debut = Carbon::parse($dateDebut)->startOfMonth();
            $fin = Carbon::parse($dateFin)->endOfMonth();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Format de période invalide'], 400);
        }

        $periodeMois = CarbonPeriod::create($debut, '1 month', $fin);

    } 
    // ❌ Cas invalide
    else {
        return response()->json(['error' => 'Format de période invalide'], 400);
    }

    // 🔹 Récupérer les paiements du locataire sur la période
    $paiements = Modelpaiementloyer::with('modePaiementInfo')
        ->where('idlocataire', $idLocataire)
        ->whereBetween('moispaieloyer', [$debut->format('Y-m'), $fin->format('Y-m')])
        ->where('annule', 0)
        ->get()
        ->keyBy('moispaieloyer'); // clé = "YYYY-MM"

    // 🔹 Générer les lignes pour Excel/PDF
    $rows = [];
    $totalVerse = 0;
    $totalReliquat = 0;
foreach ($periodeMois as $mois) {
    $moisStr = $mois->format('Y-m');

    if (isset($paiements[$moisStr])) {
        $p = $paiements[$moisStr];

        // Vérification avant Carbon
        $moisPaiement = (!empty($p->moisenregloyer) && $p->moisenregloyer != '-') 
            ? Carbon::parse($p->moisenregloyer . '-01')->translatedFormat('F Y') 
            : '-';

        $datePaiement = (!empty($p->daterengloyer) && $p->daterengloyer != '-') 
            ? Carbon::parse($p->daterengloyer)->translatedFormat('d F Y') 
            : '-';

        $rows[] = [
            'moisLoyer' => ucfirst($mois->translatedFormat('F Y')),
            'moisPaiement' => $moisPaiement,
            'datePaiement' => $datePaiement,
            'montantVerse' => $p->montantmensuelverse,
            'relicat' => $p->relicatloyer,
            'montantLoyer' => $p->montantloyer,
            'modePaiement' => $p->modePaiementInfo->libellemodepaiement ?? 'Non défini'
        ];

        $totalVerse += $p->montantmensuelverse;
        $totalReliquat += $p->relicatloyer;
    } else {
        // 🔸 Pas de paiement → locataire non à jour
        $rows[] = [
            'moisLoyer' => ucfirst($mois->translatedFormat('F Y')),
            'moisPaiement' => '-',
            'datePaiement' => '-',
            'montantVerse' => 0,
            'relicat' => $montantLoyerei ?? 0,
            'montantLoyer' => $montantLoyerei ?? 0,
            'modePaiement' => '-'
        ];

        $totalReliquat += $montantLoyerei ?? 0;
    }
}

    // 🔹 Export
    if ($format === 'excel') {
        return $this->exportExcel($locataire, $rows, $debut, $fin, $totalVerse, $totalReliquat);
    } else {
       // return $this->exportPDF($locataire, $rows,$debut,$fin);
            $etat=1;
            $cachet = DB::table('cachet_paiement_loyers')
            ->where('etat', $etat)
            ->first();

            return $this->exportPDF($locataire, $rows,$debut,$fin,$cachet);
    }
}

    private function exportExcel($locataire, $rows,$debut,$fin,$totalVerse,$totalReliquat)
    {
       $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Bilan Locataire');
   // Localisation française
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    Carbon::setLocale('fr');
    // === INFOS LOCATAIRE ===
    $sheet->setCellValue('A1', 'BILAN DU LOCATAIRE');
    $sheet->mergeCells('A1:G1');
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $nom = $locataire->nom . ' ' . $locataire->prenom;
    $numero = $locataire->numero1 . '/' . $locataire->numero2;

    $sheet->setCellValue('A3', 'Nom complet :');
    $sheet->setCellValue('B3', $nom ?? 'N/A');
    $sheet->setCellValue('A4', 'Téléphone :');
    $sheet->setCellValue('B4', $numero ?? 'N/A');
    $sheet->setCellValue('A5', 'Email :');
    $sheet->setCellValue('B5', $locataire->adresseemail ?? 'N/A');
    $sheet->setCellValue('A6', 'Période :');
    $sheet->setCellValue('B6', $debut->translatedFormat('F Y') . ' - ' . $fin->translatedFormat('F Y'));
    $sheet->setCellValue('A7', 'Date d’édition :');
    $sheet->setCellValue('B7', Carbon::now()->translatedFormat('d F Y à H:i'));

    // === EN-TÊTES TABLEAU ===
    $headers = ['Mois Loyer', 'Mois Paiement', 'Date Paiement', 'Montant Versé (FCFA)', 'Reliquat (FCFA)', 'Montant Loyer (FCFA)', 'Mode Paiement'];
    $sheet->fromArray($headers, null, 'A9');

    $headerStyle = $sheet->getStyle('A9:G9');
    $headerStyle->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
    $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('007ACC');
    $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // === CONTENU ===
    $row = 10;
    foreach ($rows as $r) {
           $formattedDate =   (!empty($r['datePaiement']) && $r['datePaiement'] != '-') 
            ? Carbon::parse($r['datePaiement'])->translatedFormat('d F Y') : '-';


        $moisLoyer =(!empty($r['moisLoyer']) && $r['moisLoyer'] != '-') 
            ? Carbon::parse($r['moisLoyer'])->translatedFormat('F Y'): '-';
        $moisPaiement = (!empty($r['moisPaiement']) && $r['moisPaiement'] != '-') 
            ?Carbon::parse($r['moisPaiement'])->translatedFormat('F Y'): '-';
        $sheet->fromArray([
            $moisLoyer,
            $moisPaiement,
            $formattedDate,
            number_format($r['montantVerse'], 0, ',', ' '),
            number_format($r['relicat'], 0, ',', ' '),
            number_format($r['montantLoyer'], 0, ',', ' '),
            $r['modePaiement']
        ], null, 'A' . $row);
        $row++;
    }

    // === TOTAUX ===
    $row++;
    $sheet->setCellValue('C' . $row, 'Total Versé :');
    $sheet->setCellValue('D' . $row, number_format($totalVerse, 0, ',', ' '));
    $sheet->setCellValue('E' . $row, 'Total Reliquat :');
    $sheet->setCellValue('F' . $row, number_format($totalReliquat, 0, ',', ' '));

    $sheet->getStyle("C{$row}:F{$row}")->getFont()->setBold(true);
    $sheet->getStyle("C{$row}:F{$row}")->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setRGB('E6E6E6');

    foreach (range('A', 'G') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // === FICHIER FINAL ===
    $filename = 'bilan_locataire_' . str_replace(' ', '_', $locataire->nom ?? 'inconnu') . '_' . Carbon::now()->format('Ymd_His') . '.xlsx';
    $path = storage_path('app/public/' . $filename);
    (new Xlsx($spreadsheet))->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
    }

    private function exportPDF($locataire, $rows,$debut,$fin,$cachet)
    {
        $pdf = PDF::loadView('pdf.bilan_locataire', [
            'locataire' => $locataire,
            'rows' => $rows,
            'date_debut'=> $debut,
            'date_fin'=> $fin,
            'cachet'=> $cachet,
        ]);
        $filename = 'bilan_locataire_' . ($locataire->nom ?? 'inconnu') . '_' . Carbon::now()->format('Ymd_His') . '.pdf';
        return $pdf->download($filename);
    }


}
