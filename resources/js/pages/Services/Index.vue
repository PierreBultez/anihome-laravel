<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import TestimonialsSection from '@/components/sections/TestimonialsSection.vue';
import { Button } from '@/components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    services: Array<{
        id: number;
        title: string;
        slug: string;
        description: string;
        image_path: string | null;
    }>;
    testimonials: Array<{
        id: number;
        name: string;
        content: string;
        photo_path: string | null;
    }>;
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();
</script>

<template>
    <Head>
        <title>Nos services – Anihome Petsitter à Courthézon</title>
        <meta
            name="description"
            content="Le bien-être des animaux. Vous cherchez un petsitter de confiance..."
        />
    </Head>

    <div class="bg-background">
        <!-- Header -->
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Nos services</h1>
        </div>

        <!-- Intro -->
        <div class="container mx-auto px-4 py-16">
            <div class="grid items-center gap-12 md:grid-cols-2">
                <div
                    class="prose max-w-none text-lg leading-relaxed text-muted-foreground"
                >
                    <h2 class="mb-6 text-3xl font-bold text-primary">
                        Le bien-être des animaux
                    </h2>
                    <p class="mb-4">
                        Vous cherchez un
                        <strong class="text-primary">petsitter</strong> de
                        confiance pour garder votre
                        <strong class="text-primary"
                            >animal de compagnie</strong
                        >
                        pendant votre absence ?
                    </p>
                    <p class="mb-4">
                        Bienvenue sur le site web d’<strong class="text-primary"
                            >Anihome</strong
                        >, votre service de
                        <strong class="text-primary"
                            >garde d’animaux de compagnie à domicile</strong
                        >
                        à <strong class="text-primary">Courthézon</strong>, près
                        de <strong class="text-primary">Orange</strong>, dans le
                        <strong class="text-primary">Vaucluse</strong>.
                    </p>
                    <p class="mb-4">
                        Nous sommes Pierre et Wendy, un couple passionné et
                        professionnel des
                        <strong class="text-primary">animaux</strong>. Nous vous
                        proposons de prendre soin de votre compagnon à quatre
                        pattes pendant votre absence, que ce soit pour une
                        journée, une semaine ou plus.
                    </p>
                    <p class="mb-4">
                        Nous nous occupons de votre
                        <strong class="text-primary"
                            >chien, chat, lapin, hamster, oiseau</strong
                        >
                        ou tout autre
                        <strong class="text-primary">animal domestique</strong>
                        avec amour et respect. Nous vous envoyons des photos et
                        des nouvelles régulièrement pour vous rassurer.
                    </p>
                    <p class="mb-6">
                        Nous intervenons à
                        <strong class="text-primary"> Courthézon </strong>
                        et dans les environs. N’hésitez pas à nous contacter
                        pour un devis gratuit et sans engagement. Avec
                        <strong class="text-primary"> Anihome </strong>
                        , votre animal de compagnie est entre de bonnes mains !
                    </p>

                    <ul class="mb-8 list-none space-y-2 pl-0">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-primary">✓</span> Promenade
                            de votre ou vos chien(s) à la carte
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-primary">✓</span>
                            Nourrissages, nettoyages des litières, brossage,
                            jeux, caresses, …
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-primary">✓</span> Rongeurs,
                            reptiles, amphibiens, nous prenons soin de tous
                        </li>
                    </ul>

                    <Button
                        size="lg"
                        as-child
                        class="rounded-full px-8 py-6 text-lg"
                    >
                        <Link href="/contact">DEMANDER UN DEVIS</Link>
                    </Button>
                </div>
                <div class="relative">
                    <img
                        src="/images/Services_bloc.webp"
                        alt="Services Anihome"
                        class="h-auto w-full rounded-xl object-cover shadow-2xl"
                    />
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <section class="bg-muted/30 py-16">
            <div class="container mx-auto px-4">
                <h2 class="mb-12 text-center text-3xl font-bold text-primary">
                    Nos services en détails
                </h2>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <Link
                        v-for="service in services"
                        :key="service.id"
                        :href="`/nos-services/${service.slug}`"
                        class="group block h-full"
                    >
                        <Card
                            class="h-full overflow-hidden border-primary/10 bg-background transition-all duration-300 group-hover:-translate-y-1 hover:shadow-xl"
                        >
                            <div class="aspect-video w-full overflow-hidden">
                                <img
                                    :src="
                                        service.image_path
                                            ? `/storage/${service.image_path}`
                                            : '/images/Services_bloc.webp'
                                    "
                                    :alt="service.title"
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </div>
                            <CardHeader>
                                <CardTitle
                                    class="text-xl text-primary group-hover:text-primary/80"
                                    >{{ service.title }}</CardTitle
                                >
                            </CardHeader>
                            <CardContent>
                                <p class="text-muted-foreground">
                                    {{ service.description }}
                                </p>
                                <div
                                    class="mt-4 flex items-center text-sm font-semibold text-primary"
                                >
                                    En savoir plus
                                    <span
                                        class="ml-2 transition-transform group-hover:translate-x-1"
                                        >→</span
                                    >
                                </div>
                            </CardContent>
                        </Card>
                    </Link>
                </div>
            </div>
        </section>

        <FaqSection :faqs="faqs" />

        <TestimonialsSection :testimonials="testimonials" />

        <ProfessionalCareSection
            text="Découvrez nos prestations de garde d'animaux à Courthézon et dans le Vaucluse. Promenades, visites à domicile, soins... Anihome s'adapte à vos besoins pour le bonheur de vos compagnons."
        />
    </div>
</template>
