<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableDBmodel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class Tableusercontroller extends Controller
{


    public function index(){

        $users=TableDBmodel::all();
    }

   public function insertData(){


    try {
        /*$users = TableDBmodel::create([
            'username' => 'konan.rodolphe.ci@gmail.com',
            'password' => Hash::make('azerty'),
        ]);*/

           $users = TableDBmodel::create([
            'nom' => 'Megnan',
            'prenom' => 'Ebenezer',
            'username' => 'ebenezermegnan@gmail.com',
            'password' => Hash::make('azerty2025'),
        ]);
    }
    catch(QueryException $e){
        if ($e->errorInfo[1] == 1062) {
            // 1062 indicates a duplicate entry
            return back()->withErrors(['error' => 'Username or email already exists.'])->withInput();
        }
    }
    }

    public function login(Request $request)
    {

            try {
        // Valider les données du formulaire
        $request->validate([
            'loginUsername' => 'required',
            'loginPassword' => 'required',
        ]);

        // Rechercher l'utilisateur par son nom d'utilisateur
        $user = TableDBmodel::where('username', $request->loginUsername)->first();

        if ($user && Hash::check($request->loginPassword, $user->password)) {

              // Set session data
             Session::put('user_id', $user->id);
            // Si l'authentification est réussie, rediriger vers le tableau de bord
            Auth::login($user);
            return redirect()->route('index'); // Changez 'dashboard' par la route de votre tableau de bord
        } else {
            // Si l'authentification échoue, retournez avec une erreur
            return back()->withErrors(['login' => 'Parametres de Connexion Invalides']);
        }

         }
    catch(QueryException $e){
        if ($e->errorInfo[1] == 1062) {
            // 1062 indicates a duplicate entry
            return back()->withErrors(['error' => 'Username or email already exists.'])->withInput();
        }
        else{

            // 1062 indicates a duplicate entry
            return back()->withErrors(['login' => 'Verifier votre Correction avec serveur'])->withInput();
        
        }
    }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Clear all session data
        session()->flush(); // Removes all session data

        // Invalidate the session to prevent session fixation
        $request->session()->invalidate();

        // Regenerate the CSRF token for security
        $request->session()->regenerateToken();

        // Redirect to login page or wherever appropriate
        return redirect()->route('authentification'); // Ensure this route exists
    }

    public function show(){

        $user = TableDBmodel::all();
    }
    

    //
}
