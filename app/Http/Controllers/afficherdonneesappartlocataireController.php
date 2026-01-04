<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelAppartement;
use App\Models\ModelLocataire;

class afficherdonneesappartlocataireController extends Controller
{


    public function getOptions($id,$id2) {

        $appart= ModelAppartement::select(['idmaison','numappartement','etatappartement','montantloyer'])->whereNull('datefin')->where('idmaison', $id)->where('numappartement', $id2)->first();
        $locataire= ModelLocataire::select(['iddenomination','numappartement','nom','prenom'])->where('iddenomination', $id)->where('numappartement', $id2)->first();

if($appart && $locataire){
        $nom=$locataire->nom;
        $montantloyer=$appart->montantloyer;

        return response()->json([
        'locataire' =>$locataire->nom.' '.$locataire->prenom,
        'appart' => $montantloyer,
    ], 200);
    }
    else{

           return response()->json([
        'locataire' =>"",
        'appart' => "",
    ], 200);

    }
    }
    //
}
