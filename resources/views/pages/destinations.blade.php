@extends('layouts.app')

@section('title', __('destinations.title'))

@section('content')
  <h1 class="text-2xl font-bold mb-6">
    {{ __('destinations.heading') }}
  </h1>

  {{-- Moon --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">{{ __('destinations.moon.name') }}</h2>
    <p class="mb-4">{{ __('destinations.moon.description') }}</p>
    <img src="{{ asset('images/destinations/moon.png') }}"
         alt="{{ __('destinations.moon.alt') }}" class="w-60">
  </section>

  {{-- Mars --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">{{ __('destinations.mars.name') }}</h2>
    <p class="mb-4">{{ __('destinations.mars.description') }}</p>
    <img src="{{ asset('images/destinations/mars.png') }}"
         alt="{{ __('destinations.mars.alt') }}" class="w-60">
  </section>

  {{-- Europa --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">{{ __('destinations.europa.name') }}</h2>
    <p class="mb-4">{{ __('destinations.europa.description') }}</p>
    <img src="{{ asset('images/destinations/europa.png') }}"
         alt="{{ __('destinations.europa.alt') }}" class="w-60">
  </section>

  {{-- Titan --}}
  <section class="mb-10">
    <h2 class="text-xl font-semibold">{{ __('destinations.titan.name') }}</h2>
    <p class="mb-4">{{ __('destinations.titan.description') }}</p>
    <img src="{{ asset('images/destinations/titan.png') }}"
         alt="{{ __('destinations.titan.alt') }}" class="w-60">
  </section>
@endsection
