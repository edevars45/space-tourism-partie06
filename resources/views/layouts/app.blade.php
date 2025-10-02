{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Space Tourism')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Import Tailwind + JS --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans antialiased">

  {{-- ====================== --}}
  {{-- HEADER GLOBAL --}}
  {{-- ====================== --}}
  <x-header />
  {{--  Ici on appelle le composant header.blade.php --}}

  {{-- ====================== --}}
  {{-- CONTENU PRINCIPAL --}}
  {{-- ====================== --}}
  <main class="min-h-screen pt-20">
    {{-- pt-20 = padding en haut pour éviter que le header chevauche le contenu --}}
    @yield('content')
  </main>

  {{-- ====================== --}}
  {{-- FOOTER GLOBAL --}}
  {{-- ====================== --}}
  <footer class="text-center py-6 text-sm opacity-70 border-t border-gray-700">
    © 2025 Space Tourism
  </footer>

</body>
</html>
