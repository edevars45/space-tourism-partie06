---
created: 2025-09-15T8:20
updated: 2025-09-15T11:46
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 2

Voici un lot de **user stories** pour la **Partie 2 - Internationalisation (FR/EN)**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Sélecteur de langue & navigation

### US1 - Basculer de FR vers EN (et inversement)  
En tant que **visiteur**, je veux **changer de langue** depuis un sélecteur visible afin de consulter le site en **FR** ou **EN**.

- _Given_ n’importe quelle page, _When_ je choisis **English** ou **Français**, _Then_ la **même page** se recharge dans la **langue sélectionnée** et le sélecteur **indique la langue active**.
    

### US2 - Persistance de la préférence  
En tant que **visiteur récurrent**, je veux que ma **langue préférée** soit **mémorisée**.

- _Given_ j’ai choisi **EN**, _When_ je reviens plus tard, _Then_ le site s’ouvre **directement en EN** sans action supplémentaire.
    

### US3 - Accessibilité du sélecteur  
En tant qu’**utilisateur clavier/lecteur d’écran**, je veux que le sélecteur soit **accessible**.

- _Given_ la page, _When_ je navigue au **clavier**, _Then_ le sélecteur est **focusable**, l’ordre de tabulation est **logique**, et un **libellé explicite** (ARIA) annonce la **langue actuelle** et la **cible**.
    

## Epic B - Contenus & interface localisés

### US4 - Interface traduite  
En tant que **visiteur**, je veux que **tous les libellés d’interface** (menus, boutons, messages) soient **dans la langue choisie**.

- _Given_ EN actif, _Then_ aucun **libellé résiduel en FR** n’apparaît sur les pages publiques.
    

### US5 - Contenus traduits  
En tant que **visiteur**, je veux que les **textes de page** (titres, paragraphes, légendes) existent en **FR** et **EN**.

- _Then_ chaque page dispose de **ses deux versions** et **aucun mélange** FR/EN n’est affiché.
    

### US6 - Formats locaux  
En tant que **visiteur**, je veux voir des **formats adaptés** à la langue (dates, unités, ponctuation).

- _Given_ EN actif, _Then_ les **dates/numéros** s’affichent selon les **conventions anglaises** (si applicables).
    

## Epic C - SEO & métadonnées i18n

### US7 - Balises de langue  
En tant que **moteur de recherche**, je veux que la langue de la page soit **déclarée correctement**.

- _Then_ l’attribut `<html lang="fr|en">` est **cohérent** avec la version affichée.
    

### US8 - Titres/meta/OG localisés  
En tant que **utilisateur provenant d’un moteur de recherche** ou des **réseaux sociaux**, je veux des **titres, descriptions et aperçus** dans la **bonne langue**.

- _Then_ `<title>`, `meta description` et **Open Graph/Twitter Cards** sont **traduites** pour chaque langue.
    

### US9 - Hreflang & URLs par langue  
En tant que **moteur de recherche**, je veux des **URLs distinctes** par langue et des **liens alternates**.

- _Then_ chaque page FR/EN dispose d’URLs **canoniques** (ex. `/fr/...`, `/en/...`) et de `link rel="alternate" hreflang="fr|en"` **croisés**.
    

## Epic D - Routage, redirections & robustesse

### US10 - Accès direct par URL locale  
En tant que **visiteur**, je veux accéder directement à la **bonne langue** via l’URL.

- _Given_ j’ouvre `/en/destinations`, _Then_ j’obtiens la page **EN** correspondante **sans détour**.
    

### US11 - Page courante conservée  
En tant que **visiteur**, je veux **rester sur la même page** quand je change de langue.

- _Given_ je suis sur `/fr/technologies`, _When_ je passe en **EN**, _Then_ j’arrive sur `/en/technologies` **avec le même contenu traduit**.
    

### US12 - Fallback maîtrisé  
En tant que **mainteneur**, je veux un **repli** propre si une **traduction manque**.

- _Given_ une clé manquante en EN, _Then_ la chaîne **bascule sur FR** (ou message neutre), et un **journal** permet d’identifier la **clé absente**.
    

## Epic E - Qualité & non-régression

### US13 - Cohérence globale  
En tant que **responsable produit**, je veux une **cohérence visuelle et UX** du FR/EN.

- _Then_ les **espaces/typographies/ruptures responsive** restent **conformes** à la maquette dans les deux langues.
    

### US14 - Disponibilité du switch partout  
En tant que **visiteur**, je veux pouvoir **changer de langue depuis toute page**.

- _Then_ le sélecteur est **présent globalement** (header/nav) et **fonctionnel**.
    

---

### Definition of Done (Partie 2)

- Sélecteur **visible, accessible** (clavier/ARIA), indiquant la **langue active**, présent **sur toutes les pages**.
    
- **Persistance** de la langue (session et/ou cookie) ; **même page** conservée au switch.
    
- **Tous les libellés et contenus** existent en **FR** et **EN** (zéro mélange).
    
- `<html lang>`, **title/meta/OG** localisés ; **URLs** par langue + `hreflang` croisés.
    
- **Fallback** géré et **journalisé** pour clés manquantes.
    
- Commits Git **clairs** intégrant l’i18n.