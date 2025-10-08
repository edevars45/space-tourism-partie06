{{-- resources/views/pages/home.blade.php --}}
{{-- Accueil : texte à gauche, bouton rond à droite, proche du header, responsive. --}}

@extends('layouts.app')

@section('title', __('home.title'))

@section('content')

  {{-- Bandeau principal (hero) : fond noir pur, pas de centrage vertical --}}
  <section class="relative bg-black text-white overflow-hidden" aria-label="Accueil">

    {{-- Conteneur : largeur max, marges internes.
       pt-* pour remonter sous le header, pb-* pour souffler en bas --}}
    <div class="max-w-7xl mx-auto w-full px-6 md:px-12 lg:px-16 pt-8 md:pt-12 lg:pt-14 pb-10 md:pb-12">

      {{-- Grille responsive : 1 colonne en mobile, 2 colonnes dès md --}}
      <div class="grid md:grid-cols-2 gap-10 lg:gap-14 items-start">

        {{-- Colonne gauche : textes --}}
        <div>
          {{-- Petit surtitre fin et espacé --}}
          <p class="font-barlow-condensed uppercase tracking-[.25em] text-[#D0D6F9] text-xs sm:text-sm md:text-base mb-4 md:mb-5">
            {{ __('home.intro') }}
          </p>

          {{-- Gros titre : tailles adaptées selon l’écran, compact au-dessus du paragraphe --}}
          <h1 class="font-bellefair uppercase leading-none
                     text-[50px] sm:text-[64px] md:text-[92px] lg:text-[120px] xl:text-[150px]
                     mb-4 md:mb-5">
            {{ __('home.space') }}
          </h1>

          {{-- Paragraphe : largeur de lecture confortable, gris doux neutre sur noir --}}
          <p class="font-barlow text-gray-300 text-[15px] md:text-base leading-relaxed max-w-xl">
            {{ __('home.description') }}
          </p>
        </div>

        {{-- Colonne droite : bouton rond "Explorer" --}}
        <div class="flex justify-center md:justify-end items-start md:items-center">
          <div class="relative group">

            {{-- Halo discret au survol (activé à partir de md) --}}
            <span class="hidden md:block absolute inset-0 rounded-full transform scale-90 opacity-0
                         transition-all duration-500 ease-out
                         group-hover:scale-125 group-hover:opacity-20 bg-white/10"></span>

            {{-- Bouton rond : taille par breakpoint, bien centré, accessible --}}
            <a href="{{ url('/destinations/moon') }}"
               class="relative inline-flex items-center justify-center
                      w-32 h-32 sm:w-40 sm:h-40 md:w-52 md:h-52
                      rounded-full bg-white text-black
                      font-bellefair uppercase tracking-widest
                      text-sm sm:text-base md:text-lg
                      transition-transform duration-300 hover:scale-105
                      focus:outline-none focus:ring-4 focus:ring-white/20"
               aria-label="{{ __('home.explore') }}">
              <span class="pointer-events-none">{{ __('home.explore') }}</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
