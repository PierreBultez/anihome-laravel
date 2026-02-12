# Rapport d'Activité - 11 Février 2026

Ce rapport détaille les fonctionnalités implémentées et les correctifs apportés au projet Anihome durant la session de développement.

## 1. Fonctionnalités Implémentées

### 📝 Blog (Actualités)
- **Éditeur WYSIWYG (TipTap)** : Intégration d'un éditeur de texte riche pour la création et l'édition d'articles.
  - Support du formatage (gras, italique, titres, listes, citations, etc.).
  - **Insertion d'images** : Ajout d'un bouton permettant d'uploader une image depuis l'ordinateur. L'image est stockée sur le serveur (`/storage/media/`) et insérée automatiquement dans le contenu.
- **Image de Couverture** : Ajout d'un champ d'upload dédié pour l'image principale de l'article, avec prévisualisation immédiate avant soumission.
- **Affichage Front-end** :
  - Correction des URL d'images pour qu'elles soient relatives et fonctionnelles (`/storage/...`).
  - Utilisation de `v-html` et du plugin `@tailwindcss/typography` (`prose`) pour un rendu correct du contenu riche.
  - Nettoyage des balises HTML pour les extraits dans la liste des articles.

### 🛠 Services
- **Image de Couverture** : Ajout de la fonctionnalité d'upload d'image de couverture pour les services (similaire aux articles).
- **Éditeur Riche** : Adoption du même éditeur WYSIWYG pour la description détaillée des services.
- **Gestion du Statut (Actif/Inactif)** : 
  - Correction du dysfonctionnement du toggle.
  - Ajout d'un switch direct dans le tableau de bord pour activer/désactiver un service sans passer par le formulaire d'édition (requête AJAX partielle).
- **Affichage Front-end** : Ajout de l'image de couverture sur la page de détail d'un service.

### 🖼 Album (Photos)
- **Prévisualisation** : Amélioration de l'expérience utilisateur avec l'affichage d'un aperçu de l'image sélectionnée avant l'upload.

### ⚙️ Administration Globale
- **Suppression en Masse (Bulk Delete)** :
  - Implémentation backend (Controllers & Routes) pour supprimer plusieurs éléments (Services, Articles, Photos) en une seule requête.
  - Mise à jour des interfaces (Index.vue) pour inclure les cases à cocher et le bouton de suppression groupée.
  *(Note : L'interface de sélection multiple rencontre encore des instabilités sur le composant Checkbox de la librairie UI).*

## 2. Améliorations Techniques & Qualité

- **Tests Automatisés** : 
  - Création de `tests/Feature/Admin/PostTest.php` et `tests/Feature/Admin/ServiceTest.php`.
  - Couverture des scénarios CRUD complets, upload d'images, et suppression en masse.
  - Correction de la configuration des tests pour gérer correctement le middleware CSRF.
- **Contrôleurs (Backend)** :
  - Création de `MediaController` pour gérer les uploads d'images WYSIWYG de manière centralisée.
  - Refactorisation des méthodes `update` pour supporter les mises à jour partielles (PATCH) et JSON.
  - Gestion rigoureuse du nettoyage des fichiers : suppression automatique des anciennes images lors d'un remplacement ou de la suppression d'une ressource.

## 3. Correctifs de Bugs

- **Affichage HTML brut** : Résolu en remplaçant l'interpolation de texte `{{ }}` par la directive `v-html` sur les pages de détail.
- **Images 404** : Résolu en préfixant correctement les chemins d'images stockés en base avec `/storage/`.
- **Images WYSIWYG cassées** : Résolu en modifiant le contrôleur d'upload pour renvoyer des chemins relatifs plutôt qu'absolus, évitant les problèmes de domaine (localhost vs production).

---
*Fin du rapport.*
