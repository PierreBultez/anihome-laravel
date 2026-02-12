<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';

defineProps<{
    text?: string;
}>();
</script>

<template>
    <section class="bg-muted/30 py-16">
        <div class="container mx-auto px-4 text-center md:px-8">
            <h2 class="mb-6 text-3xl font-bold text-primary">
                Garde d’animaux professionnelle
            </h2>
            <div class="mb-8 flex justify-center">
                <img
                    src="/images/line_separator.png"
                    alt="Separator"
                    class="h-6 w-auto opacity-50"
                />
            </div>
            <p
                class="mx-auto mb-10 max-w-4xl text-lg leading-relaxed text-muted-foreground"
            >
                {{ text || 'Des dizaines de clients nous font confiance pour garder leur animal de compagnie à Courthézon, Jonquières, Chateauneuf du pape, Orange, Bedarrides, Sorgues, … Faites comme eux et partez tranquille.' }}
            </p>
            <Button size="lg" as-child class="rounded-full px-8 py-6 text-lg">
                <Link href="/contact">NOUS CONTACTER</Link>
            </Button>
        </div>
    </section>
</template>
