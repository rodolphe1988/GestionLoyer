<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelMaison;
use App\Models\ModelTypeappartement;
use App\Models\ModelAppartement;
use App\Models\ModelLocataire;

class AfficherlocataireController extends Controller
{

    public function getOptions($id,$id2) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        $appart= ModelAppartement::select(['idmaison','numappartement','etatappartement'])->where('idmaison', $id)->where('numappartement', $id2)->first();

         $etat='Libre';
        if($appart->etatappartement==1){
 $etat='occupe';
        }
        $locataire=ModelLocataire::select(['iddenomination','numappartement','nom','prenom'])->where('iddenomination', $id)->where('numappartement', $id2)->first();
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();

        //$options =ModelAppartement::where('idmaison', $id)->get();
        //return view('maison', compact('types','ville','commune','detenteurs'));

        //return response()->json($locataire);
        
        return response()->json([
        'etat' =>$etat,
        'message' => $locataire,
    ], 200);
    }


  

    //
}
