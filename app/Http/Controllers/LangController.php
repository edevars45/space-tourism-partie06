<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;       // Permet de changer la langue de l’application
use Illuminate\Support\Facades\Session;   // Permet de stocker la langue choisie dans la session
use Illuminate\Support\Facades\Redirect;  // Permet de rediriger l’utilisateur

class LangController extends Controller
{
    /**
     * Change la langue de l’application
     * @param string $locale → 'fr' ou 'en'
     */
    public function switch(string $locale)
    {
        //  Étape 1 : Vérifier si la langue demandée est bien autorisée
        if (! in_array($locale, ['fr', 'en'])) {
            // Si la langue n’est pas valide, on utilise la langue de secours
            $locale = config('app.fallback_locale', 'en');
        }

        //  Étape 2 : Sauvegarder la langue choisie dans la session
        Session::put('locale', $locale);

        //  Étape 3 : Dire à Laravel d’utiliser cette langue pour la requête en cours
        App::setLocale($locale);

        //  Étape 4 : Revenir sur la page précédente
        return Redirect::back();
        //  Variante possible (si Redirect::back pose problème) :
        // return redirect()->to(url()->previous());
    }
}
