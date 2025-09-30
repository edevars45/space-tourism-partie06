@extends('layouts.app')

@section('title', 'Accueil — Space Tourism')

@section('content')
  <section class="text-center py-20">
    <h1 class="text-xl tracking-widest text-gray-400">SO, YOU WANT TO TRAVEL TO</h1>
    <h2 class="text-[150px] font-extrabold leading-none">SPACE</h2>
    <p class="mt-6 max-w-xl mx-auto text-lg text-gray-300">
      Let’s face it: if you want to go to space, you might as well genuinely go to outer space
      and not hover kind of on the edge of it. Sit back, and relax because we’ll give you a truly
      out of this world experience!
    </p>
    <div class="mt-12">
      <a href="{{ route('destinations') }}"
         class="inline-block rounded-full bg-white text-black font-bold text-2xl px-12 py-12 hover:scale-105 transition">
        EXPLORE
      </a>
    </div>
  </section>
@endsection
