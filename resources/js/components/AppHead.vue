<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

type SharedSeo = {
    siteName?: string;
    description?: string;
    url?: string;
    image?: string;
    imageType?: string;
    imageWidth?: number;
    imageHeight?: number;
    imageAlt?: string;
    locale?: string;
    twitterCard?: string;
};

const props = withDefaults(
    defineProps<{
        title?: string;
        description?: string;
        url?: string;
        image?: string;
        imageAlt?: string;
        type?: string;
        noindex?: boolean;
    }>(),
    {
        type: 'website',
        noindex: false,
    },
);

const page = usePage();

const seo = computed(() => page.props.seo as SharedSeo | undefined);
const siteName = computed(
    () => seo.value?.siteName ?? import.meta.env.VITE_APP_NAME,
);
const headTitle = computed(() => props.title || undefined);
const fullTitle = computed(() =>
    props.title ? `${props.title} - ${siteName.value}` : siteName.value,
);
const description = computed(
    () => props.description ?? seo.value?.description ?? '',
);
const url = computed(() => props.url ?? seo.value?.url ?? page.url);
const image = computed(() => props.image ?? seo.value?.image ?? '');
const absoluteImage = computed(() => {
    if (!image.value) {
        return '';
    }

    if (/^https?:\/\//i.test(image.value)) {
        return image.value;
    }

    const baseUrl =
        seo.value?.url ??
        (typeof window !== 'undefined' ? window.location.origin : '');

    if (!baseUrl) {
        return image.value;
    }

    return new URL(image.value, baseUrl).toString();
});
const imageType = computed(() => seo.value?.imageType ?? 'image/webp');
const imageWidth = computed(() => seo.value?.imageWidth ?? 1000);
const imageHeight = computed(() => seo.value?.imageHeight ?? 743);
const imageAlt = computed(() => props.imageAlt ?? seo.value?.imageAlt ?? '');
const locale = computed(() => seo.value?.locale ?? 'en_US');
const twitterCard = computed(() => seo.value?.twitterCard ?? 'summary');
</script>

<template>
    <Head :title="headTitle">
        <meta
            head-key="description"
            name="description"
            :content="description"
        />
        <meta
            head-key="robots"
            name="robots"
            :content="noindex ? 'noindex, nofollow' : 'index, follow'"
        />
        <link head-key="canonical" rel="canonical" :href="url" />

        <meta head-key="og:type" property="og:type" :content="type" />
        <meta head-key="og:title" property="og:title" :content="fullTitle" />
        <meta
            head-key="og:description"
            property="og:description"
            :content="description"
        />
        <meta head-key="og:url" property="og:url" :content="url" />
        <meta
            head-key="og:site_name"
            property="og:site_name"
            :content="siteName"
        />
        <meta head-key="og:locale" property="og:locale" :content="locale" />
        <meta
            v-if="image"
            head-key="og:image"
            property="og:image"
            :content="absoluteImage"
        />
        <meta
            v-if="imageType"
            head-key="og:image:type"
            property="og:image:type"
            :content="imageType"
        />
        <meta
            v-if="imageWidth"
            head-key="og:image:width"
            property="og:image:width"
            :content="String(imageWidth)"
        />
        <meta
            v-if="imageHeight"
            head-key="og:image:height"
            property="og:image:height"
            :content="String(imageHeight)"
        />
        <meta
            v-if="imageAlt"
            head-key="og:image:alt"
            property="og:image:alt"
            :content="imageAlt"
        />

        <meta
            head-key="twitter:card"
            name="twitter:card"
            :content="twitterCard"
        />
        <meta
            head-key="twitter:title"
            name="twitter:title"
            :content="fullTitle"
        />
        <meta
            head-key="twitter:description"
            name="twitter:description"
            :content="description"
        />
        <meta
            v-if="image"
            head-key="twitter:image"
            name="twitter:image"
            :content="absoluteImage"
        />
        <meta
            v-if="imageAlt"
            head-key="twitter:image:alt"
            name="twitter:image:alt"
            :content="imageAlt"
        />
    </Head>
</template>
