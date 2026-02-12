<script setup lang="ts">
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from '@/components/ui/accordion';

defineProps<{
    faqs?: Array<{
        question: string;
        answer: string;
    }>;
}>();
</script>

<template>
    <section class="bg-background py-12" v-if="faqs && faqs.length > 0">
        <div class="container mx-auto px-4 md:px-8">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-primary">
                    Questions fréquentes
                </h2>
                <div class="mb-4 flex justify-center">
                    <!-- Placeholder for separator image -->
                    <div class="h-1 w-24 rounded bg-muted-foreground/20"></div>
                </div>
                <p class="text-muted-foreground">
                    Vous trouverez ici les réponses à la plupart des questions
                    que vous vous posez.
                </p>
            </div>

            <div class="mx-auto max-w-3xl">
                <Accordion type="single" collapsible>
                    <AccordionItem
                        v-for="(faq, index) in faqs"
                        :key="index"
                        :value="`item-${index}`"
                    >
                        <AccordionTrigger>{{ faq.question }}</AccordionTrigger>
                        <AccordionContent>
                            {{ faq.answer }}
                        </AccordionContent>
                    </AccordionItem>
                </Accordion>
            </div>
        </div>
    </section>
</template>
