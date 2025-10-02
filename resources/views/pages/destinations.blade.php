{{-- resources/views/pages/destinations.blade.php --}}
@extends('layouts.app')

@section('title', __('destinations.title'))

@section('content')
  {{-- Section avec image de fond --}}
  <section class="relative min-h-[calc(100vh-140px)] bg-cover bg-center"
         style="background-image: url('{{ asset('images/technology/background-stars.jpg') }}');">
    {{-- Overlay sombre --}}
    <div class="absolute inset-0 bg-black/50"></div>

    {{-- Contenu principal --}}
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-16">

      {{-- Titre --}}
      <h1 class="text-3xl md:text-4xl font-bold mb-10 text-white text-center">
        {{ __('destinations.heading') }}
      </h1>

   @php
  $planets = [
    ['key' => 'moon',   'img' => asset('images/destinations/moon.png')],
    ['key' => 'mars',   'img' => asset('images/destinations/mars.png')],
    ['key' => 'europa', 'img' => asset('images/destinations/europa.png')],
    ['key' => 'titan',  'img' => asset('images/destinations/titan.png')],
  ];
@endphp

      {{-- SLIDER --}}
      <div id="planet-slider" class="relative">
        @foreach ($planets as $i => $p)
          @php $key = $p['key']; @endphp
          <article
            class="planet-slide grid md:grid-cols-2 gap-10 items-center mb-12 {{ $i === 0 ? '' : 'hidden' }}"
            data-index="{{ $i }}"
            aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"
          >
            {{-- Image --}}
            <div class="order-1 flex justify-center">
              <img
                src="{{ $p['img'] }}"
                alt="{{ __('destinations.'.$key.'.alt') }}"
                class="w-60 md:w-80 object-contain drop-shadow-xl"
                loading="lazy"
              >
            </div>

            {{-- Texte --}}
            <div class="order-2 text-white">
              <h2 class="text-2xl md:text-3xl font-semibold mb-4 uppercase">
                {{ __('destinations.'.$key.'.name') }}
              </h2>
              <p class="text-gray-200 mb-4 leading-relaxed">
                {{ __('destinations.'.$key.'.description') }}
              </p>
              <p class="text-sm text-gray-300">
                <strong>{{ __('destinations.distance') }} :</strong> {{ __('destinations.'.$key.'.distance') }}
                <br>
                <strong>{{ __('destinations.travel') }} :</strong> {{ __('destinations.'.$key.'.travel') }}
              </p>
            </div>
          </article>
        @endforeach
      </div>

      {{-- Points de navigation --}}
      <div class="flex items-center justify-center gap-3">
        @foreach ($planets as $i => $p)
          <button
            type="button"
            class="planet-dot h-3 w-3 rounded-full {{ $i===0 ? 'bg-white' : 'bg-white/30 hover:bg-white/60' }}"
            aria-label="@lang('Aller à la planète') {{ $i + 1 }}"
            aria-controls="planet-slider"
            data-goto="{{ $i }}"
          ></button>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Script slider --}}
  <script>
    (function () {
      const slides = Array.from(document.querySelectorAll('.planet-slide'));
      const dots   = Array.from(document.querySelectorAll('.planet-dot'));

      function showSlide(index) {
        slides.forEach((s, i) => {
          const active = i === index;
          s.classList.toggle('hidden', !active);
          s.setAttribute('aria-hidden', active ? 'false' : 'true');
        });

        dots.forEach((d, i) => {
          d.classList.toggle('bg-white', i === index);
          d.classList.toggle('bg-white/30', i !== index);
        });
      }

      dots.forEach(d => {
        d.addEventListener('click', () => showSlide(parseInt(d.dataset.goto, 10)));
      });

      showSlide(0);
    })();
  </script>
@endsection
