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
use App\Models\ModelTravaux;
use App\Models\ModelLocataire;


#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class ControllerTravaux extends Controller
{
    //

    public function index(Request $request)
    {
        // Check if the request is AJAX (for DataTables)
   if ($request->ajax()) {
           

          //  $familles = ModelTravaux::select(['id','idmaison','iddetenteur','numappart','intituletravaux','datenreg','montant','date'])->get();
        $familles = ModelTravaux::select(['id','idmaison','iddetenteur','numappart','intituletravaux','datenreg','montant','date']);
   
            $familles->orderBy('datenreg', 'desc');

            // Use Yajra DataTables package to return JSON data
            return DataTables::of($familles)
                ->addIndexColumn() // Adds index numbers
             ->addColumn('denomination', function($row) {

                    //$detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();
                    $detenteur=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->where('id',  $row->idmaison)->first();

                    return $detenteur ? ucwords(strtolower($detenteur->denomination)) : 'N/A';
      


                 })
                     ->addColumn('detenteur', function($row) {


     $detentfrommodel=ModelDetenteurs::select(['libelledetenteurs','etat','id'])->where('etat', 1)->where('id', $row->iddetenteur)->first();

     //$detenteurlabel= ucfirst(strtolower($detentfrommodel->libelledetenteurs));

                return $detentfrommodel ? ucfirst(strtolower($detentfrommodel->libelledetenteurs)) : 'N/A';
                      })
              ->addColumn('locataire', function($row) {

                   //$formattedMontant = number_format($row->montant, 0, ',', ' ');



                  //  $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                   //  return $btn;

                $locataire=ModelLocataire::select(['iddenomination','numappartement','nom','prenom','datesortie'])->where('iddenomination', $row->idmaison)->where('numappartement',  $row->numappart)->first();


                if(empty($locataire->datesortie)){


                }
      
      return $locataire->datesortie === null ?  ucwords(strtolower($locataire->nom.' '.$locataire->prenom)) : 'Appartement Libre' ;


                 })
          
          ->addColumn('montant', function($row) {

                   $formattedMontant = number_format($row->montant, 0, ',', ' ');



                    $btn = '<div class="montanttotalcautionclass">'.$formattedMontant.'</div>';
                    

                     return $btn;
      


                 })
          

                 ->addColumn('etat', function($row) {


$etat = $row->date !== null ? 'Resolu' : 'Non Resolu';
$color = $row->date !== null ? 'green' : 'red';

$btn ='<i class="fas fa-circle f-10 m-r-10" style="color:' . $color . ';"></i>
            <label style="color:' . $color . ';">' . $etat . '</label>';




                     return $btn;
      


                 })
                ->addColumn('action', function($row) {



                        $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 edittravaux" data-id="' . $row->id . '" data-numappart="' . $row->numappart . '" data-maison="' . $row->idmaison . '" data-travaux="'.$row->intituletravaux.'"
                        data-datetrav="'.$row->datenreg.'" title="Edit"  ><i class="feather icon-edit"></i></a>';


                        $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletetravaux" data-id="' . $row->id . '" 
                        data-name="' . $row->id . '" data-numappart="' . $row->numappart . '" data-maison="' . $row->idmaison . '" 
                        data-travaux="'.$row->intituletravaux.'"  data-datetrav="'.$row->datenreg.'" title="Delete"  ><i class="feather icon-trash-2"></i></a>';




                    return $btn;
                })
                ->rawColumns(['action','etat','montant'])
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
        'intituletravaux' => 'required|string|max:255',
        'montantrequis' => 'required|string|max:255',
        
       
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

    $dateresolution =$request->datesortie;



    // Convertir les dates en format yyyy-mm-dd
$dateEntree = Carbon::parse($request->dateentree)->format('Y-m-d');
if(!empty($request->datesortie)){
$dateresolution = Carbon::parse($request->datesortie)->format('Y-m-d');
}

//['denomination','detenteur','idtypeimmo','typeimmo','ville','commune','quartier','adresse','description','etat'];

    $appartement=ModelAppartement::select(['id','idmaison','numappartement','montanttotalcaution'])->where('idmaison', $request->denomination)->where('numappartement',  $request->numappartement)->first();

    if (!$appartement) {
        //throw new Exception('Appartement non trouvé.');

        return response()->json(['error' =>'Appartement non trouvé.'], 200);
    }

 

    // Enregistrement en BD
    ModelTravaux::create([
        'iddetenteur' => $request->detenteur,
        'idmaison' => $request->denomination, // Enregistrer en majuscules
        'numappart' => $request->numappartement,
        'intituletravaux' => $request->intituletravaux,
        'datenreg' => $dateEntree,
        'montant' =>$request->montantrequis,
        'date' => $dateresolution
      
        
    ]);

if(empty($request->datesortie)){
$etat=1;
    if($appartement){

        $appartement->update(['etatappartement' => $etat]);

    }

}



    return response()->json([
        'success' => true,
        'message' => 'Travaux Enregistrés avec succès !',
    ], 200);



} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 500);
}


    }

    public function update(Request $request, $id)
{



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





try {
    $famille = ModelTravaux::find($id);
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
        'iddetenteur' => $request->detenteur,
        'idmaison' => $request->denomination, // Enregistrer en majuscules
        'numappart' => $request->numappartement,
        'intituletravaux' => $request->intituletravaux,
        'datenreg' => $request->dateentree,
        'montant' =>$request->montantrequis,
        'date' => $request->datesortie,
        
       
    ]);

    /* $appartement=ModelAppartement::select(['id','idmaison','numappartement','montanttotalcaution'])->where('idmaison', $request->denomination)->where('numappartement',  $request->numappartement)->first();

     if ($appartement) {

     $etat=1;
    if(!empty($request->datesortie)){

    $etat=0;
    }
    


     //$appartement->update(['etatappartement' => $etat]);
 }*/


    return response()->json([
        'success' => true,
        'message' => 'Modification effectuée avec succès !',
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
    $famille = ModelTravaux::find($id);

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
    $famille = ModelTravaux::find($id);

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


public function deletetravaux($id)
{
    // Find the famille by ID
    $famille = ModelTravaux::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the deletetravaux
        $retour=$famille->delete();

       /*  $famille->etatappartement = 0; // Mettre la valeur de 'etat' à 0
    $famille->save(); */

  // Return success message with HTTP 200 status

  if($retour){
        return response()->json([
           // 'success' => 'Enregistrement Supprimé avec Succès!!'
           'success' => 'success'
        ], 200);
    }
    else{
       // return response()->json(['error' => 'Echec suppression'], 404);

           return response()->json([
           // 'success' => 'Enregistrement Supprimé avec Succès!!'
           'success' => 'Echec suppression'
        ], 200);
    }

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Echec suppression'], 404);
    }
}


    public function Afficherlesdonnees()
    {
        $treeData = ModelTravaux::all();
      

    }

    

    public function getTravauxById($id)
    {
        // Find the famille by its ID
        $travaux = ModelTravaux::find($id);
        
     
    if (!$travaux) {
        return response()->json(['error' => 'Travaux not found'], 404);
    }

    // Récupérer les options pour le select (par exemple, les appartements liés)
    $appartements = ModelAppartement::where('idmaison', $travaux->idmaison)->get();


    $locataire=ModelLocataire::select(['iddenomination','numappartement','nom','prenom'])->where('iddenomination', $id)->where('numappartement', $travaux->numappart)->first();


    return response()->json([
        'travaux' => $travaux,
        'appartements' => $appartements,
    ]);


    }


    public function getLocataireByIdSecond($id)
{
    $travaux = ModelTravaux::find($id);
    $maison =ModelMaison::all();
    $detenteurs = ModelDetenteurs::all();

    if (!$travaux) {
        return response()->json(['error' => 'Locataire not found'], 404);
    }

    // Récupérer les options pour le select (par exemple, les appartements liés)
    $appartements = ModelAppartement::where('idmaison', $travaux->idmaison)->get();
    $identitelocataire=ModelLocataire::select(['iddenomination','numappartement','nom','prenom'])->where('iddenomination',$travaux->idmaison)->where('numappartement', $travaux->numappart)->first();

    return response()->json([
        'travaux' => $travaux,
        'maison' => $maison,
        'detenteurs' =>$detenteurs,
        'appartements' => $appartements,
        'idenlocataire' => $identitelocataire,
    ]);
}

}
