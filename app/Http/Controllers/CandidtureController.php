<?php

namespace App\Http\Controllers;

use App\Models\postuler;
use App\Models\Postuleruser;
use Illuminate\Http\Request;
use App\Models\User;

class CandidtureController extends Controller
{
    public function showCandidates()
    {
 $postuler=postuler::find(0);
// dd($postuler->users);
        // Récupérer les utilisateurs dont le profil est 'candidat' avec leurs relations
        // $candidates = User::with([
        //     'diplomes',
        //     'adequations',
        //     'enseignementuadbs',
        //     'experiencepedagogiques',
        //     'experienceprofessionels',
        //     'grades',
        //     'publications',
        //     'postuler',
        //     'posts',

        // ])->where('profil', 'candidat')
        // ->whereHas('postuler') // Filtrer les candidats qui ont postulé à un poste
        // ->get();

        $posts=Postuler::all();

        // Passer les données à la vue
        return view('drh.candidature', compact('posts'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $candidates = User::where('nom', 'LIKE', "%{$query}%")
                           ->orWhere('prenom', 'LIKE', "%{$query}%")
                           ->paginate(10); // Paginate with 10 candidates per page

    return view('drh.candidature', compact('candidates'));
}

public function showDiplomes($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('drh.voirplus', compact('diplomes', 'id'));
}


public function index(Request $request)
{
    $posts = Postuler::paginate(10); // Paginate the posts, 10 posts per page
    return view('drh.candidature', compact('posts'));
}
public function index1(Request $request)
{
    $posts = Postuler::paginate(10); // Paginate the posts, 10 posts per page
    return view('rectorats.dossiercandidat', compact('posts'));
}

// public function index()
// {
//     // Charger tous les candidats avec leurs relations de poste
//     $candidates = User::with('posts')->get();

//     // Grouper les candidats par le titre de poste
//     $groupedCandidates = $candidates->groupBy(function($candidate) {
//         return $candidate->posts->first()->intituler;
//     });

//     // Passer les candidats groupés à la vue
//     return view('drh.candidature', compact('groupedCandidates'));
// }

public function showCandidates1()
{
$postuler=postuler::find(0);
// dd($postuler->users);
    // Récupérer les utilisateurs dont le profil est 'candidat' avec leurs relations
    // $candidates = User::with([
    //     'diplomes',
    //     'adequations',
    //     'enseignementuadbs',
    //     'experiencepedagogiques',
    //     'experienceprofessionels',
    //     'grades',
    //     'publications',
    //     'postuler',
    //     'posts',

    // ])->where('profil', 'candidat')
    // ->whereHas('postuler') // Filtrer les candidats qui ont postulé à un poste
    // ->get();

    $posts=Postuler::all();

    // Passer les données à la vue
    return view('rectorats.dossiercandidat', compact('posts'));
}


}
