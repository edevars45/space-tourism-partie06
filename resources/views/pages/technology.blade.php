@extends('layouts.app')

@section('title', 'Technologies')

@section('content')
  <h1 class="text-2xl font-bold mb-6">03 TECHNOLOGIES DE LANCEMENT SPATIAL</h1>

  <section class="mb-10">
    <h2 class="text-xl font-semibold">LANCEUR</h2>
    <p class="mb-4">Le lanceur spatial est une fusée utilisée pour transporter une charge utile depuis la surface de la Terre jusque dans l’espace. C’est la première étape de tout voyage spatial.</p>
   <img src="{{ asset('images/technology/launch-vehicle.jpg') }}" alt="Launch Vehicle">
  </section>

  <section class="mb-10">
    <h2 class="text-xl font-semibold">BASE DE LANCEMENT</h2>
    <p class="mb-4">Un spaceport fonctionne comme un aéroport mais pour les fusées. C’est le lieu d’où partent et reviennent les missions spatiales.</p>
    <img src="{{ asset('images/technology/spaceport.jpg') }}" alt="Spaceport">
  </section>

  <section class="mb-10">
    <h2 class="text-xl font-semibold">CAPSULE SPATIALE</h2>
    <p class="mb-4">Une capsule spatiale est utilisée pour transporter l’équipage dans l’espace et les ramener sur Terre en toute sécurité.</p>
    <img src="{{ asset('images/technology/capsule.jpg') }}" alt="Capsule Spatiale">
  </section>
@endsection
