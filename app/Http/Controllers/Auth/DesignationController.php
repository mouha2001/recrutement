<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DesignationController extends Controller
{
    // creation du dapartement
    public function create()
    {
        return view('departements.designation')->with('success', 'Presidnt commission ajouter avec succès');
    }
    public function store(Request $request): RedirectResponse
    {

       // dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        $commission->ddn = $request->ddn;
        $commission->paysDeNaissance = $request->paysDeNaissance;
        $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();


         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designation');
    }

    public function list()
    {
        // Récupérer les utilisateurs dont le profil est "presidentcomission"
        $users = User::where('profil', 'presidentcomission')->get();

        // Retourner la vue avec les utilisateurs filtrés
        return view('direction.membre', compact('users'));
    }




//     public function edit()
//     {
//         $id=request('id');
//         $user = User::findOrFail($id);
//         return view('modifier', compact('user'));
//     }
//     public function update(Request $request)
//     {

//         $user = User::findOrFail($request->id);

//         // Mettre à jour les données du compte
//         $user->prenom = $request->prenom;
//         // Ajoutez les autres champs à mettre à jour ici...

//         $user->update();

//         // Rediriger avec un message de succès ou vers une autre page
//         return redirect()->route('liste_comptes')->with('success', 'Compte mis à jour avec succès');
//     }

//     public function destroy()
// {
//     // Trouver l'utilisateur à supprimer
//     $id=request('id');
//     $user = user::findOrFail($id);

//     // Supprimer l'utilisateur
//     $user->delete();

//     // Rediriger avec un message de confirmation
//     return redirect()->route('liste_comptes')->with('success', 'Utilisateur supprimé avec succès');
// }




}
