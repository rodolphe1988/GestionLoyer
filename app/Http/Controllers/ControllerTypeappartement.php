<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTypeappartement;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class ControllerTypeappartement extends Controller
{
    //

    public function index(Request $request)
    {
        // Check if the request is AJAX (for DataTables)
   if ($request->ajax()) {
            // Get all records from the modelfamille table

            // $familles = modelfamille::all();
          
          //A $familles = ModelTypelocation::select(['id', 'libelletypelocation','etat'])->where('etat',1)->get();

          $familles = ModelTypeappartement::select(['id', 'libelletypeappartement','etat'])->get();
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($familles)
                ->addIndexColumn() // Adds index numbers
                ->addColumn('action', function($row) {


                    // Define action buttons like Edit/Delete
//$btn = '<a href="/famille/'.$row->id.'" class="btn btn-sm btn-warning mx-1 editFamille" data-id="' . $row->id . '" title="Edit" style="background-color: #db6574 !important;" ><i class="fas fa-edit" style="color:white;" ></i></a>';
                   

               

 // Bouton Rollback uniquement si etat == 0
        if ($row->etat == 0) {

                    $btn = ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger rollbacktypeappartement" data-id="' . $row->id . '" data-name="' . $row->libelletypeappartement . '" title="Rollback"  >
                    <i class="feather icon-rotate-ccw"></i></a>';

                    $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletetypeappartementdef" data-id="' . $row->id . '" data-name="' . $row->libelletypeappartement . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';
}
else{

     $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 edittypeappartement" data-id="' . $row->id . '" title="Edit"  ><i class="feather icon-edit"></i></a>';


                        $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletetypeappartement" data-id="' . $row->id . '" data-name="' . $row->libelletypeappartement . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';


}

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        Log::info('Méthode index atteinte.');

    /*if ($request->ajax()) {
        Log::info('Requête AJAX détectée.');
        
        $familles = ModelTypelocation::select(['id', 'libelletypelocation'])->get();
        
        Log::info('Données récupérées :', ['data' => $familles->toArray()]);
        
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => count($familles),
            'recordsFiltered' => count($familles),
            'data' => $familles
        ]);
    }

    Log::info('Requête non AJAX, affichage de la vue.');*/






        // Return the view (no data here, DataTables will use AJAX to load the data)
        return view('construction');
    }

    public function store(Request $request)
    {



 // Convertir en majuscules avant validation
    $request->merge([
        'libelletypeappartement' => $request->libelletypeappartement,
    ]);


$validator = \Validator::make($request->all(), [
        'libelletypeappartement' => 'required|string|max:255|unique:table_typeappartement,libelletypeappartement',
    ]);

if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }


 // Enregistrement en BD
    ModelTypeappartement::create([
        'libelletypeappartement' => $request->libelletypeappartement, // Enregistrer en majuscules
        'etat' => 1,

    ]);

  /* 

    

   */

    return response()->json([
        'success' => true,
        'message' => 'Type appartement créé avec succès !',
    ], 200);




    }

    public function update(Request $request, $id)
{


        $request->merge([
        'libelletypeappartement' =>$request->libelletypeappartement,
    ]);

   $validator = \Validator::make($request->all(), [
        'libelletypeappartement' => 'required|string|max:255|unique:table_typeappartement,libelletypeappartement',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

    $famille = ModelTypeappartement::find($id);
    if ($famille) {
        //$famille->update($request->all());

$famille->update([
            'libelletypeappartement' => $request->libelletypeappartement
        ]);


      //  return response()->json(['success' => 'Famille updated successfully']);

   return response()->json([
        'success' => true,
        'message' => 'Modification effectuée avec succès !',
    ], 200);


    } else {
        return response()->json(['error' => 'Echec Modification '], 404);
    }
}


    public function updateetat($id)
{


// Find the famille by ID
    $famille = ModelTypeappartement::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etat = 1; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Restoration effectuée avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Type Appartement Introuvable'], 404);
    }
}


public function destroy($id)
{
    // Find the famille by ID
    $famille = ModelTypeappartement::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etat = 0; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Type Appartement Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Type Appartement Introuvable'], 404);
    }
}


    public function Afficherlesdonnees()
    {
        $treeData = ModelTypeappartement::all();
      

    }

    

    public function getTypeappartementById($id)
    {
        // Find the famille by its ID
        $famille = ModelTypeappartement::find($id);
        
        // Check if famille exists
        if ($famille) {
            // Return the famille data as JSON
            return response()->json($famille);
        } else {
            // Return an error message if not found
            return response()->json(['error' => 'Type Appartement Introuvable'], 404);
        }
    }
}
