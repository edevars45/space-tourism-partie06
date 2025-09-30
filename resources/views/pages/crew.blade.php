@extends('layouts.app')

@section('title', __('crew.title'))

@section('content')
  <h1 class="text-2xl font-bold mb-6">
    {{ __('crew.heading') }}
  </h1>

  {{-- Commander --}}
  <section class="mb-12">
    <p class="uppercase tracking-widest text-sm text-gray-400">{{ __('crew.commander.role') }}</p>
    <h2 class="text-3xl font-semibold">{{ __('crew.commander.name') }}</h2>
    <p class="mt-2 text-gray-300">{{ __('crew.commander.bio') }}</p>
    <img src="{{ asset('images/crew/commander.png') }}" alt="{{ __('crew.commander.alt') }}" class="mt-4 w-72 max-w-full">
  </section>

  {{-- Pilot --}}
  <section class="mb-12">
    <p class="uppercase tracking-widest text-sm text-gray-400">{{ __('crew.pilot.role') }}</p>
    <h2 class="text-3xl font-semibold">{{ __('crew.pilot.name') }}</h2>
    <p class="mt-2 text-gray-300">{{ __('crew.pilot.bio') }}</p>
    <img src="{{ asset('images/crew/pilot.png') }}" alt="{{ __('crew.pilot.alt') }}" class="mt-4 w-72 max-w-full">
  </section>

  {{-- Mission Specialist --}}
  <section class="mb-12">
    <p class="uppercase tracking-widest text-sm text-gray-400">{{ __('crew.specialist.role') }}</p>
    <h2 class="text-3xl font-semibold">{{ __('crew.specialist.name') }}</h2>
    <p class="mt-2 text-gray-300">{{ __('crew.specialist.bio') }}</p>
    <img src="{{ asset('images/crew/specialist.png') }}" alt="{{ __('crew.specialist.alt') }}" class="mt-4 w-72 max-w-full">
  </section>

  {{-- Flight Engineer --}}
  <section class="mb-12">
    <p class="uppercase tracking-widest text-sm text-gray-400">{{ __('crew.engineer.role') }}</p>
    <h2 class="text-3xl font-semibold">{{ __('crew.engineer.name') }}</h2>
    <p class="mt-2 text-gray-300">{{ __('crew.engineer.bio') }}</p>
    <img src="{{ asset('images/crew/engineer.png') }}" alt="{{ __('crew.engineer.alt') }}" class="mt-4 w-72 max-w-full">
  </section>
@endsection
