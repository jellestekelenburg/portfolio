<script setup lang="ts">
import AppHead from '@/components/AppHead.vue';
import Contact from '@/components/Contact.vue';
import Footer from '@/components/Footer.vue';
import TechStack from '@/components/TechStack.vue';
import { Button } from '@/components/ui/button';
import Lines from '@/components/ui/Lines.vue';
import { Navigation } from '@/components/ui/navigation';
import { projects } from '@/data/projects';
</script>

<template>
    <AppHead
        title="Portfolio"
        :image-alt="'Jelle Stekelenburg'"
        description="Welcome to my portfolio, I'm Jelle Stekelenburg, a developer building awesome things for the web!"
    />

    <Navigation />

    <div class="grain-overlay"></div>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <section id="home" class="bg-gradient-up scroll-mt-24">
            <div class="container">
                <div
                    class="border-standard relative border-x py-28 md:py-36 lg:py-50"
                >
                    <Lines />
                    <div class="lg:w-2/3">
                        <h1
                            class="text-4xl text-gray-700 sm:text-5xl md:text-6xl dark:text-white"
                        >
                            I
                            <span
                                class="text-dark-primary italic dark:text-primary"
                                >build</span
                            >
                            &
                            <span
                                class="text-dark-primary italic dark:text-primary"
                                >design</span
                            >
                            awesome things for the web.
                        </h1>

                        <p class="mt-5 sm:w-4/5 text-gray-600 dark:text-gray-400">
                            Hi, I'm Jelle — a developer from the Netherlands
                            focused on building fast, modern, and user-friendly
                            web experiences.
                        </p>

                        <div class="mt-6 flex gap-3">
                            <Button href="#contact" variant="default">
                                Contact
                            </Button>
                            <Button
                                as="a"
                                href="https://www.linkedin.com/in/jelle-stekelenburg/"
                                variant="outline"
                            >
                                Let's connect
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div
                    class="border-standard relative grid border lg:grid-cols-2"
                >
                    <div
                        class="border-standard absolute top-0 left-1/2 h-full w-px"
                    ></div>
                    <div class="p-10">
                        <svg
                            class="size-16 fill-dark-primary dark:fill-primary"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path
                                d="M320 267L160.7 192L320 117L479.3 192L320 267zM104.4 218.5L320 320C490.3 239.9 581 197.2 592 192C581 186.8 490.3 144.1 320 64C149.7 144.1 59 186.8 48 192L104.4 218.5zM127.7 282.5C117.7 287.2 91.2 299.7 48.1 320C59.1 325.2 149.8 367.9 320.1 448C490.4 367.9 581.1 325.2 592.1 320C549 299.7 522.5 287.2 512.5 282.5L456 309L479.3 320L320 395L160.7 320L184 309L127.6 282.5zM104.4 421.5L48 448C59 453.2 149.7 495.9 320 576C490.3 495.9 581 453.2 592 448C548.9 427.7 522.4 415.2 512.4 410.5L456 437L479.3 448L320 523L160.7 448L184 437L127.6 410.5L104.3 421.5z"
                            />
                        </svg>
                        <h2
                            class="mt-5 mb-3 font-grotesk text-3xl font-bold text-gray-800 dark:text-gray-200"
                        >
                            Tech stack
                        </h2>
                        <p class="text-gray-500">
                            I build scalable web applications using Laravel, Vue
                            and InertiaJS. My focus is on performance,
                            maintainability and secure architecture. I create
                            systems that are structured, fast and built to last.
                        </p>
                    </div>
                    <div class="p-10">
                        <svg
                            class="size-16 fill-dark-primary dark:fill-primary"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path
                                d="M344 56L344 32L296 32L296 128L96 128L96 544L544 544L544 128L344 128L344 56zM296 176L496 176L496 496L144 496L144 176L296 176zM176 400L176 448L256 448L256 400L176 400zM288 400L288 448L352 448L352 400L288 400zM384 400L384 448L464 448L464 400L384 400zM240 352C266.5 352 288 330.5 288 304C288 277.5 266.5 256 240 256C213.5 256 192 277.5 192 304C192 330.5 213.5 352 240 352zM448 304C448 277.5 426.5 256 400 256C373.5 256 352 277.5 352 304C352 330.5 373.5 352 400 352C426.5 352 448 330.5 448 304zM48 280L48 256L0 256L0 416L48 416L48 280zM640 256L592 256L592 416L640 416L640 256z"
                            />
                        </svg>
                        <h2
                            class="mt-5 mb-3 font-grotesk text-3xl font-bold text-gray-800 dark:text-gray-200"
                        >
                            AI utilization
                        </h2>
                        <p class="text-gray-500">
                            I use modern AI tools to speed up development and
                            improve workflows. They help automate repetitive
                            tasks and increase efficiency during production. AI
                            supports my workflow without replacing technical
                            understanding.
                        </p>
                    </div>
                    <div class="border-standard border-t p-10">
                        <svg
                            class="size-16 fill-dark-primary dark:fill-primary"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path
                                d="M252.1 353.9L286.1 320C238.1 272 172.6 206.5 167.1 201C119.1 249 53.6 314.5 48.1 320C96.1 368.1 161.6 433.5 167.1 439C186.9 419.2 215.2 390.9 252.2 353.9zM167 371.1L115.9 320L167 268.9L218.2 320L167 371.1zM234.9 506.9C271.9 543.9 300.2 572.2 320 592C368 544 433.5 478.5 439 473C391 425 325.5 359.5 320 354C272 402 206.5 467.5 201 473L234.9 506.9zM320 524.1L268.9 473L320 421.8L371.1 473L320 524.1zM439 405.1L473 439C521.1 390.9 586.5 325.5 592 320C543.9 272 478.5 206.5 473 201C425 249 359.5 314.5 354 320C373.8 339.8 402.1 368.1 439.1 405.1zM421.8 320L473 268.9L524.1 320L473 371.1L421.8 320zM286.1 252.1L320 286.1C368.1 238 433.5 172.5 439 167C391 119 325.5 53.5 320 48C272 96 206.5 161.5 201 167L286.1 252.1zM268.9 167L320 115.9L371.1 167L320 218.2L268.9 167z"
                            />
                        </svg>
                        <h2
                            class="mt-5 mb-3 font-grotesk text-3xl font-bold text-gray-800 dark:text-gray-200"
                        >
                            Design
                        </h2>
                        <p class="text-gray-500">
                            I design clean and intuitive interfaces with a
                            strong focus on usability. Every interaction should
                            feel natural and support the product’s purpose. Good
                            design balances clarity, function and aesthetics.
                        </p>
                    </div>
                    <div class="border-standard relative border-t p-10">
                        <svg
                            class="size-16 fill-dark-primary dark:fill-primary"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path
                                d="M368 240L576 32L608 64L400 272L448 320L297.7 565.9L272 608C271.3 607.3 202.9 538.9 66.9 402.9L32 368L74.1 342.3L320 192L368 240zM276.7 274.7L365.3 363.3L387.4 327.2L312.8 252.6L276.7 274.7zM234.6 300.4L109.1 377.1L135 403L192.1 384L173.1 441.1L263 531L339.7 405.5L234.7 300.5z"
                            />
                        </svg>
                        <h2
                            class="mt-5 mb-3 font-grotesk text-3xl font-bold text-gray-800 dark:text-gray-200"
                        >
                            Maintenance & optimization
                        </h2>
                        <p class="text-gray-500">
                            I maintain and improve websites long after launch.
                            This includes updates, security monitoring, bug
                            fixing and performance optimization. Reliable
                            products require continuous attention and protection
                            over time.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="projects" class="scroll-mt-24">
            <div class="container">
                <div class="border-standard grid border">
                    <div
                        class="border-standard relative overflow-hidden border-b px-10 py-30 text-center"
                    >
                        <div
                            class="absolute bottom-0 left-0 z-0 size-100 -translate-x-1/3 translate-y-1/2 bg-radial from-dark-primary/80 to-transparent to-50% blur-2xl dark:from-primary/80"
                        ></div>
                        <div
                            class="absolute right-0 bottom-0 z-0 size-100 translate-x-1/3 -translate-y-1/3 bg-radial from-dark-primary/80 to-transparent to-50% blur-2xl dark:from-primary/80"
                        ></div>
                        <Lines />
                        <h3
                            class="font-serif text-5xl text-gray-800 dark:text-gray-200"
                        >
                            My
                            <span
                                class="text-dark-primary italic dark:text-primary"
                                >latest</span
                            >
                            projects.
                        </h3>
                        <p class="mt-3 dark:text-gray-400">
                            You can follow most of my work via
                            <a
                                class="underline transition hover:decoration-dark-primary dark:hover:decoration-primary"
                                href="https://github.com/jellestekelenburg"
                                target="_blank"
                                rel="nofollow"
                                >GitHub</a
                            >
                        </p>
                    </div>

                    <div
                        class="border-standard group grid gap-x-10 gap-y-6 border-b p-10 last:border-b-0 lg:grid-cols-2"
                        v-for="project in projects"
                        :key="project.title"
                    >
                        <div class="flex h-full flex-col justify-center">
                            <h3
                                class="mb-4 font-sans text-3xl font-bold text-gray-800 dark:text-gray-200"
                            >
                                {{ project.title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                {{ project.description }}
                            </p>
                            <div class="mt-6 flex gap-4">
                                <Button
                                    :variant="'default'"
                                    :href="project.href"
                                >
                                    Visit
                                </Button>
                                <Button
                                    :variant="'outline'"
                                    :href="project.github"
                                >
                                    Github
                                </Button>
                            </div>
                        </div>
                        <div
                            class="-mb-10 group-odd:-order-1 group-odd:-ml-8 group-even:-mr-8"
                        >
                            <img src="/img/file-manager.webp" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <TechStack />

        <Contact />

        <Footer />
    </div>
</template>
