@extends('layouts.app')
{{-- Hérite du layout principal app.blade.php (header, nav, footer) --}}

@section('title', 'Crew')
{{-- Définit le titre de l’onglet du navigateur --}}

@section('content')
{{-- Le contenu principal de la page sera injecté dans le layout --}}

<section class="relative bg-cover bg-center py-16"
  style="background-image: url('{{ asset('images/background-crew.jpg') }}');"
  aria-label="Équipage">
  {{-- SECTION principale : fond étoilé + image overlay pour le contraste --}}

  <div class="absolute inset-0 bg-black/45"></div>
  {{-- Overlay sombre pour rendre le texte lisible --}}

  <div class="relative z-10 max-w-6xl mx-auto px-6">
    {{-- Conteneur principal centré et responsive --}}

    {{-- Titre principal de la page --}}
    <h1
      class="font-barlow-condensed uppercase text-center md:text-left mb-12 tracking-[0.25em] text-sm md:text-lg text-gray-300">
      <span class="font-bold text-white/70 mr-3">02</span>
      Rencontrez votre équipage
    </h1>

    @php
      // Données du slider : tableau contenant les membres de l’équipage
      $members = [
          [
              'role' => 'Commandant',
              'name' => 'Douglas Hurley',
              'bio' => "Ancien pilote du Corps des Marines et commandant de la mission Demo-2. Il a dirigé l’équipage lors de la première mission habitée vers la Station Spatiale Internationale.",
              'img' => asset('images/crew/commander.png'),
          ],
          [
              'role' => 'Ingénieur de vol',
              'name' => 'Anousheh Ansari',
              'bio' => "Première femme iranienne dans l’espace et première touriste spatiale. Une pionnière passionnée d’exploration et de technologie.",
              'img' => asset('images/crew/engineer.png'),
          ],
          [
              'role' => 'Pilote',
              'name' => 'Victor Glover',
              'bio' => "Pilote expérimenté de la NASA ayant passé plusieurs mois à bord de la Station Spatiale Internationale.",
              'img' => asset('images/crew/pilot.png'),
          ],
          [
              'role' => 'Spécialiste de mission',
              'name' => 'Mark Shuttleworth',
              'bio' => "Entrepreneur sud-africain devenu le premier Africain dans l’espace. Fondateur de Canonical et défenseur du logiciel libre.",
              'img' => asset('images/crew/specialist.png'),
          ],
      ];
    @endphp

    {{-- SLIDER : un seul membre affiché à la fois --}}
    <div id="crew-slider" class="relative">
      @foreach ($members as $i => $m)
        <article
          class="crew-slide grid md:grid-cols-2 gap-10 items-center md:items-end mb-12 {{ $i === 0 ? '' : 'hidden' }}"
          data-index="{{ $i }}">
          {{-- Chaque slide = un membre de l’équipage --}}

          {{-- Colonne gauche : texte descriptif --}}
          <div class="order-2 md:order-1 text-white space-y-4 text-center md:text-left">
            <p class="uppercase font-barlow-condensed tracking-widest text-gray-300 text-sm md:text-base">
              {{ $m['role'] }}
            </p>
            <h2 class="text-2xl md:text-4xl font-bellefair uppercase">
              {{ $m['name'] }}
            </h2>
            <p class="text-gray-200 leading-relaxed max-w-md mx-auto md:mx-0 font-barlow">
              {{ $m['bio'] }}
            </p>
          </div>

          {{-- Colonne droite : image du membre --}}
          <div class="order-1 md:order-2 flex justify-center md:justify-end">
            <img src="{{ $m['img'] }}" alt="{{ $m['name'] }}"
              class="w-56 md:w-80 lg:w-[400px] object-contain drop-shadow-xl"
              loading="lazy">
          </div>
        </article>
      @endforeach
    </div>

    {{-- Points de navigation (sélection du membre affiché) --}}
    <div class="flex items-center justify-center gap-3">
      @foreach ($members as $i => $m)
        <button type="button"
          class="crew-dot h-3 w-3 rounded-full {{ $i === 0 ? 'bg-white' : 'bg-white/30 hover:bg-white/60' }}"
          data-goto="{{ $i }}">
        </button>
      @endforeach
    </div>
  </div>
</section>

{{-- SCRIPT JS pour le slider des membres --}}
<script>
(function () {
  const slides = document.querySelectorAll('.crew-slide');
  const dots = document.querySelectorAll('.crew-dot');

  function showSlide(index) {
    slides.forEach((s, i) => s.classList.toggle('hidden', i !== index));
    dots.forEach((d, i) => {
      d.classList.toggle('bg-white', i === index);
      d.classList.toggle('bg-white/30', i !== index);
    });
  }

  dots.forEach(d =>
    d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto, 10)))
  );

  // Par défaut, on affiche le premier membre
  showSlide(0);
})();
</script>
@endsection
