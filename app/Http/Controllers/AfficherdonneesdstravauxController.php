<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelMaison;
use App\Models\ModelDetenteurs;
use App\Models\ModelTypeappartement;

class AfficherdonneesdstravauxController extends Controller
{

    public function index() {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        $detenteur= ModelDetenteurs::all();
        $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        $denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();;
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return view('travaux', compact('denominationmaison','typeappart','typelocation','detenteur'));
    }


  

    //
}
