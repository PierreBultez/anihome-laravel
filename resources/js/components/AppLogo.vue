<template>
    <div class="flex items-center">
        <img :src="src" alt="Anihome" class="h-full w-auto object-contain" />
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    variant?: 'default' | 'footer';
}>();

const src = computed(() => {
    return props.variant === 'footer'
        ? '/images/Logo_footer.png'
        : '/images/Logo.png';
});
</script>
