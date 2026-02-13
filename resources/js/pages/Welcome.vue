<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    Dog,
    Cat,
    Rabbit,
    Footprints,
    Home,
    Siren,
    Stethoscope,
    Heart,
} from 'lucide-vue-next';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import TestimonialsSection from '@/components/sections/TestimonialsSection.vue';
import { Button } from '@/components/ui/button';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    services: Array<{
        id: number;
        title: string;
        slug: string;
        icon: string;
    }>;
    featuredServices: Array<{
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

const iconMap: Record<string, any> = {
    Dog,
    Cat,
    Rabbit,
    Footprints,
    Home,
    Siren,
    Stethoscope,
    Heart,
};
</script>

<template>
    <Head>
        <title>
            Anihome Petsitter à Courthézon – Garde d'animaux de compagnie dans
            le Vaucluse
        </title>
        <meta
            name="description"
            content="Garde d'animaux de compagnie à votre domicile. Passionnés, pros. Anihome est votre service de garde d’animaux de compagnie à domicile à Courthézon, près de Orange, dans le Vaucluse. Nous sommes Pierre et Wendy, passionnés et professionnels des animaux, et nous prenons soin de votre compagnon à quatre pattes"
        />
    </Head>

    <div class="relative bg-background">
        <!-- Hero Section -->
        <section
            class="relative overflow-hidden bg-primary/10 py-20 text-center md:py-32"
            style="
                background-image: url('/images/pattern_bg_bleu_ok_2.webp');
                background-size: cover;
                background-position: center;
            "
        >
            <div class="relative z-10 container mx-auto px-4">
                <h1
                    class="mx-auto mb-8 max-w-7xl font-heading text-4xl tracking-tight text-white sm:text-6xl"
                >
                    Garde d’animaux de compagnie à votre domicile
                </h1>

                <div class="mb-12 flex justify-center">
                    <img
                        src="/images/line_separator.png"
                        alt="Separator"
                        class="h-6 w-auto opacity-90 brightness-0 invert"
                    />
                </div>

                <div class="flex justify-center">
                    <img
                        src="/images/pets_big_copie.webp"
                        alt="Chiens et chats Anihome"
                        class="h-auto max-w-full animate-in rounded-lg drop-shadow-2xl duration-1000 fade-in slide-in-from-bottom-8"
                    />
                </div>
            </div>

            <!-- Clouds Separator -->
            <div
                class="absolute bottom-0 left-0 w-full translate-y-1 overflow-hidden leading-none"
            >
                <svg
                    class="relative block h-12.5 w-full fill-current text-background md:h-25"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 100 100"
                    preserveAspectRatio="none"
                >
                    <path d="M-5 100 Q 0 20 5 100 Z"></path>
                    <path d="M0 100 Q 5 0 10 100"></path>
                    <path d="M5 100 Q 10 30 15 100"></path>
                    <path d="M10 100 Q 15 10 20 100"></path>
                    <path d="M15 100 Q 20 30 25 100"></path>
                    <path d="M20 100 Q 25 -10 30 100"></path>
                    <path d="M25 100 Q 30 10 35 100"></path>
                    <path d="M30 100 Q 35 30 40 100"></path>
                    <path d="M35 100 Q 40 10 45 100"></path>
                    <path d="M40 100 Q 45 50 50 100"></path>
                    <path d="M45 100 Q 50 20 55 100"></path>
                    <path d="M50 100 Q 55 40 60 100"></path>
                    <path d="M55 100 Q 60 60 65 100"></path>
                    <path d="M60 100 Q 65 50 70 100"></path>
                    <path d="M65 100 Q 70 20 75 100"></path>
                    <path d="M70 100 Q 75 45 80 100"></path>
                    <path d="M75 100 Q 80 30 85 100"></path>
                    <path d="M80 100 Q 85 50 90 100"></path>
                    <path d="M85 100 Q 90 20 95 100"></path>
                    <path d="M90 100 Q 95 40 100 100"></path>
                    <path d="M95 100 Q 100 60 105 100"></path>
                </svg>
            </div>
        </section>

        <!-- Passionnés, pros Section -->
        <section class="relative z-10 bg-background py-20 pb-10">
            <div class="container mx-auto px-4 text-center">
                <h2 class="mb-6 text-3xl font-bold text-primary">
                    Passionnés, pros
                </h2>
                <p
                    class="mx-auto mb-10 max-w-3xl text-xl leading-relaxed text-muted-foreground"
                >
                    <span class="font-bold text-primary">Anihome</span> est
                    votre service de
                    <span class="font-bold text-primary"
                        >garde d’animaux de compagnie à domicile</span
                    >
                    à <span class="font-bold text-primary">Courthézon</span>,
                    près de <span class="font-bold text-primary">Orange</span>,
                    dans le
                    <span class="font-bold text-primary">Vaucluse</span>.
                    <br class="hidden md:block" />
                    Nous sommes Pierre et Wendy, passionnés et professionnels
                    des animaux, et nous prenons soin de votre compagnon à
                    quatre pattes avec amour et respect.
                    <br class="mt-4 block" />
                    <Link href="/contact" class="text-primary hover:underline"
                        >Contactez nous</Link
                    >
                    pour un devis gratuit et sans engagement.
                    <br />
                    Avec <span class="font-bold text-primary">Anihome</span>,
                    votre animal de compagnie est entre de bonnes mains !
                </p>

                <div
                    class="mt-12 flex flex-col justify-center gap-8 text-sm font-semibold text-muted-foreground md:flex-row"
                >
                    <div class="flex items-center justify-center gap-2">
                        <div
                            class="rounded-full bg-primary/10 p-3 text-primary"
                        >
                            <span class="text-xl">📞</span>
                        </div>
                        <div class="text-left">
                            <div class="text-xs tracking-wide uppercase">
                                Contacter Wendy
                            </div>
                            <a
                                href="tel:0641137520"
                                class="text-lg text-primary hover:underline"
                                >06.41.13.75.20</a
                            >
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <div
                            class="rounded-full bg-primary/10 p-3 text-primary"
                        >
                            <span class="text-xl">✉️</span>
                        </div>
                        <div class="text-left">
                            <div class="text-xs tracking-wide uppercase">
                                Envoyer un email
                            </div>
                            <a
                                href="mailto:contact@anihome.fr"
                                class="text-lg text-primary hover:underline"
                                >contact@anihome.fr</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Service Links Grid -->
        <section class="bg-background py-10" v-if="services.length > 0">
            <div class="container mx-auto px-4">
                <div
                    class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6"
                >
                    <Link
                        v-for="service in services"
                        :key="service.id"
                        :href="`/nos-services/${service.slug}`"
                        class="group flex flex-col items-center gap-3 rounded-2xl border border-primary/10 bg-muted/30 p-6 transition-all duration-300 hover:-translate-y-2 hover:bg-primary hover:shadow-xl"
                    >
                        <div
                            class="rounded-full bg-primary/10 p-4 text-primary transition-colors duration-300 group-hover:bg-white/20 group-hover:text-white"
                        >
                            <component
                                :is="iconMap[service.icon] || Dog"
                                class="h-8 w-8"
                            />
                        </div>
                        <span
                            class="text-center font-heading text-lg font-semibold text-primary transition-colors duration-300 group-hover:text-white"
                        >
                            {{ service.title }}
                        </span>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Service Complet Section -->
        <section class="bg-muted/30 py-20 text-center">
            <div class="container mx-auto px-4">
                <h2 class="mb-6 text-3xl font-bold text-primary">
                    Service complet
                </h2>
                <div class="mb-8 flex justify-center">
                    <img
                        src="/images/line_separator.png"
                        alt="Separator"
                        class="h-6 w-auto opacity-50"
                    />
                </div>
                <p
                    class="mx-auto mb-10 max-w-3xl text-lg text-muted-foreground"
                >
                    Chez Anihome nous ne proposons pas uniquement de la garde
                    d’animaux, mais un ensemble de services qui vous permettrons
                    de partir l’esprit tranquille.
                </p>
                <!-- Featured Services Grid -->
                <section
                    class="bg-background py-20"
                    v-if="featuredServices.length > 0"
                >
                    <div class="container mx-auto px-4">
                        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                            <Link
                                v-for="service in featuredServices"
                                :key="service.id"
                                :href="`/nos-services/${service.slug}`"
                                class="group block"
                            >
                                <div
                                    class="overflow-hidden rounded-2xl border border-primary/10 bg-card transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-2xl"
                                >
                                    <div
                                        class="aspect-video w-full overflow-hidden"
                                    >
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
                                    <div class="p-6">
                                        <h3
                                            class="mb-3 font-heading text-2xl text-primary"
                                        >
                                            {{ service.title }}
                                        </h3>
                                        <p
                                            class="line-clamp-3 text-muted-foreground"
                                        >
                                            {{ service.description }}
                                        </p>
                                        <div
                                            class="mt-4 flex items-center font-semibold text-primary"
                                        >
                                            En savoir plus
                                            <span
                                                class="ml-2 transition-transform group-hover:translate-x-1"
                                                >→</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </Link>
                        </div>
                    </div>
                </section>
                <Button
                    size="lg"
                    variant="outline"
                    as-child
                    class="rounded-full border-2 border-primary px-8 py-6 text-lg text-primary transition-all hover:bg-primary hover:text-white"
                >
                    <Link href="/nos-services">VOIR NOS SERVICES</Link>
                </Button>
            </div>
        </section>

        <TestimonialsSection :testimonials="testimonials" />

        <FaqSection :faqs="faqs" />

        <ProfessionalCareSection />
    </div>
</template>
