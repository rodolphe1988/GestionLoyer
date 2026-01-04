<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelDetenteurs;
use App\Models\ModelMaison;
use App\Models\ModelTypeappartement;
use App\Models\ModelAppartement;
use App\Models\ModelCommune;

class DetailsAppartController extends Controller
{

    public function getdetails($id,$numappart) {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        $typelocation= ModelTypelocation::all();
      
        //$denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();
  
        $optionsappart =ModelAppartement::where('idmaison', $id)->where('numappartement', $numappart)->first();
        $optionsmaison =ModelMaison::where('id', $id)->first();
        $typeappartement=$optionsappart->typeappartement;
        $iddetenteur=$optionsmaison->detenteur;
        $idtypeimmo=$optionsmaison->idtypeimmo;
        $ville=$optionsmaison->ville;
        $idcommune=$optionsmaison->commune;
        $quartier=$optionsmaison->quartier;

        $montantcaution=$optionsappart->montanttotalcaution;

        $optionsdetenteurs=ModelDetenteurs::where('id', $iddetenteur)->first();
        $libdetenteurs=$optionsdetenteurs->libelledetenteurs;
        $typeappart= ModelTypeappartement::where('id', $typeappartement)->first();

        if($typeappart){
        $typeappartlabel=$typeappart->libelletypeappartement;
    }
    else{
        $typeappartlabel="NA";
    }

        $tablecomune=ModelCommune::where('id', $idcommune)->first();
        $commune=$tablecomune->commune;

    return response()->json([
        'success' => true,
        'maison' => strtoupper($optionsmaison->denomination),
        'detenteur' =>strtoupper($libdetenteurs),
        'numappart' =>$numappart,
        'montantcaution'=>$montantcaution,
        'typeappart' =>strtoupper($typeappartlabel),
        'commune'=>strtoupper($commune.' / '.$quartier),
        'data' => $optionsappart,
    ], 200);
    
    }


  

    //
}
