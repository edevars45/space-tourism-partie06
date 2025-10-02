{{-- resources/views/components/footer.blade.php --}}
<footer role="contentinfo" class="bg-black/80 text-gray-400 text-sm py-6 mt-12 border-t border-gray-700">
  <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row justify-between items-center gap-4">

    {{-- Logo --}}
    <div class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.png') }}" alt="Space Tourism" class="h-6 w-auto">
      <span class="font-semibold text-white">Space Tourism</span>
    </div>

    {{-- Liens de navigation --}}
    <nav class="flex gap-4" aria-label="{{ __('nav.lang_selector_label') }}">
      <a href="{{ route('home') }}" class="hover:underline">{{ __('nav.home') }}</a>
      <a href="{{ route('destinations') }}" class="hover:underline">{{ __('nav.destinations') }}</a>
      <a href="{{ route('crew') }}" class="hover:underline">{{ __('nav.crew') }}</a>
      <a href="{{ route('technology') }}" class="hover:underline">{{ __('nav.technology') }}</a>
    </nav>

    {{-- Copyright --}}
    <p>&copy; {{ date('Y') }} Space Tourism</p>
  </div>
</footer>
