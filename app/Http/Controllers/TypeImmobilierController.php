<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelDetenteurs;

class TypeImmobilierController extends Controller
{

    public function index() {
        $types = ModelConstruction::all();
        $ville = ModelVille::all();
        $commune=ModelCommune::all();
        $detenteurs=ModelDetenteurs::select(['id','libelledetenteurs','etat'])->where('etat', 1)->get();;
        return view('maison', compact('types','ville','commune','detenteurs'));
    }


  

    //
}
