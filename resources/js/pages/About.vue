<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { format } from 'date-fns';
import { fr } from 'date-fns/locale';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
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

const props = defineProps<{
    latestPosts: Array<{
        id: number;
        title: string;
        slug: string;
        published_at: string;
        image_path: string | null;
        content: string; // Used for excerpt if description not available
    }>;
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();

const formatDate = (date: string) => {
    return format(new Date(date), 'dd MMM yyyy', { locale: fr });
};

const stripHtml = (html: string) => {
    return html.replace(/<[^>]*>?/gm, '');
};
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
                    class="order-1 prose max-w-none text-lg leading-relaxed text-muted-foreground md:order-2"
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

        <FaqSection :faqs="faqs" />

        <!-- News Teaser -->
        <section class="bg-background py-16 text-center" v-if="latestPosts.length > 0">
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

                <!-- Dynamic Posts -->
                <div class="mb-10 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <Card
                        v-for="post in latestPosts"
                        :key="post.id"
                        class="flex h-full flex-col text-left transition-shadow hover:shadow-lg"
                    >
                        <div
                            v-if="post.image_path"
                            class="h-48 overflow-hidden rounded-t-xl"
                        >
                            <img
                                :src="`/storage/${post.image_path}`"
                                :alt="post.title"
                                class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                            />
                        </div>
                        <CardHeader>
                            <div class="mb-2 text-sm text-muted-foreground">
                                {{ formatDate(post.published_at) }}
                            </div>
                            <CardTitle class="line-clamp-2">{{ post.title }}</CardTitle>
                        </CardHeader>
                        <CardContent class="grow">
                            <p class="line-clamp-3 text-muted-foreground">
                                {{ stripHtml(post.content) }}
                            </p>
                        </CardContent>
                        <CardFooter>
                            <Button variant="outline" as-child class="w-full">
                                <Link :href="`/actualite/${post.slug}`"
                                    >Lire la suite</Link
                                >
                            </Button>
                        </CardFooter>
                    </Card>
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

        <!-- Garde Professionnelle Section (SEO Local) -->
        <ProfessionalCareSection
            text="Anihome propose ses services de garde d'animaux, de visite à domicile et de promenade canine dans le Vaucluse (84). Nous intervenons principalement sur les communes de Courthézon, Orange, Jonquières, Bédarrides, Sorgues et leurs alentours. Faire appel à un professionnel déclaré et assuré, c'est la garantie d'un service de qualité pour le bien-être de vos compagnons."
        />
    </div>
</template>
