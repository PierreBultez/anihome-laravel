<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import { Button } from '@/components/ui/button';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });
</script>

<template>
    <Head>
        <title>Qui sommes nous ?</title>
        <meta
            name="description"
            content="Pierre et Wendy. Nous sommes amoureux des animaux, ils font partie de notre vie depuis toujours. Après en avoir recueillis, sauvés, soignés nous avons décidé d'en faire notre métier."
        />
    </Head>

    <div class="bg-background">
        <!-- Header -->
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Qui sommes nous ?</h1>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="mb-20 grid items-center gap-12 md:grid-cols-2">
                <div class="relative order-2 md:order-1">
                    <img
                        src="/images/pets_about_2.webp"
                        alt="Pierre et Wendy Anihome"
                        class="h-auto w-full rounded-xl object-cover shadow-2xl"
                    />
                </div>
                <div
                    class="prose order-1 max-w-none text-lg leading-relaxed text-muted-foreground md:order-2"
                >
                    <h2 class="mb-6 text-3xl font-bold text-primary">
                        Pierre et Wendy
                    </h2>
                    <p class="mb-6">
                        Nous sommes amoureux des animaux, ils font partie de
                        notre vie depuis toujours. Après en avoir recueillis,
                        sauvés, soignés nous avons décidé d'en faire notre
                        métier.
                    </p>
                    <ul class="list-none space-y-4 pl-0">
                        <li class="flex items-center gap-3">
                            <span
                                class="rounded-full bg-primary/10 p-1 text-primary"
                                >✓</span
                            >
                            Garde de vos animaux à votre domicile
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="rounded-full bg-primary/10 p-1 text-primary"
                                >✓</span
                            >
                            Promenades régulières ou à la demande
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="rounded-full bg-primary/10 p-1 text-primary"
                                >✓</span
                            >
                            Gratouilles, câlins, caresses, brossage, jeux, ...
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Testimonial -->
            <div class="mb-20 rounded-2xl bg-muted/30 p-8 md:p-12">
                <div class="flex flex-col items-center gap-8 md:flex-row">
                    <div class="shrink-0">
                        <img
                            src="/images/Claire.webp"
                            alt="Claire Perez"
                            class="h-32 w-32 rounded-full border-4 border-background object-cover shadow-lg"
                        />
                    </div>
                    <div class="text-center md:text-left">
                        <blockquote
                            class="mb-4 text-xl text-muted-foreground italic"
                        >
                            “J’ai fait appel à Pierre et Wendy pour garder mon
                            chien pendant une semaine lors de mes vacances. Je
                            suis très contente du service, mon chien a été bien
                            traité et choyé. Ce sont des petsitter sérieux et
                            attentionnés. Je recommande Anihome sans hésiter.”
                        </blockquote>
                        <cite class="text-lg font-bold text-primary not-italic"
                            >Claire Perez</cite
                        >
                    </div>
                </div>
            </div>
        </div>

        <FaqSection />

        <!-- CTA Questions -->
        <section class="bg-muted/30 py-16 text-center">
            <div class="container mx-auto px-4">
                <h2 class="mb-8 text-3xl font-bold text-primary">
                    Si vous avez d’autres questions, contactez nous
                </h2>
                <Button
                    size="lg"
                    as-child
                    class="rounded-full px-8 py-6 text-lg"
                >
                    <Link href="/contact">NOUS CONTACTER</Link>
                </Button>
            </div>
        </section>

        <!-- News Teaser -->
        <section class="bg-background py-16 text-center">
            <div class="container mx-auto px-4">
                <h2 class="mb-4 text-3xl font-bold text-primary">
                    L’actualité animale
                </h2>
                <div class="mb-4 flex justify-center">
                    <div class="h-1 w-24 rounded bg-muted-foreground/20"></div>
                </div>
                <p class="mb-10 text-lg text-muted-foreground">
                    Vous êtes passionnés ? Nous aussi. Suivez l’actualité
                    animale sur notre blog.
                </p>

                <!-- Dynamic Posts Placeholders (Real posts will come from DB in Blog/Index, here we just link) -->
                <div class="mb-10">
                    <!-- Ideally fetch latest 3 posts here passed as props -->
                </div>

                <Button
                    size="lg"
                    variant="outline"
                    as-child
                    class="rounded-full border-2 border-primary px-8 py-6 text-lg text-primary transition-all hover:bg-primary hover:text-white"
                >
                    <Link href="/actualite">PLUS D’ARTICLES</Link>
                </Button>
            </div>
        </section>
    </div>
</template>
