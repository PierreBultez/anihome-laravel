import type { ComputedRef, Ref } from 'vue';
import { computed, ref } from 'vue';
import type { Appearance, ResolvedAppearance } from '@/types';

export type { Appearance, ResolvedAppearance };

export type UseAppearanceReturn = {
    appearance: Ref<Appearance>;
    resolvedAppearance: ComputedRef<ResolvedAppearance>;
    updateAppearance: (value: Appearance) => void;
};

export function updateTheme(value: Appearance): void {
    // No-op: enforce light mode
    if (typeof document !== 'undefined' && value) {
        document.documentElement.classList.remove('dark');
    }
}

export function initializeTheme(): void {
    updateTheme('light');
}

const appearance = ref<Appearance>('light');

export function useAppearance(): UseAppearanceReturn {
    const resolvedAppearance = computed<ResolvedAppearance>(() => 'light');

    function updateAppearance(value: Appearance) {
        appearance.value = 'light';
        if (value) {
            // keep value usage to satisfy linter if needed, or remove parameter
        }
    }

    return {
        appearance,
        resolvedAppearance,
        updateAppearance,
    };
}
