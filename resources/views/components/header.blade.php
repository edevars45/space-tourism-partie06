{{-- resources/views/components/header.blade.php --}}
@php $currentLocale = app()->getLocale(); @endphp

<header role="banner" class="bg-white/10 backdrop-blur border-b border-gray-700">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-4">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.png') }}" alt="Space Tourism" class="h-8 w-auto">
      <span class="font-semibold text-white">Space Tourism</span>
    </a>

{{-- Navigation principale --}}
<nav aria-label="Navigation principale"
     class="hidden sm:flex items-center gap-8 uppercase text-white tracking-wider">

  {{-- Lien Accueil --}}
  <a href="{{ route('home') }}"
     class="{{ request()->routeIs('home')
        ? 'border-b-2 border-white pb-1'
        : 'opacity-70 hover:opacity-100' }}">
    {{ __('nav.home') }}
  </a>

  {{-- Lien Destinations --}}
  <a href="{{ route('destinations') }}"
     class="{{ request()->routeIs('destinations')
        ? 'border-b-2 border-white pb-1'
        : 'opacity-70 hover:opacity-100' }}">
    {{ __('nav.destinations') }}
  </a>

  {{-- Lien Crew --}}
  <a href="{{ route('crew') }}"
     class="{{ request()->routeIs('crew')
        ? 'border-b-2 border-white pb-1'
        : 'opacity-70 hover:opacity-100' }}">
    {{ __('nav.crew') }}
  </a>

  {{-- Lien Technology --}}
  <a href="{{ route('technology') }}"
     class="{{ request()->routeIs('technology')
        ? 'border-b-2 border-white pb-1'
        : 'opacity-70 hover:opacity-100' }}">
    {{ __('nav.technology') }}
  </a>
</nav>


    {{-- Sélecteur de langue --}}
    <div class="flex items-center gap-2">
      <a href="{{ route('lang.switch','fr') }}"
         class="{{ $currentLocale==='fr' ? 'font-bold underline' : 'hover:underline' }}">FR</a>
      <span>|</span>
      <a href="{{ route('lang.switch','en') }}"
         class="{{ $currentLocale==='en' ? 'font-bold underline' : 'hover:underline' }}">EN</a>
    </div>
  </div>
</header>
