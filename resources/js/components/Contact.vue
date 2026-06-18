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
                class="border-standard relative overflow-hidden border-x py-16 md:py-20 lg:py-24"
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
                            class="border-standard group grid min-w-0 gap-4 border-b px-8 py-7 text-dark-primary transition hover:text-gray-900 focus-visible:outline focus-visible:-outline-offset-2 focus-visible:outline-dark-primary sm:py-8 md:grid-cols-[8rem_minmax(0,1fr)] md:items-center md:px-10 lg:grid-cols-[10rem_minmax(0,1fr)] dark:text-primary dark:hover:text-white dark:focus-visible:outline-primary"
                            :aria-label="`Call ${phoneNumber}`"
                        >
                            <span
                                class="font-grotesk text-xs font-semibold tracking-wide text-gray-500 uppercase dark:text-gray-400"
                            >
                                Phone
                            </span>
                            <!--                            <span class="relative hidden lg:block">-->
                            <!--                                <span-->
                            <!--                                    class="absolute bottom-0 -left-2 -translate-x-full font-mono leading-1 dark:text-gray-400"-->
                            <!--                                    >(+31)</span-->
                            <!--                                >-->
                            <!--                                <PixelDigits-->
                            <!--                                    :value="phoneNumber"-->
                            <!--                                    :copy-text="phoneNumber"-->
                            <!--                                    selectable-->
                            <!--                                    class="max-w-full [&#45;&#45;pixel-copy-font-size:clamp(1.5rem,5vw,3rem)] [&#45;&#45;pixel-digit-gap:clamp(0.14rem,0.45vw,0.28rem)] [&#45;&#45;pixel-digit-size:clamp(0.16rem,0.5vw,0.28rem)] [&#45;&#45;pixel-space-width:clamp(0.28rem,0.9vw,0.65rem)]"-->
                            <!--                                />-->
                            <!--                            </span>-->
                            <!--                            <span class="block lg:hidden">-->
                            <!--                                <span-->
                            <!--                                    class="font-mono leading-1 dark:text-gray-400"-->
                            <!--                                    >(+31)</span-->
                            <!--                                >-->
                            <!--                                <span-->
                            <!--                                    class="min-w-0 font-grotesk text-xl leading-tight font-semibold wrap-anywhere text-gray-800 sm:text-2xl md:text-3xl lg:text-4xl dark:text-gray-100"-->
                            <!--                                >-->
                            <!--                                    {{ phoneNumber }}-->
                            <!--                                </span>-->
                            <!--                            </span>-->
                            <span
                                class="min-w-0 font-grotesk text-xl leading-tight font-semibold wrap-anywhere text-gray-800 hover:italic sm:text-2xl md:text-3xl lg:text-4xl dark:text-gray-100"
                            >
                                {{ phoneNumber }}
                            </span>
                        </a>

                        <a
                            :href="emailHref"
                            class="grid min-w-0 gap-4 px-8 py-7 transition hover:text-dark-primary focus-visible:outline focus-visible:-outline-offset-2 focus-visible:outline-dark-primary sm:py-8 md:grid-cols-[8rem_minmax(0,1fr)] md:items-center md:px-10 lg:grid-cols-[10rem_minmax(0,1fr)] dark:hover:text-primary dark:focus-visible:outline-primary"
                        >
                            <span
                                class="font-grotesk text-xs font-semibold tracking-wide text-gray-500 uppercase dark:text-gray-400"
                            >
                                Email
                            </span>
                            <span
                                class="min-w-0 font-grotesk text-xl leading-tight font-semibold wrap-anywhere text-gray-800 hover:italic sm:text-2xl md:text-3xl lg:text-4xl dark:text-gray-100"
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
