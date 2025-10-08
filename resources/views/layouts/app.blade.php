<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Meta de base --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Titre : j’utilise @section('title') si présent, sinon nom appli --}}
    <title>
        @hasSection('title')
            @yield('title') — {{ config('app.name', 'Space Tourism') }}
        @else
            {{ config('app.name', 'Space Tourism') }}
        @endif
    </title>

    {{-- Polices --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=barlow:400,500,600|bellefair:400|barlow-condensed:400,500&display=swap"
        rel="stylesheet" />

    {{-- Assets Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black text-white">
    <div class="min-h-screen flex flex-col">

        {{-- Header maquette (logo + trait + nav translucide) --}}
        <x-header />

        {{-- Contenu des pages --}}
        <main class="flex-grow pt-20 md:pt-24">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        {{-- Footer simple --}}
        <footer class="bg-gray-900 text-gray-400 text-center py-6 text-sm">
            © {{ date('Y') }} Space Tourism | Projet Laravel Breeze
        </footer>
    </div>
</body>

</html>
