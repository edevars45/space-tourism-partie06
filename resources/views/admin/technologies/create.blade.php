{{-- resources/views/admin/technologies/create.blade.php --}}
{{-- Création d’une technologie --}}
@extends('layouts.app')

@section('title', 'Créer une technologie — Admin')

@section('content')
<section class="max-w-3xl mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Créer une technologie</h1>

    {{-- On utilise le partial qui contient déjà le <form> --}}
    @include('admin.technologies._form', [
        'technology'  => $technology,               
        'action'      => route('admin.technologies.store'),
        'method'      => 'POST',
        'submitLabel' => 'Enregistrer'
    ])
</section>
@endsection

