<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function switch(string $locale)
    {
        // langues autorisées
        if (! in_array($locale, ['fr', 'en'])) {
            $locale = config('app.fallback_locale', 'en');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        // Revenir sur la page actuelle
        return Redirect::back();
        // alternative plus robuste : return redirect()->to(url()->previous());
    }
}
