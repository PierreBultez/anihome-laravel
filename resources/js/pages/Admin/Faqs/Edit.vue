<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Switch } from '@/components/ui/switch';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, update } from '@/routes/admin/faqs';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    faq: {
        id: number;
        question: string;
        answer: string;
        is_active: boolean;
        order: number;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'FAQ',
        href: '/admin/faqs',
    },
    {
        title: 'Modifier',
        href: '',
    },
];

const form = useForm({
    _method: 'patch',
    question: props.faq.question,
    answer: props.faq.answer,
    is_active: props.faq.is_active,
    order: props.faq.order,
});

const submit = () => {
    form.post(update.url(props.faq.id));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Modifier la FAQ" />

        <div
            class="mx-auto flex h-full w-full max-w-4xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Modifier la FAQ</h1>

            <form @submit.prevent="submit" class="space-y-6">
                <div class="space-y-2">
                    <Label for="question">Question</Label>
                    <Input id="question" v-model="form.question" required />
                    <div v-if="form.errors.question" class="text-sm text-red-500">
                        {{ form.errors.question }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="answer">Réponse</Label>
                    <Textarea id="answer" v-model="form.answer" required class="min-h-37.5" />
                    <div
                        v-if="form.errors.answer"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.answer }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="order">Ordre d'affichage</Label>
                    <Input id="order" type="number" v-model="form.order" required />
                    <div v-if="form.errors.order" class="text-sm text-red-500">
                        {{ form.errors.order }}
                    </div>
                </div>

                <div class="space-y-2 pt-4">
                    <div class="flex items-center space-x-2">
                        <Switch
                            id="is_active"
                            :model-value="form.is_active"
                            @update:model-value="form.is_active = $event"
                        />
                        <Label for="is_active">Afficher sur le site</Label>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <Button variant="outline" as-child>
                        <Link :href="index()">Annuler</Link>
                    </Button>
                    <Button type="submit" :disabled="form.processing">
                        Mettre à jour
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
