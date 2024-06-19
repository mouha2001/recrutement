<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->validated();

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

             //Récupérer l'utilisateur authentifié
             $user = Auth::user();

              //Vérifier le contenu de "profil"
              if($user->profil === 'chefdepartement'){
                if($user->departement === 'PHYSIQUE'){
                    return redirect()->intended(route('departementphysique', absolute:false));
                }
                elseif($user->departement === 'CHIMIE'){
                    return redirect()->intended(route('departementchimie', absolute:false));
                }
                elseif($user->departement === 'MATHEMATIQUE'){
                    return redirect()->intended(route('departementmathematique', absolute:false));
                }
                elseif($user->departement === 'TIC'){
                    return redirect()->intended(route('departementtic', absolute:false));
                }
                elseif($user->departement ==='IJ'){
                    return redirect()->intended(route('departementtij', absolute:false));
                }
                elseif($user->departement ==='MANAGEMENT'){
                    return redirect()->intended(route('departementMANAGEMENT', absolute:false));
                }
                elseif($user->departement ==='SANTE'){
                    return redirect()->intended(route('departementSANTE', absolute:false));
                }
                elseif($user->departement ==='DD'){
                    return redirect()->intended(route('departementDD', absolute:false));
                }
            }

            //Redirection du candidat

            if($user->profil === 'candidat'){
                return redirect()->intended(route('candidat', absolute:false));

            }
            if($user->profil === 'administrateur'){
                return redirect()->intended(route('dashboard', absolute:false));

            }
            if($user->profil === 'chefdrh'){
                return redirect()->intended(route('drh', absolute:false));

            }

            if($user->profil === 'directionufr'){
                return redirect()->intended(route('directionufr', absolute:false));

            }
            if($user->profil === 'presidentcomission'){
                return redirect()->intended(route('prcomission', absolute:false));

            }

            if($user->profil === 'dgrectorat'){
                return redirect()->intended(route('rectorat', absolute:false));

            }



        $request->authenticate();


        }
        //return redirect()->intended(route('dashboard', absolute: false));
        return redirect()->route('login')->withErrors(['email'=>'Email ou Mot de passe oublié ']);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
