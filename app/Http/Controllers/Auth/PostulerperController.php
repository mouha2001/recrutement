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
    // ajout du profil
    public function create()
    {
        return view('postulerper1');
    }

    public function store(Request $request): RedirectResponse
{

    $request->validate([
        // enseignement uadb
        'nombreanneeuadb' => 'nullable|integer',
        'attestationuadb'=>'nullable|file|mimes:pdf|max:2048',
        // enseignement pedagogique
        'nombreanneepedagogiques' => 'nullable|integer',
        'attestationpedagogique'=>'nullable|file|mimes:pdf|max:2048',
        // enseignement professionnel
        'nombreanneeprofessionnel' => 'nullable|integer',
        'attestationprofessionnel'=>'nullable|file|mimes:pdf|max:2048',
         // grade
         'typegrade' =>'nullable|string|in:professeurtitulaire,Maitredeconference,MaitreAssistant,Assistant,Debutant',
         'attestationgrade'=>'nullable|file|mimes:pdf|max:2048',
          // adequation
         'degreadequation' => 'nullable|string|in:enseignement,enseignement','lesdeux',
         'actederecherche' => 'nullable|file|mimes:pdf|max:2048',
         // publication
        'typepublication'=>'nullable|string|in:abstract,comitedelecture,conferenceinternational,conferencenational',
        'nombrearticleabstract'=>'nullable|integer',
        'actedepublication'=>'nullable|file|mimes:pdf|max:2048',
        // diplome
         'nomdiplome' => 'required|string|in:Doctoratdetat,Doctoratunique,phd,doctoratcycle3,masterII',
         'fichediplome'=>'required|file|mimes:pdf|max:2048',



    ]);
    //  dd($request);
   $user= Auth::user();




//    $post = new Post();
//    $post->intituler = $postuler->intituler;
//    $post->iduser = $user->id;
//    $post->save();
 // enseignement uadb
    $enseignementuadb=new enseignementuadb();
    $enseignementuadb->nombreanneeuadb =$request->nombreanneeuadb;
    $enseignementuadb->iduser=$user->id;

    if ($request->hasFile('attestationuadb')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationuadb')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $enseignementuadb->attestationuadb = $fichierPath;
    }
//sauvegarde
    $enseignementuadb->save();

    // enseignement pedagogique
    $experiencepedagogique = new experiencepedagogique();
    $experiencepedagogique->nombreanneepedagogiques= $request->nombreanneepedagogiques;
    $experiencepedagogique->iduser=$user->id;

    if ($request->hasFile('attestationpedagogique')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationpedagogique')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $enseignementuadb->attestationpedagogique = $fichierPath;
    }

    $experiencepedagogique->save();

     // experiences professionnel
     $experienceprofessionel=new experienceprofessionel();
     $experienceprofessionel->nombreanneeprofessionnel= $request->nombreanneeprofessionnel;
     $experienceprofessionel->iduser=$user->id;
     if ($request->hasFile('attestationprofessionnel')) {
         // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('attestationprofessionnel')->store('pdfs', 'public');
         // Enregistrer le chemin du fichier dans la base de données
         $experienceprofessionel->attestationprofessionnel = $fichierPath;
     }

           $experienceprofessionel->save();
           // grade
     $grade=new grade();
     $grade->typegrade= $request->typegrade;
     $grade->iduser=$user->id;

     if ($request->hasFile('attestationgrade')) {
         // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('attestationgrade')->store('pdfs', 'public');
         // Enregistrer le chemin du fichier dans la base de données
         $grade->attestationgrade = $fichierPath;
     }

     $grade->save();

         // adequation
     $adequation=new adequation();
     $adequation->degreadequation= $request->degreadequation;
     $adequation->iduser=$user->id;


      if ($request->hasFile('actederecherche')) {
          // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
          $fichierPath = $request->file('actederecherche')->store('pdfs', 'public');
          // Enregistrer le chemin du fichier dans la base de données
          $adequation->actederecherche = $fichierPath;
      }

      $adequation->save();


         // publication
     $publication=new publication();
     $publication->typepublication= $request->typepublication;
     $publication->nombrearticleabstract= $request->nombrearticleabstract;
     $publication->iduser=$user->id;


      if ($request->hasFile('actedepublication')) {
          // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
          $fichierPath = $request->file('actedepublication')->store('pdfs', 'public');
          // Enregistrer le chemin du fichier dans la base de données
          $publication->actedepublication = $fichierPath;
      }

      $publication->save();


    // //  diplome
     $diplome=new diplome();
     $diplome->nomdiplome= $request->nomdiplome;
     $diplome->iduser=$user->id;

     if ($request->hasFile('fichediplome')) {
    //     // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('fichediplome')->store('pdfs', 'public');
    //     // Enregistrer le chemin du fichier dans la base de données
         $diplome->fichediplome = $fichierPath;
     }
    //sauvegare
    $diplome->save();


    $enseignementuadb = enseignementuadb::latest()->first();
    $experiencepedagogique = experiencepedagogique::latest()->first();
    $experienceprofessionel = experienceprofessionel::latest()->first();
    $grade = grade::latest()->first();
    $adequation = adequation::latest()->first();
    $diplome = diplome::latest()->first();
    // Récupérer l'id du postuler après l'avoir sauvegardé
   $postuleruser = new Postuleruser();
   $postuleruser->user_id=$user->id;
   $postuleruser->postuler_id=$request->postuler_id;
   $postuleruser->enseignement_id=$enseignementuadb->id;
   $postuleruser->experiencepedagogique_id=$experiencepedagogique->id;
   $postuleruser->experienceprofessionnel_id=$experienceprofessionel->id;
   $postuleruser->grade_id=$grade->id;
   $postuleruser->adequation_id=$adequation->id;
   $postuleruser->diplome_id=$diplome->id;
   $postuleruser->save();
    // $postuler=new Postuler();
    // $postuler->iduser=$user->id;
    // $postuler->save();


    // Rediriger le candidat sur son page
    return redirect()->route('postulerper')->with('success', 'Enregistrement validé!');
}



    // public function list()
    // {
    //     $avis = Avis::where('postes', 'per')->get();
    //      return view('postper', compact('avis'));
    // }
    // public function list1()
    // {
    //     $avis = Avis::where('postes', 'pats')->get();
    //      return view('postpats', compact('avis'));
    // }

    // public function list2()
    // {
    //     $avis = Avis::all();
    //      return view('candidat', compact('avis'));
    // }
    // public function list3()
    // {
    //     $avis = Avis::where('postes', 'per')->get();
    //      return view('postulerper', compact('avis'));
    // }





}
