<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });
</script>

<template>
    <Head>
        <title>Mentions Légales – Anihome</title>
        <meta name="robots" content="noindex, follow" />
    </Head>

    <div class="bg-background">
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Mentions Légales</h1>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="prose max-w-4xl mx-auto dark:prose-invert">
                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">1. Présentation du site</h2>
                    <p>
                        En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <span class="font-bold text-primary">anihome.fr</span> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :
                    </p>
                    <ul class="mt-4">
                        <li><strong>Propriétaire</strong> : Pierre Bultez & Wendy Bultez – Courthézon, France</li>
                        <li><strong>Créateur</strong> : Pierre Bultez</li>
                        <li><strong>Responsable publication</strong> : Pierre Bultez – contact@anihome.fr</li>
                        <li><strong>Webmaster</strong> : Pierre Bultez</li>
                        <li><strong>Hébergeur</strong> : OVH SAS – 2 rue Kellermann, 59100 Roubaix, France</li>
                    </ul>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">2. Conditions générales d’utilisation du site et des services proposés</h2>
                    <p>
                        L’utilisation du site <span class="font-bold text-primary">anihome.fr</span> implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site sont donc invités à les consulter de manière régulière.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">3. Description des services fournis</h2>
                    <p>
                        Le site <span class="font-bold text-primary">anihome.fr</span> a pour objet de fournir une information concernant l’ensemble des activités de la société.
                        Les propriétaires s’efforcent de fournir sur le site des informations aussi précises que possible. Toutefois, ils ne pourront être tenus responsables des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de leur fait ou du fait des tiers partenaires qui lui fournissent ces informations.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">4. Propriété intellectuelle et contrefaçons</h2>
                    <p>
                        Pierre Bultez et Wendy Bultez sont propriétaires des droits de propriété intellectuelle ou détiennent les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.
                        Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Pierre Bultez ou Wendy Bultez.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">5. Limitations de responsabilité</h2>
                    <p>
                        Les propriétaires ne pourront être tenus responsables des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site <span class="font-bold text-primary">anihome.fr</span>.
                    </p>
                </section>
            </div>
        </div>
    </div>
</template>
