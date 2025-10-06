@extends('layouts.app')

@section('title', __('technology.title'))

@section('content')
<section class="min-h-screen bg-no-repeat bg-cover bg-center relative
  bg-[url('{{ asset('images/technology/background-technology-mobile.jpg') }}')]
  md:bg-[url('{{ asset('images/technology/background-technology-tablet.jpg') }}')]
  lg:bg-[url('{{ asset('images/technology/background-technology-desktop.jpg') }}')]">

  {{-- Overlay sombre --}}
  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-16">
    {{-- Titre --}}
    <h1
      class="font-barlow-condensed uppercase text-center md:text-left mb-12 tracking-[0.25em] text-sm md:text-lg text-gray-300">
      <span class="font-bold text-white/70 mr-3">03</span>
      {{ __('technology.heading') }}
    </h1>

    @php
      $techs = [
        ['key' => 'launch', 'img' => asset('images/technology/launch-vehicle.jpg')],
        ['key' => 'spaceport', 'img' => asset('images/technology/spaceport.jpg')],
        ['key' => 'capsule', 'img' => asset('images/technology/space-capsule.jpg')],
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
            @foreach ($techs as $j => $tech)
              <button type="button"
                class="tech-dot h-12 w-12 rounded-full border-2 border-white flex items-center justify-center font-bold text-lg transition
                {{ $j == $i ? 'bg-white text-black' : 'bg-transparent text-white hover:bg-white/20 hover:scale-110' }}"
                data-goto="{{ $j }}"
                aria-label="{{ __('technology.goto_tech') }} {{ $j+1 }}">
                {{ $j+1 }}
              </button>
            @endforeach
          </div>

          {{-- Texte --}}
          <div class="text-center md:text-left flex flex-col justify-center">
            <p class="uppercase font-barlow-condensed tracking-widest text-gray-400 mb-2">
              {{ __('technology.'.$t['key'].'.terminology') }}
            </p>
            <h2 class="text-3xl md:text-5xl font-bellefair uppercase mb-6">
              {{ __('technology.'.$t['key'].'.title') }}
            </h2>
            <p class="text-gray-200 leading-relaxed max-w-xl font-barlow">
              {{ __('technology.'.$t['key'].'.desc') }}
            </p>
          </div>
        </div>

        {{-- Colonne droite = image --}}
        <div class="flex justify-center md:justify-end">
          <img src="{{ $t['img'] }}" alt="{{ __('technology.'.$t['key'].'.title') }}"
            class="w-72 md:w-96 lg:w-[500px] object-contain">
        </div>
      </article>
    @endforeach
  </div>
</section>

{{-- Script slider --}}
<script>
(function () {
  const slides = document.querySelectorAll('.tech-slide');
  const dots = document.querySelectorAll('.tech-dot');

  function showSlide(index) {
    slides.forEach((s, i) => s.classList.toggle('hidden', i !== index));
    dots.forEach((d, i) => {
      d.classList.toggle('bg-white', i === index);
      d.classList.toggle('text-black', i === index);
      d.classList.toggle('bg-transparent', i !== index);
      d.classList.toggle('text-white', i !== index);
    });
  }

  dots.forEach(d => d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto, 10))));
  showSlide(0);
})();
</script>
@endsection
