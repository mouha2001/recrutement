<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activer($id)
    {
        $user = User::findOrFail($id);
        $user->etat = 'actif';
        $user->save();

        return redirect()->back()->with('success', 'Compte activé avec succès.');
    }

    public function desactiver($id)
    {
        $user = User::findOrFail($id);
        $user->etat = 'inactif';
        $user->save();

        return redirect()->back()->with('success', 'Compte désactivé avec succès.');
    }

    // Méthode de recherche
    public function rechercher(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('prenom', 'like', "%$query%")
            ->orWhere('nom', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->paginate(10); // Utilisez la pagination ici

        return view('liste_comptes', compact('users'));
    }
}
