<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postuler;

class PostulerController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $postuler = Postuler::where('intituler', 'LIKE', "%$query%")
            ->orWhere('departements', 'LIKE', "%$query%")
            ->paginate(10); // Paginer les résultats de recherche à 10 par page

        $guideFile = 'guide_de_recrutement.pdf'; // Remplacez par le nom réel de votre fichier de guide

        return view('postper', compact('postuler', 'guideFile'));
    }

    public function index()
    {
        $postuler = Postuler::paginate(10); // Paginer à 10 résultats par page
        return view('postper', compact('postuler'));
    }
}
