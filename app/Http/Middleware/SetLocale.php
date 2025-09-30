<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // langue dans la session, sinon APP_LOCALE (.env), sinon 'en'
        $locale = Session::get('locale', config('app.locale', 'en'));
        App::setLocale($locale);

        return $next($request);
    }
}
