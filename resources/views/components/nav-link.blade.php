@props(['href', 'active' => false])

@php
  // Lien de base
  $base = 'relative inline-block py-5 text-white/80 hover:text-white transition';
  // Soulignement actif façon maquette
  $underline = $active
      ? 'after:content-[""] after:absolute after:left-0 after:right-0 after:-bottom-1
         after:h-0.5 after:bg-white after:opacity-100'
      : 'after:content-[""] after:absolute after:left-1/2 after:right-1/2 after:-bottom-1
         after:h-0.5 after:bg-white/70 after:opacity-0
         hover:after:left-0 hover:after:right-0 hover:after:opacity-100 after:transition-all';
@endphp

<a {{ $attributes->merge(['href' => $href, 'class' => "$base $underline"]) }}>
  {{ $slot }}
</a>
