{{-- resources/views/pages/crew.blade.php --}}
@extends('layouts.app')
{{-- On dit que cette page hérite de la structure "app.blade.php" (layout principal) --}}

@section('title', __('crew.title'))
{{-- On définit le titre de la page, qui vient des fichiers de langue (crew.php) --}}

@section('content')
{{-- On commence la partie "content" (c’est ici que s’affiche le contenu principal) --}}

  {{-- SECTION avec image de fond + voile sombre pour lisibilité --}}
  <section
    class="relative bg-cover bg-center py-16"
    style="background-image: url('{{ asset('images/background-crew.jpg') }}');"
    aria-label="{{ __('crew.title') }}"
  >
    <div class="absolute inset-0 bg-black/45"></div>
    {{-- Overlay noir transparent au-dessus du fond pour mieux lire le texte --}}

    <div class="relative z-10 max-w-6xl mx-auto px-6">
      {{-- Conteneur centré et limité en largeur --}}

      {{-- Titre de la page --}}
      <h1 class="text-3xl md:text-4xl font-bold mb-10 text-white text-center">
        {{ __('crew.heading') }}
      </h1>

      @php
        // Tableau des membres d’équipage
        // Chaque entrée contient une clé de traduction (nom + bio + rôle) + image associée
        $members = [
          ['key' => 'commander',  'img' => asset('images/crew/commander.png')],
          ['key' => 'engineer',   'img' => asset('images/crew/engineer.png')],
          ['key' => 'pilot',      'img' => asset('images/crew/pilot.png')],
          ['key' => 'specialist', 'img' => asset('images/crew/specialist.png')],
        ];
      @endphp

      {{-- SLIDES des membres : on boucle pour générer un article par personne --}}
      <div id="crew-slider" class="relative">
        @foreach ($members as $i => $m)
        {{-- $i = index de la boucle, $m = données du membre (clé + image) --}}
          @php $key = $m['key']; @endphp
          {{-- On récupère la clé (ex: commander, engineer, …) pour simplifier les appels --}}

          <article
  class="crew-slide grid md:grid-cols-2 gap-10 items-center md:items-end mb-12 {{ $i === 0 ? '' : 'hidden' }}"
  data-index="{{ $i }}"
  aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"
>
  {{-- Texte à gauche --}}
  <div class="order-2 md:order-1 text-white space-y-4">
    <p class="uppercase tracking-widest text-gray-300 text-sm md:text-base">
      {{ __('crew.'.$key.'.role') }}
    </p>

    <h2 class="text-2xl md:text-4xl font-bold uppercase">
      {{ __('crew.'.$key.'.name') }}
    </h2>

    <p class="text-gray-200 leading-relaxed max-w-md">
      {{ __('crew.'.$key.'.bio') }}
    </p>
  </div>

  {{-- Image personnage à droite --}}
  <div class="order-1 md:order-2 flex justify-center md:justify-end">
    <img
      src="{{ $m['img'] }}"
      alt="{{ __('crew.'.$key.'.alt') }}"
      class="w-56 md:w-80 lg:w-[400px] object-contain drop-shadow-xl"
      loading="lazy"
    >
  </div>
</article>

        @endforeach
      </div>

      {{-- NAVIGATION : petits points cliquables pour changer de membre --}}
      <div class="flex items-center justify-center gap-3">
        @foreach ($members as $i => $m)
          <button
            type="button"
            class="crew-dot h-3 w-3 rounded-full {{ $i===0 ? 'bg-white' : 'bg-white/30 hover:bg-white/60' }}"
            aria-label="@lang('Aller au membre') {{ $i + 1 }}"
            aria-controls="crew-slider"
            data-goto="{{ $i }}"
          ></button>
          {{-- 1 bouton par membre ; le 1er est plein (blanc), les autres semi-transparents --}}
        @endforeach
      </div>
    </div>
  </section>

  {{-- Script JS pour activer les slides (pas besoin de librairie) --}}
  <script>
    (function () {
      // On sélectionne les slides (articles) et les boutons (dots)
      const slides = Array.from(document.querySelectorAll('.crew-slide'));
      const dots   = Array.from(document.querySelectorAll('.crew-dot'));

      // Fonction pour montrer 1 slide et cacher les autres
      function showSlide(index) {
        slides.forEach((s, i) => {
          const active = i === index;
          s.classList.toggle('hidden', !active); // cache/affiche
          s.setAttribute('aria-hidden', active ? 'false' : 'true'); // accessibilité
        });

        dots.forEach((d, i) => {
          d.classList.toggle('bg-white', i === index);    // bouton actif = blanc
          d.classList.toggle('bg-white/30', i !== index); // bouton inactif = transparent
        });
      }

      // Quand on clique sur un point, on affiche le membre correspondant
      dots.forEach(d => {
        d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto, 10)));
      });

      // Par sécurité, on démarre toujours sur le premier membre
      showSlide(0);
    })();
  </script>
@endsection
