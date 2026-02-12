# Architecture Technique - Anihome

Ce document détaille les choix architecturaux et la structure globale du projet Anihome.

## 1. Vue d'Ensemble
Anihome est une application web moderne utilisant une architecture monolithique avec un frontend découplé via **Inertia.js**.

- **Backend** : Laravel 12 (PHP 8.4)
- **Frontend** : Vue 3 (Composition API) avec Inertia.js v2
- **Communication** : Inertia.js (XHR/JSON) - Pas d'API REST traditionnelle nécessaire pour le frontend interne.

## 2. Paradigmes et Patterns

### Monolithe "Single-page App"
Le projet utilise Inertia.js pour offrir l'expérience utilisateur d'une SPA (Single Page Application) sans la complexité d'une API séparée. Laravel gère le routing, la validation et l'accès aux données, tandis que Vue gère l'affichage et l'interactivité.

### Authentification Headless (Fortify)
Nous utilisons **Laravel Fortify** pour gérer l'authentification de manière agnostique vis-à-vis du frontend. Fortify fournit les routes et les contrôleurs backend (Login, 2FA, Password Reset), et nous fournissons les vues Vue.js correspondantes.

### Wayfinder (Typed Routing)
Le projet intègre `laravel/wayfinder` pour permettre l'utilisation des routes Laravel nommées directement dans le code TypeScript/Vue avec une autocomplétion complète.

## 3. Structure du Projet

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/      # Gestion du CRUD administratif
│   │   └── ...         # Contrôleurs publics
│   └── Middleware/
├── Models/             # Modèles Eloquent (User, Post, Service, Photo)
├── Providers/          # Configuration des services (Fortify, App)
bootstrap/
config/                 # Configuration (Fortify, Inertia, etc.)
database/
├── migrations/         # Schéma de base de données
├── factories/          # Génération de données de test
├── seeders/            # Données initiales
resources/
├── js/
│   ├── pages/          # Composants de page Inertia
│   ├── components/     # Composants Vue réutilisables
│   └── layouts/        # Layouts globaux
routes/
├── web.php             # Routes principales
└── settings.php        # Routes de profil utilisateur
```

## 4. Flux de Données

1. **Requête initiale** : Le navigateur demande une page (ex: `/nos-services`).
2. **Contrôleur Laravel** : Récupère les données via Eloquent.
3. **Inertia::render** : Envoie une réponse JSON contenant le nom du composant Vue et les données (props).
4. **Vue.js** : Monte le composant correspondant et affiche les données.
5. **Navigations suivantes** : Interceptées par Inertia, qui fait une requête XHR et met à jour le DOM sans rechargement complet de la page.

## 5. Stockage et Assets
- **Images** : Stockées sur le disque `public` (`storage/app/public`).
- **Assets** : Compilés avec Vite 7.
- **Base de données** : SQLite par défaut pour la simplicité, mais compatible MySQL/PostgreSQL.

## 6. Services Externes
- **Emailing (Brevo)** : Le projet utilise Brevo pour l'envoi d'emails transactionnels (Formulaire de contact, Notifications admin, Réinitialisation de mot de passe). L'intégration est faite via le driver SMTP de Laravel.

---
*Dernière mise à jour : 12/02/2026*
