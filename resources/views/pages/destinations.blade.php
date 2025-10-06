@extends('layouts.app')

@section('title', __('destinations.title'))

@section('content')
<section class="min-h-screen bg-cover bg-center"
  style="background-image: url('{{ asset('images/background-destinations.jpg') }}');">

  {{-- Overlay sombre --}}
  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 text-center md:text-left">

    {{-- Titre --}}
    <h1
      class="font-barlow-condensed uppercase text-center md:text-left mb-10 tracking-[0.25em] text-sm md:text-lg text-gray-300">
      <span class="font-bold text-white/70 mr-3">01</span>
      {{ __('destinations.heading') }}
    </h1>

    {{-- Image planète --}}
    <div class="flex justify-center mb-10">
      <img src="{{ asset('images/destinations/' . $planet . '.png') }}"
           alt="{{ __('destinations.' . $planet . '.alt') }}"
           class="w-40 md:w-64 lg:w-80 object-contain drop-shadow-xl">
    </div>

    {{-- Navigation planètes --}}
    <nav class="flex justify-center md:justify-start gap-6 mb-10">
      @foreach (['moon', 'mars', 'europa', 'titan'] as $p)
        <a href="{{ route('destinations.show', $p) }}"
          class="uppercase font-barlow-condensed tracking-widest pb-2 border-b-2
            {{ $planet === $p ? 'border-white text-white' : 'border-transparent text-gray-400 hover:border-gray-300' }}">
          {{ __('destinations.' . $p . '.name') }}
        </a>
      @endforeach
    </nav>

    {{-- Nom planète --}}
    <h2 class="text-[56px] md:text-6xl font-bellefair uppercase mb-6">
      {{ __('destinations.' . $planet . '.name') }}
    </h2>

    {{-- Description --}}
    <p class="text-[#D0D6F9] font-barlow text-[15px] leading-[25px] text-center md:text-left max-w-md mx-auto md:mx-0 mb-10">
      {{ __('destinations.' . $planet . '.description') }}
    </p>

    {{-- Détails --}}
    <div class="flex flex-col md:flex-row justify-center md:justify-start gap-12 border-t border-gray-600 pt-6">
      <div>
        <p class="uppercase font-barlow-condensed text-gray-400 text-sm mb-2">Distance</p>
        <p class="font-bellefair text-2xl">{{ __('destinations.' . $planet . '.distance') }}</p>
      </div>
      <div>
        <p class="uppercase font-barlow-condensed text-gray-400 text-sm mb-2">Durée</p>
        <p class="font-bellefair text-2xl">{{ __('destinations.' . $planet . '.travel') }}</p>
      </div>
    </div>
  </div>

  // {{--Retour à l'acceuil--}}
  <div class="text-center mt-12">
    <a href="{{ route('dashboard') }}"
       class="inline-block bg-white text-black font-barlow-condensed uppercase tracking-widest px-8 py-3 rounded-full hover:bg-gray-200 transition">
       Retour à l’accueil
    </a>
</div>
</section>
@endsection
