@extends('layouts.app')

@section('title', __('technology.title'))

@section('content')
<section class="min-h-screen bg-cover bg-center relative"
    style="background-image: url('{{ asset('images/background-stars.jpg') }}');">

  {{-- Overlay sombre --}}
  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-12">
    @php
      $techs = [
        [
          'title' => 'LE LANCEUR',
          'desc'  => "Un lanceur est un véhicule propulsé par fusée utilisé pour transporter une charge utile dans l’espace. Notre fusée WEB-X est la plus puissante en service. Debout à 150m, elle offre un spectacle impressionnant.",
          'img'   => asset('images/technology/launch-vehicle.jpg'),
        ],
        [
          'title' => 'L’ESPACEPORT',
          'desc'  => "L’espaceport est une installation moderne conçue pour accueillir les équipages, préparer les fusées et assurer des missions spatiales dans les meilleures conditions.",
          'img'   => asset('images/technology/spaceport.jpg'),
        ],
        [
          'title' => 'LA CAPSULE SPATIALE',
          'desc'  => "La capsule spatiale est l’endroit où vit et travaille l’équipage. Confort, sécurité et technologies de pointe pour survivre et communiquer dans l’espace.",
          'img'   => asset('images/technology/space-capsule.jpg'),
        ],
      ];
    @endphp

    @foreach ($techs as $i => $t)
    <article
      class="tech-slide {{ $i === 0 ? '' : 'hidden' }} grid md:grid-cols-2 gap-12 items-center min-h-[80vh]"
      data-index="{{ $i }}">

      {{-- Colonne gauche = boutons + texte --}}
      <div class="flex flex-col md:flex-row items-center md:items-start gap-12">

        {{-- Boutons ronds --}}
        <div class="flex md:flex-col gap-4 justify-center">
          @foreach (['0','1','2'] as $j)
            <button type="button"
              class="tech-dot h-12 w-12 rounded-full border-2 border-white flex items-center justify-center font-bold text-lg transition
              {{ $j == $i
                  ? 'bg-white text-black'
                  : 'bg-transparent text-white hover:bg-white/20 hover:scale-110' }}"
              data-goto="{{ $j }}">
              {{ $j+1 }}
            </button>
          @endforeach
        </div>

        {{-- Texte --}}
        <div class="text-center md:text-left flex flex-col justify-center">
          <p class="uppercase tracking-widest text-gray-400 mb-2">La terminologie…</p>
          <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">{{ $t['title'] }}</h2>
          <p class="text-gray-200 leading-relaxed max-w-xl">{{ $t['desc'] }}</p>
        </div>
      </div>

      {{-- Colonne droite = image --}}
      <div class="flex justify-center md:justify-end">
        <img src="{{ $t['img'] }}" alt="{{ $t['title'] }}"
             class="w-72 md:w-96 lg:w-[500px] object-contain">
      </div>
    </article>
    @endforeach
  </div>
</section>

{{-- Script slider --}}
<script>
(function() {
  const slides = document.querySelectorAll('.tech-slide');
  const dots   = document.querySelectorAll('.tech-dot');

  function showSlide(index) {
    slides.forEach((s,i) => s.classList.toggle('hidden', i !== index));
    dots.forEach((d,i) => {
      d.classList.toggle('bg-white', i === index);
      d.classList.toggle('text-black', i === index);
      d.classList.toggle('bg-transparent', i !== index);
      d.classList.toggle('text-white', i !== index);
    });
  }

  dots.forEach(d => d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto,10))));
  showSlide(0);
})();
</script>
@endsection
