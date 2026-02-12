<script setup lang="ts">
import MainFooter from '@/components/MainFooter.vue';
import MainHeader from '@/components/MainHeader.vue';
</script>

<template>
    <div class="flex min-h-screen flex-col bg-background font-sans antialiased">
        <MainHeader />
        <main class="flex-1">
            <slot />
        </main>
        <MainFooter />
    </div>
</template>
