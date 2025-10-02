@extends('layouts.app')
{{-- Ici je dis à Laravel que ma page "home" utilise le layout principal "app.blade.php" --}}

@section('title', __('home.title'))
{{-- Je définis le titre de la page. Il vient du fichier de traduction (ex: "Accueil" ou "Home"). --}}

@section('content')
{{-- J’ouvre la section "content" : tout ce qui est ici sera injecté dans le layout principal. --}}

<section
  class="min-h-screen bg-mobile bg-cover bg-center bg-no-repeat relative"
  aria-label="{{ __('home.title') }}"
>
  {{-- J’utilise une balise <section> pour structurer ma page.
       - relative : permet de placer des éléments absolus à l’intérieur.
       - min-h-screen : occupe toute la hauteur de l’écran.
       - bg-mobile : fond unique étoilé (défini dans tailwind.config.js).
       - bg-cover : l’image remplit tout l’espace.
       - bg-center : image centrée.
       - bg-no-repeat : évite que l’image se répète.
       - aria-label : accessibilité, le lecteur d’écran va lire le titre. --}}

  <div class="absolute inset-0 bg-black/50"></div>
  {{-- Overlay noir semi-transparent au-dessus du fond --}}

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <p class="uppercase tracking-[0.3em] text-gray-300 text-sm md:text-base mb-6">
        {{ __('home.subtitle') }}
      </p>

      <h1 class="font-extrabold leading-none mb-6 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">
        {{ __('home.title') }}
      </h1>

      <p class="text-gray-300 max-w-xl text-sm md:text-base leading-relaxed">
        {{ __('home.description') }}
      </p>
    </div>

    <div class="flex md:justify-end">
      <a href="{{ route('destinations') }}" class="group relative btn-explorer">
        <span>{{ __('home.button') }}</span>
      </a>
    </div>
  </div>
</section>

@endsection
{{-- Je ferme ma section "content". Tout ce bloc est injecté dans le layout. --}}
