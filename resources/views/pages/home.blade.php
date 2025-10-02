@extends('layouts.app')

@section('title', __('home.title'))

@section('content')
<section
  class="relative min-h-[calc(100vh-140px)] md:min-h-[80vh] overflow-hidden bg-cover bg-center"
  style="background-image: url('{{ asset('images/background-home.jpg') }}');"
  aria-label="{{ __('home.title') }}"
>
  <div class="absolute inset-0 bg-black/50"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <p class="uppercase tracking-[0.3em] text-gray-300 text-sm md:text-base mb-6">
        {{ __('home.subtitle') }}
      </p>
      <h1 class="font-extrabold leading-none mb-6 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">
        {{ __('home.title') }}
      </h1>
      <p class="text-gray-300 max-w-xl text-sm md:text-base leading-relaxed">
        {{ __('home.description') }}
      </p>
    </div>
    <div class="flex md:justify-end">
      <a href="{{ route('destinations') }}" class="group relative btn-explorer">
        <span>{{ __('home.button') }}</span>
      </a>
    </div>
  </div>
</section>
@endsection
