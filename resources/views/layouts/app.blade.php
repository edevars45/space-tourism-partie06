{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Space Tourism')</title>
  <meta name="description" content="@yield('meta_description', 'Projet Space Tourism — Intégration + i18n')">

  {{-- CSS/JS via Vite (inclut Tailwind) --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('styles')
</head>
<body class="antialiased text-gray-100 min-h-screen @yield('page_bg')">

  {{-- Lien d’évitement (accessibilité) --}}
  <a href="#main"
     class="sr-only focus:not-sr-only focus:absolute focus:left-2 focus:top-2
            focus:bg-white focus:text-black focus:px-4 focus:py-2 focus:border">
    Aller au contenu
  </a>

  {{-- Header (composant) --}}
  <x-header />

  {{-- Contenu principal --}}
  <main id="main" role="main" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    @yield('content')
  </main>

  {{-- Footer (composant) --}}
  <x-footer />

  @stack('scripts')
</body>
</html>
