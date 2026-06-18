<script setup lang="ts">
import {
    Cloud,
    CreditCard,
    DatabaseZap,
    Gauge,
    Image,
    Layers3,
    LayoutTemplate,
    MousePointerClick,
    Palette,
    PenTool,
    PlugZap,
    SearchCheck,
    ShieldCheck,
    ShoppingBag,
    TableProperties,
    Terminal,
    UserRound,
    Workflow,
} from 'lucide-vue-next';
import { motion, useReducedMotion } from 'motion-v';
import type { Component } from 'vue';
import Lines from '@/components/ui/Lines.vue';
import PixelDigits from '@/components/ui/PixelDigits.vue';

type Technology = {
    name: string;
    brandIcon?: string;
    color?: string;
    conceptIcon?: Component;
    iconAlt?: string;
    path?: string;
};

type TechnologyCategory = {
    title: string;
    eyebrow: string;
    description: string;
    technologies: Technology[];
};

const iconUrl = (slug: string, color: string): string =>
    `https://cdn.simpleicons.org/${slug}/${color}`;

const technologyCategories: TechnologyCategory[] = [
    {
        title: 'Frontend',
        eyebrow: 'Interfaces & interaction',
        description:
            'Building fast, responsive interfaces with a focus on user experience, maintainability and performance.',
        technologies: [
            { name: 'HTML5', brandIcon: 'html5', color: 'E34F26' },
            { name: 'CSS3', brandIcon: 'css', color: '1572B6' },
            { name: 'JavaScript', brandIcon: 'javascript', color: 'F7DF1E' },
            { name: 'Vue.js', brandIcon: 'vuedotjs', color: '4FC08D' },
            { name: 'React', brandIcon: 'react', color: '61DAFB' },
            { name: 'Inertia.js', brandIcon: 'inertia', color: '9553E9' },
            { name: 'Tailwind CSS', brandIcon: 'tailwindcss', color: '06B6D4' },
            { name: 'Responsive UI', conceptIcon: LayoutTemplate },
        ],
    },
    {
        title: 'Backend',
        eyebrow: 'Laravel applications',
        description:
            'Developing custom applications with clear structure, secure authentication and scalable backend logic.',
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
            { name: 'Authorization', conceptIcon: ShieldCheck },
            { name: 'Eloquent ORM', conceptIcon: DatabaseZap },
            { name: 'MVC', conceptIcon: Layers3 },
            { name: 'Queues & Jobs', conceptIcon: Workflow },
        ],
    },
    {
        title: 'E-commerce',
        eyebrow: 'Webshops & order flows',
        description:
            'Experience with complete e-commerce platforms, payment flows, customer accounts, discount logic and external integrations.',
        technologies: [
            { name: 'Payment Integrations', conceptIcon: CreditCard },
            { name: 'Order Management', conceptIcon: ShoppingBag },
            { name: 'Customer Accounts', conceptIcon: UserRound },
            { name: 'Custom APIs', conceptIcon: PlugZap },
            { name: 'Google Merchant Center', conceptIcon: ShoppingBag },
        ],
    },
    {
        title: 'Database & Cloud',
        eyebrow: 'Data, storage & structure',
        description:
            'Designing database structures, query logic and cloud storage solutions for scalable applications.',
        technologies: [
            { name: 'MySQL', brandIcon: 'mysql', color: '4479A1' },
            { name: 'SQL', conceptIcon: TableProperties },
            { name: 'Database Design', conceptIcon: DatabaseZap },
            { name: 'Query Optimization', conceptIcon: Gauge },
            {
                name: 'AWS S3',
                path: 'M180.4 267C179.7 289.6 191 299.7 191.3 306C191.2 307.3 190.7 308.5 190 309.6C189.3 310.7 188.3 311.6 187.2 312.2L174.4 321.2C172.7 322.4 170.8 323 168.8 323.1C168.4 323.1 160.6 324.9 148.3 297.5C140.8 306.9 131.3 314.4 120.4 319.5C109.5 324.6 97.7 327.2 85.7 327C69.4 327.9 25.3 317.8 27.6 270.8C26 232.5 61.7 208.7 98.5 210.8C105.6 210.8 120.1 211.2 145.5 217.1L145.5 201.5C148.2 175 130.8 154.5 100.7 157.6C98.3 157.6 81.3 157.1 54.9 167.7C47.5 171.1 46.6 170.5 44.1 170.5C36.7 170.5 39.7 149 41.2 146.3C46.4 139.9 77.1 127.9 107.1 128.1C127.2 126.3 147.2 132.5 162.8 145.4C169.1 152.5 174 160.8 177 169.8C180 178.8 181.2 188.3 180.5 197.8L180.5 267.1zM94 299.4C126.4 298.9 140.2 279.4 143.3 268.9C145.8 258.8 145.4 252.5 145.4 241.5C135.7 239.2 121.8 236.6 105.8 236.6C90.6 235.5 63 242.2 64.1 268.9C62.9 285.7 75.2 300.3 94.1 299.4zM264.9 322.5C257 323.2 253.4 317.6 252.2 312.1L202.4 147.4C201.4 144.6 200.8 141.8 200.5 138.8C200.3 137.6 200.6 136.4 201.3 135.4C202 134.4 203.1 133.8 204.3 133.6C204.5 133.6 202.2 133.6 226.5 133.6C235.3 132.7 238.1 139.6 239.1 144L274.9 284.8L308.1 144C308.6 140.8 311 132.9 320.9 133.8L338.1 133.8C340.3 133.6 349.2 133.3 350.8 144.2L384.1 286.7L421 144.1C421.5 141.9 423.7 132.7 433.7 133.7L453.4 133.7C454.3 133.6 459.6 132.9 458.7 142.3C458.3 144.1 462.1 131.6 405.9 312.2C404.8 317.7 401.1 323.3 393.2 322.6L374.5 322.6C363.6 323.8 362 312.9 361.8 311.9L328.6 174.8L295.8 311.8C295.6 312.9 294.1 323.7 283.1 322.5L264.8 322.5L264.8 322.5zM538.4 328.1C532.5 328.1 504.5 327.8 481 315.8C478.7 314.8 476.7 313.2 475.3 311C473.9 308.8 473.2 306.4 473.2 303.9L473.2 293.2C473.2 284.7 479.4 286.3 482 287.3C492 291.4 498.5 294.4 510.8 296.9C547.5 304.4 563.6 294.6 567.5 292.4C580.7 284.6 581.7 266.7 572.8 257.5C562.3 248.7 557.3 248.4 519.7 236.5C515.1 235.2 476 222.9 475.9 184.1C475.3 155.9 500.9 127.9 545.4 128.1C558.1 128.1 591.8 132.2 601 143.7C602.4 145.8 603 148.3 602.9 150.7L602.9 160.8C602.9 165.2 601.3 167.5 598 167.5C590.3 166.6 576.6 156.3 548.8 156.7C541.9 156.3 508.9 157.6 510.4 181.7C510 200.7 537 207.8 540.1 208.6C576.6 219.6 588.7 221.4 603.2 238.2C620.3 260.4 611.1 286.5 607.5 293.6C588.4 331.1 539.1 328 538.2 328zM578.6 433C508.6 484.7 406.9 512.2 320.1 512.2C203 513 89.8 469.9 2.8 391.5C-3.7 385.6 2 377.5 10 382C106.5 437.2 215.7 466.2 326.9 466.1C409.9 465.7 492 448.8 568.5 416.6C580.3 411.6 590.3 424.4 578.6 433zM607.8 399.7C598.8 388.2 548.5 394.3 526 397C519.2 397.8 518.1 391.9 524.2 387.5C564.3 359.3 630.1 367.4 637.6 376.9C645.1 386.4 635.5 452.3 598 483.8C592.2 488.7 586.7 486.1 589.3 479.7C597.7 458.4 616.7 411.2 607.7 399.7z',
                color: '#FF9900',
            },
            { name: 'Object Storage', conceptIcon: Cloud },
        ],
    },
    {
        title: 'Tooling',
        eyebrow: 'Development workflow',
        description:
            'Daily tooling for development, debugging, deployment preparation and local development environments.',
        technologies: [
            { name: 'Git', brandIcon: 'git', color: 'F05032' },
            { name: 'GitHub', brandIcon: 'github', color: '9BCF17' },
            { name: 'GitLab', brandIcon: 'gitlab', color: 'FC6D26' },
            { name: 'Vite', brandIcon: 'vite', color: '646CFF' },
            { name: 'NPM', brandIcon: 'npm', color: 'CB3837' },
            { name: 'Composer', brandIcon: 'composer', color: '885630' },
            { name: 'Postman', brandIcon: 'postman', color: 'FF6C37' },
            { name: 'TablePlus', conceptIcon: TableProperties },
            { name: 'Laravel Valet', conceptIcon: Terminal },
        ],
    },
    {
        title: 'Design & UX',
        eyebrow: 'Design-to-code',
        description:
            'Translating designs into polished interfaces with attention to visual detail, usability and content presentation.',
        technologies: [
            { name: 'Figma', brandIcon: 'figma', color: 'F24E1E' },
            { name: 'Adobe Photoshop', conceptIcon: Image },
            { name: 'Adobe Illustrator', conceptIcon: PenTool },
            { name: 'Affinity', conceptIcon: Palette },
            { name: 'UI Implementation', conceptIcon: LayoutTemplate },
            { name: 'Image Editing', conceptIcon: Image },
        ],
    },
    {
        title: 'Performance & SEO',
        eyebrow: 'Speed & visibility',
        description:
            'Optimizing websites for speed, technical visibility, measurable performance and conversion-focused user experiences.',
        technologies: [
            { name: 'Performance Optimization', conceptIcon: Gauge },
            { name: 'Technical SEO', conceptIcon: SearchCheck },
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
            { name: 'Conversion Optimization', conceptIcon: MousePointerClick },
        ],
    },
];

const shouldReduceMotion = useReducedMotion();
</script>

<template>
    <section
        id="technologies"
        class="relative scroll-mt-24 bg-gray-50 dark:bg-gray-900"
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
                                    The practical stack I use to build complete
                                    web applications, from polished interfaces
                                    to backend logic, integrations and cloud
                                    storage.
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
                                            <p
                                                class="mt-4 max-w-md text-base leading-relaxed text-gray-600 dark:text-gray-400"
                                            >
                                                {{ category.description }}
                                            </p>
                                        </div>
                                        <div
                                            class="flex flex-col items-end gap-5 text-dark-primary dark:text-primary"
                                            aria-hidden="true"
                                        >
                                            <PixelDigits
                                                :value="index + 1"
                                                reanimate
                                                :reanimate-min-delay="1800"
                                                :reanimate-max-delay="6000"
                                            />
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
                                                    v-if="
                                                        technology.conceptIcon
                                                    "
                                                    class="size-5 text-dark-primary dark:text-primary"
                                                    stroke-width="1.75"
                                                    :aria-label="
                                                        technology.iconAlt ??
                                                        `${technology.name} icon`
                                                    "
                                                    role="img"
                                                />
                                                <svg
                                                    v-if="technology.path"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 640 640"
                                                    class="size-7"
                                                    :style="`fill: ${technology.color}`"
                                                >
                                                    <path
                                                        :d="technology.path"
                                                    />
                                                </svg>
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
                            The practical stack I use to build complete web
                            applications, from polished interfaces to backend
                            logic, integrations and cloud storage.
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
                                    <p
                                        class="mt-3 max-w-xl text-sm leading-relaxed text-gray-600 dark:text-gray-400"
                                    >
                                        {{ category.description }}
                                    </p>
                                </div>
                                <span
                                    class="shrink-0 [--pixel-digit-size:0.375rem] sm:[--pixel-digit-size:0.45rem] text-dark-primary dark:text-primary"
                                    aria-hidden="true"
                                >
                                    <PixelDigits
                                        :value="index + 1"
                                        reanimate
                                        :reanimate-min-delay="1800"
                                        :reanimate-max-delay="6000"
                                    />
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
                                            v-if="technology.conceptIcon"
                                            class="size-5 text-dark-primary dark:text-primary"
                                            stroke-width="1.75"
                                            :aria-label="
                                                technology.iconAlt ??
                                                `${technology.name} icon`
                                            "
                                            role="img"
                                        />
                                        <svg
                                            v-if="technology.path"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"
                                            class="size-7"
                                            :style="`fill: ${technology.color}`"
                                        >
                                            <path :d="technology.path" />
                                        </svg>
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
