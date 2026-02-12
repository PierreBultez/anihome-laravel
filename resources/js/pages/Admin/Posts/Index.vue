<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { Pencil, Plus, Trash2 } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { create, destroy, edit } from '@/routes/admin/posts';
import { type BreadcrumbItem } from '@/types';

defineProps<{
    posts: Array<{
        id: number;
        title: string;
        published_at: string | null;
        user: { name: string };
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Actualités',
        href: '/admin/posts',
    },
];

const deletePost = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
        router.delete(destroy(id));
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion des Actualités" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Actualités</h1>
                <Button as-child>
                    <Link :href="create()">
                        <Plus class="mr-2 h-4 w-4" />
                        Nouvel Article
                    </Link>
                </Button>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Titre</TableHead>
                            <TableHead>Auteur</TableHead>
                            <TableHead>Publication</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="post in posts" :key="post.id">
                            <TableCell class="font-medium">{{
                                post.title
                            }}</TableCell>
                            <TableCell>{{ post.user.name }}</TableCell>
                            <TableCell>
                                {{
                                    post.published_at
                                        ? new Date(
                                              post.published_at,
                                          ).toLocaleDateString('fr-FR')
                                        : 'Brouillon'
                                }}
                            </TableCell>
                            <TableCell class="text-right">
                                <div class="flex justify-end gap-2">
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        as-child
                                    >
                                        <Link :href="edit(post.id)">
                                            <Pencil class="h-4 w-4" />
                                        </Link>
                                    </Button>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click="deletePost(post.id)"
                                    >
                                        <Trash2 class="h-4 w-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
