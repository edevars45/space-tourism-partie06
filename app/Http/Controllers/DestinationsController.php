<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    // Je choisis un ordre d’onglets fixe, identique FR/EN.
    private array $order = ['moon','mars','europa','titan'];

    /**
     * Page /destinations/{planet?}
     * - Je lis les données dans les fichiers de langue (FR/EN).
     * - Je valide le slug et je fournis à la vue : slug courant, data, liste.
     */
    public function show(Request $request, string $planet = 'moon')
    {
        // 1) Je récupère les données traduites
        $all = __('destinations.planets');   // tableau associatif
        if (!is_array($all) || empty($all)) {
            abort(500, 'Missing i18n data for destinations.');
        }

        // 2) Je nettoie l’ordre en fonction des clés réellement présentes
        $planets = [];
        foreach ($this->order as $slug) {
            if (isset($all[$slug])) {
                $planets[$slug] = $all[$slug];
            }
        }
        // Si jamais des clés supplémentaires existent, je les ajoute en fin
        foreach ($all as $slug => $data) {
            if (!isset($planets[$slug])) {
                $planets[$slug] = $data;
            }
        }

        // 3) Validation du slug
        if (!array_key_exists($planet, $planets)) {
            $planet = array_key_first($planets); // fallback moon
        }

        // 4) Données pour la vue
        $data = $planets[$planet];

        return view('pages.destinations', [
            'planet'  => $planet,
            'data'    => $data,
            'planets' => $planets, // pour construire les onglets
        ]);
    }
}
