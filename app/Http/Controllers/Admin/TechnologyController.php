<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyRequest;        // ma request de validation
use App\Models\Technology;                      // mon modèle
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;         // pour gérer les fichiers
use Illuminate\Support\Str;                     // pour fabriquer un slug

class TechnologyController extends Controller
{
    // Liste paginée
    public function index()
    {
        // Je trie du plus récent au plus ancien
        $items = Technology::latest()->paginate(12);
        return view('admin.technologies.index', compact('items'));
    }

    // Formulaire de création
    public function create()
    {
        // Je passe un modèle vide au form
        return view('admin.technologies.create', ['technology' => new Technology()]);
    }

    // Enregistrement
    public function store(TechnologyRequest $request)
    {
        // Je valide les données
        $data = $request->validated();

        // Je fabrique le slug si vide
        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        // J’upload l’image si fournie
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('technologies', 'public');
        }

        // Je force le bool si absent
        $data['is_published'] = (bool)($data['is_published'] ?? true);

        // Je crée l’item
        Technology::create($data);

        // Je redirige avec message
        return redirect()->route('admin.technologies.index')->with('success', 'Technologie créée.');
    }

    // Formulaire d’édition
    public function edit(Technology $technology)
    {
        // J’envoie l’item au form
        return view('admin.technologies.edit', compact('technology'));
    }

    // Mise à jour
    public function update(TechnologyRequest $request, Technology $technology)
    {
        // Je valide les données
        $data = $request->validated();

        // Je fabrique le slug si vide
        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        // Si nouvelle image, je supprime l’ancienne et j’upload la nouvelle
        if ($request->hasFile('image')) {
            if ($technology->image_path) {
                Storage::disk('public')->delete($technology->image_path);
            }
            $data['image_path'] = $request->file('image')->store('technologies', 'public');
        }

        // Je force le bool si absent
        $data['is_published'] = (bool)($data['is_published'] ?? $technology->is_published);

        // Je mets à jour
        $technology->update($data);

        // Je redirige avec message
        return redirect()->route('admin.technologies.index')->with('success', 'Technologie mise à jour.');
    }

    // Suppression
    public function destroy(Technology $technology)
    {
        // Je supprime l’image si présente
        if ($technology->image_path) {
            Storage::disk('public')->delete($technology->image_path);
        }

        // Je supprime la ligne
        $technology->delete();

        // Je reviens à la liste
        return redirect()->route('admin.technologies.index')->with('success', 'Technologie supprimée.');
    }
}
