<script setup lang="ts">
import {
    CreditCard,
    DatabaseZap,
    Image,
    Layers3,
    LayoutTemplate,
    Palette,
    PenTool,
    SearchCheck,
    ShieldCheck,
    ShoppingBag,
    TableProperties,
} from 'lucide-vue-next';
import { motion, useReducedMotion } from 'motion-v';
import type { Component } from 'vue';
import Lines from '@/components/ui/Lines.vue';

type Technology = {
    name: string;
    brandIcon?: string;
    color?: string;
    conceptIcon?: Component;
    iconAlt?: string;
};

type TechnologyCategory = {
    title: string;
    eyebrow: string;
    technologies: Technology[];
};

type PixelDigit = {
    active: number[];
    frames: number[][];
};

const pixelDigits: Record<number, PixelDigit> = {
    1: {
        active: [3, 7, 8, 13, 18, 23, 27, 28, 29],
        frames: [[3], [7, 8], [13], [18], [23], [27, 28, 29]],
    },
    2: {
        active: [2, 3, 4, 5, 10, 15, 19, 23, 27, 28, 29, 30],
        frames: [[2, 3, 4], [5, 10], [15], [19], [23], [27, 28, 29, 30]],
    },
    3: {
        active: [1, 2, 3, 4, 10, 14, 15, 19, 20, 26, 27, 28, 29],
        frames: [[1, 2, 3, 4], [10], [14, 15], [19, 20], [26, 27, 28, 29]],
    },
    4: {
        active: [1, 5, 6, 10, 11, 12, 13, 14, 15, 20, 25, 30],
        frames: [[1, 5], [6, 10], [11, 12, 13, 14, 15], [20], [25], [30]],
    },
    5: {
        active: [1, 2, 3, 4, 5, 6, 11, 12, 13, 14, 20, 25, 26, 27, 28, 29],
        frames: [
            [1, 2, 3, 4, 5],
            [6],
            [11, 12, 13, 14],
            [20],
            [25],
            [26, 27, 28, 29],
        ],
    },
    6: {
        active: [2, 3, 4, 6, 11, 12, 13, 14, 16, 20, 21, 25, 27, 28, 29],
        frames: [
            [2, 3, 4],
            [6],
            [11, 12, 13, 14],
            [16, 20],
            [21, 25],
            [27, 28, 29],
        ],
    },
};

const pixelIds = Array.from({ length: 30 }, (_, index) => index + 1);

const isActivePixel = (digit: number, pixelId: number): boolean => {
    return pixelDigits[digit]?.active.includes(pixelId) ?? false;
};

const pixelFrame = (digit: number, pixelId: number): number => {
    const frame = pixelDigits[digit]?.frames.findIndex((pixels) =>
        pixels.includes(pixelId),
    );

    return frame === -1 ? 0 : frame;
};

const iconUrl = (slug: string, color: string): string =>
    `https://cdn.simpleicons.org/${slug}/${color}`;

const technologyCategories: TechnologyCategory[] = [
    {
        title: 'Frontend',
        eyebrow: 'Interface engineering',
        technologies: [
            { name: 'HTML5', brandIcon: 'html5', color: 'E34F26' },
            { name: 'CSS3', brandIcon: 'css', color: '1572B6' },
            { name: 'JavaScript', brandIcon: 'javascript', color: 'F7DF1E' },
            { name: 'Vue.js', brandIcon: 'vuedotjs', color: '4FC08D' },
            { name: 'React', brandIcon: 'react', color: '61DAFB' },
            { name: 'Inertia.js', brandIcon: 'inertia', color: '9553E9' },
            { name: 'Tailwind CSS', brandIcon: 'tailwindcss', color: '06B6D4' },
        ],
    },
    {
        title: 'Backend',
        eyebrow: 'Application architecture',
        technologies: [
            { name: 'PHP', brandIcon: 'php', color: '777BB4' },
            { name: 'Laravel', brandIcon: 'laravel', color: 'FF2D20' },
            {
                name: 'REST APIs',
                brandIcon: 'openapiinitiative',
                color: '6BA539',
                iconAlt: 'OpenAPI logo',
            },
            { name: 'Authentication', conceptIcon: ShieldCheck },
            { name: 'Eloquent ORM', conceptIcon: DatabaseZap },
            { name: 'MVC', conceptIcon: Layers3 },
            { name: 'Payment Integrations', conceptIcon: CreditCard },
        ],
    },
    {
        title: 'Database',
        eyebrow: 'Data modelling',
        technologies: [
            { name: 'MySQL', brandIcon: 'mysql', color: '4479A1' },
            { name: 'SQL', conceptIcon: TableProperties },
            { name: 'Database Design', conceptIcon: DatabaseZap },
        ],
    },
    {
        title: 'Tooling',
        eyebrow: 'Build workflow',
        technologies: [
            { name: 'Git', brandIcon: 'git', color: 'F05032' },
            { name: 'Vite', brandIcon: 'vite', color: '646CFF' },
            { name: 'NPM', brandIcon: 'npm', color: 'CB3837' },
            { name: 'Composer', brandIcon: 'composer', color: '885630' },
        ],
    },
    {
        title: 'Design & Creative',
        eyebrow: 'Visual problem solving',
        technologies: [
            { name: 'Adobe Photoshop', conceptIcon: Image },
            { name: 'Adobe Illustrator', conceptIcon: PenTool },
            { name: 'Figma', brandIcon: 'figma', color: 'F24E1E' },
            { name: 'UI Design', conceptIcon: LayoutTemplate },
            { name: 'Image Editing', conceptIcon: Palette },
        ],
    },
    {
        title: 'Growth & SEO',
        eyebrow: 'Visibility and insights',
        technologies: [
            { name: 'SEO', conceptIcon: SearchCheck },
            {
                name: 'Google Search Console',
                brandIcon: 'googlesearchconsole',
                color: '458CF5',
            },
            {
                name: 'Google Analytics',
                brandIcon: 'googleanalytics',
                color: 'E37400',
            },
            {
                name: 'Google Merchant Center',
                conceptIcon: ShoppingBag,
                iconAlt: 'Merchant Center icon',
            },
        ],
    },
];

const shouldReduceMotion = useReducedMotion();
</script>

<template>
    <section
        id="technologies"
        class="relative bg-gray-50 dark:bg-gray-900"
        aria-label="Capabilities & Tools"
    >
        <div
            class="pointer-events-none absolute inset-0 z-0"
            aria-hidden="true"
        ></div>

        <div class="relative z-10 container">
            <div
                class="relative border-x border-black/5 py-16 md:py-20 lg:py-0 dark:border-white/5"
            >
                <div
                    v-if="!shouldReduceMotion"
                    class="hidden items-start border-y border-black/5 lg:grid lg:grid-cols-[0.9fr_1.1fr] dark:border-white/5"
                >
                    <aside
                        class="sticky top-0 flex h-screen self-start overflow-hidden border-r border-black/5 dark:border-white/5"
                    >
                        <Lines />
                        <div
                            class="relative z-10 flex w-full flex-col justify-center p-10"
                        >
                            <header>
                                <p
                                    class="font-grotesk text-xs font-semibold text-dark-primary uppercase dark:text-primary"
                                >
                                    Full-stack toolkit
                                </p>
                                <h2
                                    class="mt-5 text-5xl text-gray-800 dark:text-gray-100"
                                >
                                    Capabilities
                                    <span
                                        class="text-dark-primary italic dark:text-primary"
                                        >&</span
                                    >
                                    Tools
                                </h2>
                                <p
                                    class="mt-5 max-w-sm text-gray-600 dark:text-gray-400"
                                >
                                    A practical mix of technologies, frameworks
                                    and creative tools I use to build, improve
                                    and maintain modern web applications.
                                </p>
                            </header>

                            <div class="mt-14 grid gap-4">
                                <div
                                    v-for="(
                                        category, index
                                    ) in technologyCategories"
                                    :key="category.title"
                                    class="flex items-center gap-4"
                                >
                                    <div
                                        class="size-(--pixel-size) bg-dark-primary dark:bg-primary"
                                    ></div>
                                    <div
                                        class="flex grow items-baseline justify-between gap-4"
                                    >
                                        <span
                                            class="font-grotesk text-sm font-semibold text-gray-800 dark:text-gray-200"
                                        >
                                            {{ category.title }}
                                        </span>
                                        <span
                                            class="font-grotesk text-xs text-gray-400 dark:text-gray-600"
                                        >
                                            0{{ index + 1 }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <div class="relative">
                        <motion.article
                            v-for="(category, index) in technologyCategories"
                            :key="category.title"
                            class="relative flex min-h-screen items-center border-b border-black/5 p-10 last:border-b-0 dark:border-white/5"
                            :initial="{
                                opacity: 0,
                                y: 72,
                                scale: 0.96,
                                filter: 'blur(14px)',
                            }"
                            :whileInView="{
                                opacity: 1,
                                y: 0,
                                scale: 1,
                                filter: 'blur(0px)',
                            }"
                            :viewport="{ once: false, amount: 0.45 }"
                            :transition="{
                                duration: 0.62,
                                ease: [0.22, 1, 0.36, 1],
                            }"
                        >
                            <div
                                class="relative w-full border border-black/5 p-8 backdrop-blur-3xl dark:border-white/8 dark:bg-gray-950/50"
                            >
                                <div
                                    class="flex min-h-124 flex-col justify-between gap-12"
                                >
                                    <div
                                        class="flex items-start justify-between gap-8"
                                    >
                                        <div>
                                            <p
                                                class="font-grotesk text-xs font-semibold text-gray-500 uppercase dark:text-gray-400"
                                            >
                                                {{ category.eyebrow }}
                                            </p>
                                            <h3
                                                class="mt-3 font-grotesk text-4xl font-bold text-gray-900 dark:text-gray-100"
                                            >
                                                {{ category.title }}
                                            </h3>
                                        </div>
                                        <div
                                            class="flex flex-col items-end gap-5"
                                            aria-hidden="true"
                                        >
                                            <span
                                                class="grid grid-cols-5 grid-rows-6"
                                                :class="`--number-${index + 1}`"
                                            >
                                                <span
                                                    v-for="pixelId in pixelIds"
                                                    :key="pixelId"
                                                    class="pixel-digit__pixel size-(--pixel-size)"
                                                    :class="{
                                                        'is-active':
                                                            isActivePixel(
                                                                index + 1,
                                                                pixelId,
                                                            ),
                                                    }"
                                                    :style="{
                                                        '--pixel-frame':
                                                            pixelFrame(
                                                                index + 1,
                                                                pixelId,
                                                            ),
                                                    }"
                                                ></span>
                                            </span>
                                        </div>
                                    </div>

                                    <ul class="grid grid-cols-2 gap-3">
                                        <motion.li
                                            v-for="(
                                                technology, technologyIndex
                                            ) in category.technologies"
                                            :key="technology.name"
                                            class="flex min-h-18 items-center gap-4 border border-black/5 p-4 transition duration-300 hover:border-dark-primary/25 dark:border-white/6 dark:hover:border-primary/25"
                                            :initial="{
                                                opacity: 0,
                                                y: 18,
                                                scale: 0.96,
                                            }"
                                            :whileInView="{
                                                opacity: 1,
                                                y: 0,
                                                scale: 1,
                                            }"
                                            :viewport="{
                                                once: false,
                                                amount: 0.65,
                                            }"
                                            :transition="{
                                                duration: 0.32,
                                                delay: technologyIndex * 0.025,
                                                ease: [0.22, 1, 0.36, 1],
                                            }"
                                        >
                                            <span
                                                class="flex size-11 shrink-0 items-center justify-center border border-black/5 dark:border-white/8"
                                            >
                                                <img
                                                    v-if="technology.brandIcon"
                                                    class="size-6"
                                                    :src="
                                                        iconUrl(
                                                            technology.brandIcon,
                                                            technology.color ??
                                                                '111111',
                                                        )
                                                    "
                                                    :alt="
                                                        technology.iconAlt ??
                                                        `${technology.name} logo`
                                                    "
                                                    loading="lazy"
                                                />
                                                <component
                                                    :is="technology.conceptIcon"
                                                    v-else
                                                    class="size-5 text-dark-primary dark:text-primary"
                                                    stroke-width="1.75"
                                                    :aria-label="
                                                        technology.iconAlt ??
                                                        `${technology.name} icon`
                                                    "
                                                    role="img"
                                                />
                                            </span>
                                            <span
                                                class="min-w-0 font-grotesk text-base leading-snug font-semibold text-wrap text-gray-800 dark:text-gray-200"
                                            >
                                                {{ technology.name }}
                                            </span>
                                        </motion.li>
                                    </ul>
                                </div>
                            </div>
                        </motion.article>
                    </div>
                </div>

                <div :class="shouldReduceMotion ? 'block' : 'lg:hidden'">
                    <header
                        class="relative border border-black/5 px-8 py-16 text-center md:px-10 md:py-20 dark:border-white/5"
                    >
                        <Lines />
                        <p
                            class="relative font-grotesk text-xs font-semibold text-dark-primary uppercase dark:text-primary"
                        >
                            Full-stack toolkit
                        </p>
                        <h2
                            class="relative mt-4 text-4xl text-gray-800 md:text-5xl dark:text-gray-100"
                        >
                            Capabilities
                            <span
                                class="text-dark-primary italic dark:text-primary"
                                >&</span
                            >
                            Tools
                        </h2>
                        <p
                            class="relative mx-auto mt-4 max-w-2xl text-base text-gray-600 md:text-lg dark:text-gray-400"
                        >
                            A practical mix of technologies, frameworks and
                            creative tools I use to build, improve and maintain
                            modern web applications.
                        </p>
                    </header>

                    <div
                        class="grid border-x border-b border-black/5 lg:grid-cols-2 dark:border-white/5"
                    >
                        <motion.article
                            v-for="(category, index) in technologyCategories"
                            :key="category.title"
                            class="border-b border-black/5 p-8 last:border-b-0 sm:p-10 lg:odd:border-r dark:border-white/5 lg:[&:nth-last-child(-n+2)]:border-b-0"
                            :initial="
                                shouldReduceMotion
                                    ? undefined
                                    : { opacity: 0, y: 42, scale: 0.98 }
                            "
                            :whileInView="
                                shouldReduceMotion
                                    ? undefined
                                    : { opacity: 1, y: 0, scale: 1 }
                            "
                            :viewport="{ once: false, margin: '-15% 0px' }"
                            :transition="{
                                duration: 0.55,
                                ease: [0.22, 1, 0.36, 1],
                            }"
                        >
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p
                                        class="font-grotesk text-xs font-semibold text-gray-500 uppercase dark:text-gray-400"
                                    >
                                        {{ category.eyebrow }}
                                    </p>
                                    <h3
                                        class="mt-2 font-grotesk text-2xl font-bold text-gray-900 dark:text-gray-100"
                                    >
                                        {{ category.title }}
                                    </h3>
                                </div>
                                <span
                                    class="font-grotesk text-sm font-semibold text-gray-300 dark:text-gray-700"
                                    aria-hidden="true"
                                >
                                    0{{ index + 1 }}
                                </span>
                            </div>

                            <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                                <li
                                    v-for="technology in category.technologies"
                                    :key="technology.name"
                                    class="flex min-h-16 items-center gap-4 border border-black/5 p-4 transition duration-300 hover:border-dark-primary/20 dark:border-white/5 dark:hover:border-primary/20"
                                >
                                    <span
                                        class="flex size-11 shrink-0 items-center justify-center border border-black/5 dark:border-white/8"
                                    >
                                        <img
                                            v-if="technology.brandIcon"
                                            class="size-6"
                                            :src="
                                                iconUrl(
                                                    technology.brandIcon,
                                                    technology.color ??
                                                        '111111',
                                                )
                                            "
                                            :alt="
                                                technology.iconAlt ??
                                                `${technology.name} logo`
                                            "
                                            loading="lazy"
                                        />
                                        <component
                                            :is="technology.conceptIcon"
                                            v-else
                                            class="size-5 text-dark-primary dark:text-primary"
                                            stroke-width="1.75"
                                            :aria-label="
                                                technology.iconAlt ??
                                                `${technology.name} icon`
                                            "
                                            role="img"
                                        />
                                    </span>
                                    <span
                                        class="min-w-0 font-grotesk text-base leading-snug font-semibold text-wrap text-gray-800 dark:text-gray-200"
                                    >
                                        {{ technology.name }}
                                    </span>
                                </li>
                            </ul>
                        </motion.article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@reference '#app.css';

.pixel-digit__pixel {
    opacity: 0;
    transition: 0s;
    transition-delay: calc(var(--pixel-frame) * 65ms);
    @apply bg-dark-primary dark:bg-primary;
}

.pixel-digit__pixel.is-active {
    opacity: 1;
}
</style>
