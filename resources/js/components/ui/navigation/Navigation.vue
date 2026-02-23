<script setup lang="ts">
import { ThemeSwitcher } from '@/components/ui/themeswitcher';
import { Menu } from '@/components/ui/menu';
import { useTheme } from '@/composables/useTheme';
import { ref, watch } from 'vue';

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

//if scroll higher than 100px, add shadow to nav

let classList = [
    'dark:bg-gray-900/90',
    'bg-white/90',
    'backdrop-blur-xs',
];
const handleScroll = () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 1) {
        nav?.classList.add(...classList);
        active.value = true;
    }
    else {
        nav?.classList.remove(...classList);
        active.value = false;
    }
}

window.addEventListener('scroll', handleScroll);
</script>

<template>
    <nav class="fixed w-full z-50 top-0 left-0 transition">
        <div class="container">
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
