<script setup lang="ts">
import AppHead from '@/components/AppHead.vue';
import { useTheme } from '@/composables/useTheme';

useTheme().setTheme('dark');
</script>
<template>
    <AppHead title="Coming Soon" noindex />
    <div class="min-h-screen bg-gray-900">
        <section class="bg-gradient-up">
            <div
                class="mx-auto flex h-screen max-w-7xl items-center justify-center px-6"
            >
                <div class="flex flex-col text-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 40 40"
                        class="mx-auto -mt-20 mb-10 size-30 fill-primary"
                    >
                        <g id="Layer_1">
                            <g id="logogram">
                                <path
                                    class="cls-1"
                                    d="M39.67,31.67c-.06.31-.14.59-.23.87-.61,1.81-1.67,3.41-3.05,4.66l-9.95-11.15,13.23,5.63Z"
                                />
                                <path
                                    class="cls-1"
                                    d="M3.49,37.08c-1.32-1.23-2.34-2.78-2.92-4.54-.1-.3-.19-.62-.25-.96l13.02-5.53-9.84,11.03Z"
                                />
                                <path
                                    class="cls-1"
                                    d="M40,24.62c0,1.12,0,2.1-.01,2.95l-11.81-4.56h11.83v1.61Z"
                                />
                                <path
                                    class="cls-1"
                                    d="M11.6,23.01L.01,27.48c0-.83-.01-1.78-.01-2.86v-1.61h11.6Z"
                                />
                                <path
                                    class="cls-1"
                                    d="M24.62,0c4.16,0,6.24,0,7.92.56,3.26,1.09,5.81,3.64,6.9,6.9.56,1.68.56,3.76.56,7.92v4.63h-12.49l9.01-3.83-2.67-1.77-8.74,3.38,4.1-5.43-2.95-.81-4.53,5.08-.34-5.72h-3.01l-.34,5.72-4.53-5.08-2.95.81,4.1,5.43-8.74-3.37-2.67,1.77,9.01,3.83H0v-4.63c0-4.16,0-6.24.56-7.92C1.65,4.2,4.2,1.65,7.46.56,9.14,0,11.22,0,15.38,0h9.24Z"
                                />
                            </g>
                            <polygon
                                class="cls-1"
                                points="27.51 40 12.49 40 20 22.76 27.51 40"
                            />
                        </g>
                    </svg>
                    <h1 class="text-5xl text-white">
                        Coming
                        <span class="text-primary italic">(very)</span>
                        soon
                    </h1>
                    <p class="mt-3 text-lg text-gray-200">
                        I'm currenly building, follow my
                        <a
                            href="https://github.com/jellestekelenburg"
                            rel="nofollow"
                            target="_blank"
                            class="underline"
                            >github</a
                        >
                        to stay in the loop!
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>
