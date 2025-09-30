@extends('layouts.app')

@section('title', __('home.title'))

@section('content')
  {{-- Section Hero --}}
  <section
    class="relative min-h-[calc(100vh-140px)] md:min-h-[80vh] overflow-hidden rounded-xl
           bg-[url('/images/background-home.jpg')] bg-cover bg-center"
    aria-label="{{ __('home.title') }}"
  >
    {{-- Overlay pour contraste --}}
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <p class="uppercase tracking-[0.3em] text-gray-300 text-sm md:text-base mb-6">
          {{ __('home.subtitle') }}
        </p>

        <h1 class="font-extrabold leading-none mb-6
                   text-5xl sm:text-6xl md:text-7xl lg:text-8xl">
          {{ __('home.title') }}
        </h1>

        <p class="text-gray-300 max-w-xl text-sm md:text-base leading-relaxed">
          {{ __('home.description') }}
        </p>
      </div>

      {{-- Bouton Explorer --}}
      <div class="flex md:justify-end">
        <a href="{{ route('destinations') }}"
           class="group relative btn-explorer focus-visible:ring-white/80"
           aria-label="{{ __('home.button') }}">
          <span>{{ __('home.button') }}</span>
          <span class="absolute inset-0 rounded-full scale-0 group-hover:scale-110 transition-transform duration-300
                        ring-0 group-hover:ring-8 ring-white/20"></span>
        </a>
      </div>
    </div>
  </section>
@endsection
