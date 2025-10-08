# Space Tourism — Partie 06 (Back-office CRUD « Technologies »)

Implémentation du module d’administration « Technologies » avec **Laravel**, **Blade** et **Tailwind CSS**.
Objectif : permettre aux administrateurs et gestionnaires autorisés de créer, lire, mettre à jour et supprimer des technologies, puis d’alimenter la page publique Technology depuis la base de données.

## Fonctionnalités

- Back-office « Technologies »
  - Lister les technologies (pagination, tri par ordre).
  - Créer une technologie (titre, terminologie, description, image, actif, ordre).
  - Éditer une technologie existante.
  - Supprimer une technologie existante.
- Accès restreint
  - Authentification via Laravel Breeze.
  - Rôles et permissions via Spatie (ex. Admin, Gestionnaire Technologies).
- Intégration front
  - Page publique Technology lisant la BDD (fallback i18n si la table est vide).
  - Affichage des images via `storage:link`.

## Schéma de données proposé

Table `technologies` :
- `id` (PK)
- `title` (string, requis)
- `terminology` (string, optionnel)
- `description` (text, optionnel)
- `image_path` (string, optionnel) – fichier stocké sur le disque `public`
- `is_active` (bool, défaut true)
- `order` (unsignedSmallInteger, défaut 1)
- `timestamps`

## Routage

- Back-office (protégé) :
