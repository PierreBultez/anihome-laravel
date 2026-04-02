<script setup lang="ts">
import { ref, computed } from 'vue';
import { Button } from '@/components/ui/button';

const props = defineProps<{
    testimonials: Array<{
        id: number;
        name: string;
        content: string;
        photo_path: string | null;
    }>;
}>();

const perPage = 6;
const visibleCount = ref(perPage);

const visibleTestimonials = computed(() =>
    props.testimonials.slice(0, visibleCount.value),
);

const hasMore = computed(
    () => visibleCount.value < props.testimonials.length,
);

function loadMore() {
    visibleCount.value += perPage;
}
</script>

<template>
    <section class="bg-muted/30 py-20" v-if="testimonials.length > 0">
        <div class="container mx-auto px-4">
            <h2 class="mb-6 text-center text-3xl font-bold text-primary">
                Témoignages
            </h2>
            <div class="mb-12 flex justify-center">
                <img
                    src="/images/line_separator.png"
                    alt="Separator"
                    class="h-6 w-auto opacity-50"
                />
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="testimonial in visibleTestimonials"
                    :key="testimonial.id"
                    class="rounded-2xl border bg-card p-6 shadow-sm"
                >
                    <div class="flex items-start gap-4">
                        <div
                            class="h-12 w-12 shrink-0 overflow-hidden rounded-full bg-primary/10"
                        >
                            <img
                                v-if="testimonial.photo_path"
                                :src="`/storage/${testimonial.photo_path}`"
                                :alt="testimonial.name"
                                class="h-full w-full object-cover"
                            />
                            <div
                                v-else
                                class="flex h-full w-full items-center justify-center text-primary"
                            >
                                <span class="text-xl font-bold">{{
                                    testimonial.name.charAt(0)
                                }}</span>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-primary">
                                {{ testimonial.name }}
                            </h3>
                            <div class="mt-2 text-muted-foreground">
                                <p
                                    class="text-sm leading-relaxed whitespace-pre-wrap"
                                >
                                    {{ testimonial.content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="hasMore" class="mt-12 flex justify-center">
                <Button
                    size="lg"
                    variant="outline"
                    class="rounded-full border-2 border-primary px-8 py-6 text-lg text-primary transition-all hover:bg-primary hover:text-white"
                    @click="loadMore"
                >
                    Charger plus d'avis
                </Button>
            </div>
        </div>
    </section>
</template>
