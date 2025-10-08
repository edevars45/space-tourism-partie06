# Space Tourism — Partie 05

Implémentation du challenge “Space Tourism” (inspiré de Frontend Mentor) avec **Laravel**, **Blade** et **Tailwind CSS**.
Cette partie met l’accent sur la conformité à la maquette, l’internationalisation (FR/EN) et l’accessibilité.

---

## Objectifs fonctionnels

- **Header conforme maquette**
  - Logo à gauche, ligne séparatrice (≥ lg), bloc de navigation translucide à droite
  - Header **fixe** (collé en haut)
  - Menu **burger** uniquement en mobile
  - Soulignement de l’onglet actif

- **Pages publiques**
  - **Home** : fond noir, contenu rapproché du header, CTA rond “Explorer”
  - **Destinations** : 4 planètes (Lune, Mars, Europe, Titan), onglet actif correct
  - **Crew** : liste des membres, avec **fallback i18n** si la BDD est vide
  - **Technology** : 3 technologies (Lanceur, Spaceport, Capsule), slider accessible (1–2–3), images visibles en mobile

- **Internationalisation (FR/EN)**
  - Textes d’interface et contenus dans `lang/fr` et `lang/en`
  - Commutateur de langue global (`/lang/{locale}`)

- **Accessibilité**
  - Attributs ARIA pour les onglets/puces
  - Focus visibles, libellés explicites

- **Responsive design**
  - Mobile, tablette et desktop

---

## Démonstrations (captures à ajouter)
Placer les captures dans `public/screenshots/` puis référencer ici :

- Accueil : `public/screenshots/home.png`
- Destinations : `public/screenshots/destinations.png`
- Technology : `public/screenshots/technology.png`
- Crew : `public/screenshots/crew.png`

---

## Prérequis

- PHP 8.2+
- Composer
- Node.js 18+ et npm
- Base Laravel (Breeze optionnel)
- BDD non obligatoire pour la Partie 05 (Crew sait tomber en i18n)

---

## Installation

### 1) Cloner le dépôt
```bash
git clone https://github.com/edevars45/space-tourism-partie05.git
cd space-tourism-partie05
