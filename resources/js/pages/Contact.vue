<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Textarea } from '@/components/ui/textarea';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

const form = useForm({
    firstname: '',
    name: '',
    email: '',
    animal: '',
    message: '',
});

const submit = () => {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head>
        <title>Contactez-nous – Anihome Petsitter à Courthézon</title>
        <meta
            name="description"
            content="Demander un devis. Nous intervenons sur Courthézon, Orange, Jonquières, Bedarrides..."
        />
    </Head>

    <div class="bg-background">
        <!-- Header -->
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Contactez nous</h1>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="grid gap-16 lg:grid-cols-2">
                <!-- Form -->
                <div>
                    <h2 class="mb-6 text-3xl font-bold text-primary">
                        Demander un devis
                    </h2>
                    <p class="mb-8 text-lg text-muted-foreground">
                        Nous intervenons entre-autres sur les communes de
                        Courthézon, Orange, Jonquières, Bedarrides, Chateauneuf
                        du pape, Sarrians, Sorgues, Violès. Détaillez nous votre
                        demande et nous ferons le maximum pour trouver une
                        solution.
                    </p>

                    <div
                        v-if="$page.props.flash?.success"
                        class="mb-6 rounded-lg bg-green-50 p-4 text-green-700"
                    >
                        {{ $page.props.flash.success }}
                    </div>

                    <form
                        @submit.prevent="submit"
                        class="space-y-6 rounded-xl border bg-card p-8 shadow-sm"
                    >
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <Label for="firstname"
                                    >Votre prénom *</Label
                                >
                                <Input id="firstname" v-model="form.firstname" required />
                                <div v-if="form.errors.firstname" class="text-sm text-red-500">{{ form.errors.firstname }}</div>
                            </div>
                            <div class="space-y-2">
                                <Label for="name">Votre nom *</Label>
                                <Input id="name" v-model="form.name" required />
                                <div v-if="form.errors.name" class="text-sm text-red-500">{{ form.errors.name }}</div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <Label for="email">Votre email *</Label>
                            <Input
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                            />
                            <div v-if="form.errors.email" class="text-sm text-red-500">{{ form.errors.email }}</div>
                        </div>

                        <div class="space-y-2">
                            <Label for="animal">Votre animal</Label>
                            <Select v-model:model-value="form.animal">
                                <SelectTrigger>
                                    <SelectValue placeholder="Votre animal" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="Chat(s)"
                                        >Chat(s)</SelectItem
                                    >
                                    <SelectItem value="Chien(s)"
                                        >Chien(s)</SelectItem
                                    >
                                    <SelectItem value="Lapin(s)"
                                        >Lapin(s)</SelectItem
                                    >
                                    <SelectItem value="Hamster(s)"
                                        >Hamster(s)</SelectItem
                                    >
                                    <SelectItem value="Rat(s)"
                                        >Rat(s)</SelectItem
                                    >
                                    <SelectItem value="Poisson(s)"
                                        >Poisson(s)</SelectItem
                                    >
                                    <SelectItem value="Serpent(s)"
                                        >Serpent(s)</SelectItem
                                    >
                                    <SelectItem value="Arachnide(s)"
                                        >Arachnide(s)</SelectItem
                                    >
                                    <SelectItem value="Reptile(s)"
                                        >Reptile(s)</SelectItem
                                    >
                                    <SelectItem value="Autre(s)"
                                        >Autre(s)</SelectItem
                                    >
                                </SelectContent>
                            </Select>
                            <div v-if="form.errors.animal" class="text-sm text-red-500">{{ form.errors.animal }}</div>
                        </div>

                        <div class="space-y-2">
                            <Label for="message">Votre message *</Label>
                            <Textarea
                                id="message"
                                class="min-h-37.5"
                                v-model="form.message"
                                required
                            />
                            <div v-if="form.errors.message" class="text-sm text-red-500">{{ form.errors.message }}</div>
                        </div>

                        <Button
                            type="submit"
                            size="lg"
                            class="w-full py-6 text-lg"
                            :disabled="form.processing"
                        >
                            {{ form.processing ? 'ENVOI EN COURS...' : 'DEMANDER UN DEVIS' }}
                        </Button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div>
                    <h2 class="mb-8 text-3xl font-bold text-primary">
                        Nous contacter
                    </h2>

                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <div
                                class="shrink-0 rounded-full bg-primary/10 p-3 text-primary"
                            >
                                <span class="text-xl">📞</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">
                                    Contacter Wendy
                                </h3>
                                <a
                                    href="tel:0641137520"
                                    class="text-xl text-primary hover:underline"
                                    >06.41.13.75.20</a
                                >
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="shrink-0 rounded-full bg-primary/10 p-3 text-primary"
                            >
                                <span class="text-xl">📞</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">
                                    Contacter Pierre
                                </h3>
                                <a
                                    href="tel:0641137518"
                                    class="text-xl text-primary hover:underline"
                                    >06.41.13.75.18</a
                                >
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="shrink-0 rounded-full bg-primary/10 p-3 text-primary"
                            >
                                <span class="text-xl">✉️</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">
                                    Notre email
                                </h3>
                                <a
                                    href="mailto:contact@anihome.fr"
                                    class="text-xl text-primary hover:underline"
                                    >contact@anihome.fr</a
                                >
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="shrink-0 rounded-full bg-red-100 p-3 text-red-600"
                            >
                                <span class="text-xl">🚨</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-red-600">
                                    Urgences vétérinaires
                                </h3>
                                <a
                                    href="tel:3115"
                                    class="text-xl text-primary hover:underline"
                                    >3115</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <FaqSection />

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

        <ProfessionalCareSection />
    </div>
</template>
