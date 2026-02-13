<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLogo from '@/components/AppLogo.vue';
import { Button } from '@/components/ui/button';
import ModernMenuOverlay from '@/components/ui/ModernMenuOverlay.vue';
import { cn } from '@/lib/utils';

const navItems = [
    { title: 'Accueil', href: '/' },
    { title: 'Qui sommes nous ?', href: '/qui-sommes-nous' },
    { title: 'Nos services', href: '/nos-services' },
    { title: 'Tarifs', href: '/tarifs' },
    { title: 'Album', href: '/album' },
    { title: 'Actualité', href: '/actualite' },
];

const contactItem = { title: 'Contactez nous', href: '/contact' };

const isMobileMenuOpen = ref(false);
</script>

<template>
    <header
        class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-backdrop-filter:bg-background/60"
    >
        <div
            class="container mx-auto flex h-24 items-center justify-between px-4 md:px-8"
        >
            <Link href="/" class="flex items-center gap-2">
                <AppLogo class="h-16 w-auto" />
            </Link>

            <!-- Desktop Nav -->
            <nav class="hidden items-center gap-8 lg:flex">
                <Link
                    v-for="item in navItems"
                    :key="item.href"
                    :href="item.href"
                    :class="
                        cn(
                            'font-heading text-sm font-medium tracking-wide uppercase transition-colors hover:text-primary',
                            $page.url === item.href
                                ? 'font-bold text-primary'
                                : 'text-muted-foreground',
                        )
                    "
                >
                    {{ item.title }}
                </Link>
                <Button as-child>
                    <Link :href="contactItem.href">{{
                        contactItem.title
                    }}</Link>
                </Button>
            </nav>

            <!-- Mobile Burger Menu -->
            <div class="lg:hidden">
                <ModernMenuOverlay
                    :items="navItems"
                    :contact-item="contactItem"
                    v-model:is-open="isMobileMenuOpen"
                />
            </div>
        </div>
    </header>
</template>
