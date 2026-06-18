<script setup lang="ts">
type FooterLink = {
    label: string;
    href: string;
    external?: boolean;
};

const currentYear = new Date().getFullYear();

const socialLinks: FooterLink[] = [
    {
        label: 'GitHub',
        href: 'https://github.com/jellestekelenburg',
        external: true,
    },
    {
        label: 'LinkedIn',
        href: 'https://www.linkedin.com/in/jelle-stekelenburg/',
        external: true,
    },
    {
        label: 'Email',
        href: 'mailto:jellemaarten02@gmail.com',
    },
];
</script>

<template>
    <footer class="relative bg-gray-50 dark:bg-gray-900">
        <svg
            id="Layer_2"
            data-name="Layer 2"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 40 29.09"
            class="absolute bottom-10 left-1/2 h-auto w-full -translate-x-1/2 fill-dark-primary opacity-40 blur-xl sm:blur-2xl md:blur-3xl dark:fill-primary"
        >
            <polygon
                class="cls-1"
                points="12.49 29.09 20 11.85 27.51 29.09 36.39 26.29 26.44 15.13 39.67 20.76 39.99 16.66 28.17 12.1 40 12.1 40 9.11 27.51 9.11 36.52 5.28 33.85 3.5 25.1 6.88 29.21 1.45 26.26 .64 21.73 5.72 21.39 0 18.38 0 18.04 5.72 13.51 .64 10.56 1.45 14.66 6.88 5.93 3.5 3.25 5.28 12.26 9.11 0 9.11 0 12.1 11.6 12.1 .01 16.57 .31 20.67 13.32 15.14 3.49 26.17 12.49 29.09"
            />
        </svg>
        <div class="container">
            <div
                class="border-standard grid gap-8 border-x border-t px-8 py-8 md:grid-cols-[1fr_auto] md:items-end md:px-10"
            >
                <div>
                    <img src="/img/branding/logo+t.svg" class="h-10" alt="" />
                    <p class="mt-3 max-w-md text-gray-600 dark:text-gray-400">
                        Made by me, built with Laravel, Vue and a healthy amount
                        of attention to detail.
                    </p>
                </div>

                <div class="md:text-right">
                    <nav aria-label="Social links">
                        <ul
                            class="flex flex-wrap gap-x-5 gap-y-2 md:justify-end"
                        >
                            <li v-for="link in socialLinks" :key="link.href">
                                <a
                                    :href="link.href"
                                    :target="
                                        link.external ? '_blank' : undefined
                                    "
                                    :rel="
                                        link.external
                                            ? 'noopener noreferrer'
                                            : undefined
                                    "
                                    class="text-sm text-gray-600 transition hover:text-dark-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-dark-primary dark:text-gray-400 dark:hover:text-primary dark:focus-visible:outline-primary"
                                >
                                    {{ link.label }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div
                class="border-standard flex flex-col gap-2 border-x border-t px-8 py-5 text-xs text-gray-500 md:flex-row md:items-center md:justify-between md:px-10 dark:text-gray-500"
            >
                <p>&copy; {{ currentYear }} Jelle Stekelenburg.</p>
                <p>Designed, developed and maintained in the Netherlands.</p>
            </div>
        </div>
    </footer>
</template>
