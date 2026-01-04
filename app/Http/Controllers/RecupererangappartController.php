<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelAppartement;

class RecupererangappartController extends Controller
{

  public function getRang($id)
    {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        //$rangappartement=ModelAppartement::find($id);
        //return view('maison', compact('types','ville','commune','detenteurs'));

         /*$rangappartement = ModelAppartement::where('idmaison', $id)
            ->select(['id', 'numappartement', 'etatappartement'])
            ->get();

             // Check if any apartments were found
        if ($rangappartement->isEmpty()) {
            return response()->json(['message' => 'No apartments found for this maison'], 404);
        }

        // Retourner la réponse JSON
        return response()->json($rangappartement);*/

      // Get the count of apartments for the given maison id
    $nombreAppartements = ModelAppartement::where('idmaison', $id)->count();

    // If count is 0, return 0
    if ($nombreAppartements == 0) {
        return response()->json(1);
    }

    // Otherwise, get the last apartment and increment the numappartement
    $lastApartment = ModelAppartement::where('idmaison', $id)
        ->orderBy('id', 'desc')
        ->first(); // Get the last apartment

    // Increment numappartement by 1
    $nextNumAppartement = $lastApartment->numappartement + 1;

    // Return the next numappartement
    return response()->json($nextNumAppartement);

        
    }


  

    //
}
