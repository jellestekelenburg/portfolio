<script setup lang="ts">
defineProps<{
    href?: string;
}>();
</script>

<template>
    <component
        :is="href ? 'a' : 'button'"
        :href="href"
        class="inline-block px-6 py-2.5 border border-white/20 hover:border-white/40 text-white font-medium rounded-lg transition-colors duration-200"
    >
        <slot />
    </component>
</template>
