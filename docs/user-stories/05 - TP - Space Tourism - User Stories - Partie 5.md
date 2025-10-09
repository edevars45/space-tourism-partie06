---
created: 2025-09-15T8:20
updated: 2025-09-15T11:50
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 5

Voici un lot de **user stories** pour la **Partie 5 - Back-office (CRUD « Équipage »)**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Accès & permissions

### US1 - Accès réservé (Breeze + Spatie)  
En tant qu’**administrateur** ou **Gestionnaire Équipage**, je veux accéder au **module Équipage** afin de gérer les membres.

- _Given_ un utilisateur **sans** permission, _When_ il visite `/admin/equipage*`, _Then_ il est **bloqué** (401/403 ou redirigé vers la connexion).
    
- _Given_ un **Administrateur** ou **Gestionnaire Équipage**, _When_ il visite le module, _Then_ l’accès est **autorisé**.
    

## Epic B - Listing & navigation

### US2 - Lister les membres  
En tant qu’**administrateur/gestionnaire**, je veux **voir la liste** des membres pour les administrer.

- _Then_ j’obtiens un **tableau paginé** avec : **nom**, **fonction/grade**, **date de mise à jour**, **ordre d’affichage**, **actions** (Éditer/Supprimer).
    
- _Then_ je peux **rechercher** par nom et **trier** (nom, date, ordre).
    

### US3 - Filtres par fonction  
En tant qu’**administrateur/gestionnaire**, je veux **filtrer** par **fonction/équipe** (ex. Pilote, Ingénieur).

- _Given_ un filtre sélectionné, _Then_ la liste n’affiche **que** les membres correspondants.
    

## Epic C - Création

### US4 - Ajouter un membre  
En tant qu’**administrateur/gestionnaire**, je veux **créer** un membre avec ses informations.

- _When_ je fournis **nom**, **photo**, **fonction/grade**, **biographie/description**, **ordre d’affichage** (optionnel), _Then_ le membre est **enregistré**, un **message de succès** s’affiche et il apparaît dans la liste **et** sur le **site public**.
    

### US5 - Validation serveur  
En tant que **système**, je veux **valider** les saisies pour éviter les erreurs.

- **nom** : requis, longueur max, **unique** par langue (si applicable).
    
- **photo** : requise à la création, formats **jpg/png/webp**, taille max, dimensions minimales.
    
- **fonction** : requise.
    
- **biographie** : requise.
    
- **ordre** : entier positif (facultatif, par défaut en fin de liste).
    
- _Then_ en cas d’erreur, le **422** retourne des **messages clairs**, la saisie est **préservée**.
    

### US6 - Téléversement de la photo  
En tant qu’**administrateur/gestionnaire**, je veux **téléverser** une photo affichée sur le front.

- _Then_ la photo est stockée en **public storage**, l’URL est enregistrée ; des **miniatures** peuvent être générées (option).
    

## Epic D - Édition

### US7 - Modifier un membre  
En tant qu’**administrateur/gestionnaire**, je veux **éditer** les informations d’un membre.

- _Given_ un formulaire pré-rempli, _When_ je sauvegarde, _Then_ les nouvelles données sont **visibles immédiatement** sur le site public.
    

### US8 - Remplacer la photo  
En tant qu’**administrateur/gestionnaire**, je veux **remplacer** la photo d’un membre.

- _When_ j’upload une nouvelle image, _Then_ la **prévisualisation** se met à jour et l’ancienne **n’est plus utilisée** (nettoyage géré).
    

## Epic E - Suppression

### US9 - Supprimer un membre  
En tant qu’**administrateur/gestionnaire**, je veux **supprimer** un membre en toute sécurité.

- _When_ je confirme la suppression, _Then_ le membre **disparaît** du back-office et **n’apparaît plus** sur le site public.
    
- (Option) **Soft delete** activé pour une **restauration** possible.
    

## Epic F - Internationalisation du contenu

### US10 - Champs localisés FR/EN  
En tant qu’**administrateur/gestionnaire**, je veux saisir les **versions FR/EN** des champs texte (nom affiché si différent, biographie).

- _Then_ des **onglets** ou **panneaux** permettent d’éditer chaque langue ; le front affiche la **bonne version** selon la locale.
    

## Epic G - Orchestration front & ordre d’affichage

### US11 - Ordonnancement des membres  
En tant que **visiteur**, je veux voir l’équipage dans un **ordre cohérent**.

- _Then_ le front respecte l’**ordre** configuré (champ ordre ou drag-and-drop optionnel).
    
- _When_ l’ordre change au back-office, _Then_ le **front se met à jour** sans délai (invalidation du cache si présent).
    

## Epic H - Accessibilité, feedback & robustesse

### US12 - Formulaires accessibles  
En tant qu’**utilisateur clavier/lecteur d’écran**, je veux des **formulaires conformes**.

- _Then_ labels associés, **focus visible**, erreurs **liées aux champs**, textes d’aide, annonces ARIA si pertinent.
    

### US13 - Notifications claires  
En tant qu’**administrateur/gestionnaire**, je veux des **messages** de succès/erreur **explicites**.

- _Then_ après chaque action CRUD, un **flash message** confirme l’état ; en cas d’échec, les erreurs sont **énumérées**.
    

### US14 - Journal minimal (option)  
En tant que **mainteneur**, je veux **tracer** les opérations sensibles.

- _Then_ création, modification, suppression sont **journalisées** (utilisateur, horodatage, identifiant).
    

---

### Definition of Done (Partie 5)

- Module **Équipage** accessible uniquement aux **Administrateurs** et **Gestionnaires Équipage** (Breeze + Spatie, middleware/policies en place).
    
- **CRUD complet** : lister (pagination, recherche, tri, filtre), créer, éditer, supprimer (confirmation / soft delete optionnel).
    
- **Validation serveur** robuste ; **upload photo** fonctionnel (formats, taille, stockage public).
    
- **Champs localisés** FR/EN si l’i18n est activée ; restitution correcte côté front.
    
- **Ordre d’affichage** respecté sur le site public ; **répercussion immédiate** des changements (cache non bloquant).
    
- Back-office **accessible** (labels, focus, erreurs liées) ; **feedback** utilisateur clair.
    
- Commits Git **clairs** intégrant le module Équipage.