<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserInfo; // Assurez-vous d'importer le modèle
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Créer une nouvelle entrée dans la base de données
        UserInfo::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        // Rediriger vers la vue info.blade.php avec un message de succès
        return redirect()->route('info')->with('success', 'Formulaire soumis avec succès.');
    }

    public function info()
    {
        $userInfos = UserInfo::where('user_id', Auth::id())->get();
        return view('info', compact('userInfos'));
    }
}
