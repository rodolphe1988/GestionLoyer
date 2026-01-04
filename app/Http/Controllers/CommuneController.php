<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelConstruction;

use App\Models\ModelTypelocation;

class CommuneController extends Controller
{

    public function index() {
        $typescommune = ModelTypelocation::all();
        return view('maison', compact('typescommune'));
    }



    //
}
