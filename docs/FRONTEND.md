# Développement Frontend - Anihome

Ce document explique les outils et conventions utilisés pour le développement de l'interface utilisateur.

## 1. Technologies Core
- **Vue 3** : Framework JavaScript utilisant la `Composition API` avec `<script setup>`.
- **Inertia.js v2** : Pont entre Laravel et Vue pour une expérience SPA.
- **Tailwind CSS v4** : Framework CSS utilitaire, intégré via le plugin Vite `@tailwindcss/vite`.
- **TypeScript** : Utilisé pour tout le code JavaScript afin d'assurer la robustesse.

## 2. Structure des Dossiers (`resources/js/`)

- `pages/` : Composants de page complets (ex: `Welcome.vue`, `Admin/Services/Index.vue`). Chaque fichier dans ce dossier correspond à une route Inertia.
- `components/` : Composants Vue réutilisables (Boutons, Inputs, Modales, etc.).
- `layouts/` : Wrappers de structure (ex: `AppLayout.vue`, `AdminLayout.vue`).
- `composables/` : Fonctions logiques réutilisables (ex: `useAppearance.ts` pour le mode sombre/clair).
- `types/` : Définitions d'interfaces TypeScript.

## 3. Laravel Wayfinder (Typed Routes)
Le projet utilise `laravel/wayfinder` pour générer des fonctions TypeScript correspondant aux routes Laravel.

**Usage :**
```typescript
import { route } from '@/routes';

// Navigation simple
const goToServices = () => {
    window.location.href = route('services.index');
};

// Avec paramètres (Inertia Link)
// <Link :href="route('services.show', { service: service.slug })"> Voir </Link>
```

## 4. Gestion de l'Apparence
L'application supporte le mode sombre et clair.
- Le thème est initialisé dans `app.ts` via `initializeTheme()`.
- Les styles Tailwind utilisent les préfixes `dark:` pour les variantes sombres.

## 5. Formulaires
Nous utilisons `useForm` de `@inertiajs/vue3` pour la gestion des états de formulaire, la validation et les erreurs synchronisées avec Laravel.

## 6. Édition de Contenu
- **TipTap** : Utilisé pour les éditeurs de texte riche (WYSIWYG) dans l'administration.
- **Tailwind Typography (`prose`)** : Utilisé pour le rendu du contenu HTML généré par l'éditeur, assurant un style cohérent et professionnel sur le front-end.

---
*Dernière mise à jour : 12/02/2026*
