@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
  {{-- Section Hero --}}
  <section
    class="relative min-h-[calc(100vh-140px)] md:min-h-[80vh] overflow-hidden rounded-xl"
    style="background-image: url('{{ asset('images/background-home.jpg') }}'); background-size: cover; background-position: center;"
    aria-label="Accueil - Space Tourism"
  >
    {{-- Overlay pour contraste --}}
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <p class="uppercase tracking-[0.3em] text-gray-300 text-sm md:text-base mb-6">
          Donc vous voulez voyager dans
        </p>

        <h1 class="font-extrabold leading-none mb-6
                   text-5xl sm:text-6xl md:text-7xl lg:text-8xl">
          L’ESPACE
        </h1>

        <p class="text-gray-300 max-w-xl text-sm md:text-base leading-relaxed">
          Soyons objectifs&nbsp;: si vous voulez aller dans l’espace, vous pouvez aller véritablement
          dans le véritable espace et non juste planer sur le bord de celui-ci. Eh bien, asseyez-vous
          parce que nous allons vous donner une expérience vraiment extraordinaire&nbsp;!
        </p>
      </div>

      {{-- Bouton Explorer --}}
      <div class="flex md:justify-end">
        <a href="{{ route('destinations') }}"
           class="group relative inline-flex items-center justify-center
                  w-44 h-44 md:w-56 md:h-56 rounded-full
                  bg-white text-slate-900
                  uppercase tracking-widest font-medium
                  focus:outline-none focus-visible:ring-2 focus-visible:ring-white/80"
           aria-label="Explorer les destinations">
          <span>Explorer</span>
          <span class="absolute inset-0 rounded-full scale-0 group-hover:scale-110 transition-transform duration-300
                        ring-0 group-hover:ring-8 ring-white/20"></span>
        </a>
      </div>
    </div>
  </section>
@endsection
