<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function destinations()
    {
        return view('pages.destinations'); // ou 'destinations' selon ton fichier
    }

    public function crew()
    {
        return view('pages.crew');
    }

    public function technology()
    {
        return view('pages.technology');
    }
}
