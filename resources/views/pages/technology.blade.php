{{-- resources/views/pages/technology.blade.php --}}
@extends('layouts.app')

@section('title', __('technology.title'))

@section('content')
  {{-- Section with background image --}}
  <section class="relative min-h-[calc(100vh-140px)]
                  bg-[url('/images/technology/background-stars.jpg')] bg-cover bg-center">
    {{-- Dark overlay --}}
    <div class="absolute inset-0 bg-black/50"></div>

    {{-- Main content --}}
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-16">

      {{-- Page heading --}}
      <h1 class="text-3xl md:text-4xl font-bold mb-10 text-white text-center">
        {{ __('technology.heading') }}
      </h1>

      @php
        // List of technologies
        $technologies = [
          ['key' => 'capsule',  'img' => asset('images/technology/space-capsule.jpg')],
          ['key' => 'launcher', 'img' => asset('images/technology/launch-vehicle.jpg')],
          ['key' => 'spaceport','img' => asset('images/technology/spaceport.jpg')],
        ];
      @endphp

      {{-- SLIDER --}}
      <div id="tech-slider" class="relative">
        @foreach ($technologies as $i => $t)
          @php $key = $t['key']; @endphp

          <article
            class="tech-slide grid md:grid-cols-2 gap-10 items-center mb-12 {{ $i === 0 ? '' : 'hidden' }}"
            data-index="{{ $i }}"
            aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"
          >
            {{-- Text --}}
            <div class="order-2 md:order-1 text-white">
              <h2 class="text-2xl md:text-3xl font-semibold mb-4">
                {{ __('technology.'.$key.'.name') }}
              </h2>
              <p class="text-gray-200 leading-relaxed">
                {{ __('technology.'.$key.'.description') }}
              </p>
            </div>

            {{-- Image --}}
            <div class="order-1 md:order-2 flex justify-center">
              <img
                src="{{ $t['img'] }}"
                alt="{{ __('technology.'.$key.'.alt') }}"
                class="w-64 md:w-80 object-contain drop-shadow-xl"
                loading="lazy"
              >
            </div>
          </article>
        @endforeach
      </div>

      {{-- Navigation dots --}}
      <div class="flex items-center justify-center gap-3">
        @foreach ($technologies as $i => $t)
          <button
            type="button"
            class="tech-dot h-3 w-3 rounded-full {{ $i===0 ? 'bg-white' : 'bg-white/30 hover:bg-white/60' }}"
            aria-label="@lang('Go to technology') {{ $i + 1 }}"
            aria-controls="tech-slider"
            data-goto="{{ $i }}"
          ></button>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Slider JS --}}
  <script>
    (function () {
      const slides = Array.from(document.querySelectorAll('.tech-slide'));
      const dots   = Array.from(document.querySelectorAll('.tech-dot'));

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
