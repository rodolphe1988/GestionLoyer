<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTypelocation;
use App\Models\ModelVille;
use App\Models\ModelCommune;
use App\Models\ModelDetenteurs;
use App\Models\ModelMaison;
use App\Models\ModelTypeappartement;
use App\Models\ModelModepaiement;

class AfficherdonneesdspaieloyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $detenteur= ModelDetenteurs::all();
        $typelocation= ModelTypelocation::all();
        $typeappart= ModelTypeappartement::all();
        $modepaiement=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->get();
        $denominationmaison=ModelMaison::select(['id','denomination','etat'])->where('etat', 1)->get();;

      
        //return view('maison', compact('types','ville','commune','detenteurs'));

        return view('paiementoyermensuel', compact('detenteur','denominationmaison','typeappart','typelocation','modepaiement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
