---
created: 2025-09-15T8:20
updated: 2025-09-15T11:51
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 6

Voici un lot de **user stories** pour la **Partie 6 - Back-office (CRUD « Technologies »)**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Accès & permissions

### US1 - Accès réservé (Breeze + Spatie)  
En tant qu’**Administrateur** ou **Gestionnaire Technologies**, je veux accéder au **module Technologies** afin de gérer les technologies.

- _Given_ un utilisateur **sans** permission, _When_ il visite `/admin/technologies*`, _Then_ il est **bloqué** (401/403 ou redirigé vers la connexion).
    
- _Given_ un **Administrateur** ou **Gestionnaire Technologies**, _When_ il visite le module, _Then_ l’accès est **autorisé**.
    

### US2 - Politiques d’autorisations  
En tant que **système**, je veux appliquer des **policies/middlewares** pour chaque action CRUD.

- _Then_ seules les personnes habilitées peuvent **créer**, **lire**, **mettre à jour**, **supprimer** des technologies.
    

## Epic B - Listing & navigation

### US3 - Lister les technologies  
En tant qu’**administrateur/gestionnaire**, je veux **voir la liste** des technologies.

- _Then_ un **tableau paginé** affiche : **nom**, **date de mise à jour**, (option) **catégorie**, **ordre d’affichage**, **actions** Éditer/Supprimer.
    
- _Then_ je peux **rechercher** par nom et **trier** (nom/date).
    

### US4 - Filtres (option)  
En tant qu’**administrateur/gestionnaire**, je veux **filtrer** par **catégorie** ou **statut**.

- _Given_ un filtre actif, _Then_ la liste montre **uniquement** les éléments correspondants.
    

## Epic C - Création

### US5 - Créer une technologie  
En tant qu’**administrateur/gestionnaire**, je veux **ajouter** une technologie avec ses informations.

- _When_ je renseigne **nom**, **visuel (image)**, **description**, (option) **catégorie** et **ordre**, _Then_ l’élément est **enregistré**, un **message de succès** s’affiche et il apparaît **dans la liste** et **sur le site public**.
    

### US6 - Validation serveur  
En tant que **système**, je veux **valider** les champs pour éviter les erreurs.

- **nom** : requis, longueur max raisonnable, **unique**.
    
- **image** : requise à la création, formats **jpg/png/webp**, taille max, dimensions mini.
    
- **description** : requise.
    
- **ordre** : entier positif (facultatif).
    
- _Then_ en cas d’erreur, retour **422** avec **messages clairs** et **saisie préservée**.
    

### US7 - Upload du visuel  
En tant qu’**administrateur/gestionnaire**, je veux **téléverser** un visuel qui s’affiche sur le front.

- _Then_ l’image est stockée en **public storage**, l’URL/chemin est enregistré ; (option) génération de **miniatures**.
    

## Epic D - Édition

### US8 - Éditer une technologie  
En tant qu’**administrateur/gestionnaire**, je veux **modifier** les informations d’une technologie.

- _Given_ un formulaire pré-rempli, _When_ j’enregistre, _Then_ les nouvelles valeurs sont **visibles immédiatement** sur le site public.
    

### US9 - Remplacer le visuel  
En tant qu’**administrateur/gestionnaire**, je veux **remplacer** l’image d’une technologie.

- _When_ j’upload un nouveau fichier, _Then_ la **prévisualisation** se met à jour et l’ancienne image **n’est plus utilisée** (nettoyage géré).
    

## Epic E - Suppression

### US10 - Supprimer une technologie  
En tant qu’**administrateur/gestionnaire**, je veux **supprimer** une technologie en toute sécurité.

- _When_ je confirme la suppression, _Then_ l’élément **disparaît** du back-office et **n’apparaît plus** sur le site public.
    
- (Option) **Soft delete** activé pour une **restauration** possible.
    

## Epic F - Internationalisation du contenu

### US11 - Champs localisés FR/EN  
En tant qu’**administrateur/gestionnaire**, je veux saisir les **versions FR/EN** des champs texte (nom affiché si différent, description).

- _Then_ des **onglets/panneaux** permettent d’éditer chaque langue ; le front affiche la **bonne version** selon la locale.
    

## Epic G - Orchestration front & ordre d’affichage

### US12 - Ordonnancement des technologies  
En tant que **visiteur**, je veux voir les technologies dans un **ordre cohérent**.

- _Then_ le front respecte l’**ordre** défini ; _When_ l’ordre change au back-office, _Then_ le **front se met à jour** sans délai (invalidation de cache si présent).
    

### US13 - Répercussion immédiate  
En tant que **visiteur**, je veux **voir les mises à jour** sans attendre.

- _When_ une technologie est créée/modifiée/supprimée, _Then_ la page publique **reflète immédiatement** le changement.
    

## Epic H - Accessibilité, feedback & robustesse

### US14 - Formulaires accessibles  
En tant qu’**utilisateur clavier/lecteur d’écran**, je veux des **formulaires conformes**.

- _Then_ labels associés, **focus visible**, erreurs **liées aux champs**, textes d’aide, annonces ARIA si pertinent.
    

### US15 - Notifications claires  
En tant qu’**administrateur/gestionnaire**, je veux des **messages** de succès/erreur **explicites**.

- _Then_ après chaque action CRUD, un **flash message** confirme l’état ; en cas d’échec, les erreurs sont **listées**.
    

### US16 - Journal minimal (option)  
En tant que **mainteneur**, je veux **tracer** les opérations sensibles.

- _Then_ création, modification, suppression sont **journalisées** (utilisateur, horodatage, identifiant).
    

## Epic I - Tests & non-régression (option mais recommandé)

### US17 - Tests feature CRUD  
En tant que **développeur**, je veux des **tests** couvrant l’accès, la validation et les opérations CRUD.

- _Then_ `php artisan test` vérifie statuts, redirections, erreurs de validation, autorisations.
    

---

### Definition of Done (Partie 6)

- Module **Technologies** accessible uniquement aux **Administrateurs** et **Gestionnaires Technologies** (Breeze + Spatie, **middleware/policies** en place).
    
- **CRUD complet** : lister (pagination, recherche, tri, filtres), créer, éditer, supprimer (confirmation / **soft delete** optionnel).
    
- **Validation serveur** robuste ; **upload** d’image fonctionnel (formats, taille, stockage public).
    
- **Champs localisés** FR/EN si l’i18n est activée ; restitution correcte côté front.
    
- **Ordre d’affichage** respecté ; **répercussion immédiate** des mises à jour (cache non bloquant).
    
- Back-office **accessible** (labels, focus, erreurs liées) ; **feedback** utilisateur clair.
    
- (Recommandé) **Tests** de non-régression pour le module.
    
- Commits Git **clairs** intégrant le module « Technologies ».