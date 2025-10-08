{{-- ===========================================================
   PAGE TECHNOLOGY — Partie 05
   - Mobile : image en premier, boutons 1/2/3 horizontaux, texte en dessous
   - Desktop : colonnes, boutons verticaux, image à droite
   - A11y : role="tablist", role="tab", aria-selected
   - Animations : fade entre slides
   =========================================================== --}}

@extends('layouts.app')
@section('title', __('technology.title'))

@section('content')
<section
  class="min-h-screen bg-no-repeat bg-cover bg-center relative overflow-hidden"
  style="background-image: url('{{ asset('images/technology/background-stars.jpg') }}');"
>
  <div class="absolute inset-0 bg-black/45"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-10 lg:px-12 pt-10 md:pt-14 lg:pt-16 pb-10 md:pb-14">
    <h1 class="font-barlow-condensed uppercase text-center md:text-left mb-8 md:mb-12 tracking-[0.25em] text-sm md:text-base text-gray-300">
      <span class="font-bold text-white/70 mr-3">03</span> {{ __('technology.heading') }}
    </h1>

    @php
      // J’utilise la même image si tu n’as que des versions desktop.
      // Si tu as des variantes mobile, remplace 'imgMobile' par le bon chemin.
      $techs = [
        ['key' => 'launch',    'imgDesk' => asset('images/technology/launch-vehicle.jpg'),  'imgMobile' => asset('images/technology/launch-vehicle.jpg')],
        ['key' => 'spaceport', 'imgDesk' => asset('images/technology/spaceport.jpg'),       'imgMobile' => asset('images/technology/spaceport.jpg')],
        ['key' => 'capsule',   'imgDesk' => asset('images/technology/space-capsule.jpg'),   'imgMobile' => asset('images/technology/space-capsule.jpg')],
      ];
    @endphp

    @foreach ($techs as $i => $t)
      <article
        class="tech-slide {{ $i === 0 ? 'opacity-100' : 'opacity-0 hidden' }}
               transition-opacity duration-500 grid md:grid-cols-2 gap-10 lg:gap-14 items-center"
        data-index="{{ $i }}"
        aria-labelledby="tech-title-{{ $i }}">

        {{-- IMAGE : en mobile je la mets en premier, pleine largeur --}}
        <div class="order-1 md:order-2 flex justify-center md:justify-end">
          <img
            src="{{ $t['imgMobile'] }}"
            alt="{{ __('technology.'.$t['key'].'.title') }}"
            class="block md:hidden w-full max-w-[480px] h-auto object-contain mb-6"
          >
          <img
            src="{{ $t['imgDesk'] }}"
            alt="{{ __('technology.'.$t['key'].'.title') }}"
            class="hidden md:block w-80 md:w-96 lg:w-[520px] h-auto object-contain"
          >
        </div>

        {{-- CONTENU + BOUTONS --}}
        <div class="order-2 md:order-1 flex flex-col md:flex-row items-center md:items-start gap-8 md:gap-12">
          {{-- BOUTONS 1/2/3 : horizontaux en mobile, verticaux en desktop --}}
          <div class="flex md:flex-col gap-4 justify-center"
               role="tablist" aria-label="{{ __('technology.title') }}">
            @foreach ($techs as $j => $tech)
              @php $isActive = $j === $i; @endphp
              <button type="button"
                      class="tech-dot h-12 w-12 rounded-full border-2 border-white flex items-center justify-center
                             font-bold text-lg transition
                             {{ $isActive ? 'bg-white text-black' : 'bg-transparent text-white hover:bg-white/20 hover:scale-110' }}"
                      data-goto="{{ $j }}"
                      role="tab"
                      aria-selected="{{ $isActive ? 'true' : 'false' }}"
                      aria-controls="tech-panel-{{ $j }}"
                      aria-label="{{ __('technology.goto_tech') }} {{ $j+1 }}">
                {{ $j+1 }}
              </button>
            @endforeach
          </div>

          {{-- TEXTE --}}
          <div id="tech-panel-{{ $i }}" class="text-center md:text-left">
            <p class="uppercase font-barlow-condensed tracking-widest text-gray-400 mb-2">
              {{ __('technology.'.$t['key'].'.terminology') }}
            </p>
            <h2 id="tech-title-{{ $i }}" class="text-3xl md:text-5xl font-bellefair uppercase mb-4">
              {{ __('technology.'.$t['key'].'.title') }}
            </h2>
            <p class="text-gray-200 leading-relaxed max-w-xl font-barlow">
              {{ __('technology.'.$t['key'].'.desc') }}
            </p>
          </div>
        </div>
      </article>
    @endforeach
  </div>
</section>

{{-- SLIDER --}}
<script>
(function () {
  const slides = Array.from(document.querySelectorAll('.tech-slide'));
  const dots   = Array.from(document.querySelectorAll('.tech-dot'));

  function showSlide(index) {
    slides.forEach((s, i) => {
      if (i === index) {
        s.classList.remove('hidden', 'opacity-0');
        s.classList.add('opacity-100');
      } else {
        s.classList.add('opacity-0');
        // j’attends la fin de la transition avant d’ajouter hidden
        setTimeout(() => s.classList.add('hidden'), 300);
      }
    });

    dots.forEach((d, i) => {
      const active = i === index;
      d.setAttribute('aria-selected', active ? 'true' : 'false');
      d.classList.toggle('bg-white', active);
      d.classList.toggle('text-black', active);
      d.classList.toggle('bg-transparent', !active);
      d.classList.toggle('text-white', !active);
    });
  }

  dots.forEach(d => {
    d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto, 10)));
    d.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        d.click();
      }
    });
  });

  showSlide(0);
})();
</script>
@endsection
