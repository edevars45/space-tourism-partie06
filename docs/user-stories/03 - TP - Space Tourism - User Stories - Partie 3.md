---
created: 2025-09-15T8:20
updated: 2025-09-15T11:48
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 3

Voici un lot de **user stories** pour la **Partie 3 - Tests unitaires des routes (PHPUnit/Laravel)**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Couverture des routes publiques

### US1 - Statuts HTTP attendus (pages clés)  
En tant que **mainteneur**, je veux que **chaque page publique** réponde avec le **statut attendu** afin de garantir la disponibilité.

- _Given_ les routes publiques (Accueil, Destinations, Équipage, Technologies…), _When_ je fais une requête `GET`, _Then_ je reçois `200 OK` et la **vue attendue** est rendue.
    

### US2 - Contenu minimum rendu  
En tant que **mainteneur**, je veux vérifier la **présence d’éléments clés** dans le HTML afin d’attraper les régressions.

- _Given_ une page publique chargée, _When_ j’analyse le HTML, _Then_ j’y trouve le **titre principal** (ex. `<h1>` attendu), des **blocs de contenu** et les **liens de navigation** essentiels.
    

## Epic B - Internationalisation (FR/EN)

### US3 - Routes localisées  
En tant que **visiteur**, je veux accéder aux **versions FR et EN** de chaque page.

- _Given_ `/fr/...` et `/en/...`, _When_ je fais une requête `GET`, _Then_ je reçois `200 OK` et le document a `<html lang="fr|en">` **cohérent**.
    

### US4 - Cohérence de la page au changement de langue  
En tant que **visiteur**, je veux **rester sur la même page** quand je change de langue.

- _Given_ une page FR, _When_ je simule le switch vers EN, _Then_ j’arrive sur l’URL **équivalente** en EN avec le **même contenu traduit**.
    

### US5 - Absence de clés manquantes  
En tant que **mainteneur**, je veux m’assurer qu’aucune **clé de traduction** ne manque.

- _Given_ une page en EN (ou FR), _When_ je parcours le HTML, _Then_ je **ne vois pas** de placeholders de type `translation missing`/`messages.key`.
    

## Epic C - Erreurs & redirections

### US6 - 404 personnalisée  
En tant que **visiteur**, je veux une **404 claire** pour les URLs inexistantes.

- _Given_ une URL inconnue, _When_ je fais `GET`, _Then_ je reçois `404` et la **vue 404** contient un **lien retour** (ex. Accueil).
    

### US7 - Redirections prévues  
En tant que **mainteneur**, je veux vérifier les **redirections** déclarées (si configurées).

- _Given_ une route devant **rediriger** (ex. sans locale, trailing slash, alias), _When_ je fais `GET`, _Then_ je reçois le **statut de redirection** approprié (`301/302`) vers l’URL **cible attendue**.
    

### US8 - Méthodes non autorisées  
En tant que **mainteneur**, je veux des réponses **405** pour les **mauvaises méthodes**.

- _Given_ une route `GET` seulement, _When_ je fais `POST`, _Then_ je reçois `405 Method Not Allowed`.
    

## Epic D - SEO & métadonnées techniques

### US9 - `<title>` et `meta description`  
En tant que **visiteur venant d’un moteur de recherche**, je veux des **titres/meta** pertinents.

- _Given_ chaque page, _When_ je lis l’`<head>`, _Then_ `<title>` est **unique/non vide** et `meta[name="description"]` est **présente**.
    

### US10 - Open Graph / Twitter Cards  
En tant qu’**utilisateur qui partage une page**, je veux un **aperçu riche**.

- _Given_ chaque page, _When_ je lis l’`<head>`, _Then_ les balises **OG/Twitter** essentielles (`og:title`, `og:description`, `og:image`, `og:url`) sont **présentes**.
    

### US11 - Canonical & hreflang  
En tant que **moteur de recherche**, je veux des **URLs propres** et des **alternates** par langue.

- _Given_ FR/EN, _When_ j’inspecte l’`<head>`, _Then_ `link rel="canonical"` existe et des `link rel="alternate" hreflang="fr|en"` **croisés** sont **présents**.
    

## Epic E - Accessibilité (vérifications de base automatisables)

### US12 - Landmarks & structure  
En tant qu’**utilisateur de lecteur d’écran**, je veux une **structure sémantique** détectable.

- _Given_ une page, _When_ je lis le HTML, _Then_ je trouve `header`, `nav`, `main`, `footer` (ou rôles équivalents) et une **hiérarchie de titres** valide (au moins un `h1`).
    

### US13 - Alternatifs aux images  
En tant que **visiteur**, je veux des **descriptions d’images** pertinentes.

- _Given_ les images informatives, _When_ j’analyse le HTML, _Then_ elles ont un attribut `alt` **non vide** (les décoratives peuvent avoir `alt=""`).
    

---

### Definition of Done (Partie 3)

- Couverture des **routes publiques** en **FR** et **EN** : statuts `200`, contenu clé, `<html lang>`.
    
- **404** personnalisée testée ; **redirections** et **405** vérifiées le cas échéant.
    
- **SEO** : présence de `<title>`, `meta description`, **OG/Twitter**, **canonical**, **hreflang**.
    
- **Accessibilité basique** : landmarks, `h1`, `alt` sur les images informatives.
    
- Zéro **clé i18n manquante** visible.
    
- Commits Git **clairs** ajoutant les tests et, si applicable, configuration **CI**.