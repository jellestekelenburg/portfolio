<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const isEnabled = ref(false);
const isVisible = ref(false);
const isHoveringInteractive = ref(false);
const isHoveringPrimary = ref(false);
const cursorTransform = ref(
    'translate3d(-100px, -100px, 0) translate(-50%, -50%)',
);
const followerTransform = ref(
    'translate3d(-100px, -100px, 0) translate(-50%, -50%)',
);

let animationFrame = 0;
let targetX = -100;
let targetY = -100;
let followerX = -100;
let followerY = -100;

const interactiveSelector = [
    'button:not(:disabled)',
    'input',
    'textarea',
    'select',
    'summary',
    '[role="button"]',
    '[tabindex]:not([tabindex="-1"])',
].join(',');

const expansiveLinkDisplays = ['block', 'flex', 'grid'];

function setTransforms(): void {
    cursorTransform.value = `translate3d(${targetX}px, ${targetY}px, 0) translate(-50%, -50%)`;
    followerTransform.value = `translate3d(${followerX}px, ${followerY}px, 0) translate(-50%, -50%)`;
}

function animate(): void {
    followerX += (targetX - followerX) * 0.18;
    followerY += (targetY - followerY) * 0.18;

    setTransforms();

    animationFrame = window.requestAnimationFrame(animate);
}

function showCursor(clientX: number, clientY: number): void {
    if (isVisible.value && clientX === 0 && clientY === 0) {
        return;
    }

    targetX = clientX;
    targetY = clientY;
    isVisible.value = true;
    updateInteractiveState(document.elementFromPoint(clientX, clientY));
}

function resolveInteractiveElement(target: EventTarget | null): Element | null {
    if (!(target instanceof Element)) {
        return null;
    }

    const cursorVariantTarget = target.closest('[data-cursor-variant]');

    if (cursorVariantTarget) {
        return cursorVariantTarget;
    }

    if (target.matches(interactiveSelector)) {
        return target;
    }

    const link = target.closest('a[href]');

    if (!link) {
        return null;
    }

    const linkDisplay = window.getComputedStyle(link).display;

    if (linkDisplay.startsWith('inline')) {
        return link;
    }

    if (target === link && !expansiveLinkDisplays.includes(linkDisplay)) {
        return link;
    }

    return null;
}

function updateInteractiveState(target: EventTarget | null): void {
    const interactiveElement = resolveInteractiveElement(target);

    isHoveringInteractive.value = Boolean(interactiveElement);
    isHoveringPrimary.value =
        interactiveElement?.getAttribute('data-cursor-variant') === 'default';
}

function handlePointerMove(event: PointerEvent): void {
    if (event.pointerType !== 'mouse') {
        return;
    }

    showCursor(event.clientX, event.clientY);
}

function handleMouseMove(event: MouseEvent): void {
    showCursor(event.clientX, event.clientY);
}

function handlePointerLeave(): void {
    isVisible.value = false;
    isHoveringInteractive.value = false;
    isHoveringPrimary.value = false;
}

onMounted(() => {
    const canUseCustomCursor = window.matchMedia(
        '(pointer: fine) and (prefers-reduced-motion: no-preference)',
    ).matches;

    if (!canUseCustomCursor) {
        return;
    }

    isEnabled.value = true;
    document.documentElement.classList.add('has-custom-cursor');

    window.addEventListener('pointermove', handlePointerMove);
    window.addEventListener('mousemove', handleMouseMove);
    document.documentElement.addEventListener('mouseleave', handlePointerLeave);

    animationFrame = window.requestAnimationFrame(animate);
});

onUnmounted(() => {
    document.documentElement.classList.remove('has-custom-cursor');

    window.removeEventListener('pointermove', handlePointerMove);
    window.removeEventListener('mousemove', handleMouseMove);
    document.documentElement.removeEventListener(
        'mouseleave',
        handlePointerLeave,
    );

    if (animationFrame) {
        window.cancelAnimationFrame(animationFrame);
    }
});
</script>

<template>
    <div
        v-if="isEnabled"
        aria-hidden="true"
        class="custom-cursor"
        :class="{
            'custom-cursor--visible': isVisible,
            'custom-cursor--interactive': isHoveringInteractive,
            'custom-cursor--primary': isHoveringPrimary,
        }"
    >
        <span
            class="custom-cursor__follower"
            :style="{ transform: followerTransform }"
        />
        <span
            class="custom-cursor__logo"
            :style="{ transform: cursorTransform }"
        />
    </div>
</template>
