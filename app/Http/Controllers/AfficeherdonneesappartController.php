<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelMaison;
use App\Models\ModelTypeappartement;

class AfficeherdonneesappartController extends Controller
{

    public function index() {
       /* $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();*/
        $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        $denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();;
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return view('appartement', compact('denominationmaison','typeappart','typelocation'));
    }


  

    //
}
