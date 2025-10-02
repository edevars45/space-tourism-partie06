{{-- layout principal utilisé par toutes les pages --}}
<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
  {{-- encodage utf-8 --}}
  <meta charset="utf-8">

  {{-- responsive mobile --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- titre de l’onglet : soit défini dans @section('title') soit “Space Tourism” par défaut --}}
  <title>@yield('title', 'Space Tourism')</title>

  {{-- meta description pour SEO, remplacée par @section si besoin --}}
  <meta name="description" content="@yield('meta_description', 'Projet Space Tourism — Intégration + i18n')">

  {{-- chargement du CSS/JS compilés avec Vite (inclut Tailwind) --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- emplacement où on peut injecter d’autres styles spécifiques --}}
  @stack('styles')
</head>

{{-- classes du body : texte clair, min hauteur écran + possibilité d’ajouter un bg spécifique depuis les pages --}}
<body class="antialiased text-gray-100 min-h-screen @yield('page_bg')">

  {{-- lien caché mais accessible : permet aux personnes en lecteur d’écran d’aller direct au contenu --}}
  <a href="#main"
     class="sr-only focus:not-sr-only focus:absolute focus:left-2 focus:top-2
            focus:bg-white focus:text-black focus:px-4 focus:py-2 focus:border">
    Aller au contenu
  </a>

  {{-- inclusion du composant header --}}
  <x-header />

  {{-- zone principale de la page --}}
  <main id="main" role="main" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    {{-- contenu injecté par chaque page --}}
    @yield('content')
  </main>

  {{-- inclusion du composant footer --}}
  <x-footer />

  {{-- emplacement pour scripts supplémentaires --}}
  @stack('scripts')
</body>
</html>
