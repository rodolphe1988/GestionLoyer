<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\Modelfluxdepenses;
use App\Models\ModelDetenteurs;
use App\Models\ModelModepaiement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;


class Controllerfluxsortants extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->wantsJson() || $request->isMethod('GET') && $request->has('draw')) {
           


          //  $fluxsortants = Modelfluxdepenses::select(['id','detenteurs','beneficiaire','montant','modepaiement','observation','dateereng'])->get();
    $fluxsortants = Modelfluxdepenses::select(['id','detenteurs','beneficiaire','montant','modepaiement','observation','dateereng'])
      
    ;

            
                if ($request->filled('detenteur')) {

                    if($request->detenteur!='tous' || $request->detenteur!=''){
                    $fluxsortants->where('detenteurs', $request->detenteur);

                        $fluxsortants->orderBy('dateereng', 'asc')
        ->orderBy('id', 'asc') ;
                    }
       
    }

    if ($request->filled('periode')) {

    $periode = $request->periode;
    // ✅ Normalisation de la période
    $periodeinput = str_replace(' to ', ' au ', $request->periode);
    $dates = explode(' au ', $periodeinput);

    $debut = $dates[0] ?? null;
    $fin = $dates[1] ?? $dates[0]; // si un seul mois sélectionné

 if ($debut) {
                // Ajouter le jour pour avoir des dates complètes
                $debutDate = $debut . '-01'; // Premier jour du mois
                
                if ($fin) {
                    // Dernier jour du mois de fin
                    $finDate = date('Y-m-t', strtotime($fin . '-01'));
                } else {
                    // Si une seule date, fin du même mois
                    $finDate = date('Y-m-t', strtotime($debut . '-01'));
                }
                
                $fluxsortants->whereBetween('dateereng', [$debutDate, $finDate]);

                    $fluxsortants->orderBy('dateereng', 'asc')
        ->orderBy('id', 'asc') ;
            }
        }

        if (!($request->filled('detenteur')) && !($request->filled('periode'))) {
            $fluxsortants->orderBy('dateereng', 'desc')
        ->orderBy('id', 'desc') ;
        }
        
            
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($fluxsortants)
                ->addIndexColumn() // Adds index numbers
             ->addColumn('modepaiementparam', function($row) {

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
               $modepaie=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->where('id',  $row->modepaiement)->first();

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                   
       
                return $modepaie ? ucwords(strtolower($modepaie->libellemodepaiement)) : 'N/A';
      


                 }) 
                  ->addColumn('detenteur', function($row) {



$modedetenteurs=ModelDetenteurs::select(['id','libelledetenteurs','etat'])->where('id',  $row->detenteurs)->first();

                        $btn =$modedetenteurs ? '<label>' . $modedetenteurs->libelledetenteurs . '</label>'
    : '<label><em>Non défini</em></label>';;




                    return $btn;
                })
    
                ->addColumn('action', function($row) {



                        $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editflux" data-id="' . $row->id . '" data-detenteurid="' . $row->detenteurs . '" data-beneficiaire="' . $row->beneficiaire. '" data-description="' . $row->observation . '"  data-montant="' . $row->montant . '" data-modepaiement="'.$row->modepaiement.'" data-dateereng="' . $row->dateereng . '" title="Edit"  ><i class="feather icon-edit"></i></a>';

                        $btn.= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deleteflux" data-id="' . $row->id . '" data-name="' . $row->id . '" data-numappart="' . $row->id. '" data-maison="' . $row->id . '"  data-locataire="' . $row->id . '"  title="Delete"  ><i class="feather icon-trash-2"></i></a>';




                    return $btn;
                })
                ->rawColumns(['action','modepaiementparam','detenteur'])
                ->make(true);
        }
        else{

             return response()->json([
        'success' => true,
        'message' =>"Enregistrement effectué",
    ], 200);
        }



        //
    }

    
    public function totaux(Request $request)
{
    // Appliquer les mêmes filtres que dans index si nécessaire
    $fluxdepenses = Modelfluxdepenses::query();

    if ($request->filled('detenteur')) {
        $fluxdepenses->where('detenteurs', $request->detenteur);
        
    }

        if ($request->filled('periode')) {

    $periode = $request->periode;
    // ✅ Normalisation de la période
    $periodeinput = str_replace(' to ', ' au ', $request->periode);
    $dates = explode(' au ', $periodeinput);

    $debut = $dates[0] ?? null;
    $fin = $dates[1] ?? $dates[0]; // si un seul mois sélectionné

 if ($debut) {
                // Ajouter le jour pour avoir des dates complètes
                $debutDate = $debut . '-01'; // Premier jour du mois
                
                if ($fin) {
                    // Dernier jour du mois de fin
                    $finDate = date('Y-m-t', strtotime($fin . '-01'));
                } else {
                    // Si une seule date, fin du même mois
                    $finDate = date('Y-m-t', strtotime($debut . '-01'));
                }
                
                $fluxsortants->whereBetween('dateereng', [$debutDate, $finDate]);
            }
        }


    // Calcul des totaux
    $totaux = $fluxdepenses->selectRaw('
        SUM(montant) as total_verse
    ')->first();

    // Retourner les totaux formatés en JSON
    return response()->json([
        'totalVerse' => number_format($totaux->total_verse ?? 0, 0, ',', ' '),
        'totalVersevrai' =>$totaux->total_verse ?? 0,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detenteur=$request->detenteur;
        $beneficiaire =$request->beneficiaire ;
        $description=$request->description;
        $montantrequis=$request->montantrequis;
        $dateentree=$request->dateentree;
        $modepaie=$request->modepaie;
       

        $datevers = Carbon::parse($dateentree)->format('Y-m-d');

        $resultat=Modelfluxdepenses::create([

        'detenteurs' =>$detenteur,
        'beneficiaire' => $beneficiaire, 
        'montant' => $montantrequis,
        'modepaiement'=>$modepaie,
        'observation' => $description,
        'dateereng' =>$datevers,
       
        
        
    ]);


if($resultat){

 return response()->json([
        'success' => true,
        'message' =>"Enregistrement effectué",
    ], 200);
}
else{

     return response()->json([
        'success' => false,
        'message' =>"Enregistrement non effectué",
    ], 200);

}
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   

    public function update(Request $request, $id)
{
    $detenteur = $request->detenteur;
    $beneficiaire = $request->beneficiaire;
    $description = $request->description;
    $montantrequis = $request->montantrequis;
    $dateentree = $request->dateentree;
    $modepaie = $request->modepaie;

    $datevers = Carbon::parse($dateentree)->format('Y-m-d');

    // On récupère l'enregistrement existant
    $depense = Modelfluxdepenses::find($id);

    if (!$depense) {
        return response()->json([
            'success' => false,
            'message' => "Dépense non trouvée",
        ], 404);
    }

    // On met à jour les champs
    $depense->detenteurs = $detenteur;
    $depense->beneficiaire = $beneficiaire;
    $depense->montant = $montantrequis;
    $depense->modepaiement = $modepaie;
    $depense->observation = $description;
    $depense->dateereng = $datevers;

    $resultat = $depense->save();

    if ($resultat) {
        return response()->json([
            'success' => true,
            'message' => "Mise à jour effectuée",
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => "Mise à jour non effectuée",
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

         $Modelfluxdepenses = Modelfluxdepenses::find($id);

    // Check if the famille exists
    if ($Modelfluxdepenses) {
        

        // A Delete the famille
        $Modelfluxdepenses->delete();

    
  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Appartement Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Bien Immobilier Introuvable'], 404);
    }
    }
}
