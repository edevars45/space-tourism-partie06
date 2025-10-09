---
created: 2025-09-15T8:20
updated: 2025-09-15T11:52
completed: true
author(s):
  - TL
time: 01:00
chapter: TP - Space Tourism Project - User Stories
type: TP
---

# TP - Space Tourism - User Stories - Partie 7

Voici un lot de **user stories** pour la **Partie 7 - Gestion des utilisateurs & rôles (Breeze + Spatie)**, regroupées par _épics_ avec **critères d’acceptation** (_Given_/_When_/_Then_).

## Epic A - Accès au module & autorisations

### US1 - Accès réservé au module “Utilisateurs”  
En tant qu’**Administrateur**, je veux accéder au **back-office Utilisateurs** afin de gérer les comptes.

- _Given_ un utilisateur **non admin**, _When_ il tente `/admin/users*`, _Then_ il est **bloqué** (403/redirect).
    
- _Given_ un **Administrateur**, _When_ il visite `/admin/users`, _Then_ la **liste** s’affiche.
    

### US2 - Garde-fous d’autorisations  
En tant que **système**, je veux appliquer des **policies/middlewares** pour sécuriser chaque action.

- _Then_ seuls les **Administrateurs** peuvent **créer/éditer/supprimer** des utilisateurs et **gérer les rôles**.
    

## Epic B - Listing & recherche

### US3 - Lister les utilisateurs  
En tant qu’**Administrateur**, je veux **voir la liste** des comptes.

- _Then_ un **tableau paginé** affiche : **nom**, **email**, **rôle(s)**, **dernière mise à jour**, **actions** (Éditer/Supprimer).
    
- _Then_ je peux **rechercher** par nom/email et **trier** (nom, date).
    

### US4 - Filtrer par rôle  
En tant qu’**Administrateur**, je veux **filtrer** les utilisateurs par **rôle** (Admin, Gestionnaire Planètes, Équipage, Technologies).

- _Given_ un filtre sélectionné, _Then_ la liste n’affiche **que** les utilisateurs correspondant.
    

## Epic C - Création

### US5 - Créer un utilisateur  
En tant qu’**Administrateur**, je veux **ajouter** un utilisateur avec **nom**, **email** et **rôle(s)**.

- _When_ je saisis des données **valides** et j’assigne au moins **un rôle**, _Then_ le compte est **créé**, un **message de succès** s’affiche et l’utilisateur apparaît dans la **liste**.
    

### US6 - Règles de validation  
En tant que **système**, je veux **valider** les champs pour éviter les erreurs.

- **email** requis, **format valide**, **unique** ; **nom** requis ; **rôle** requis.
    
- (Mot de passe) soit **généré** et envoyé, soit saisi avec **confirmation** (min 8).
    
- _Then_ en cas d’erreur, retour **422** avec **messages clairs** et **saisie préservée**.
    

### **US7 - Invitation / réinitialisation initiale (option)  
En tant qu’**Administrateur**, je veux **envoyer une invitation** pour que l’utilisateur définisse son **mot de passe** au premier login.

- _When_ je choisis “inviter”, _Then_ l’utilisateur reçoit un **email** avec un **lien sécurisé** et doit définir un **mot de passe** avant d’accéder.
    

## Epic D - Édition

### US8 - Modifier un utilisateur  
En tant qu’**Administrateur**, je veux **éditer** le **nom**, l’**email** et les **rôle(s)**.

- _Given_ un formulaire pré-rempli, _When_ j’enregistre, _Then_ les **nouvelles valeurs** sont sauvegardées et visibles dans la **liste**.
    
- _If_ l’**email** change, _Then_ (option) **vérification email** demandée.
    

### US9 - Réinitialiser le mot de passe  
En tant qu’**Administrateur**, je veux **déclencher** une **réinitialisation** de mot de passe.

- _When_ j’actionne “Réinitialiser”, _Then_ un **email de réinitialisation** est envoyé (ou un **mot de passe temporaire** est généré) et l’utilisateur doit le **modifier** à la prochaine connexion.
    

## Epic E - Suppression & garde-fous

### US10 - Supprimer un utilisateur  
En tant qu’**Administrateur**, je veux **supprimer** un utilisateur en toute sécurité.

- _When_ je confirme la suppression, _Then_ l’utilisateur **disparaît** de la liste et **perd l’accès**.
    
- (Option) **Soft delete** activé pour **restauration** éventuelle.
    

### US11 - Protection “dernier admin” & auto-suppression  
En tant que **système**, je veux empêcher les opérations dangereuses.

- _Then_ on **ne peut pas** supprimer le **dernier Administrateur** du système.
    
- _Then_ un utilisateur **ne peut pas** se **supprimer lui-même** ; un message explicite s’affiche.
    

## Epic F - Rôles & permissions (Spatie)

### US12 - Attribution & modification des rôles  
En tant qu’**Administrateur**, je veux **attribuer** un ou plusieurs rôles :  
**Administrateur**, **Gestionnaire Planètes**, **Gestionnaire Équipage**, **Gestionnaire Technologies**.

- _When_ j’enregistre, _Then_ les **permissions** associées sont **effectives** immédiatement.
    

### US13 - Enforcement transversal  
En tant que **système**, je veux que les **permissions** se reflètent **partout** (Planètes, Équipage, Technologies).

- _Then_ un Gestionnaire **ne peut agir** que sur son **périmètre** ; toute tentative hors périmètre renvoie **403**.
    

## Epic G - UX, accessibilité & feedback

### US14 - Formulaires accessibles  
En tant qu’**utilisateur clavier/lecteur d’écran**, je veux des **formulaires conformes**.

- _Then_ labels associés, champs requis annoncés, **focus visible**, erreurs **liées aux champs**, aides contextuelles.
    

### US15 - Notifications claires  
En tant qu’**Administrateur**, je veux des **messages** de succès/erreur **explicites**.

- _Then_ après création/édition/suppression, un **flash message** confirme l’action ; en cas d’échec, les **erreurs** sont listées.
    

## Epic H - Traçabilité & conformité (option recommandé)

### US16 - Journal d’audit  
En tant que **mainteneur**, je veux **tracer** les opérations sensibles.

- _Then_ création, modification, suppression, changement de rôles sont **journalisés** (qui, quoi, quand).
    

## Epic I - Tests & non-régression (recommandé)

### US17 - Tests d’autorisations & garde-fous  
En tant que **développeur**, je veux des **tests** qui garantissent la sécurité.

- _Then_ les tests couvrent : accès admin-only, **403** pour non-admin, impossibilité de **supprimer le dernier admin** et **auto-suppression**, unicité email, affectation de rôles effective.
    

---

### Definition of Done (Partie 7)

- Module **Utilisateurs** **réservé aux Administrateurs** ; **policies/middlewares** en place.
    
- **CRUD** complet : lister (pagination, recherche, tri, filtres par rôle), **créer**, **éditer**, **supprimer** (confirmation / soft delete optionnel).
    
- **Validation** robuste : email unique, formats valides, mot de passe sécurisé (min 8, confirmé), rôles obligatoires.
    
- **Garde-fous** actifs : impossible de **supprimer le dernier Admin** et de **se supprimer soi-même**.
    
- **Attribution de rôles** (Spatie) opérationnelle ; permissions **effectives** sur tous les modules.
    
- **UX/Accessibilité** : formulaires accessibles, messages de feedback clairs.
    
- (Option) **Invitation / reset** par email ; **journal d’audit** des opérations.
    
- (Recommandé) **Tests** d’autorisations et de garde-fous verts via `php artisan test`.
    
- Commits Git **clairs** intégrant la gestion des utilisateurs et des rôles.