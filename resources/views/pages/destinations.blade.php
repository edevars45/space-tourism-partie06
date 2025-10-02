@extends('layouts.app')

@section('title', __('destinations.title'))

@section('content')
  <section class="min-h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('images/background-destinations.jpg') }}');">

    >
    {{-- Overlay sombre pour lisibilité --}}
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 py-16 text-center md:text-left">

      {{-- Titre principal --}}
      <h1 class="uppercase tracking-widest text-gray-300 text-sm md:text-base mb-8">
        01 {{ __('destinations.pick') }}
      </h1>

      {{-- Navigation entre planètes --}}
      <nav class="flex justify-center md:justify-start gap-6 mb-10">
        @foreach (['moon', 'mars', 'europa', 'titan'] as $p)
          <a href="{{ route('destinations.show', $p) }}"
            class="uppercase pb-2 border-b-2 {{ $planet === $p ? 'border-white text-white' : 'border-transparent text-gray-400 hover:border-gray-300' }}">
            {{ __('destinations.' . $p . '.name') }}
          </a>
        @endforeach
      </nav>
      {{-- Image pour les planètes --}}
      <div class="flex justify-center mb-10">
        <img src="{{ asset('images/destinations/' . $planet . '.png') }}" alt="{{ $data['name'] }}"
          class="w-40 md:w-64 lg:w-80 object-contain drop-shadow-xl">
      </div>


      {{-- Infos planète --}}
      <h2 class="text-4xl md:text-6xl font-bold uppercase mb-6">{{ $data['name'] }}</h2>
      <p class="text-gray-200 max-w-xl mx-auto md:mx-0 mb-10">{{ $data['description'] }}</p>

      <div class="flex flex-col md:flex-row justify-center md:justify-start gap-10 border-t border-gray-600 pt-6">
        <div>
          <p class="uppercase text-gray-400 text-sm mb-2">Distance</p>
          <p class="text-2xl font-bold">{{ $data['distance'] }}</p>
        </div>
        <div>
          <p class="uppercase text-gray-400 text-sm mb-2">Durée</p>
          <p class="text-2xl font-bold">{{ $data['travel'] }}</p>
        </div>
      </div>
    </div>
  </section>
@endsection
