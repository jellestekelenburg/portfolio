<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
</script>

<template>
    <ul class="flex items-center gap-x-8 text-base lowercase  text-gray-700 dark:text-white/80">
        <li class="active"><Link href="/" >Home</Link></li>
        <li><Link href="/">About</Link></li>
        <li><Link href="/">Projects</Link></li>
        <li><Link href="/">Contact</Link></li>
    </ul>
</template>

<style scoped>
@reference "#app.css";

ul li {
    @apply hover:-translate-y-px transition-all relative;
}

ul li::before {
    content: "";
    width: var(--pixel-size);
    height: var(--pixel-size);
    position: absolute;
    left: 50%; bottom: 0;
    transform: translate(-50%, 100%);
    background: transparent;
}

ul li:is(.active, :hover, :focus-within) {
    &::before {
        background: var(--color-dark-primary);

    }
    &:where([data-theme="dark"], [data-theme="dark"] *)::before {
        background: var(--color-primary) !important;
    }
}
</style>
