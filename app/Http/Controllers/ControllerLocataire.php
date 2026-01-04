<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class ControllerLocataire extends Controller
{
    //

    public function index(Request $request)
    {
        // Check if the request is AJAX (for DataTables)
   if ($request->ajax()) {
           

            $familles = ModelLocataire::select(['id','iddenomination','numappartement','nom','prenom','numero1','numero2','adresseemail','occupation','montantcaution','dateentree','datesortie','reliquatcaution'])->get();
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($familles)
                ->addIndexColumn() // Adds index numbers
             ->addColumn('denomination', function($row) {

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                    $detenteur=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->where('id',  $row->iddenomination)->first();

                    return $detenteur ? ucwords(strtolower($detenteur->denomination)) : 'N/A';
      


                 })
                 ->addColumn('detenteur', function($row) {

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                    $maison=ModelMaison::select(['id','denomination','detenteur','etat'])->where('etat', 1)->where('id',  $row->iddenomination)->first();
                    $detenteur=ModelDetenteurs::select(['id','libelledetenteurs','etat'])->where('etat', 1)->where('id',  $maison->detenteur)->first();
                    return $detenteur ? ucwords(strtolower($detenteur->libelledetenteurs)) : 'N/A';
      


                 })
          ->addColumn('montantcaution', function($row) {

                   $formattedMontant = number_format($row->montantcaution, 0, ',', ' ');



                    $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })
           ->addColumn('reliquatcaution', function($row) {

                   $formattedMontant = number_format($row->reliquatcaution, 0, ',', ' ');



                    $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })


                 ->addColumn('etat', function($row) {


$etat = $row->datesortie !== null ? 'Sorti' : 'Actif';
$color = $row->datesortie !== null ? 'red' : 'green';

$btn ='<i class="fas fa-circle f-10 m-r-10" style="color:' . $color . ';"></i>
            <label style="color:' . $color . ';">' . $etat . '</label>';




                     return $btn;
      


                 })
                 ->addColumn('is_sorti', function($row) {
    return $row->datesortie !== null ? 1 : 0;
})
                ->addColumn('action', function($row) {



                        $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editlocataire" data-id="' . $row->id . '"  data-numappart="' . $row->numappartement . '" title="Edit"  ><i class="feather icon-edit"></i></a>';


                        $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletelocataire" data-id="' . $row->id . '" data-name="' . $row->id . '" data-numappart="' . $row->numappartement . '" data-maison="' . $row->id . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';




                    return $btn;
                })
                ->rawColumns(['action','etat','reliquatcaution','montantcaution'])
                ->make(true);
        }



        Log::info('Méthode index atteinte.');


     
    }

    public function store(Request $request)
    {



try {

   $validator = \Validator::make($request->all(), [
        //'denomination' => 'required|string|max:255|unique:table_appartement,denomination',
        'denomination' => 'required|string|max:255',
        'numappartement' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'phone_full1' => 'required|string|max:255',
       // 'phone_full2' => 'required|string|max:255',
        //'email' => 'required|string|max:255',
        'poste' => 'required|string|max:255',
        'montantcaution' => 'required|string|max:255',
        'dateentree' => 'required|string|max:255',
        //'datesortie' => 'required|string|max:255',
        //'description' => 'required|string|max:255',
       
       // 'description' => 'string|max:255',

    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

    $dateSortie =$request->datesortie;

    // Convertir les dates en format yyyy-mm-dd
$dateEntree = Carbon::parse($request->dateentree)->format('Y-m-d');
if(!empty($request->datesortie)){
$dateSortie = Carbon::parse($request->datesortie)->format('Y-m-d');
}

//['denomination','detenteur','idtypeimmo','typeimmo','ville','commune','quartier','adresse','description','etat'];

    $appartement=ModelAppartement::select(['id','idmaison','numappartement','montanttotalcaution'])->where('idmaison', $request->denomination)->where('numappartement',  $request->numappartement)->first();

    if (!$appartement) {
        //throw new Exception('Appartement non trouvé.');

        return response()->json(['error' =>'Appartement non trouvé.'], 200);
    }

    $montanttotalcaution=$appartement->montanttotalcaution;
    $relicat=$montanttotalcaution-$request->montantcaution;

    // Enregistrement en BD
    ModelLocataire::create([
        'iddenomination' => $request->denomination, // Enregistrer en majuscules
        'numappartement' => $request->numappartement,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'numero1' =>$request->phone_full1,
        'numero2' => $request->phone_full2,
        'adresseemail'=> $request->email,
        'occupation' => $request->poste,
        'montantcaution' => $request->montantcaution,
        'dateentree' => $dateEntree,
        'datesortie' =>$dateSortie,
        'reliquatcaution' => $relicat,
        
    ]);

if(empty($request->datesortie)){
$etat=1;
    if($appartement){

        $appartement->update(['etatappartement' => $etat]);

    }

}
else{

}



    return response()->json([
        'success' => true,
        'message' => 'Locataire Enregistré avec succès !',
    ], 200);



} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 500);
}


    }

    public function update(Request $request, $id)
{



 $dateSortie =$request->datesortie;
 $numappartement=$request->numappartementupdate;
    // Convertir les dates en format yyyy-mm-dd
$dateEntree = Carbon::parse($request->dateentree)->format('Y-m-d');
if(!empty($request->datesortie)){
$dateSortie = Carbon::parse($request->datesortie)->format('Y-m-d');
}

//['denomination','detenteur','idtypeimmo','typeimmo','ville','commune','quartier','adresse','description','etat'];

    $appartement=ModelAppartement::select(['id','idmaison','numappartement','montanttotalcaution'])->where('idmaison', $request->denomination)->where('numappartement',  $numappartement)->first();

    if (!$appartement) {
        //throw new Exception('Appartement non trouvé.');

        return response()->json(['error' =>'Appartement non trouvé.'], 200);
    }

    $montanttotalcaution=$appartement->montanttotalcaution;
    $relicat=$montanttotalcaution-preg_replace('/\s+/', '',$request->montantcaution);



try {
    $famille = ModelLocataire::find($id);
    if (!$famille) {
        return response()->json(['error' => 'Maison introuvable'], 404);
    }

    /*
 'iddenomination' => $request->denomination, // Enregistrer en majuscules
        'numappartement' => $request->numappartement,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'numero1' =>$request->phone_full1,
        'numero2' => $request->phone_full2,
        'adresseemail'=> $request->email,
        'occupation' => $request->poste,
        'montantcaution' => $request->montantcaution,
        'dateentree' => $dateEntree,
        'datesortie' =>$dateSortie,
        'reliquatcaution' => $relicat,
    */

    $famille->update([
        'iddenomination' => $request->denomination, // Enregistrer en majuscules
        //'numappartement' => $request->numappartement,
        'numappartement'=> $request->numappartementupdate,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'numero1' =>$request->phone_full1,
        'numero2' => $request->phone_full2,
        'adresseemail'=> $request->email,
        'occupation' => $request->poste,
        'montantcaution' => $request->montantcaution,
        'dateentree' => $dateEntree,
        'datesortie' =>$dateSortie,
        'reliquatcaution' => $relicat,
       
    ]);

     $appartement=ModelAppartement::select(['id','idmaison','numappartement','montanttotalcaution'])->where('idmaison', $request->denomination)->where('numappartement', $request->numappartementupdate)->first();

     if ($appartement) {

     $etat=1;
    if(!empty($dateSortie)){

    $etat=0;
    }
    


     $appartement->update(['etatappartement' => $etat]);
 }


    return response()->json([
        'success' => true,
        'message' => 'Modification effectuée avec succès ! ',
    ], 200);
} catch (\Exception $e) {
    return response()->json([
        'success' => false,
        'error' => $e->getMessage(),
    ], 500);
}

    
}


    public function updateetat($id)
{


// Find the famille by ID
    $famille = ModelLocataire::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etatappartement = 1; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Restoration effectuée avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Detenteur Introuvable'], 404);
    }
}


public function destroy($id)
{
    // Find the famille by ID
    $famille = ModelLocataire::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etatappartement = 0; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Appartement Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Bien Immobilier Introuvable'], 404);
    }
}


    public function Afficherlesdonnees()
    {
        $treeData = ModelLocataire::all();
      

    }

    

    public function getLocataireById($id)
    {
        // Find the famille by its ID
        $famille = ModelLocataire::find($id);
        
        // Check if famille exists
        if ($famille) {
            // Return the famille data as JSON
            return response()->json($famille);
        } else {
            // Return an error message if not found
            return response()->json(['error' => 'Famille not found'], 404);
        }
    }


    public function getLocataireByIdSecond($id)
{
    $locataire = ModelLocataire::find($id);

    if (!$locataire) {
        return response()->json(['error' => 'Locataire not found'], 404);
    }

    // Récupérer les options pour le select (par exemple, les appartements liés)
    $appartements = ModelAppartement::where('idmaison', $locataire->iddenomination)->get();

    return response()->json([
        'locataire' => $locataire,
        'appartements' => $appartements,
    ]);
}



  public function getLocataireByIdThird($id,$idnum)
{
    $locataire = ModelLocataire::find($id);

    if (!$locataire) {
        return response()->json(['error' => 'Locataire not found'], 404);
    }

    // Récupérer les options pour le select (par exemple, les appartements liés)
    $appartements = ModelAppartement::where('idmaison', $locataire->iddenomination)->get();

    $appartcaution = ModelAppartement::where('idmaison', $locataire->iddenomination)->where('numappartement', $idnum)->first();

    return response()->json([
        'locataire' => $locataire,
        'appartements' => $appartements,
        'appartcaution'=>$appartcaution,
    ]);
}


public function getNmbreLocataires()
    {
        // Find the famille by its ID
       // $famille = ModelLocataire::all();
        $famille = ModelLocataire::whereNull('datesortie')->get();
        //datesortie
        // Check if famille exists
        if ($famille) {
            // Return the famille data as JSON
            return response()->json($famille);
        } else {
            // Return an error message if not found
            return response()->json(['error' => 'Locataire Not Found'], 404);
        }
    }

}
