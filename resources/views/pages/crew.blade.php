{{-- resources/views/pages/crew.blade.php --}}
@extends('layouts.app')

@section('title', __('crew.title'))

@section('content')
  {{-- SECTION avec image de fond + voile sombre pour lisibilité --}}
  <section class="relative bg-cover bg-center py-16"
    style="background-image: url('{{ asset('images/background-crew.jpg') }}');"
    aria-label="{{ __('crew.title') }}">

    <div class="absolute inset-0 bg-black/45"></div>
    {{-- Overlay noir transparent --}}

    <div class="relative z-10 max-w-6xl mx-auto px-6">
      {{-- Titre de la section --}}
      <h1
        class="font-barlow-condensed uppercase text-center md:text-left mb-12 tracking-[0.25em] text-sm md:text-lg text-gray-300">
        <span class="font-bold text-white/70 mr-3">02</span>
        {{ __('crew.heading') }}
      </h1>

      @php
        $members = [
          ['key' => 'commander', 'img' => asset('images/crew/commander.png')],
          ['key' => 'engineer', 'img' => asset('images/crew/engineer.png')],
          ['key' => 'pilot', 'img' => asset('images/crew/pilot.png')],
          ['key' => 'specialist', 'img' => asset('images/crew/specialist.png')],
        ];
      @endphp

      {{-- SLIDES --}}
      <div id="crew-slider" class="relative">
        @foreach ($members as $i => $m)
          @php $key = $m['key']; @endphp

          <article
            class="crew-slide grid md:grid-cols-2 gap-10 items-center md:items-end mb-12 {{ $i === 0 ? '' : 'hidden' }}"
            data-index="{{ $i }}"
            aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">

            {{-- Texte --}}
            <div class="order-2 md:order-1 text-white space-y-4 text-center md:text-left">
              <p class="uppercase font-barlow-condensed tracking-widest text-gray-300 text-sm md:text-base">
                {{ __('crew.' . $key . '.role') }}
              </p>

              <h2 class="text-2xl md:text-4xl font-bellefair uppercase">
                {{ __('crew.' . $key . '.name') }}
              </h2>

              <p class="text-gray-200 leading-relaxed max-w-md mx-auto md:mx-0 font-barlow">
                {{ __('crew.' . $key . '.bio') }}
              </p>
            </div>

            {{-- Image --}}
            <div class="order-1 md:order-2 flex justify-center md:justify-end">
              <img src="{{ $m['img'] }}" alt="{{ __('crew.' . $key . '.alt') }}"
                class="w-56 md:w-80 lg:w-[400px] object-contain drop-shadow-xl"
                loading="lazy">
            </div>
          </article>
        @endforeach
      </div>

      {{-- NAVIGATION --}}
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

  {{-- Script slider --}}
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

      showSlide(0);
    })();
  </script>
@endsection
