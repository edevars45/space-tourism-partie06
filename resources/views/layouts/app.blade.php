<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Space-Tourism')</title>
  <meta name="description" content="@yield('meta_description', 'Partie 1 — Intégration')">
  <meta property="og:title" content="@yield('og_title', 'Space Tourism Project')">
  <meta property="og:description" content="@yield('og_description', 'Projet d’intégration Laravel — Partie 1')">
  <meta property="og:type" content="website">

  {{-- Charge Tailwind + JS via Vite --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('styles')
</head>
<body class="antialiased text-gray-100 bg-black">
  {{-- Lien d’évitement (accessible) --}}
  <a href="#main"
     class="sr-only focus:not-sr-only focus:absolute focus:left-2 focus:top-2
            focus:bg-white focus:text-black focus:px-4 focus:py-2 focus:border">
    Aller au contenu
  </a>

  <header role="banner" class="max-w-[1200px] mx-auto p-4">
    <nav aria-label="Navigation principale" class="flex gap-4">
      <a href="{{ route('home') }}" class="hover:underline">Accueil</a>
      <a href="{{ route('destinations') }}" class="hover:underline">Destinations</a>
      <a href="{{ route('crew') }}" class="hover:underline">Équipage</a>
      <a href="{{ route('technology') }}" class="hover:underline">Technologies</a>
    </nav>
  </header>

  <main id="main" role="main" class="max-w-[1200px] mx-auto p-4">
    @yield('content')
  </main>

  <footer role="contentinfo" class="max-w-[1200px] mx-auto p-4 text-sm text-gray-400">
    © Space Tourism — Partie 1
  </footer>

  @stack('scripts')
</body>
</html>
