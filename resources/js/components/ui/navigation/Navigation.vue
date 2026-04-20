<script setup lang="ts">
import { ThemeSwitcher } from '@/components/ui/themeswitcher';
import { Menu } from '@/components/ui/menu';
import { useTheme } from '@/composables/useTheme';
import { onMounted, onUnmounted, ref, watch } from 'vue';

const { selectedTheme, resolvedTheme } = useTheme();
const dark = ref(true)
const active = ref(false);
watch(
    [selectedTheme, resolvedTheme],
    ([selected, resolved]) => {
        dark.value = selected === 'dark' || (selected === 'system' && resolved === 'dark');
    },
    { immediate: true },
);

const handleScroll = () => {
    active.value = window.scrollY > 1;
}

onMounted(() => {
    handleScroll();
    window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <nav class="fixed top-0 left-0 z-50 isolate w-full transition-all">
        <div
            aria-hidden="true"
            class="pointer-events-none absolute inset-x-0 top-0 z-0 h-32 backdrop-blur-xl [-webkit-mask-image:linear-gradient(to_bottom,black_0%,black_30%,transparent_100%)] [mask-image:linear-gradient(to_bottom,black_0%,black_30%,transparent_100%)]"
        ></div>

        <div class="container relative z-10">
            <div :class="!active ? 'border-b border-black/5 dark:border-white/5' : ''" class="py-4 flex items-center justify-between">
                <img :src="dark ? '/img/branding/logo+t-d.svg' : '/img/branding/logo+t.svg'" class="w-50" alt="">
                <div class="flex gap-x-8 items-center">
                    <Menu/>
                    <ThemeSwitcher />
                </div>
            </div>
        </div>
    </nav>
</template>
