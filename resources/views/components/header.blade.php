{{-- resources/views/components/header.blade.php --}}
@php
  // Je récupère la langue courante
  $currentLocale = app()->getLocale();
@endphp

<header role="banner"
        class="absolute top-0 left-0 w-full flex items-center justify-between px-6 py-4 z-50">

  {{-- Mon logo cliquable qui ramène à la page d'accueil --}}
  <a href="{{ route('home') }}">
    <img src="{{ asset('assets/logo.png') }}" alt="Space Tourism" class="h-10 w-auto">
  </a>

  {{-- ============================ --}}
{{-- ============================ --}}
{{-- NAVIGATION DESKTOP --}}
{{-- ============================ --}}
<nav role="navigation" aria-label="Menu principal"
     class="hidden sm:flex items-center gap-12 bg-white/5 backdrop-blur-lg px-12 py-4
            uppercase text-white tracking-[0.25em] text-sm font-light">

  {{-- Accueil --}}
  <a href="{{ route('home') }}"
     class="{{ request()->routeIs('home') ? 'border-b-2 border-white pb-1 font-normal' : 'opacity-70 hover:opacity-100' }}">
     <span class="font-bold mr-2">00</span> {{ __('nav.home') }}
  </a>

  {{-- Destination --}}
  <a href="{{ route('destinations') }}"
     class="{{ request()->routeIs('destinations') ? 'border-b-2 border-white pb-1 font-normal' : 'opacity-70 hover:opacity-100' }}">
     <span class="font-bold mr-2">01</span> {{ __('nav.destinations') }}
  </a>

  {{-- Équipage --}}
  <a href="{{ route('crew') }}"
     class="{{ request()->routeIs('crew') ? 'border-b-2 border-white pb-1 font-normal' : 'opacity-70 hover:opacity-100' }}">
     <span class="font-bold mr-2">02</span> {{ __('nav.crew') }}
  </a>

  {{-- Technologie --}}
  <a href="{{ route('technology') }}"
     class="{{ request()->routeIs('technology') ? 'border-b-2 border-white pb-1 font-normal' : 'opacity-70 hover:opacity-100' }}">
     <span class="font-bold mr-2">03</span> {{ __('nav.technology') }}
  </a>
</nav>
  {{-- ============================ --}}
  {{-- SÉLECTEUR LANGUE (desktop) --}}
  {{-- ============================ --}}
  <div class="hidden sm:flex items-center gap-2 text-white uppercase text-xs tracking-widest">
    <a href="{{ route('lang.switch','fr') }}"
       aria-label="Changer la langue en français"
       class="{{ $currentLocale==='fr' ? 'font-bold underline' : 'hover:underline opacity-70' }}">
       FR
    </a>
    <span>|</span>
    <a href="{{ route('lang.switch','en') }}"
       aria-label="Switch language to English"
       class="{{ $currentLocale==='en' ? 'font-bold underline' : 'hover:underline opacity-70' }}">
       EN
    </a>
  </div>

  {{-- ============================ --}}
  {{-- BOUTON MENU BURGER (mobile) --}}
  {{-- ============================ --}}
  <button id="menu-btn"
          aria-label="Ouvrir le menu mobile"
          aria-expanded="false"
          class="sm:hidden text-white text-3xl">☰</button>
</header>

{{-- ============================ --}}
{{-- MENU MOBILE (50% écran, semi-transparent) --}}
{{-- ============================ --}}
<nav id="mobile-menu"
     role="navigation"
     aria-label="Menu mobile"
     class="hidden fixed top-0 right-0 w-1/2 h-full bg-black/80 backdrop-blur-lg
            text-white p-8 flex-col gap-8 uppercase tracking-[0.25em] text-base font-light z-50">

  {{-- Bouton fermer --}}
  <button id="close-btn"
          aria-label="Fermer le menu mobile"
          class="self-end text-3xl mb-12">✖</button>

  {{-- Ici je n’affiche PAS les numéros (contrairement au desktop) --}}
  <a href="{{ route('home') }}">{{ __('nav.home') }}</a>
  <a href="{{ route('destinations') }}">{{ __('nav.destinations') }}</a>
  <a href="{{ route('crew') }}">{{ __('nav.crew') }}</a>
  <a href="{{ route('technology') }}">{{ __('nav.technology') }}</a>

  {{-- Sélecteur de langue version mobile --}}
  <div class="mt-auto text-xs tracking-widest">
    <a href="{{ route('lang.switch','fr') }}"
       aria-label="Changer la langue en français"
       class="{{ $currentLocale==='fr' ? 'font-bold underline' : 'hover:underline opacity-70' }}">
       FR
    </a> |
    <a href="{{ route('lang.switch','en') }}"
       aria-label="Switch language to English"
       class="{{ $currentLocale==='en' ? 'font-bold underline' : 'hover:underline opacity-70' }}">
       EN
    </a>
  </div>
</nav>

{{-- ============================ --}}
{{-- SCRIPT DU MENU BURGER --}}
{{-- ============================ --}}
<script>
  const menuBtn = document.getElementById('menu-btn');
  const closeBtn = document.getElementById('close-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  // Ouvrir le menu
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
    mobileMenu.classList.add('flex'); // affichage flex en colonne
    mobileMenu.classList.add('flex-col');
    menuBtn.setAttribute('aria-expanded', 'true');
  });

  // Fermer le menu
  closeBtn.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
    mobileMenu.classList.remove('flex');
    mobileMenu.classList.remove('flex-col');
    menuBtn.setAttribute('aria-expanded', 'false');
  });
</script>
