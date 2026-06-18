<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

type NavigationLink = {
    label: string;
    href: string;
    sectionId: string;
};

const navigationLinks: NavigationLink[] = [
    { label: 'Home', href: '#home', sectionId: 'home' },
    { label: 'Projects', href: '#projects', sectionId: 'projects' },
    { label: 'Stack', href: '#technologies', sectionId: 'technologies' },
    { label: 'Contact', href: '#contact', sectionId: 'contact' },
];

const activeSection = ref(navigationLinks[0].sectionId);
const scrollingToSection = ref<string | null>(null);
let scrollEndTimeout: number | undefined;

const cleanUrlHash = (): void => {
    if (!window.location.hash) {
        return;
    }

    history.replaceState(
        null,
        '',
        `${window.location.pathname}${window.location.search}`,
    );
};

const getActiveSection = (): string => {
    const documentHeight = document.documentElement.scrollHeight;
    const scrollBottom = window.scrollY + window.innerHeight;

    if (scrollBottom >= documentHeight - 2) {
        return navigationLinks[navigationLinks.length - 1].sectionId;
    }

    const viewportMarker = Math.min(window.innerHeight * 0.4, 320);
    let currentSection = navigationLinks[0].sectionId;

    for (const link of navigationLinks) {
        const section = document.getElementById(link.sectionId);

        if (!section) {
            continue;
        }

        const sectionBounds = section.getBoundingClientRect();

        if (
            sectionBounds.top <= viewportMarker &&
            sectionBounds.bottom > viewportMarker
        ) {
            return link.sectionId;
        }

        if (sectionBounds.top <= viewportMarker) {
            currentSection = link.sectionId;
        }
    }

    return currentSection;
};

const releaseScrollLock = (): void => {
    if (scrollEndTimeout) {
        window.clearTimeout(scrollEndTimeout);
    }

    scrollEndTimeout = window.setTimeout(() => {
        scrollingToSection.value = null;
        activeSection.value = getActiveSection();
    }, 160);
};

const updateActiveSection = (): void => {
    if (scrollingToSection.value) {
        releaseScrollLock();

        return;
    }

    activeSection.value = getActiveSection();
};

const scrollToSection = (link: NavigationLink): void => {
    const section = document.getElementById(link.sectionId);

    if (!section) {
        return;
    }

    scrollingToSection.value = link.sectionId;
    activeSection.value = link.sectionId;
    cleanUrlHash();
    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
    releaseScrollLock();
};

onMounted(() => {
    const initialHash = window.location.hash;
    const initialLink = navigationLinks.find((link) => link.href === initialHash);

    if (initialLink) {
        activeSection.value = initialLink.sectionId;
        window.requestAnimationFrame(() => {
            document
                .getElementById(initialLink.sectionId)
                ?.scrollIntoView({ behavior: 'auto', block: 'start' });
            cleanUrlHash();
        });
    }

    updateActiveSection();
    window.addEventListener('scroll', updateActiveSection, { passive: true });
});

onUnmounted(() => {
    if (scrollEndTimeout) {
        window.clearTimeout(scrollEndTimeout);
    }

    window.removeEventListener('scroll', updateActiveSection);
});
</script>

<template>
    <ul
        class="flex items-center gap-x-8 text-base text-gray-700 lowercase dark:text-white/80"
    >
        <li
            v-for="link in navigationLinks"
            :key="link.sectionId"
            :class="{ active: activeSection === link.sectionId }"
        >
            <a
                :href="link.href"
                :aria-current="
                    activeSection === link.sectionId ? 'page' : undefined
                "
                @click.prevent="scrollToSection(link)"
            >
                {{ link.label }}
            </a>
        </li>
    </ul>
</template>

<style scoped>
@reference "#app.css";

ul li {
    @apply relative transition-all hover:-translate-y-px;
}

ul li::before {
    content: '';
    width: var(--pixel-size);
    height: var(--pixel-size);
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translate(-50%, 100%);
    background: transparent;
}

ul li:is(.active, :hover, :focus-within) {
    &::before {
        background: var(--color-dark-primary);
    }
    &:where([data-theme='dark'], [data-theme='dark'] *)::before {
        background: var(--color-primary) !important;
    }
}
</style>
