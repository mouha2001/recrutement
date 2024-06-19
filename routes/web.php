<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VicerecteurController;
use App\Http\Controllers\Auth\DepartementController;
use App\Http\Controllers\Auth\ProfilrechercherController;
use App\Http\Controllers\Auth\AppelcandidatController;
use App\Http\Controllers\Auth\RectoratController;
use App\Http\Controllers\Auth\DesignationController;
use App\Http\Controllers\Auth\PostesperController;
use App\Http\Controllers\Auth\PostulerController;
use App\Http\Controllers\Auth\PostulerperController;
use App\Http\Controllers\Auth\PostulerpatsController;
use App\Http\Controllers\Auth\PublicationController;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\CandidtureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Mail\NewCandidat;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    //$user= User::first();
    //Mail::send(new NewCandidat($user,'mot de passe'));
// dd($user);
    return view('welcome');
})->name('welcome');

Route::get('/presentation', function () {
    return view('presentation');
})->name('presentation');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/bord', function () {
    return view('drh.bord');
})->name('bord');
Route::get('/borddepartement', function () {
    return view('departements.borddepartement');
})->name('borddepartement');
Route::get('/bordrectorat', function () {
    return view('rectorats.bordrectorat');
})->name('bordrectorat');


Route::get('/postper', function () {
    return view('postper');
})->middleware([])->name('postper');
//voir poste personnel
Route::get('/postper', function () {
    return view('postper');
})->middleware([])->name('postper');
//administrateur
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//page departement physique

Route::get('/departementphysique', function () {
    return view('departements.departementphysique');
})->middleware(['auth', 'verified'])->name('departementphysique');

//page departement chimie

Route::get('/departementchimie', function () {
    return view('departements.departementchimie');
})->middleware(['auth', 'verified'])->name('departementchimie');

//page departement mathematique

Route::get('/departementmathematique', function () {
    return view('departements.departementmathematique');
})->middleware(['auth', 'verified'])->name('departementmathematique');


//page departement TIC

Route::get('/departementtic', function () {
    return view('departements.departementtic');
})->middleware(['auth', 'verified'])->name('departementtic');

//page departement IJ

Route::get('/departementij', function () {
    return view('departements.departementij');
})->middleware(['auth', 'verified'])->name('departementij');

//page departement MANAGEMENT

Route::get('/departementMANAGEMENT', function () {
    return view('departements.departementMANAGEMENT');
})->middleware(['auth', 'verified'])->name('departementMANAGEMENT');

//page departement SANTE

Route::get('/departementSANTE', function () {
    return view('departements.departementSANTE');
})->middleware(['auth', 'verified'])->name('departementSANTE');

//page departement DD

Route::get('/departementDD', function () {
    return view('departements.departementDD');
})->middleware(['auth', 'verified'])->name('departementDD');


// Route::get('/bord', function () {
//     return view('drh.bord');
// })->middleware([''])->name('bord');




// voir la description envoyer ar les departements
Route::get('/drh', function () {
    return view('drh.drh');
})->middleware([])->name('drh');




//candidat
Route::middleware('guest')->group(function () {
Route::get('/candidat', function () {
    return view('candidat');
})->middleware(['auth', 'verified'])->name('candidat');
});
//recteur
Route::get('/rectorat', function () {
    return view('rectorats.rectorat');
})->middleware(['auth', 'verified'])->name('rectorat');

//vice recteur
Route::get('/vicerecteur', function () {
    return view('vicerecteur');
})->middleware(['auth', 'verified'])->name('vicerecteur');

//drh
// Route::get('/drh', function () {
//     return view('drh');
// })->middleware(['auth', 'verified'])->name('drh');

//president commission
Route::get('/prcomission', function () {
    return view('prcomission');
})->middleware([])->name('prcomission');

//direction ufr
Route::get('/directionufr', function () {
    return view('direction.directionufr');
})->middleware(['auth', 'verified'])->name('directionufr');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('connexion', function () {
    return view('connexion');
})->name('connexion');
// ma base
Route::get('base', function () {
    return view('base');
})->name('base');

Route::get('register', function () {
    return view('register');
})->name('register');

//postuler
Route::get('/postulerper', function () {
    return view('postulerper');
})->middleware([])->name('postulerper');




//appel a candidature
// Route::get('appelcandidat', function () {
//     return view('drh.appelcandidat');
// })->name('appelcandidat');
//dossiers des candidats
Route::get('dossiersdescandidats', function () {
    return view('dossiersdescandidats');
})->name('dossiersdescandidats');

//profil rechercher
Route::get('profil', function () {
    return view('profil');
})->name('profil');



Route::get('/postuler/pats', [PostesperController::class, 'postulerPATS'])->name('postulerpats3');
Route::get('/modifier', [DepartementController::class, 'edit'])->name('modifier');
Route::get('/update', [DepartementController::class, 'update'])->name('update');
Route::get('/supprimer', [DepartementController::class, 'destroy'])->name('supprimer');

//ajouter une description
// Route::get('/appel', [RectoratController::class, 'list'])->name('appel');

Route::get('/appel', [AppelcandidatController::class, 'list'])->name('appel');


Route::get('/ajoutdescription', [ProfilrechercherController::class, 'create'])->name('ajoutdescription');
Route::post('/ajoutdescription', [ProfilrechercherController::class, 'store'])->name('ajoutdescription');
//afficher la description
Route::get('/descriptionprofil', [ProfilrechercherController::class, 'list'])->name('descriptionprofil');

Route::get('/appelcandidat', [AppelcandidatController::class, 'create'])->name('appelcandidat');
Route::post('/appelcandidat', [AppelcandidatController::class, 'store'])->name('appelcandidat');
// afflicher l'appel


Route::get('/avis', [RectoratController::class, 'create'])->name('avis');
Route::post('/avis', [RectoratController::class, 'store'])->name('avis');



//postuler pour les candidats per's
Route::get('/postper', [PostesperController::class, 'list'])->name('postper');
Route::get('/postulerper', [PostesperController::class, 'list3'])->name('postulerper');
Route::get('/postulerper1', [PostulerperController::class, 'create'])->name('postulerper1');
Route::post('/postulerper2', [PostulerperController::class, 'store'])->name('postulerper2');
//postuler pour les candidats pats
Route::get('/postpats', [PostesperController::class, 'list1'])->name('postpats');
Route::get('/postulerpats', [PostesperController::class, 'list4'])->name('postulerpats');
Route::get('/postulerpats1', [PostulerpatsController::class, 'create'])->name('postulerpats1');
Route::post('/postulerpats2', [PostulerpatsController::class, 'store'])->name('postulerpats2');


//affichage pour les candidats pats
//affichage pour les candidats pats
Route::get('/candidat', [PostesperController::class, 'list2'])->name('candidat');
   //publication
   Route::get('/publication', [PublicationController::class, 'create'])->name('publication');
   Route::post('/publication', [PublicationController::class, 'store'])->name('publication');
   Route::get('/fiche', [RectoratController::class, 'list'])->name('fiche');

   //Activer et desactiver
 Route::get('/activer-utilisateur/{id}', [UserController::class, 'activer'])->name('activer');
Route::get('/desactiver-utilisateur/{id}', [UserController::class, 'desactiver'])->name('desactiver');

// Liste des utilisateurs
Route::get('/liste-comptes', [DepartementController::class, 'list'])->name('liste_comptes');

//ajout du departement
Route::get('/ajoutdepartement', [DepartementController::class, 'create'])->name('ajoutdepartement');

Route::post('/ajoutdepartement', [DepartementController::class, 'store'])->name('ajoutdepartement');
//ajout des membre de commission
Route::get('/designation', [DesignationController::class, 'create'])->name('designation');
Route::post('/designation', [DesignationController::class, 'store'])->name('designation');
Route::get('/membre', [DesignationController::class, 'list'])->name('membre');



// Afficher le formulaire de création d'utilisateur
// Route::get('/users/create', [comissionrecrutementController::class, 'create'])->name('users.create');

// // Enregistrer un nouvel utilisateur
// Route::post('/users', [UserController::class, 'store'])->name('users.store');

// // Afficher le formulaire de modification d'utilisateur
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// // Mettre à jour les informations de l'utilisateur
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// // Supprimer un utilisateur
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/candidature', [CandidtureController::class, 'showCandidates'])->name('candidature');
Route::get('/candidature', [CandidtureController::class, 'index'])->name('candidature');
Route::get('/dossiercandidat', [CandidtureController::class, 'showCandidates1'])->name('dossiercandidat');
Route::get('/dossiercandidat', [CandidtureController::class, 'index1'])->name('dossiercandidat');



Route::get('/candidats', [CandidtureController::class, 'search'])->name('candidats');

Route::get('/voirplus/{id}', [CandidtureController::class, 'showDiplomes'])->name('voirplus');


require __DIR__.'/auth.php';
