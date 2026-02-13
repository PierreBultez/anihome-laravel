# Rapport d'Optimisation SEO Locale - Anihome

Ce document détaille les optimisations de référencement naturel (SEO) réalisées le 13 février 2026 pour positionner **Anihome** comme l'autorité de référence pour la garde d'animaux à **Courthézon (84350)** et dans le **Vaucluse**.

## 1. Stratégie sémantique & Mots-clés
Le ciblage a été affiné pour répondre aux requêtes de proximité à forte intention de conversion.

*   **Mots-clés prioritaires** : *Petsitter Courthézon*, *Garde d'animaux Courthézon (84)*, *Visite à domicile animaux Vaucluse*, *Promenade de chien 84*.
*   **Zone de chalandise ciblée** : Courthézon, Orange, Jonquières, Bédarrides, Sarrians, Sorgues, Châteauneuf-du-Pape, Violès.

## 2. Optimisations On-Page (Méta-données)
Chaque page indexable a été dotée de balises `<title>` et `<meta name="description">` optimisées pour le CTR (taux de clic) et la pertinence locale.

| Page | Titre SEO Optimisé | Focus Description |
| :--- | :--- | :--- |
| **Accueil** | Anihome : Petsitter à Courthézon (84) - Garde d'animaux 🐾 | Confiance, Proximité, Pierre & Wendy |
| **Services** | [Nom du Service] à Courthézon (84) – Anihome | Expertise spécifique, Zone d'intervention |
| **Tarifs** | Tarifs Petsitter à Courthézon (84) – Anihome | Transparence, Prix d'appel (10€/12€) |
| **Contact** | Contactez votre Petsitter à Courthézon (84) – Anihome | Conversion, Devis gratuit, Urgences |
| **Blog** | Blog Animalier : Conseils & Actualités Petsitting Courthézon | E-E-A-T (Expertise), Autorité locale |

## 3. SEO Technique : Données Structurées (JSON-LD)
Implémentation de schémas sémantiques pour favoriser l'affichage de "Rich Snippets" et la compréhension du contexte local par Google.

*   **LocalBusiness** : Injection de l'adresse, coordonnées GPS, téléphone et zones desservies (`areaServed`).
*   **Service** : Spécification des types de gardes pour chaque page de prestation.
*   **PriceSpecification** : Affichage des tarifs directement dans les résultats de recherche.
*   **BlogPosting** : Marquage des articles pour renforcer la crédibilité des conseils.

*Note technique : Utilisation de `<component :is="'script'">` pour la compatibilité avec le compilateur Vue de Vite.*

## 4. OpenGraph & Signaux Sociaux
Optimisation de l'apparence des liens lors des partages (Facebook, WhatsApp, Instagram).

*   **Image de marque (OG:Image)** : Remplacement du logo par `choisir_petsitter.webp` pour un aspect plus engageant et humain.
*   **Image Galerie** : Utilisation de `1000000707-scaled.webp` pour illustrer la "grande famille" Anihome.
*   **Type de contenu** : Configuration dynamique (`website`, `article`, `profile`).

## 5. Maintenance & Évolutions
Pour maximiser l'impact de ces changements, il est recommandé de :
1.  Maintenir la cohérence des informations NAP (Nom, Adresse, Phone) sur le site et sur la fiche **Google Business Profile**.
2.  Publier régulièrement sur le blog avec des thématiques liées à la vie animale dans le **Vaucluse**.
3.  Utiliser les images optimisées dans les publications sociales pour créer une synergie visuelle.

---
*Rapport généré par le Gemini CLI - Expertise SEO Locale.*


L'objectif principal était de positionner Anihome comme l'autorité de référence pour la garde d'animaux à Courthézon (84350) et dans le Vaucluse sur les
moteurs de recherche.

  ---


1. Stratégie de Mots-clés Locaux
   Nous avons injecté des mots-clés de "haute intention" sur l'ensemble du site pour capter le trafic de proximité :
- Mots-clés Primaires : Petsitter Courthézon, Garde d'animaux Courthézon (84), Visite à domicile animaux Vaucluse.
- Zone de Chalandise : Orange, Jonquières, Bédarrides, Sarrians, Sorgues, Châteauneuf-du-Pape.

  ---

2. Optimisations On-Page (Méta-données & Headers)
   Toutes les pages indexables ont été optimisées avec des balises uniques et localisées.


Page d'Accueil (Welcome.vue)
- Titre : Anihome : Petsitter à Courthézon (84) - Garde d'animaux 🐾
- Description : Focus sur la confiance, le professionnalisme de Pierre & Wendy, et la zone d'intervention.
- H1 : Anihome : Garde d'animaux à domicile à Courthézon & Vaucluse (auparavant générique).


Pages Services (Services/Show.vue & Index.vue)
- Titres dynamiques : [Nom du Service] à Courthézon (84) – Anihome.
- Contenu : Maillage interne renforcé vers les communes limitrophes.


Pages Institutionnelles
- Tarifs : Optimisée pour la requête "Tarifs Petsitter Courthézon" avec mention des prix d'appel (10€/12€).
- Contact : Optimisée pour la conversion locale.

  ---


3. SEO Technique : Données Structurées (JSON-LD)
   C'est le levier le plus puissant pour le SEO local. Nous avons utilisé un format compatible avec le compilateur Vue de Vite (<component :is="'script'">).


- Schéma LocalBusiness :
    - Identifie Anihome comme une entreprise physique à Courthézon.
    - Inclut les coordonnées GPS exactes, le téléphone, et la areaServed (zone desservie).
- Schéma Service :
    - Implémenté sur chaque page de service pour favoriser l'affichage des "Rich Snippets" (extraits enrichis) dans Google.
- Schéma PriceSpecification :
    - Ajouté sur la page Tarifs pour permettre à Google d'afficher vos prix directement dans les résultats.
- Schéma BlogPosting :
    - Ajouté sur les articles pour renforcer l'autorité sémantique.

  ---


4. OpenGraph (Optimisation des Réseaux Sociaux)
   Pour maximiser le taux de clic (CTR) lors des partages sur Facebook, WhatsApp ou Instagram :


- Images de partage (OG:Image) :
    - Défaut : choisir_petsitter.webp (remplace le logo pour un aspect plus vivant et engageant).
    - Galerie : 1000000707-scaled.webp (photo réelle d'un animal).
    - Services & Blog : Utilisation dynamique de l'image de mise en avant ou de l'image par défaut.
- Balises OG : og:title, og:description, og:type et og:url configurées sur chaque page.

  ---


5. Détails d'Implémentation Technique
   Le projet utilisant Inertia.js et Vue 3, j'ai appliqué les correctifs suivants pour assurer la validité du code :

1. Workaround Balise Script : Vue interdit les balises <script> brutes dans les templates. Utilisation de :


1     <component :is="'script'" type="application/ld+json">
2       {{ JSON.stringify(schemaData) }}
3     </component>
2. Liaisons dynamiques : Utilisation de :content pour les métadonnées dynamiques (Inertia Head).
3. Nettoyage HTML : Les descriptions de blog sont nettoyées des balises HTML via Regex pour éviter les caractères parasites dans les méta-descriptions.

  ---


6. Prochaines étapes recommandées
   Pour maintenir et accroître cette domination locale :
1. Google Business Profile : Assurez-vous que les informations (NAP : Nom, Adresse, Phone) sur votre fiche Google correspondent exactement à celles injectées
   dans le schéma LocalBusiness.
2. Avis Clients : Encouragez vos clients de Courthézon et Orange à laisser des avis mentionnant explicitement leur ville.
3. Contenu Localisé : Rédiger un article de blog par trimestre sur une thématique 100% locale (ex: "Les 3 meilleurs coins de balade à Courthézon").


L'infrastructure SEO d'Anihome est désormais optimisée au maximum de ses capacités actuelles. Votre site est prêt à capter et convertir la clientèle locale du
Vaucluse.
