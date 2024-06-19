<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activer($id)
    {


        // // Récupérer l'utilisateur à activer
        $user = User::find($id);
        // $user->active=true;
        // $user->save();

        // // Mettre à jour le statut de l'utilisateur pour l'activer
        $user->update(['active' => true]); // Mettez à jour le champ 'active' dans la base de données

        // Rediriger vers la page précédente ou une autre page
        return redirect()->back()->with('success', 'L\'utilisateur a été activé avec succès.');
    }

    public function desactiver($id)
    {
        // Récupérer l'utilisateur à désactiver
        $user = User::find($id);
        // $user->active=true;
        // $user->save();

        // Mettre à jour le statut de l'utilisateur pour le désactiver
        $user->update(['active' => false]); // Mettez à jour le champ 'active' dans la base de données

        // Rediriger vers la page précédente ou une autre page
        return redirect()->back()->with('success', 'L\'utilisateur a été désactivé avec succès.');
    }
}
