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

class DepartementController extends Controller
{
    // creation du dapartement
    public function create()
    {
        return view('ajoutdepartement');
    }

    public function store(Request $request): RedirectResponse
    {
        $candidat = new User();
        $candidat->prenom = $request->prenom;
        $candidat->nom = $request->nom;
        $candidat->phone = $request->phone;
        $candidat->adresse = $request->adresse;
        $candidat->email = $request->email;
        $candidat->ddn = $request->ddn;
        $candidat->paysDeNaissance = $request->paysDeNaissance;
        $candidat->lieuDeNaissance = $request->lieuDeNaissance;
        $candidat->profil = $request->profil;
        $candidat->departement = $request->departement;
        $candidat->ufr = $request->ufr;
        $candidat->password = Hash::make($request->password);
        $candidat->save();

        Auth::login($candidat);
        return redirect()->route('liste_comptes');
    }

    public function list()
    {
        $users = User::where('profil', '!=', 'candidat')->paginate(10); // Pagination
        return view('liste_comptes', compact('users'));
    }

    public function edit()
    {
        $id = request('id');
        $user = User::findOrFail($id);
        return view('modifier', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->phone = $request->phone;
        $user->adresse = $request->adresse;
        $user->email = $request->email;
        $user->ddn = $request->ddn;
        $user->paysDeNaissance = $request->paysDeNaissance;
        $user->lieuDeNaissance = $request->lieuDeNaissance;
        $user->profil = $request->profil;
        $user->departement = $request->departement;
        $user->ufr = $request->ufr;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('liste_comptes')->with('success', 'Compte mis à jour avec succès');
    }

    public function destroy()
    {
        $id = request('id');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('liste_comptes')->with('success', 'Utilisateur supprimé avec succès');
    }


}
