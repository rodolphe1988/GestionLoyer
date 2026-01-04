<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelLocataire;
use App\Models\ModelAppartement;
use App\Models\Modelpaiementloyer;

class AffichernumappartementController extends Controller
{
    //

     public function getOptions($idenomin,$id) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
      
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        /*$options =ModelLocataire::where('id', $id)->where('iddenomination', $idenomin)->whereNull('datesortie')->get();
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return response()->json($options);*/

           $appartements = ModelLocataire::where('iddenomination', $idenomin)
        ->where('id', $id)
        ->get()
        ->map(function($a) {
            $montantTotal = Modelpaiementloyer::where('idlocataire', $a->id)->sum('montantmensuelverse');
            return [
                'numappartement' => $a->numappartement,
                'montant_total' => $montantTotal
            ];
        });

         return response()->json($appartements);
    }


}
