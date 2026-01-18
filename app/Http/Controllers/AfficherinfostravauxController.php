<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelMaison;
use App\Models\ModelLocataire;
use App\Models\ModelTypeappartement;
use App\Models\ModelAppartement;

class AfficherinfostravauxController extends Controller
{

    public function getOptions($id) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        $options =ModelAppartement::where('idmaison', $id)->get();
        //return view('maison', compact('types','ville','commune','detenteurs'));
        $optionslocataire =ModelLocataire::where('iddenomination', $id)->get();

      //  return response()->json($options);

      return response()->json([
        'appartements' => $options,
        'locataires'   => $optionslocataire,
    ]);
    }


     public function getOptionslocatnumappart($id) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
      /*  $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        $options =ModelAppartement::where('idmaison', $id)->get();*/
        //return view('maison', compact('types','ville','commune','detenteurs'));
        $optionslocataire =ModelLocataire::where('id', $id)->get();

      //  return response()->json($options);

      return response()->json([
        'appartements' => $options,
    ]);
    }


  

    //
}
