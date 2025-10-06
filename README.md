## Space Tourism - Partie 04
### Description du projet

Ce projet a été développé dans le cadre d’un apprentissage de Laravel et TailwindCSS.
Il s’agit d’une application web inspirée du concept Space Tourism, permettant de découvrir différentes destinations, membres d’équipage et technologies liées à l’exploration spatiale.

Cette quatrième partie du projet se concentre sur :

La gestion de la navigation complète entre les pages.

L’ajout du multilingue (français / anglais).

L’intégration de la page des technologies.

Le perfectionnement du design responsive (desktop, tablette, mobile).

Objectifs pédagogiques

Appliquer les principes du framework Laravel 11.

Comprendre et utiliser le système de routes et de middleware.

Mettre en place un système multilingue (i18n) avec resources/lang.

Créer une interface responsive à l’aide de TailwindCSS.

Gérer la navigation dynamique entre les différentes sections du site.

Technologies utilisées

Laravel 11 – Framework PHP.

Tailwind CSS – Mise en page moderne et responsive.

Blade – Moteur de templates Laravel.

JavaScript – Gestion des sliders et des interactions.

Laravel Breeze – Authentification et gestion des utilisateurs.

i18n Laravel – Système multilingue (fr / en).

Fonctionnalités principales

Navigation entre les pages : Accueil, Équipage, Destinations, Technologies.

Gestion des langues (Français / Anglais) avec middleware SetLocale.

Affichage dynamique des membres d’équipage et des technologies spatiales.

Pages responsives (mobile, tablette, desktop).

Système d’authentification utilisateur via Laravel Breeze.

Structure du projet
app/
 ├── Http/
 │   ├── Controllers/
 │   ├── Middleware/
 │   │   └── SetLocale.php
 │   └── Requests/
 ├── Models/
 └── Providers/

resources/
 ├── lang/
 │   ├── en/
 │   └── fr/
 └── views/
     ├── layouts/
     ├── pages/
     └── components/

routes/
 ├── web.php
 └── auth.php

Installation du projet
1. Cloner le dépôt GitHub
git clone https://github.com/edevars45/space-tourism-partie04.git
cd space-tourism-partie04

2. Installer les dépendances
composer install
npm install

3. Créer le fichier .env
cp .env.example .env


Configurer les paramètres de connexion à la base de données si nécessaire.

4. Générer la clé d’application
php artisan key:generate

5. Lancer le serveur de développement
php artisan serve


Accéder à l’application :
http://127.0.0.1:8000

Changement de langue

Le changement de langue s’effectue via les boutons FR et EN situés dans la barre de navigation.
Le middleware SetLocale stocke la préférence de langue dans la session de l’utilisateur :

// app/Http/Middleware/SetLocale.php
$locale = Session::get('locale', config('app.locale', 'en'));
App::setLocale($locale);


Les fichiers de traduction se trouvent dans :

resources/lang/en/
resources/lang/fr/

Captures d’écran
Accueil

Équipage

Destinations

Technologies

Historique des versions
Partie 01 – Base du projet

Installation de Laravel Breeze.

Création de la page d’accueil et de la structure initiale.

Mise en place du design général avec TailwindCSS.

Partie 02 – Section Destinations

Création du contrôleur DestinationsController.

Gestion dynamique des destinations (Lune, Mars, Europe, Titan).

Affichage du contenu traduit selon la langue active.

Partie 03 – Section Crew

Ajout de la page Équipage avec un système de slider.

Gestion des rôles, noms et biographies des membres d’équipage.

Optimisation des images et du design responsive.

Partie 04 – Section Technologies et Multilingue

Création de la page Technologies avec boutons dynamiques.

Intégration complète du multilingue (FR/EN).

Ajout du middleware SetLocale.

Amélioration de la navigation et du responsive design.

Auteur

Développé par Edevars
Projet de formation – Laravel & TailwindCSS
Partie 04 : Navigation, Multilingue et Technologies spatiales

Licence

Projet réalisé à des fins pédagogiques.
Libre d’utilisation pour l’apprentissage et la démonstration technique.

Commandes Git pour publier le projet

Si tu veux pousser les dernières modifications sur GitHub :

git add .
git commit -m "Finalisation du projet Space Tourism - Partie 04 avec multilingue et navigation complète"
git push origin main
