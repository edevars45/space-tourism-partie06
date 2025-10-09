---
created: 2025-09-15T8:20
updated: 2025-09-15T11:49
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 4

Voici un lot de **user stories** pour la **Partie 4 - Back-office (CRUD « Planètes ») avec Breeze & Spatie**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Authentification & contrôle d’accès

### US1 - Connexion (Breeze)  
En tant qu’**administrateur**, je veux **me connecter** pour accéder au back-office.

- _Given_ un compte admin valide, _When_ je saisis mes identifiants, _Then_ je suis **authentifié** et redirigé vers le **dashboard**.
    
- _Given_ des identifiants invalides, _Then_ un **message d’erreur** clair s’affiche sans divulguer d’information sensible.
    

### US2 - Accès restreint au back-office  
En tant que **système**, je veux **empêcher les non-autorisés** d’accéder au back-office.

- _Given_ un utilisateur non connecté ou sans permission, _When_ il tente `/admin/*`, _Then_ il reçoit **401/403** ou est **redirigé** vers la page de connexion.
    

### US3 - Rôles & permissions (Spatie)  
En tant qu’**administrateur**, je veux que seuls les profils autorisés puissent **gérer les planètes**.

- _Then_ le rôle **Administrateur** (et/ou **Gestionnaire Planètes**) possède les permissions **créer/lire/mettre à jour/supprimer** des planètes.
    
- _Then_ les **middlewares/policies** bloquent toute action hors périmètre.
    

## Epic B - Listing & navigation de gestion

### US4 - Lister les planètes  
En tant qu’**administrateur**, je veux **voir la liste** des planètes pour en gérer le contenu.

- _Then_ j’affiche un **tableau paginé** avec **nom**, **distance**, **durée**, **date de maj**, **actions** (Éditer/Supprimer).
    
- _Then_ je peux **rechercher** par nom et **trier** (nom/date).
    

### US5 - Accès rapide aux actions  
En tant qu’**administrateur**, je veux des **actions visibles** dans la liste.

- _Given_ la ligne d’une planète, _When_ je clique **Éditer** ou **Supprimer**, _Then_ je suis redirigé vers le **formulaire** d’édition ou un **dialogue de confirmation**.
    

## Epic C - Création

### US6 - Créer une planète  
En tant qu’**administrateur**, je veux **ajouter** une planète avec ses informations.

- _When_ je fournis **nom**, **image**, **description**, **distance**, **durée**, _Then_ la planète est **enregistrée**, un **message de succès** s’affiche et elle **apparaît** dans la liste et sur le **site public**.
    

### US7 - Validation serveur  
En tant que **système**, je veux **valider** les champs pour éviter les erreurs.

- **nom** : requis, longueur max raisonnable, **unique**.
    
- **image** : fichier requis (création), formats **jpg/png/webp**, taille max, dimensions minimales.
    
- **description** : requise.
    
- **distance** / **durée** : **numériques** positives (unité documentée).
    
- _Then_ en cas d’erreur, le **422** retourne des **messages clairs** et le formulaire est **pré-rempli**.
    

### US8 - Téléversement d’image  
En tant qu’**administrateur**, je veux **téléverser** une image qui s’affiche sur le site.

- _Then_ l’image est stockée en **public storage**, un **chemin** est enregistré, et l’image **s’affiche** sur la page Destinations.
    
- (Option) _Then_ des **miniatures** peuvent être générées pour le front.
    

## Epic D - Édition

### US9 - Modifier une planète  
En tant qu’**administrateur**, je veux **mettre à jour** les informations d’une planète.

- _Given_ un formulaire pré-rempli, _When_ je change des champs et **enregistre**, _Then_ les **nouvelles valeurs** sont visibles **immédiatement** sur le site public.
    

### US10 - Remplacer l’image  
En tant qu’**administrateur**, je veux **remplacer** l’image d’une planète.

- _When_ je téléverse un nouveau fichier, _Then_ la **prévisualisation** se met à jour et l’ancienne image n’est plus utilisée (nettoyage géré).
    

## Epic E - Suppression

### US11 - Supprimer une planète  
En tant qu’**administrateur**, je veux **supprimer** une planète en toute sécurité.

- _When_ je confirme la suppression, _Then_ la planète **disparaît** de la liste back-office et **n’apparaît plus** sur le site public.
    
- (Option) **Soft delete** activable pour récupération éventuelle.
    

## Epic F - Internationalisation du contenu (si applicable)

### US12 - Champs localisés FR/EN  
En tant qu’**administrateur**, je veux **saisir les versions FR/EN** des champs texte.

- _Then_ **nom** et **description** disposent de **panneaux ou onglets** FR/EN et les versions s’affichent dans la langue choisie côté public.
    

## Epic G - Cohérence front & fraîcheur des données

### US13 - Répercussion immédiate  
En tant que **visiteur**, je veux **voir les mises à jour** sans délai.

- _When_ une planète est créée/modifiée/supprimée, _Then_ les pages publiques **reflètent immédiatement** le changement (ex. **invalidation du cache** ou absence de cache bloquant).
    

## Epic H - Qualité, accessibilité & feedback

### US14 - Accessibilité back-office  
En tant qu’**utilisateur clavier/lecteur d’écran**, je veux des **formulaires accessibles**.

- _Then_ labels associés, champs requis annoncés, **focus visible**, messages d’erreur **liés aux champs**, annonces ARIA si nécessaire.
    

### US15 - Notifications & états  
En tant qu’**administrateur**, je veux des **messages de succès/erreur** explicites.

- _Then_ après chaque action CRUD, un **flash message** confirme l’état ; en cas d’échec, les **erreurs** sont listées et le **formulaire** conserve la saisie.
    

### US16 - Journal minimal (option)  
En tant que **mainteneur**, je veux une **traçabilité** basique.

- _Then_ création, mise à jour et suppression sont **journalisées** (utilisateur, horodatage, identifiant de la planète).
    

---

### Definition of Done (Partie 4)

- **Breeze** installé/configuré ; **Spatie** installé, rôles/permissions définis et appliqués (**middleware/policies**).
    
- Back-office **protégé** (401/403/redirection) ; accès CRUD réservé aux **autorisés**.
    
- **CRUD complet** « Planètes » avec **validation serveur**, upload d’**image**, messages de **feedback**.
    
- Les changements sont **visibles immédiatement** côté public (cache **invalidé** si présent).
    
- (Si i18n activée) champs **FR/EN** disponibles et correctement restitués sur le front.
    
- **Accessibilité** minimale respectée (labels, focus, erreurs associées).
    
- Commits Git **clairs** intégrant auth, permissions et le module Planètes.