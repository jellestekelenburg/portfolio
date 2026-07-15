<script setup lang="ts">
import Lines from '@/components/ui/Lines.vue';

const phoneNumber = '+31 6 2442 1363';
const phoneHref = `tel:${phoneNumber.replace(/\s/g, '')}`;
const emailAddress = 'jellemaarten02@gmail.com';
const emailHref = `mailto:${emailAddress}`;
</script>

<template>
    <section id="contact" class="relative z-1 scroll-mt-24">
        <div class="container">
            <div
                class="border-standard relative overflow-hidden border-x border-t py-16 md:py-20 lg:py-24"
            >
                <Lines />

                <div class="relative px-8 md:px-10">
                    <div class="max-w-3xl">
                        <p
                            class="font-grotesk text-xs font-semibold text-dark-primary uppercase dark:text-primary"
                        >
                            Contact
                        </p>
                        <h2
                            class="mt-4 text-4xl text-gray-800 md:text-5xl dark:text-gray-100"
                        >
                            Let's
                            <span
                                class="text-dark-primary italic dark:text-primary"
                                >build</span
                            >
                            together.
                        </h2>
                        <p
                            class="mt-5 max-w-xl text-base leading-relaxed text-gray-600 dark:text-gray-400"
                        >
                            Have a project, question or idea? Call me directly
                            or send me a message.
                        </p>
                    </div>
                </div>

                <div class="border-standard relative mt-12 border-y">
                    <div class="grid">
                        <a
                            :href="phoneHref"
                            data-cursor-variant="link"
                            class="border-standard group grid min-w-0 gap-4 border-b px-8 py-7 text-dark-primary transition hover:text-gray-900 focus-visible:outline focus-visible:-outline-offset-2 focus-visible:outline-dark-primary sm:py-8 md:grid-cols-[8rem_minmax(0,1fr)] md:items-center md:px-10 lg:grid-cols-[10rem_minmax(0,1fr)] dark:text-primary dark:hover:text-white dark:focus-visible:outline-primary"
                            :aria-label="`Call ${phoneNumber}`"
                        >
                            <span
                                class="font-grotesk text-xs font-semibold tracking-wide text-gray-500 uppercase dark:text-gray-400"
                            >
                                Phone
                            </span>
                            <span
                                class="min-w-0 font-grotesk text-xl leading-tight font-semibold wrap-anywhere text-gray-800 group-hover:italic sm:text-2xl md:text-3xl lg:text-4xl dark:text-gray-100"
                            >
                                {{ phoneNumber }}
                            </span>
                        </a>

                        <a
                            :href="emailHref"
                            data-cursor-variant="link"
                            class="group grid min-w-0 gap-4 px-8 py-7 transition hover:text-dark-primary focus-visible:outline focus-visible:-outline-offset-2 focus-visible:outline-dark-primary sm:py-8 md:grid-cols-[8rem_minmax(0,1fr)] md:items-center md:px-10 lg:grid-cols-[10rem_minmax(0,1fr)] dark:hover:text-primary dark:focus-visible:outline-primary"
                        >
                            <span
                                class="font-grotesk text-xs font-semibold tracking-wide text-gray-500 uppercase dark:text-gray-400"
                            >
                                Email
                            </span>
                            <span
                                class="min-w-0 font-grotesk text-xl leading-tight font-semibold wrap-anywhere text-gray-800 group-hover:italic sm:text-2xl md:text-3xl lg:text-4xl dark:text-gray-100"
                            >
                                {{ emailAddress }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
