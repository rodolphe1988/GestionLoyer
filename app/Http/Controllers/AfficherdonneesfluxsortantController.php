<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelModepaiement;
use App\Models\ModelDetenteurs;

class AfficherdonneesfluxsortantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $modepaiement=ModelModepaiement::select(['id','libellemodepaiement','etat'])->where('etat', 1)->get();
        $detenteurs=ModelDetenteurs::all();

        //return view('maison', compact('types','ville','commune','detenteurs'));

        //return view('paiementoyermensuel', compact('denominationmaison','typeappart','typelocation'));
                return view('fluxsortant',compact('modepaiement','detenteurs'));

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
