<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelLocataire;
use App\Models\ModelMaison;
class AffichernomlocatController extends Controller
{
    //

     public function getOptions($id) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
      
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        $options =ModelLocataire::where('iddenomination', $id)->whereNull('datesortie')->get();
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return response()->json($options);
    }


    public function getOptionsdenominpardetenteur($id) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
      
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        $options =ModelMaison::where('detenteur', $id)->get();
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return response()->json($options);
    }
}
