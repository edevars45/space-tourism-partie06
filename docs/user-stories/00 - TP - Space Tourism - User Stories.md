---
created: 2025-09-11T8:20
updated: 2025-09-15T11:28
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: Cours
---

# Que sont les _user stories_ ?

Les **user stories** sont de courtes descriptions, rédigées du point de vue d’un **utilisateur** (ou d’un rôle), qui expriment un **besoin métier** et la **valeur attendue**. Elles servent à planifier, prioriser et développer de façon incrémentale.

## Forme canonique

**En tant que** _[type d’utilisateur]_  
**je veux** _[objectif, action désirée]_  
**afin de** _[valeur métier / bénéfice]_.

Par exemple, dans le contexte du projet Space Tourism :

> En tant que **visiteur**, je veux **naviguer entre les pages via un menu**, afin de **trouver rapidement l’information**.

## Critères d’acceptation

Des conditions vérifiables qui définissent quand la story est « faite ».  
Souvent exprimés en **Given / When / Then** (_Étant donné / Quand / Alors_).

Par exemple :

- **Étant donné** le site chargé, **quand** je clique sur « Destinations », **alors** la page Destinations s’affiche et le lien de menu est marqué comme actif.
    

## Bonnes pratiques (INVEST)

- **I**ndépendante : limite les dépendances.
- **N**égociable : détail à affiner en discussion.
- **V**aleur : bénéfice clair pour l’utilisateur.
- **E**stimable : taille/complexité évaluables.
- **S**imple (Small) : assez petite pour tenir dans un sprint.
- **T**estable : critères mesurables.

## Autour des user stories

- **Épics** : grands thèmes regroupant plusieurs stories.
- **Tâches** : travaux techniques pour réaliser une story (dev, tests, UI…).
- **Definition of Ready (DoR)** : ce qu’il faut pour démarrer (story claire, critères définis).
- **Definition of Done (DoD)** : ce qui signifie « terminé » (tests passés, revues, accessibilité/SEO respectés, etc.).
- **Priorisation** : on trie selon la valeur, le risque et la dépendance.

## Erreurs fréquentes

Voici une liste d'erreur à éviter :

- Parler de **solution technique** plutôt que de **besoin utilisateur**.
- Stories **trop grosses** (épics déguisés).
- **Pas** de critères d’acceptation → imprécisions et rework.
- Oublier **accessibilité**, **SEO** ou **responsive** dans les critères.

En résumé, une user story décrit **qui** a besoin de **quoi** et **pourquoi**, puis fixe **comment vérifier** que le besoin est réellement satisfait.
