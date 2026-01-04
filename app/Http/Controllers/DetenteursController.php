<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

#use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Log;

class DetenteursController extends Controller
{

    public function index(Request $request)
    {
        Log::info('Méthode index atteinte.');

 if ($request->ajax()) {


        Log::info('Requête AJAX détectée.');
        
        $familles = ModelDetenteurs::select(['id', 'libelledetenteurs'])->get();
        
        Log::info('Données récupérées :', ['data' => $familles->toArray()]);
        
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => count($familles),
            'recordsFiltered' => count($familles),
            'data' => $familles
        ]);
    
}
else{
    return response()->json(['message' => 'La route fonctionne !']);
}

return view('detenteurs');

}
    //
}
