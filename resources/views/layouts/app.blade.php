{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Space Tourism')</title>
  <meta name="description" content="@yield('meta_description', 'Projet Space Tourism — Intégration + i18n')">

  {{-- Tailwind + JS via Vite --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('styles')
</head>
<body class="antialiased text-gray-100 bg-black min-h-screen">

  {{-- Lien d’évitement (accessibilité) --}}
  <a href="#main"
     class="sr-only focus:not-sr-only focus:absolute focus:left-2 focus:top-2
            focus:bg-white focus:text-black focus:px-4 focus:py-2 focus:border">
    Aller au contenu
  </a>

  {{-- En-tête + Navigation --}}
  @php $currentLocale = app()->getLocale(); @endphp
  <header role="banner" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <nav class="flex items-center gap-6" aria-label="Navigation principale">
      {{-- Liens du site --}}
      <a href="{{ route('home') }}"
         class="hover:underline {{ request()->routeIs('home') ? 'font-semibold underline' : '' }}">
        {{ __('nav.home') }}
      </a>

      <a href="{{ route('destinations') }}"
         class="hover:underline {{ request()->routeIs('destinations') ? 'font-semibold underline' : '' }}">
        {{ __('nav.destinations') }}
      </a>

      <a href="{{ route('crew') }}"
         class="hover:underline {{ request()->routeIs('crew') ? 'font-semibold underline' : '' }}">
        {{ __('nav.crew') }}
      </a>

      <a href="{{ route('technology') }}"
         class="hover:underline {{ request()->routeIs('technology') ? 'font-semibold underline' : '' }}">
        {{ __('nav.technology') }}
      </a>

      {{-- Sélecteur de langue (poussé à droite) --}}
      <div class="ml-auto flex items-center gap-2"
           role="group"
           aria-label="{{ __('nav.lang_selector_label') }}">
        <a href="{{ route('lang.switch','fr') }}"
           class="px-2 py-1 rounded {{ $currentLocale==='fr' ? 'bg-white/10' : 'hover:bg-white/10' }}"
           lang="fr" hreflang="fr"
           aria-current="{{ $currentLocale==='fr' ? 'true' : 'false' }}">
          FR
        </a>
        <span aria-hidden="true">|</span>
        <a href="{{ route('lang.switch','en') }}"
           class="px-2 py-1 rounded {{ $currentLocale==='en' ? 'bg-white/10' : 'hover:bg-white/10' }}"
           lang="en" hreflang="en"
           aria-current="{{ $currentLocale==='en' ? 'true' : 'false' }}">
          EN
        </a>
      </div>
    </nav>
  </header>

  {{-- Contenu principal --}}
  <main id="main" role="main" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    @yield('content')
  </main>

  {{-- Pied de page --}}
  <footer role="contentinfo" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-sm text-gray-400">
    © {{ date('Y') }} — Space Tourism
  </footer>

  @stack('scripts')
</body>
</html>
