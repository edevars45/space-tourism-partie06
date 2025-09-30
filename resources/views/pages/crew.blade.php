@extends('layouts.app')

@section('title', 'Équipage — Space Tourism')

@section('content')
  <section class="text-center">
    <h1 class="uppercase tracking-widest text-gray-400 text-lg mb-10">
      02 Rencontre ton équipage
    </h1>

    {{-- Commander — Douglas Hurley --}}
    <div class="flex flex-col-reverse md:flex-row items-center justify-center gap-16 mb-24">
      <div class="flex-1 text-left">
        <h2 class="uppercase text-gray-400 text-xl">Commandant</h2>
        <h3 class="text-5xl font-bold uppercase">Douglas Hurley</h3>
        <p class="mt-6 text-lg text-gray-300 max-w-md">
          Douglas Gerald Hurley est un ingénieur américain, ancien pilote des Marines
          et ancien astronaute de la NASA. Il a commandé Crew Dragon Demo-2,
          marquant une étape clef des vols habités commerciaux.
        </p>
        <div class="mt-8 flex gap-3">
          <span class="w-3 h-3 rounded-full bg-white inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
        </div>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/crew/commander.png') }}" alt="Douglas Hurley" class="h-96 object-contain">
      </div>
    </div>

    {{-- Pilot — Victor Glover --}}
    <div class="flex flex-col-reverse md:flex-row items-center justify-center gap-16 mb-24">
      <div class="flex-1 text-left">
        <h2 class="uppercase text-gray-400 text-xl">Pilote</h2>
        <h3 class="text-5xl font-bold uppercase">Victor Glover</h3>
        <p class="mt-6 text-lg text-gray-300 max-w-md">
          Victor Glover est pilote de la NASA et ancien commandant de l’US Navy.
          Il fut le premier Afro-Américain à effectuer une mission de longue durée
          à bord de la Station spatiale internationale.
        </p>
        <div class="mt-8 flex gap-3">
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-white inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
        </div>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/crew/pilot.png') }}" alt="Victor Glover" class="h-96 object-contain">
      </div>
    </div>

    {{-- Engineer — Anousheh Ansari --}}
    <div class="flex flex-col-reverse md:flex-row items-center justify-center gap-16 mb-24">
      <div class="flex-1 text-left">
        <h2 class="uppercase text-gray-400 text-xl">Ingénieure</h2>
        <h3 class="text-5xl font-bold uppercase">Anousheh Ansari</h3>
        <p class="mt-6 text-lg text-gray-300 max-w-md">
          Anousheh Ansari est une ingénieure et entrepreneuse irano-américaine,
          première femme à financer elle-même son voyage spatial et première femme
          musulmane dans l’espace.
        </p>
        <div class="mt-8 flex gap-3">
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-white inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
        </div>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/crew/engineer.png') }}" alt="Anousheh Ansari" class="h-96 object-contain">
      </div>
    </div>

    {{-- Specialist — Mark Shuttleworth --}}
    <div class="flex flex-col-reverse md:flex-row items-center justify-center gap-16">
      <div class="flex-1 text-left">
        <h2 class="uppercase text-gray-400 text-xl">Spécialiste</h2>
        <h3 class="text-5xl font-bold uppercase">Mark Shuttleworth</h3>
        <p class="mt-6 text-lg text-gray-300 max-w-md">
          Mark Shuttleworth est un entrepreneur sud-africain, premier touriste spatial africain,
          fondateur de Canonical et créateur d’Ubuntu.
        </p>
        <div class="mt-8 flex gap-3">
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-gray-500 inline-block"></span>
          <span class="w-3 h-3 rounded-full bg-white inline-block"></span>
        </div>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/crew/specialist.png') }}" alt="Mark Shuttleworth" class="h-96 object-contain">
      </div>
    </div>
  </section>
@endsection
