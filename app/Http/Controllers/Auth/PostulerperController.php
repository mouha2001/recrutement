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
use App\Models\post;
use App\Models\Postuleruser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\User;

class PostulerperController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $hasAlreadyApplied = Postuleruser::where('user_id', $user->id)->exists();

        if ($hasAlreadyApplied) {
            return redirect()->route('postulerper')->with('error', 'Vous avez déjà postulé.');
        }

        return view('postulerper1');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $hasAlreadyApplied = Postuleruser::where('user_id', $user->id)->exists();

        if ($hasAlreadyApplied) {
            return redirect()->route('postulerper')->with('error', 'Vous avez déjà postulé.');
        }

        $request->validate([
            'nombreanneeuadb' => 'nullable|integer',
            'attestationuadb' => 'nullable|file|mimes:pdf|max:2048',
            'nombreanneepedagogiques' => 'nullable|integer',
            'attestationpedagogique' => 'nullable|file|mimes:pdf|max:2048',
            'nombreanneeprofessionnel' => 'nullable|integer',
            'attestationprofessionnel' => 'nullable|file|mimes:pdf|max:2048',
            'typegrade' => 'nullable|string|in:professeurtitulaire,Maitredeconference,MaitreAssistant,Assistant,Debutant',
            'attestationgrade' => 'nullable|file|mimes:pdf|max:2048',
            'degreadequation' => 'nullable|string|in:enseignement,recherche,lesdeux',
            'actederecherche' => 'nullable|file|mimes:pdf|max:2048',
            'typepublication' => 'nullable|string|in:abstract,comitedelecture,conferenceinternational,conferencenational',
            'nombrearticleabstract' => 'nullable|integer',
            'actedepublication' => 'nullable|file|mimes:pdf|max:2048',
            'nomdiplome' => 'required|string|in:Doctoratdetat,Doctoratunique,phd,doctoratcycle3,masterII',
            'fichediplome' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Save all the data...
        $enseignementuadb = new enseignementuadb();
        $enseignementuadb->nombreanneeuadb = $request->nombreanneeuadb;
        $enseignementuadb->iduser = $user->id;
        if ($request->hasFile('attestationuadb')) {
            $fichierPath = $request->file('attestationuadb')->store('pdfs', 'public');
            $enseignementuadb->attestationuadb = $fichierPath;
        }
        $enseignementuadb->save();

        $experiencepedagogique = new experiencepedagogique();
        $experiencepedagogique->nombreanneepedagogiques = $request->nombreanneepedagogiques;
        $experiencepedagogique->iduser = $user->id;
        if ($request->hasFile('attestationpedagogique')) {
            $fichierPath = $request->file('attestationpedagogique')->store('pdfs', 'public');
            $experiencepedagogique->attestationpedagogique = $fichierPath;
        }
        $experiencepedagogique->save();

        $experienceprofessionel = new experienceprofessionel();
        $experienceprofessionel->nombreanneeprofessionnel = $request->nombreanneeprofessionnel;
        $experienceprofessionel->iduser = $user->id;
        if ($request->hasFile('attestationprofessionnel')) {
            $fichierPath = $request->file('attestationprofessionnel')->store('pdfs', 'public');
            $experienceprofessionel->attestationprofessionnel = $fichierPath;
        }
        $experienceprofessionel->save();

        $grade = new grade();
        $grade->typegrade = $request->typegrade;
        $grade->iduser = $user->id;
        if ($request->hasFile('attestationgrade')) {
            $fichierPath = $request->file('attestationgrade')->store('pdfs', 'public');
            $grade->attestationgrade = $fichierPath;
        }
        $grade->save();

        $adequation = new adequation();
        $adequation->degreadequation = $request->degreadequation;
        $adequation->iduser = $user->id;
        if ($request->hasFile('actederecherche')) {
            $fichierPath = $request->file('actederecherche')->store('pdfs', 'public');
            $adequation->actederecherche = $fichierPath;
        }
        $adequation->save();

        $publication = new publication();
        $publication->typepublication = $request->typepublication;
        $publication->nombrearticleabstract = $request->nombrearticleabstract;
        $publication->iduser = $user->id;
        if ($request->hasFile('actedepublication')) {
            $fichierPath = $request->file('actedepublication')->store('pdfs', 'public');
            $publication->actedepublication = $fichierPath;
        }
        $publication->save();

        $diplome = new diplome();
        $diplome->nomdiplome = $request->nomdiplome;
        $diplome->iduser = $user->id;
        if ($request->hasFile('fichediplome')) {
            $fichierPath = $request->file('fichediplome')->store('pdfs', 'public');
            $diplome->fichediplome = $fichierPath;
        }
        $diplome->save();

        $postuleruser = new Postuleruser();
        $postuleruser->user_id = $user->id;
        $postuleruser->postuler_id = $request->postuler_id;
        $postuleruser->enseignement_id = $enseignementuadb->id;
        $postuleruser->experiencepedagogique_id = $experiencepedagogique->id;
        $postuleruser->experienceprofessionnel_id = $experienceprofessionel->id;
        $postuleruser->grade_id = $grade->id;
        $postuleruser->adequation_id = $adequation->id;
        $postuleruser->diplome_id = $diplome->id;
        $postuleruser->save();

        return redirect()->route('postulerper')->with('success', 'Enregistrement validé!');
    }
}
