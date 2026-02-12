# Documentation Anihome

Bienvenue dans la documentation technique du projet **Anihome**.

## 🚀 Vue d'Ensemble
Anihome est un site vitrine et une plateforme d'administration pour la gestion de services animaliers. Le projet est bâti sur une stack moderne et performante garantissant une expérience utilisateur fluide.

### Stack Technique
- **Framework** : Laravel 12
- **Frontend** : Vue 3 + Inertia.js v2
- **Styling** : Tailwind CSS v4
- **Auth** : Laravel Fortify (Headless)

## 📚 Sommaire de la Documentation

1.  **[Architecture](./docs/ARCHITECTURE.md)** : Vue d'ensemble du système, patterns et flux de données.
2.  **[Modèle de Données](./docs/DATABASE.md)** : Schéma des tables et relations.
3.  **[Frontend](./docs/FRONTEND.md)** : Guide sur Vue 3, Inertia, Tailwind et Wayfinder.
4.  **[Développement](./docs/DEVELOPMENT.md)** : Installation, tests et conventions.

## 🛠 État du Projet (Février 2026)

Le projet est en phase finale de développement. Les fonctionnalités CRUD de base (Services, Posts, Photos) sont opérationnelles.

### Prochaines étapes :
*   **Blog (Articles) :**
    *   Intégrer un **éditeur de texte riche (WYSIWYG)** pour les articles, avec gestion de l'insertion d'images dans le contenu.
    *   Ajouter la possibilité d'ajouter une **image d'illustration** (Cover) aux articles.
*   **Services :**
    *   Ajouter la possibilité d'ajouter une **image d'illustration** aux services.
    *   Corriger le fonctionnement du bouton **"Actif/Inactif"** dans l'onglet services.
*   **Album (Photos) :**
    *   Afficher un **aperçu de l'image** après l'upload dans le formulaire d'ajout.
*   **Administration Globale (CRUD) :**
    *   Ajouter la **sélection multiple** sur les tableaux de bord pour permettre la **suppression en masse**.
*   **Qualité :**
    *   Amélioration de la couverture de tests (Feature tests pour l'admin).

---
*Dernière mise à jour : 10/02/2026*
