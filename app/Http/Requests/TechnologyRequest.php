<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TechnologyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // à sécuriser avec policies/roles si besoin
    }

    public function rules(): array
    {
        $technology = $this->route('technology'); // route-model binding {technology}
        $id = $technology?->id;

        return [
            'name'        => [
                'required', 'string', 'max:150',
                Rule::unique('technologies', 'name')->ignore($id),
            ],
            'slug'        => [
                'nullable', 'string', 'max:160',
                Rule::unique('technologies', 'slug')->ignore($id),
            ],
            'description' => ['nullable', 'string'],
            'website_url' => ['nullable', 'url', 'max:255'],

            // Optionnel : si tu gères un tri manuel
            'order'       => ['nullable', 'integer', 'min:0'],

            // Checkbox publiée (ton controller lit is_published)
            'is_published'=> ['nullable', 'boolean'],

            // Champ fichier : correspond à <input name="image">
            'image'       => ['nullable', 'image', 'max:2048'], // ~2 Mo
            // Si tu veux restreindre aux seuls jpg/png :
            // 'image'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Le nom est obligatoire.',
            'name.unique'    => 'Ce nom est déjà utilisé.',
            'slug.unique'    => 'Ce slug est déjà utilisé.',
            'website_url.url'=> 'Le site officiel doit être une URL valide.',
            'image.image'    => 'Le fichier doit être une image.',
            'image.max'      => 'L’image ne doit pas dépasser 2 Mo.',
        ];
    }
}
