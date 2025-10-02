<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    // 🔹 Tableau de données des planètes
    private $planets = [
        'moon' => [
            'name' => 'Lune',
            'description' => "Voyez notre planète comme vous ne l’avez jamais vue auparavant.
                              Un parfait voyage de détente pour vous aider à prendre du recul
                              et revenir requinquer. Pendant que vous y êtes,
                              plongez-vous dans l’histoire en visitant les sites
                              d’atterrissage de Luna 2 et Apollo 11.",
            'distance' => '384 400 km',
            'travel' => '3 jours',
        ],
        'mars' => [
            'name' => 'Mars',
            'description' => "La planète rouge, pleine de mystères et d’avenir.
                              Préparez-vous à marcher sur un nouveau monde fascinant...",
            'distance' => '225 millions km',
            'travel' => '9 mois',
        ],
        'europa' => [
            'name' => 'Europe',
            'description' => "La lune glacée de Jupiter, recouverte d’océans souterrains.
                              Peut-être la prochaine frontière de l’exploration spatiale...",
            'distance' => '628 millions km',
            'travel' => '6 ans',
        ],
        'titan' => [
            'name' => 'Titan',
            'description' => "La lune de Saturne avec ses lacs de méthane et
                              son atmosphère dense. Une destination unique et mystérieuse...",
            'distance' => '1,6 milliards km',
            'travel' => '7 ans',
        ],
    ];

    /**
     * 🔹 Affiche la destination par défaut
     * Ici : redirection automatique vers la Lune
     */
    public function index()
    {
        return redirect()->route('destinations.show', 'moon');
    }

    /**
     * 🔹 Affiche une planète précise
     *
     * @param string $planet (clé : moon, mars, europa, titan)
     */
    public function show($planet)
    {
        if (!array_key_exists($planet, $this->planets)) {
            abort(404); // renvoie une erreur 404 si la planète n’existe pas
        }

        $data = $this->planets[$planet];

        return view('pages.destinations', [
            'planet' => $planet, // slug (ex: moon)
            'data'   => $data,   // données de la planète
            'planets'=> $this->planets // utile pour le menu (Lune, Mars…)
        ]);
    }
}
