# Guide de Développement - Anihome

Ce guide explique comment contribuer au projet et maintenir la qualité du code.

## 1. Installation

### Prérequis
- PHP 8.4+
- Composer
- Node.js 20+ & NPM
- SQLite (ou autre driver PDO)

### Configuration Rapide
```bash
# Installer dépendances, configurer .env, migrer et compiler
composer run setup
```

## 2. Commandes de Développement

### Serveur Local
```bash
# Lance Artisan serve, Vite, et les Queues en parallèle
composer run dev
```

### Qualité du Code (Linting)
Il est impératif de formater le code avant chaque commit.

- **Backend (PHP)** : `composer run lint` (Utilise Laravel Pint)
- **Frontend (TS/Vue)** : `npm run lint` (Utilise ESLint & Prettier)

## 3. Tests

Nous utilisons **Pest PHP** pour les tests.

```bash
# Lancer tous les tests
composer test

# Lancer un test spécifique
php artisan test --filter NameOfTest
```

### Structure des Tests
- `tests/Unit` : Tests logiques purs, sans accès à la base de données.
- `tests/Feature` : Tests d'intégration, vérification des routes, des contrôleurs et de la base de données.

## 4. Conventions de Code

- **PHP** : Suivre les standards PSR-12, utiliser le `strict_types=1` et le formatage Pint par défaut.
- **Vue** : Utiliser `<script setup lang="ts">`.
- **Git** : Messages de commit clairs (ex: `feat: add post creation`, `fix: sidebar toggle issue`).

## 5. Déploiement
Le projet est prêt pour le déploiement sur toute plateforme supportant Laravel (Vercel, Laravel Forge, etc.).
N'oubliez pas d'exécuter `npm run build` pour générer les assets de production.

---
*Dernière mise à jour : 10/02/2026*
