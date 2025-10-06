@extends('layouts.app')
{{-- On utilise le layout principal app.blade.php --}}

@section('title', __('home.title'))
{{-- Définit le titre de la page --}}

@section('content')
<section class="min-h-screen bg-[#0B0D17] text-white flex items-center justify-center px-6 md:px-16 relative overflow-hidden">
  {{--
    Section principale :
    - min-h-screen : occupe toute la hauteur de la fenêtre
    - bg-[#0B0D17] : fond noir profond (même couleur que la maquette)
    - text-white : texte en blanc
    - flex items-center justify-center : centre verticalement le contenu
    - px : marge interne sur les côtés
  --}}

  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-24 items-center">
    {{--
      Conteneur principal :
      - max-w-6xl : largeur maximale
      - grid md:grid-cols-2 : deux colonnes (texte + bouton)
      - gap-24 : espace entre les colonnes
    --}}

    {{-- Colonne gauche : Texte --}}
    <div>
      <p class="font-barlow-condensed uppercase tracking-[0.25em] text-gray-400 text-sm md:text-base mb-6">
        Donc vous voulez voyager dans
      </p>

      <h1 class="font-bellefair uppercase text-6xl sm:text-7xl md:text-8xl mb-6 leading-none">
        L’espace
      </h1>

      <p class="font-barlow text-[#D0D6F9] text-[15px] md:text-base leading-relaxed max-w-md">
        Soyons objectifs : si vous voulez aller dans l’espace, vous pouvez aller
        véritablement dans le véritable espace et non juste planer sur le bord de
        celui-ci. Eh bien, asseyez-vous parce que nous allons vous donner une
        expérience vraiment extraordinaire !
      </p>
    </div>

    {{-- Colonne droite : Bouton Explorer --}}
    <div class="flex justify-center md:justify-end">
      <a href="{{ route('destinations') }}"
         class="relative flex items-center justify-center w-40 h-40 md:w-56 md:h-56 rounded-full bg-white text-[#0B0D17] font-bellefair text-xl uppercase tracking-widest transition duration-300 hover:ring-[40px] hover:ring-white/10">
        Explorer
      </a>
      {{--
        - w/h : taille du cercle
        - rounded-full : forme ronde
        - bg-white : fond blanc
        - text-[#0B0D17] : texte noir (contraste)
        - hover:ring : effet halo au survol
      --}}
    </div>
  </div>
</section>
@endsection
