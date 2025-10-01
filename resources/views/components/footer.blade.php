{{-- resources/views/components/footer.blade.php --}}
<footer role="contentinfo" class="bg-black/80 backdrop-blur border-t border-gray-700 mt-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-400 text-sm flex flex-col sm:flex-row items-center justify-between gap-4">

    {{-- Logo + texte --}}
    <div class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.jpg') }}" alt="Space Tourism" class="h-6 w-auto">
      <span class="font-semibold text-white">Space Tourism</span>
    </div>

    {{-- Liens du footer --}}
    <nav aria-label="Navigation pied de page" class="flex items-center gap-4">
      <a href="{{ route('home') }}" class="hover:underline">{{ __('nav.home') }}</a>
      <a href="{{ route('destinations') }}" class="hover:underline">{{ __('nav.destinations') }}</a>
      <a href="{{ route('crew') }}" class="hover:underline">{{ __('nav.crew') }}</a>
      <a href="{{ route('technology') }}" class="hover:underline">{{ __('nav.technology') }}</a>
    </nav>

    {{-- Copyright --}}
    <p class="text-gray-500">&copy; {{ date('Y') }} Space Tourism. All rights reserved.</p>
  </div>
</footer>
