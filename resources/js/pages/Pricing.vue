<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardHeader,
    CardTitle,
    CardContent,
    CardFooter,
} from '@/components/ui/card';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();
</script>

<template>
    <Head>
        <title>Tarifs – Anihome Petsitter à Courthézon</title>
        <meta
            name="description"
            content="Tarifs de base. Devis définitifs réalisés sur-mesure. Garde de chats, chiens, visites..."
        />
    </Head>

    <div class="bg-background">
        <!-- Header -->
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Nos tarifs</h1>
        </div>

        <!-- Pricing -->
        <div class="container mx-auto px-4 py-16">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-primary">
                    Tarifs de base
                </h2>
                <div class="mb-4 flex justify-center">
                    <img
                        src="/images/line_separator.png"
                        alt="Separator"
                        class="h-6 w-auto opacity-50"
                    />
                </div>
                <p class="text-xl text-muted-foreground">
                    Devis définitifs réalisés sur-mesure
                </p>
            </div>

            <div class="mx-auto grid max-w-6xl gap-8 md:grid-cols-3">
                <!-- Miaou -->
                <Card
                    class="relative flex flex-col border-primary/20 shadow-lg transition-shadow hover:shadow-xl"
                >
                    <CardHeader class="pb-2 text-center">
                        <CardTitle class="mb-2 text-2xl font-bold text-primary"
                            >Miaou</CardTitle
                        >
                        <p
                            class="text-sm tracking-wide text-muted-foreground uppercase"
                        >
                            Uniquement pour les chats
                        </p>
                    </CardHeader>
                    <div class="bg-primary/5 py-6 text-center">
                        <div class="text-4xl font-extrabold text-foreground">
                            10€
                        </div>
                        <div class="mt-1 text-sm text-muted-foreground">
                            à partir de
                        </div>
                    </div>
                    <CardContent class="grow pt-6">
                        <div class="mb-6 space-y-4">
                            <p class="text-center text-sm">
                                1 à 3 visite(s) par jour<br />
                                Jusqu’à 3 chats (+2€/chat supp.)<br />
                                Dimanche et jours fériés +50%<br />
                                Tarif selon zone géographique
                            </p>
                        </div>

                        <div class="border-t pt-6">
                            <h4
                                class="mb-4 text-center text-sm font-bold uppercase"
                            >
                                Ce qui est inclus
                            </h4>
                            <ul class="space-y-2 text-sm text-muted-foreground">
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Lavage des gamelles
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Nourrissages
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Renouvellement de l’eau
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Nettoyage des litières
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Nettoyage des accidents
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Petit moment câlin
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Fiche de suivi
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Messages et photos
                                </li>
                            </ul>
                        </div>
                    </CardContent>
                    <CardFooter class="pt-4 pb-8">
                        <Button class="w-full" as-child>
                            <Link href="/contact">Demander un tarif</Link>
                        </Button>
                    </CardFooter>
                </Card>

                <!-- Waf Waf -->
                <Card
                    class="relative z-10 flex scale-105 flex-col border-primary shadow-xl"
                >
                    <div class="absolute top-0 right-0">
                        <Badge
                            class="rounded-none rounded-bl-lg bg-primary px-3 py-1 text-white hover:bg-primary"
                            >PLUS POPULAIRE</Badge
                        >
                    </div>
                    <CardHeader class="pb-2 text-center">
                        <CardTitle class="mb-2 text-2xl font-bold text-primary"
                            >Waf Waf</CardTitle
                        >
                        <p
                            class="text-sm tracking-wide text-muted-foreground uppercase"
                        >
                            Tous les animaux
                        </p>
                    </CardHeader>
                    <div class="bg-primary/10 py-6 text-center">
                        <div class="text-4xl font-extrabold text-foreground">
                            12€
                        </div>
                        <div class="mt-1 text-sm text-muted-foreground">
                            à partir de
                        </div>
                    </div>
                    <CardContent class="grow pt-6">
                        <div class="mb-6 space-y-4">
                            <p class="text-center text-sm">
                                1 à 3 visite(s) par jour<br />
                                Jusqu’à 3 chats ou 1 chien<br />
                                <span class="text-xs text-muted-foreground"
                                    >(+2€/chat supp et +5€/chien supp)</span
                                ><br />
                                Dimanche et jours fériés +50%<br />
                                Tarif selon zone géographique
                            </p>
                        </div>

                        <div class="border-t pt-6">
                            <h4
                                class="mb-4 text-center text-sm font-bold uppercase"
                            >
                                Ce qui est inclus
                            </h4>
                            <ul class="space-y-2 text-sm text-muted-foreground">
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    <strong class="text-primary"
                                        >Toute l’offre Miaou</strong
                                    >
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Problème de propreté récurrent
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Traitement médical
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Sorties et jeux dans le jardin
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Brossage
                                </li>
                            </ul>
                        </div>
                    </CardContent>
                    <CardFooter class="pt-4 pb-8">
                        <Button class="w-full text-lg" as-child>
                            <Link href="/contact">Demander un tarif</Link>
                        </Button>
                    </CardFooter>
                </Card>

                <!-- Grrrrr -->
                <Card
                    class="relative flex flex-col border-primary/20 shadow-lg transition-shadow hover:shadow-xl"
                >
                    <CardHeader class="pb-2 text-center">
                        <CardTitle class="mb-2 text-2xl font-bold text-primary"
                            >Grrrrr</CardTitle
                        >
                        <p
                            class="text-sm tracking-wide text-muted-foreground uppercase"
                        >
                            Tous les animaux
                        </p>
                    </CardHeader>
                    <div class="bg-primary/5 py-6 text-center">
                        <div class="text-4xl font-extrabold text-foreground">
                            20€
                        </div>
                        <div class="mt-1 text-sm text-muted-foreground">
                            à partir de
                        </div>
                    </div>
                    <CardContent class="grow pt-6">
                        <div class="mb-6 space-y-4">
                            <p class="text-center text-sm">
                                1 à 3 visite(s) par jour<br />
                                Jusqu’à 3 chats ou 1 chien<br />
                                <span class="text-xs text-muted-foreground"
                                    >(+2€/chat supp et +5€/chien supp)</span
                                ><br />
                                Dimanche et jours fériés +50%<br />
                                Tarif selon zone géographique
                            </p>
                        </div>

                        <div class="border-t pt-6">
                            <h4
                                class="mb-4 text-center text-sm font-bold uppercase"
                            >
                                Ce qui est inclus
                            </h4>
                            <ul class="space-y-2 text-sm text-muted-foreground">
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    <strong class="text-primary"
                                        >Toute l’offre Waf Waf</strong
                                    >
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Promenades extérieures
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2 text-primary">✓</span>
                                    Gardiennage logement
                                </li>
                            </ul>
                        </div>
                    </CardContent>
                    <CardFooter class="pt-4 pb-8">
                        <Button class="w-full" as-child>
                            <Link href="/contact">Demander un tarif</Link>
                        </Button>
                    </CardFooter>
                </Card>
            </div>

            <FaqSection :faqs="faqs" />

        </div>

        <ProfessionalCareSection
            text="Des tarifs clairs et adaptés pour la garde de vos animaux à domicile à Courthézon, Orange et dans tout le Vaucluse. Demandez votre devis gratuit."
        />
    </div>
</template>
