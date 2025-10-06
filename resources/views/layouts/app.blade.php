<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Définition du jeu de caractères --}}
    <meta charset="utf-8">

    {{-- Règle d’affichage responsive pour mobiles --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Jeton CSRF pour sécuriser les formulaires --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Titre de la page (reprend le nom défini dans .env) --}}
    <title>{{ config('app.name', 'Space Tourism') }}</title>

    {{-- Chargement des polices (tu peux changer si besoin) --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=barlow:400,500,600|bellefair:400|barlow-condensed:400,500&display=swap" rel="stylesheet" />

    {{-- Importation des fichiers CSS et JS compilés avec Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black text-white">

    {{-- Conteneur principal --}}
    <div class="min-h-screen flex flex-col">

        {{-- Barre de navigation commune à toutes les pages --}}
        @include('layouts.navigation')

        {{-- Contenu principal injecté depuis chaque page --}}
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Pied de page (facultatif) --}}
        <footer class="bg-gray-900 text-gray-400 text-center py-6 text-sm">
            © {{ date('Y') }} Space Tourism | Projet Laravel Breeze - Partie 04
        </footer>
    </div>

</body>
</html>
