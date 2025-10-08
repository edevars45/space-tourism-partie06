<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Arr;

class PublicCrewController extends Controller
{
    public function index(Request $request)
    {
        $members = [];
        $trans = __('crew.members');

        if (is_array($trans) && !empty($trans)) {
            foreach ($trans as $slug => $m) {
                $members[] = [
                    'name'  => Arr::get($m, 'name', ''),
                    'role'  => Arr::get($m, 'role', ''),
                    'bio'   => Arr::get($m, 'bio', ''),
                    'image' => Arr::get($m, 'image') ? asset(Arr::get($m, 'image')) : null,
                    'alt'   => Arr::get($m, 'alt', ''),
                    'slug'  => $slug,
                ];
            }
        }

        return view('pages.crew', [
            'members'   => $members,
            'pageTitle' => __('crew.title'),
            'heading'   => __('crew.heading'),
        ]);
    }
}
