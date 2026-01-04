<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDetenteurs;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class ControllerDetenteurs extends Controller
{
    //

    public function index(Request $request)
    {
        // Check if the request is AJAX (for DataTables)
   if ($request->ajax()) {
            // Get all records from the modelfamille table

            // $familles = modelfamille::all();
          
          //A $familles = ModelDetenteurs::select(['id', 'libelledetenteurs','etat'])->where('etat',1)->get();

          $familles = ModelDetenteurs::select(['id', 'libelledetenteurs','etat'])->get();
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($familles)
                ->addIndexColumn() // Adds index numbers
                ->addColumn('action', function($row) {


                    // Define action buttons like Edit/Delete
//$btn = '<a href="/famille/'.$row->id.'" class="btn btn-sm btn-warning mx-1 editFamille" data-id="' . $row->id . '" title="Edit" style="background-color: #db6574 !important;" ><i class="fas fa-edit" style="color:white;" ></i></a>';
                   

               

 // Bouton Rollback uniquement si etat == 0
        if ($row->etat == 0) {

                    $btn = ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger rollbackdetenteur" data-id="' . $row->id . '" data-name="' . $row->libelledetenteurs . '" title="Rollback"  >
                    <i class="feather icon-rotate-ccw"></i></a>';

                      $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletedetenteurdef" data-id="' . $row->id . '" data-name="' . $row->libelledetenteurs . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';

}
else{

     $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editdetenteur" data-id="' . $row->id . '" title="Edit"  ><i class="feather icon-edit"></i></a>';


                        $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletedetenteur" data-id="' . $row->id . '" data-name="' . $row->libelledetenteurs . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';


}

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        Log::info('Méthode index atteinte.');

    /*if ($request->ajax()) {
        Log::info('Requête AJAX détectée.');
        
        $familles = ModelDetenteurs::select(['id', 'libelledetenteurs'])->get();
        
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
        return view('detenteurs');
    }

    public function store(Request $request)
    {
        // Validate the request data
      /*  $request->validate([
            'libelledetenteurs' => 'required|string|max:255',
        ]);

        // Create a new famille record
        ModelDetenteurs::create([
    'libelledetenteurs' => $request->libelledetenteurs,
]);

        // Redirect or return success message
        return redirect()->route('detenteur')
                         ->with('success', 'Famille created successfully.'); */

/*$request->validate([
        'libelledetenteurs' => 'required|string|max:255|unique:table_detenteurs,libelledetenteurs',
    ]);

    // Create a new famille record
    ModelDetenteurs::create([
        'libelledetenteurs' => $request->libelledetenteurs,
    ]);

    // Redirect or return success message
    return redirect()->route('detenteur')
                     ->with('success', 'Famille created successfully.');*/


 // Convertir en majuscules avant validation
    $request->merge([
        'libelledetenteurs' => strtoupper($request->libelledetenteurs),
    ]);


   $validator = \Validator::make($request->all(), [
        'libelledetenteurs' => 'required|string|max:255|unique:table_detenteurs,libelledetenteurs',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

    // Enregistrement en BD
    ModelDetenteurs::create([
        'libelledetenteurs' => strtoupper($request->libelledetenteurs), // Enregistrer en majuscules
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Detenteur créé avec succès !',
    ], 200);




    }

    public function update(Request $request, $id)
{


        $request->merge([
        'libelledetenteurs' => strtoupper($request->libelledetenteurs),
    ]);

   $validator = \Validator::make($request->all(), [
        'libelledetenteurs' => 'required|string|max:255|unique:table_detenteurs,libelledetenteurs',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

    $famille = ModelDetenteurs::find($id);
    if ($famille) {
        //$famille->update($request->all());

$famille->update([
            'libelledetenteurs' => strtoupper($request->libelledetenteurs)
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
    $famille = ModelDetenteurs::find($id);

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
        return response()->json(['error' => 'Detenteur Introuvable'], 404);
    }
}


public function destroy($id)
{
    // Find the famille by ID
    $famille = ModelDetenteurs::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etat = 0; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Detenteur Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Detenteur Introuvable'], 404);
    }
}


    public function Afficherlesdonnees()
    {
        $treeData = ModelDetenteurs::all();
      

    }

    

    public function getDetenteurById($id)
    {
        // Find the famille by its ID
        $famille = ModelDetenteurs::find($id);
        
        // Check if famille exists
        if ($famille) {
            // Return the famille data as JSON
            return response()->json($famille);
        } else {
            // Return an error message if not found
            return response()->json(['error' => 'Famille not found'], 404);
        }
    }

    public function getNmbreDetenteurs()
    {
        // Find the famille by its ID
        $famille = ModelDetenteurs::all();
        
        // Check if famille exists
        if ($famille) {
            // Return the famille data as JSON
            return response()->json($famille);
        } else {
            // Return an error message if not found
            return response()->json(['error' => 'Famille not found'], 404);
        }
    }
}
