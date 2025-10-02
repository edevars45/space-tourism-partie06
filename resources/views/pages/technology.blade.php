@extends('layouts.app')

@section('title', __('technology.title'))

@section('content')
 <section class="min-h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('images/background-stars.jpg') }}');">
  {{-- Overlay sombre --}}
  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-12 flex flex-col md:grid md:grid-cols-2 gap-12 items-center">

    {{-- Bloc navigation puces --}}
    <div class="flex justify-center md:flex-col gap-4 md:items-start">
      @foreach (['0','1','2'] as $i)
        <button type="button"
          class="tech-dot h-12 w-12 rounded-full border-2 border-white flex items-center justify-center text-white font-bold text-lg
          {{ $i == 0 ? 'bg-white text-black' : 'bg-transparent hover:bg-white/20' }}"
          data-goto="{{ $i }}">
          {{ $i+1 }}
        </button>
      @endforeach
    </div>

    {{-- Slides technologie --}}
    <div id="tech-slider" class="relative text-center md:text-left w-full">
      @php
        $techs = [
          [
            'title' => 'LE LANCEUR',
            'desc'  => "Un lanceur est un véhicule propulsé par fusée utilisé pour transporter une charge utile vers l’espace. Notre fusée WEB-X est la plus puissante en service. Debout à 150m, elle offre un spectacle impressionnant.",
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
      <article class="tech-slide {{ $i === 0 ? '' : 'hidden' }} flex flex-col md:grid md:grid-cols-2 gap-8 items-center" data-index="{{ $i }}">

        {{-- Image (au-dessus en mobile, à droite en desktop) --}}
        <div class="order-1 md:order-2 flex justify-center">
          <img src="{{ $t['img'] }}" alt="{{ $t['title'] }}" class="w-full max-w-sm object-contain">
        </div>

        {{-- Texte --}}
        <div class="order-2 md:order-1">
          <p class="uppercase tracking-widest text-gray-400 mb-2">La terminologie…</p>
          <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">{{ $t['title'] }}</h2>
          <p class="text-gray-200 leading-relaxed max-w-xl mx-auto md:mx-0">{{ $t['desc'] }}</p>
        </div>
      </article>
      @endforeach
    </div>
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
    });
  }

  dots.forEach(d => d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto,10))));
  showSlide(0);
})();
</script>
@endsection
