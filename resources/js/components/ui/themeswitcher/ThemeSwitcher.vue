<script setup lang="ts">
import { removeTheme, setTheme } from '@/composables/themeSwitcher';

// Todo: Styling, active state, icons

</script>
<template>
    <div class="flex items-center gap-2 text-sm">
        <span class="text-gray-400">Theme</span>
        <div class="flex items-center gap-2 rounded-md bg-gray-800 px-2 py-1 text-white">
            <button type="button" class="cursor-pointer" @click="setTheme('light')">Light</button>
            <button type="button" class="cursor-pointer" @click="setTheme('dark')">Dark</button>
            <button type="button" class="cursor-pointer" @click="removeTheme()">System</button>
        </div>
    </div>
</template>

