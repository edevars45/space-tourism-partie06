<header class="bg-white/80 backdrop-blur border-b border-gray-200">
  <div class="max-w-6xl mx-auto flex items-center justify-between p-4">
    {{-- Logo (remplace /assets/logo.svg par ton fichier) --}}
    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.jpg') }}" alt="Space Tourism" class="h-8 w-auto">
      <span class="font-semibold">Space Tourism</span>
    </a>

    {{-- Navigation principale --}}
    <nav aria-label="@lang('Navigation principale')" class="hidden sm:flex items-center gap-6">
      <a class="hover:underline" href="{{ route('home', ['locale'=>app()->getLocale()]) }}">@lang('Accueil')</a>
      <a class="hover:underline" href="{{ route('destinations.index', ['locale'=>app()->getLocale()]) }}">@lang('Destinations')</a>
      <a class="hover:underline" href="{{ route('crew.index', ['locale'=>app()->getLocale()]) }}">@lang('Équipage')</a>
      <a class="hover:underline" href="{{ route('technology.index', ['locale'=>app()->getLocale()]) }}">@lang('Technologies')</a>
    </nav>

    {{-- Sélecteur de langue (FR/EN) --}}
    <div class="flex items-center gap-2" aria-label="@lang('Changer de langue')">
      @php
        $current = app()->getLocale();
        $params = \Illuminate\Support\Facades\Route::current()?->parameters() ?? [];
        // On essaie de rester sur la même page lors du switch
        $routeName = \Illuminate\Support\Facades\Route::currentRouteName() ?? 'home';
      @endphp

      <a class="px-2 py-1 rounded {{ $current==='fr' ? 'font-semibold underline' : 'hover:underline' }}"
         href="{{ route($routeName, array_merge($params, ['locale' => 'fr'])) }}">FR</a>
      <span class="text-gray-400">|</span>
      <a class="px-2 py-1 rounded {{ $current==='en' ? 'font-semibold underline' : 'hover:underline' }}"
         href="{{ route($routeName, array_merge($params, ['locale' => 'en'])) }}">EN</a>
    </div>
  </div>
</header>
