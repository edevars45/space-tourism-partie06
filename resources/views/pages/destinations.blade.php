@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
  <h1 class="text-2xl font-bold mb-6">01 DESTINATIONS SPATIALES</h1>

  {{-- Lune --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">LA LUNE</h2>
    <p class="mb-4">La Lune est notre satellite naturel et la première destination historique de l’exploration spatiale.</p>
    <img src="{{ asset('images/destinations/moon.png') }}" alt="Moon" class="w-60">
  </section>

  {{-- Mars --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">MARS</h2>
    <p class="mb-4">Mars est surnommée la planète rouge. Elle représente une destination phare pour les futures missions habitées.</p>
    <img src="{{ asset('images/destinations/mars.png') }}" alt="Mars" class="w-60">
  </section>

  {{-- Europe --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">EUROPA</h2>
    <p class="mb-4">Europa, lune de Jupiter, possède un océan souterrain qui intrigue les scientifiques dans la recherche de vie extraterrestre.</p>
    <img src="{{ asset('images/destinations/europa.png') }}" alt="Europa" class="w-60">
  </section>

  {{-- Titan --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">TITAN</h2>
    <p class="mb-4">Titan, lune de Saturne, est enveloppée d’une atmosphère dense et de mers de méthane liquide.</p>
    <img src="{{ asset('images/destinations/titan.png') }}" alt="Titan" class="w-60">
  </section>
@endsection
