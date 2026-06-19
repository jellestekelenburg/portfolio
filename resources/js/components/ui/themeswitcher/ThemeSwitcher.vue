<script setup lang="ts">
import { useTheme } from '@/composables/useTheme';
import { ref } from 'vue';

type Theme = 'light' | 'dark' | 'system';

const currentTheme = ref<Theme>((localStorage.getItem('theme') as Theme) || 'system');
const showMenu = ref(false);

const themeOptions: Array<{ value: Theme; label: string; iconPath: string }> = [
    {
        value: 'light',
        label: 'Light',
        iconPath:
            'M320 496C333.3 496 344 506.7 344 520L344 584C344 597.3 333.3 608 320 608C306.7 608 296 597.3 296 584L296 520C296 506.7 306.7 496 320 496zM161.6 444.4C171 435 186.2 435 195.6 444.4C205 453.8 205 469 195.6 478.4L150.3 523.7C140.9 533.1 125.7 533.1 116.4 523.7C107.1 514.3 107 499.1 116.4 489.8L161.6 444.5zM444.4 444.4C453.8 435 469 435 478.4 444.4L523.7 489.7C533.1 499.1 533.1 514.3 523.7 523.6C514.3 532.9 499.1 533 489.8 523.6L444.5 478.3C435.1 468.9 435.1 453.7 444.5 444.3zM320 448C249.3 448 192 390.7 192 320C192 249.3 249.3 192 320 192C390.7 192 448 249.3 448 320C448 390.7 390.7 448 320 448zM120 296C133.3 296 144 306.7 144 320C144 333.3 133.3 344 120 344L56 344C42.7 344 32 333.3 32 320C32 306.7 42.7 296 56 296L120 296zM584 296C597.3 296 608 306.7 608 320C608 333.3 597.3 344 584 344L520 344C506.7 344 496 333.3 496 320C496 306.7 506.7 296 520 296L584 296zM116.3 116.3C125.7 106.9 140.9 106.9 150.2 116.3L195.5 161.5C204.9 170.9 204.9 186.1 195.5 195.5C186.1 204.9 170.9 204.9 161.5 195.5L116.3 150.3C106.9 140.9 106.9 125.7 116.3 116.4zM489.7 116.3C499.1 106.9 514.3 106.9 523.6 116.3C532.9 125.7 533 140.9 523.6 150.2L478.3 195.5C468.9 204.9 453.7 204.9 444.3 195.5C434.9 186.1 434.9 170.9 444.3 161.5L489.6 116.3zM320 32C333.3 32 344 42.7 344 56L344 120C344 133.3 333.3 144 320 144C306.7 144 296 133.3 296 120L296 56C296 42.7 306.7 32 320 32z',
    },
    {
        value: 'dark',
        label: 'Dark',
        iconPath:
            'M320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576C388.8 576 451.3 548.8 497.3 504.6C504.6 497.6 506.7 486.7 502.6 477.5C498.5 468.3 488.9 462.6 478.8 463.4C473.9 463.8 469 464 464 464C362.4 464 280 381.6 280 280C280 207.9 321.5 145.4 382.1 115.2C391.2 110.7 396.4 100.9 395.2 90.8C394 80.7 386.6 72.5 376.7 70.3C358.4 66.2 339.4 64 320 64z',
    },
    {
        value: 'system',
        label: 'System',
        iconPath:
            'M128 96C92.7 96 64 124.7 64 160L64 416C64 451.3 92.7 480 128 480L272 480L256 528L184 528C170.7 528 160 538.7 160 552C160 565.3 170.7 576 184 576L456 576C469.3 576 480 565.3 480 552C480 538.7 469.3 528 456 528L384 528L368 480L512 480C547.3 480 576 451.3 576 416L576 160C576 124.7 547.3 96 512 96L128 96zM160 160L480 160C497.7 160 512 174.3 512 192L512 352C512 369.7 497.7 384 480 384L160 384C142.3 384 128 369.7 128 352L128 192C128 174.3 142.3 160 160 160z',
    },
];

function toggleMenu() {
    showMenu.value = !showMenu.value;
}

function isActive(value: Theme) {
    return currentTheme.value === value;
}

function selectTheme(value: Theme) {
    currentTheme.value = value;

    useTheme().setTheme(value);
}
</script>
<template>
    <div class="text-sm relative">
        <span
            @click="toggleMenu"
            data-cursor-variant="link"
            class="cursor-pointer relative"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 pointer-events-none relative z-10 fill-gray-800 dark:fill-gray-100" viewBox="0 0 640 640"><path d="M512 320C512 214 426 128 320 128L320 512C426 512 512 426 512 320zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320z"/></svg>
            <span class="absolute size-9 left-1/2 top-1/2 -translate-1/2 z-0 bg-transparent  hover:bg-gray-900/15 dark:hover:bg-white/15 rounded-md">

            </span>
        </span>
        <div :class="showMenu ? '' : 'hidden'" class="flex flex-col items-start justify-start gap-2 rounded-md  bg-gray-100/70 dark:bg-gray-900/70 backdrop-blur-lg p-2 text-gray-800 dark:text-white absolute -bottom-1 right-0 translate-y-full z-10 border dark:border-primary/20 border-dark-primary/20 shadow-xl shadow-primary/20">
            <button
                v-for="option in themeOptions"
                :key="option.value"
                type="button"
                class="cursor-pointer flex w-full gap-1 items-center px-2 py-1 rounded-sm transition-colors"
                :class="isActive(option.value) ? 'bg-gray-800/10 dark:bg-white/20 text-gray-800  dark:text-white' : 'text-gray-800/80 dark:text-white/80 hover:bg-gray-800/10 dark:hover:bg-white/10 hover:text-gray-900 dark:hover:text-white'"
                @click="selectTheme(option.value)"
            >
                <svg class="fill-current size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                    <path :d="option.iconPath" />
                </svg>
                {{ option.label }}
            </button>
        </div>
    </div>
</template>
