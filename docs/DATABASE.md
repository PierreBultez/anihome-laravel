# Modèle de Données - Anihome

Ce document décrit la structure de la base de données et les relations entre les entités.

## 1. Schéma Global

Le projet utilise une base de données relationnelle (SQLite par défaut).

### Table : `users`
Stocke les administrateurs du site.
- `id` (PK)
- `name`
- `email` (Unique)
- `password`
- `two_factor_secret` / `two_factor_recovery_codes` / `two_factor_confirmed_at` (Fortify)
- `remember_token`
- `timestamps`

### Table : `services`
Détaille les prestations proposées.
- `id` (PK)
- `title` : Nom du service
- `slug` : Identifiant URL unique
- `description` : Résumé court pour les cartes
- `content` : Description complète (HTML/Markdown)
- `image_path` : Illustration principale
- `icon` : Nom de l'icône (Lucide/Heroicons)
- `is_active` : Statut d'affichage (Boolean, défaut: true)
- `timestamps`

### Table : `posts`
Articles d'actualité ou blog.
- `id` (PK)
- `title` : Titre de l'article
- `slug` : Identifiant URL unique
- `content` : Corps de l'article
- `image_path` : Image de couverture (Nullable)
- `published_at` : Date de publication effective
- `user_id` (FK) : Auteur (Lien vers `users`)
- `timestamps`

### Table : `photos`
Éléments de la galerie (Album).
- `id` (PK)
- `title` : Légende de l'image (Nullable)
- `path` : Chemin du fichier image
- `order` : Ordre d'affichage (Integer)
- `timestamps`

## 2. Relations

- **User ↔ Post** : `User` (1) --- hasMany ---> `Post` (N). Un utilisateur peut être l'auteur de plusieurs articles.
- **Service** et **Photo** sont actuellement des entités indépendantes.

## 3. Index et Performance
- Les colonnes `slug` sont indexées de manière unique (`unique()`) pour des recherches rapides lors de l'accès aux pages de détail.
- La clé étrangère `user_id` dans `posts` est indexée par défaut par Laravel.

---
*Dernière mise à jour : 10/02/2026*
