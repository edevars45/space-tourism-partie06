{{--
|--------------------------------------------------------------------------
| NAVIGATION PRINCIPALE (layouts/navigation.blade.php)
|--------------------------------------------------------------------------
| Ce fichier gère toute la barre de navigation du site :
| - Liens principaux (Accueil, Équipage, Destinations, Technologies)
| - Profil utilisateur (Breeze)
| - Sélecteur de langue (FR / EN)
| - Version responsive (menu hamburger)
--}}

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 relative z-50">
    {{-- "relative z-50" : empêche les sections de fond de passer au-dessus du menu --}}

    {{-- CONTENEUR PRINCIPAL DU MENU --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- LOGO À GAUCHE --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    {{-- Le logo renvoie vers la page d’accueil --}}
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            {{-- LIENS PRINCIPAUX (grands écrans) --}}
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                {{-- Accueil --}}
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('nav.home') }}
                </x-nav-link>

                {{-- Équipage --}}
                <x-nav-link :href="route('crew')" :active="request()->routeIs('crew')">
                    {{ __('nav.crew') }}
                </x-nav-link>

                {{-- Destinations --}}
                <x-nav-link :href="route('destinations')" :active="request()->routeIs('destinations*')">
                    {{ __('nav.destinations') }}
                </x-nav-link>

                {{-- Technologies --}}
                <x-nav-link :href="route('technology')" :active="request()->routeIs('technology')">
                    {{ __('nav.technology') }}
                </x-nav-link>
            </div>

            {{-- SÉLECTEUR DE LANGUE + MENU UTILISATEUR --}}
            <div class="hidden sm:flex items-center gap-4 sm:ms-6">

                {{-- Sélecteur de langue --}}
                <div class="flex items-center gap-2 text-sm">
                    {{-- Bouton FR --}}
                    <a href="{{ route('lang.switch', 'fr') }}" class="hover:underline {{ app()->getLocale() === 'fr' ? 'font-bold text-blue-600' : 'text-gray-500' }}">
                        🇫🇷 FR
                    </a>

                    {{-- Bouton EN --}}
                    <a href="{{ route('lang.switch', 'en') }}" class="hover:underline {{ app()->getLocale() === 'en' ? 'font-bold text-blue-600' : 'text-gray-500' }}">
                        🇬🇧 EN
                    </a>
                </div>

                {{-- Menu utilisateur Breeze (nom + déconnexion) --}}
                <x-dropdown align="right" width="48">
                    {{-- Bouton du menu utilisateur --}}
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            {{-- Flèche du menu déroulant --}}
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    {{-- Contenu du menu utilisateur --}}
                    <x-slot name="content">
                        {{-- Lien profil --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        {{-- Lien déconnexion --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- MENU HAMBURGER (mobile) --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        {{-- Icône burger (ouverture) --}}
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        {{-- Icône croix (fermeture) --}}
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MENU RESPONSIVE (mobile) --}}
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white border-t border-gray-200">

        {{-- Liens principaux --}}
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('nav.home') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('crew')" :active="request()->routeIs('crew')">
                {{ __('nav.crew') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('destinations')" :active="request()->routeIs('destinations*')">
                {{ __('nav.destinations') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('technology')" :active="request()->routeIs('technology')">
                {{ __('nav.technology') }}
            </x-responsive-nav-link>
        </div>

        {{-- Sélecteur de langue dans le menu mobile --}}
        <div class="px-4 py-2 border-t border-gray-100 flex justify-center gap-4">
            <a href="{{ route('lang.switch', 'fr') }}" class="{{ app()->getLocale() === 'fr' ? 'font-bold text-blue-600' : 'text-gray-500' }}">
                🇫🇷 FR
            </a>
            <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'font-bold text-blue-600' : 'text-gray-500' }}">
                🇬🇧 EN
            </a>
        </div>

        {{-- Infos utilisateur (mobile) --}}
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
