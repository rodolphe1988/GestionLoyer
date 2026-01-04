<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelCachet ;
use Yajra\DataTables\Facades\DataTables;

class CachetController extends Controller
{
    //

  public function index(Request $request)
    {
        if ($request->ajax()) {

            $cachets = ModelCachet::select(['id', 'chemin_cachet', 'etat'])->get();

            return DataTables::of($cachets)
                ->addIndexColumn()
                ->addColumn('cachet', function($row) {
                    // Aperçu de l’image du cachet
                    if ($row->chemin_cachet) {
                        return '<img src="'.asset($row->chemin_cachet).'" alt="Cachet" width="80" class="border rounded p-1">';
                    } else {
                        return '<span class="badge bg-secondary">Aucun</span>';
                    }
                })
                 ->addColumn('etat_badge', function ($row) {
                if ($row->etat == 1) {
                    return '<span class="badge bg-success">Actif</span>';
                } else {
                    return '<span class="badge bg-danger">Inactif</span>';
                }
            })
                ->addColumn('action', function($row) {
                    $btn = '';

                    if ($row->etat == 1) {
                        // Boutons pour modifier ou supprimer
                        $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-light-success me-1 editCachet" data-id="'.$row->id.'" title="Modifier">
                                    <i class="feather icon-edit"></i>
                                </a>';

                        $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-light-danger deleteCachet" data-id="'.$row->id.'" title="Supprimer">
                                    <i class="feather icon-trash-2"></i>
                                </a>';
                    } else {
                        // Si désactivé, rollback ou suppression définitive
                        $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-light-danger rollbackCachet me-1" data-id="'.$row->id.'" title="Restaurer">
                                    <i class="feather icon-rotate-ccw"></i>
                                </a>';
                        $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-light-danger deleteCachetDef" data-id="'.$row->id.'" title="Supprimer Définitivement">
                                    <i class="feather icon-trash-2"></i>
                                </a>';
                    }

                    return $btn;
                })
                ->rawColumns(['cachet', 'action', 'etat_badge'])
                ->make(true);
        }

       // Log::info('Méthode index atteinte (CachetController).');

        return view('autres'); // ta vue DataTables
    }

    public function store(Request $request){
    $request->validate([
        'chemin_cachet' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('chemin_cachet')){
        $path = $request->file('chemin_cachet')->store('cachets', 'public');
        $imagePath = 'storage/' . $path;
    }

    ModelCachet::create([
        'chemin_cachet' => $imagePath,
        'etat' => 1,
    ]);

    return response()->json(['success' => true, 'message' => 'Insertion effectuée avec succès !']);
}


    public function update(Request $request, $id){
    $request->validate([
        'chemin_cachet' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $cachet = ModelCachet::findOrFail($id);

    if ($request->hasFile('chemin_cachet')){
        if ($cachet->chemin_cachet && file_exists(public_path($cachet->chemin_cachet))){
            unlink(public_path($cachet->chemin_cachet));
        }
        $path = $request->file('chemin_cachet')->store('cachets', 'public');
        $cachet->chemin_cachet = 'storage/' . $path;
    }

    $cachet->save();
    return response()->json(['success' => true, 'message' => 'Mise à jour effectuée avec succès !']);
}

public function edit($id){
    $cachet = ModelCachet::findOrFail($id);
    return response()->json($cachet);
}

public function rollbackCachet($id)
{
    $cachet = ModelCachet::find($id);

    if (!$cachet) {
        return response()->json(['success' => false, 'message' => 'Cachet introuvable.']);
    }

    // Inverse l'état
    $cachet->etat = ($cachet->etat == 1) ? 0 : 1;
    $cachet->save();

    $status = ($cachet->etat == 1) ? 'réactivé' : 'désactivé';

    return response()->json([
        'success' => true,
        'message' => "Cachet {$status} avec succès."
    ]);
}

public function destroy($id){
    $cachet = ModelCachet::findOrFail($id);
    $cachet->etat = 0; // Marquer comme désactivé
    $cachet->save();
    return response()->json(['success' => true, 'message' => 'Cachet désactivé avec succès !']);
}

}
