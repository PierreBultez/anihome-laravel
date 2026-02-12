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

## 🛠 État du Projet (12 Février 2026)

Le projet a franchi des étapes importantes de stabilisation. Le socle technique est robuste et les fonctionnalités d'administration de base sont validées par des tests automatisés.

### Réalisations Récentes :
- **Administration** : Correction de la sélection multiple et suppression en masse sur tous les modules (Services, Posts, Photos).
- **Services** : Réparation du toggle "Actif/Inactif" et ajout de l'image de couverture sur le front-end.
- **Contenu Riche** : Intégration complète de TipTap (WYSIWYG) avec gestion des uploads d'images et rendu `prose` (Tailwind Typography).
- **Communication** : Système d'envoi d'emails opérationnel (Brevo) pour le formulaire de contact avec email de confirmation automatique au visiteur.
- **Album** : Amélioration de l'expérience d'upload avec prévisualisation des photos.

### 📋 Prochaines Étapes :

#### 🏠 ACCUEIL
- [X] Ajouter des liens vers les services avec icônes et animations au survol.
- [ ] Système de **Témoignages** : CRUD admin (Nom, Photo, Message) et affichage dynamique.
- [X] Section "Service complet" : Mettre en avant 3 services sélectionnés via une option "Featured" en admin.

#### ℹ️ QUI SOMMES NOUS ?
- [ ] Affichage dynamique des 3 ou 4 derniers articles de blog.
- [ ] Intégration de la section **"Garde d’animaux professionnelle"** (SEO Local) présente avant le footer sur toutes les pages avec textes différenciés.

#### ❓ FAQ
- [ ] Création d'un CRUD **FAQ** complet en administration.
- [ ] Intégration dynamique de la FAQ sur la page d'accueil et les pages de détails des services.

#### 🛠 PAGES DÉTAILS DES SERVICES
- [ ] Ajout de la section Témoignages (dynamique).
- [ ] Ajout de la section FAQ (dynamique).
- [ ] Ajout de la section "Garde d’animaux professionnelle".

#### 🖼 ALBUM
- [ ] Ajout d'une visionneuse (Lightbox) pour afficher les photos en pleine taille au clic.

#### 📰 ACTUALITÉ
- [ ] Ajout de la section "Garde d’animaux professionnelle".

#### 🔗 LIENS DU FOOTER
- [ ] Créer la page "Politique de confidentialité" et "Mentions légales" (contenu standard).

---
*Dernière mise à jour : 12/02/2026*
