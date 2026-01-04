<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelMaison;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelDetenteurs;

#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class ControllerMaison extends Controller
{
    //

    public function index(Request $request)
    {
        // Check if the request is AJAX (for DataTables)
   if ($request->ajax()) {
            // Get all records from the modelfamille table


          $familles = ModelMaison::select(['id','denomination','detenteur','idtypeimmob','typeimmob','ville','commune','quartier','adresse','description','etat'])->get();
   // $familles = ModelMaison::select(['id','denomination','typeimmob','ville','commune','quartier','adresse'])->get();
            // Use Yajra DataTables package to return JSON data
            return DataTables::of($familles)
                ->addIndexColumn() // Adds index numbers
                ->addColumn('typeimmo', function($row) {

                    $detenteur=ModelConstruction::select(['id','libelleconstruction'])->where('id', $row->idtypeimmo)->first();

                    return $detenteur ? ucwords(strtolower($detenteur->libelleconstruction)) : 'N/A';
      


                 })

                ->addColumn('detenteur', function($row) {

                    $detenteur=ModelDetenteurs::select(['id','libelledetenteurs'])->where('id', $row->detenteur)->first();

                    return $detenteur ? ucwords(strtolower($detenteur->libelledetenteurs)) : 'N/A';
      


                 })
                   ->addColumn('commune', function($row) {

                    $detenteur=ModelCommune::select(['id','commune'])->where('id', $row->commune)->first();

                    return $detenteur ? ucwords($detenteur->commune) : 'N/A';
      


                 })
                ->addColumn('ville', function($row) {

                    $detenteur=ModelVille::select(['id','ville'])->where('id', $row->ville)->first();

                    return $detenteur ? ucwords($detenteur->ville) : 'N/A';
      


                 })
                 ->addColumn('etat', function($row) {

if ($row->etat == 0) {

$btn = '<i class="fas fa-circle f-10 m-r-10"  style="color:red;"></i><label style="color:red;">Inactif</label>';
                    }
                    else{
$btn = '<i class="fas fa-circle f-10 m-r-10" style="color:green;" ></i><label style="color:green;">Actif</label>';
                    }

                     return $btn;
      


                 })
                ->addColumn('action', function($row) {

        if ($row->etat == 0) {

                    $btn = ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger rollbackmaison" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Rollback"  >
                    <i class="feather icon-rotate-ccw"></i></a>';

                      $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletemaisondef" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';

}
else{

     $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editmaison" data-id="' . $row->id . '" title="Edit"  ><i class="feather icon-edit"></i></a>';


                        $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletemaison" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Delete"  ><i class="feather icon-trash-2"></i></a>';


}

                    return $btn;
                })
                ->rawColumns(['action','etat'])
                ->make(true);
        }

        /*
$familles = ModelMaison::select([
        'model_maison.id',
        'model_maison.denomination',
        'model_maison.detenteur',
        'model_maison.idtypeimmo',
        'model_maison.typeimmo',
        'model_maison.ville',
        'model_maison.commune',
        'model_maison.quartier',
        'model_maison.adresse',
        'model_maison.description',
        'model_maison.etat',
        'model_construction.libelleconstruction as typeimmo_name',
        'model_detenteurs.libelledetenteurs as detenteur_name',
        'model_commune.commune as commune_name',
        'model_ville.ville as ville_name'
    ])
    ->leftJoin('model_construction', 'model_maison.idtypeimmo', '=', 'model_construction.id')
    ->leftJoin('model_detenteurs', 'model_maison.detenteur', '=', 'model_detenteurs.id')
    ->leftJoin('model_commune', 'model_maison.commune', '=', 'model_commune.id')
    ->leftJoin('model_ville', 'model_maison.ville', '=', 'model_ville.id')
    ->get();

return DataTables::of($familles)
    ->addIndexColumn()
    ->editColumn('typeimmo', function($row) {
        return $row->typeimmo_name ? ucwords(strtolower($row->typeimmo_name)) : 'N/A';
    })
    ->editColumn('detenteur', function($row) {
        return $row->detenteur_name ? ucwords(strtolower($row->detenteur_name)) : 'N/A';
    })
    ->editColumn('commune', function($row) {
        return $row->commune_name ? ucwords($row->commune_name) : 'N/A';
    })
    ->editColumn('ville', function($row) {
        return $row->ville_name ? ucwords($row->ville_name) : 'N/A';
    })
    ->addColumn('action', function($row) {
        if ($row->etat == 0) {
            $btn = ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger rollbackmaison" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Rollback"><i class="feather icon-rotate-ccw"></i></a>';
            $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletemaisondef" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Delete"><i class="feather icon-trash-2"></i></a>';
        } else {
            $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editmaison" data-id="' . $row->id . '" title="Edit"><i class="feather icon-edit"></i></a>';
            $btn .= ' <a href="javascript:void(0)" class="btn btn-sm btn-light-danger deletemaison" data-id="' . $row->id . '" data-name="' . $row->denomination . '" title="Delete"><i class="feather icon-trash-2"></i></a>';
        }
        return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
        */

        //Log::info('Méthode index atteinte.');


       $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();
        $detenteurs=ModelDetenteurs::select(['id','libelledetenteurs','etat'])->where('etat', 1)->get();;

   
        return view('maison', compact('types','ville','commune','detenteurs'));
    }

    public function store(Request $request)
    {





   $validator = \Validator::make($request->all(), [
        'denomination' => 'required|string|max:255|unique:table_maison,denomination',
        'detenteur' => 'required|string|max:255',
        'typeimmobilier' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'commune' => 'required|string|max:255',
        'quartier' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'description' => 'required|string|max:255',

    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

//['denomination','detenteur','idtypeimmo','typeimmo','ville','commune','quartier','adresse','description','etat'];
$etat=1;
    // Enregistrement en BD
    ModelMaison::create([
        'denomination' => $request->denomination, // Enregistrer en majuscules
        'detenteur' => $request->detenteur,
        'idtypeimmob' => $request->typeimmobilier,
        'typeimmob' => $request->typeimmobilier,
        'ville' => $request->ville,
        'commune' => $request->commune,
        'quartier' => $request->quartier,
        'adresse' => $request->adresse,
        'description' => $request->description,
        'etat' => $etat,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Patrimoine créé avec succès !',
    ], 200);




    }

    public function update(Request $request, $id)
{




   /*$validator = \Validator::make($request->all(), [
       // 'denomination' => 'required|string|max:255|unique:table_maison,denomination',
         'detenteur' => 'required|string|max:255',
        'typeimmobilier' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'commune' => 'required|string|max:255',
        'quartier' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // Code 422 = Unprocessable Entity (erreur de validation)
    }

    $famille = ModelMaison::find($id);
    if ($famille) {
        //$famille->update($request->all());

$famille->update([
            'denomination' => $request->denomination,
            'detenteur' => $request->detenteur,
        'idtypeimmo' => $request->typeimmobilier,
        'typeimmo' => $request->typeimmobilier,
        'ville' => $request->ville,
        'commune' => $request->commune,
        'quartier' => $request->quartier,
        'adresse' => $request->adresse,
        'description' => $request->description,
        ]);


      //  return response()->json(['success' => 'Famille updated successfully']);

   return response()->json([
        'success' => true,
        'message' => 'Modification effectuée avec succès !',
    ], 200);


    } else {
        return response()->json(['error' => 'Echec Modification '], 404);
    }*/

try {
    $famille = ModelMaison::find($id);
    if (!$famille) {
        return response()->json(['error' => 'Maison introuvable'], 404);
    }

    $famille->update([
        'denomination' => $request->denomination,
        'detenteur' => $request->detenteur,
        'idtypeimmob' => $request->typeimmobilier,
        'typeimmob' => $request->typeimmobilier,
        'ville' => $request->ville,
        'commune' => $request->commune,
        'quartier' => $request->quartier,
        'adresse' => $request->adresse,
        'description' => $request->description,
    ]);

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
    $famille = ModelMaison::find($id);

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
    $famille = ModelMaison::find($id);

    // Check if the famille exists
    if ($famille) {
        

        // A Delete the famille
        //$famille->delete();

         $famille->etat = 0; // Mettre la valeur de 'etat' à 0
    $famille->save(); 

  // Return success message with HTTP 200 status
        return response()->json([
            'success' => 'Bien Immobilier Supprimé avec Succès!!'
        ], 200);

    } else {
        // Return an error message if the famille is not found
        return response()->json(['error' => 'Bien Immobilier Introuvable'], 404);
    }
}


    public function Afficherlesdonnees()
    {
        $treeData = ModelMaison::all();
      

    }

    

    public function getMaisonById($id)
    {
        // Find the famille by its ID
        $famille = ModelMaison::find($id);
        
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
