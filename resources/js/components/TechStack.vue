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
};

const pixelDigits: Record<number, PixelDigit> = {
    1: {
        active: [3, 7, 8, 13, 18, 23, 28, 32, 33, 34],
    },
    2: {
        active: [2, 3, 4, 6, 10, 15, 19, 23, 27, 31, 32, 33, 34, 35],
    },
    3: {
        active: [2, 3, 4, 6, 10, 15, 18, 19, 25, 26, 30, 32, 33, 34],
    },
    4: {
        active: [1, 5, 6, 10, 11, 15, 16, 17, 18, 19, 20, 25, 30, 35],
    },
    5: {
        active: [
            1, 2, 3, 4, 5, 6, 11, 16, 17, 18, 19, 20, 25, 30, 31, 32, 33, 34,
        ],
    },
    6: {
        active: [2, 3, 4, 6, 11, 16, 17, 18, 19, 21, 25, 26, 30, 32, 33, 34],
    },
};

const pixelRevealFrames = [
    [18, 3, 31, 10, 24, 7, 35],
    [20, 2, 29, 15, 33, 12, 26],
    [5, 22, 1, 19, 34, 9, 16],
    [27, 4, 25, 11, 30, 14, 21],
    [32, 6, 8, 23, 13, 28, 17],
];

const pixelStartOff = [4, 9, 13, 17, 22, 26, 31, 35];

const pixelIds = Array.from({ length: 35 }, (_, index) => index + 1);

const isActivePixel = (digit: number, pixelId: number): boolean => {
    return pixelDigits[digit]?.active.includes(pixelId) ?? false;
};

const pixelFrame = (pixelId: number): number => {
    const frame = pixelRevealFrames.findIndex((pixels) =>
        pixels.includes(pixelId),
    );

    return frame === -1 ? 0 : frame;
};

const isStartPixel = (pixelId: number): boolean => {
    return !pixelStartOff.includes(pixelId);
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
                    class="hidden items-start border-y border-black/5 lg:grid lg:grid-cols-2 dark:border-white/5"
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
                        <Lines />
                        <motion.article
                            v-for="(category, index) in technologyCategories"
                            :key="category.title"
                            class="relative flex min-h-screen items-center"
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
                            <div class="relative w-full p-8">
                                <div
                                    class="flex flex-col justify-between gap-12"
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
                                            <span class="pixel-digit">
                                                <motion.span
                                                    v-for="pixelId in pixelIds"
                                                    :key="pixelId"
                                                    class="pixel-digit__pixel"
                                                    :class="{
                                                        'is-active':
                                                            isActivePixel(
                                                                index + 1,
                                                                pixelId,
                                                            ),
                                                    }"
                                                    :initial="{
                                                        opacity: isStartPixel(
                                                            pixelId,
                                                        )
                                                            ? 1
                                                            : 0,
                                                    }"
                                                    :whileInView="{
                                                        opacity: isActivePixel(
                                                            index + 1,
                                                            pixelId,
                                                        )
                                                            ? 1
                                                            : 0,
                                                    }"
                                                    :viewport="{
                                                        once: false,
                                                        amount: 0.65,
                                                    }"
                                                    :transition="{
                                                        duration: 0,
                                                        delay:
                                                            pixelFrame(
                                                                pixelId,
                                                            ) * 0.1,
                                                    }"
                                                ></motion.span>
                                            </span>
                                        </div>
                                    </div>

                                    <ul class="grid grid-cols-2 gap-3">
                                        <motion.li
                                            v-for="(
                                                technology, technologyIndex
                                            ) in category.technologies"
                                            :key="technology.name"
                                            class="flex min-h-18 items-center gap-4 p-4 transition duration-300 hover:border-dark-primary/25 dark:hover:border-primary/25"
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

.pixel-digit {
    --pixel-digit-size: 0.5rem;
    display: grid;
    grid-template-columns: repeat(5, var(--pixel-digit-size));
    grid-template-rows: repeat(7, var(--pixel-digit-size));
    gap: 0;
    line-height: 0;
}

.pixel-digit__pixel {
    display: block;
    width: var(--pixel-digit-size);
    height: var(--pixel-digit-size);
    opacity: 0;
    @apply bg-dark-primary dark:bg-primary;
}
</style>
