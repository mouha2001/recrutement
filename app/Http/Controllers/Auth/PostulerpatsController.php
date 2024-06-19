<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\adequation;
use App\Models\Postuler;
use App\Models\appelcandidature;
use App\Models\diplome;
use App\Models\enseignementuadb;
use App\Models\experiencepedagogique;
use App\Models\experienceprofessionel;
use App\Models\grade;
use App\Models\publication;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PostulerpatsController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('postulerpats1');
    }
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            //    experience pedagogique
            'maitriseoutilanalyse' =>'nullable|string|in:non,assezproche,tresproche',
            'maitrisedeslogiciels' =>'nullable|string|in:non,assezproche,tresproche',
            'qualitedepresentation' =>'nullable|string|in:non,assezproche,tresproche',
            'attestationpedagogique'=>'nullable|file|mimes:pdf|max:2048',
            // experience professionnel
            'pertinanceformation' =>'nullable|string|in:non,assezproche,tresproche',
            'pertinanceexperience' =>'nullable|string|in:non,assezproche,tresproche',
            'maitriselangue' =>'nullable|string|in:non,assezproche,tresproche',
            'maitriseas'=>'nullable|string|in:non,assezproche,tresproche',
            'attestationprofessionnel'=>'nullable|file|mimes:pdf|max:2048',

        ]);
        $user= Auth::user();
         //    experience pedagogique
        $experiencepedagogique = new experiencepedagogique();
        $experiencepedagogique->maitriseoutilanalyse= $request->maitriseoutilanalyse;
        $experiencepedagogique->maitrisedeslogiciels= $request->maitrisedeslogiciels;
        $experiencepedagogique->qualitedepresentation= $request->qualitedepresentation;
        $experiencepedagogique->iduser=$user->id;

    if ($request->hasFile('attestationpedagogique')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationpedagogique')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $experiencepedagogique->attestationpedagogique = $fichierPath;
    }


    $experiencepedagogique->save();

     // experience professionnel
     $experienceprofessionel = new experienceprofessionel();
     $experienceprofessionel->pertinanceformation= $request->pertinanceformation;
     $experienceprofessionel->pertinanceexperience= $request->pertinanceexperience;
     $experienceprofessionel->maitriselangue= $request->maitriselangue;
     $experienceprofessionel->maitriseas= $request->maitriseas;
     $experienceprofessionel->iduser=$user->id;
 if ($request->hasFile('attestationprofessionnel')) {
     // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
     $fichierPath = $request->file('attestationprofessionnel')->store('pdfs', 'public');
     // Enregistrer le chemin du fichier dans la base de données
     $experienceprofessionel->attestationprofessionnel = $fichierPath;
 }
 //dd($experienceprofessionel);
    $experienceprofessionel->save();


    return redirect()->route('postulerpats')->with('success', 'Enregistrement validé!');


    }
}
