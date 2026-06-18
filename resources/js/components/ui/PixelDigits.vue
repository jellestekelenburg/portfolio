<script setup lang="ts">
import { motion, useReducedMotion } from 'motion-v';
import { computed, onMounted, onUnmounted, reactive, watch } from 'vue';

type PixelDigit = {
    active: number[];
};

type PixelCharacter = {
    character: string;
    id: string;
    isDigit: boolean;
    isSpace: boolean;
};

const props = withDefaults(
    defineProps<{
        value: number | string;
        animate?: boolean;
        copyText?: string;
        reanimate?: boolean;
        reanimateMaxDelay?: number;
        reanimateMinDelay?: number;
        selectable?: boolean;
        viewportAmount?: number;
    }>(),
    {
        animate: true,
        copyText: undefined,
        reanimate: false,
        reanimateMaxDelay: 7000,
        reanimateMinDelay: 2500,
        selectable: false,
        viewportAmount: 0.65,
    },
);

const pixelDigits: Record<string, PixelDigit> = {
    '0': {
        active: [2, 3, 4, 6, 10, 11, 15, 16, 20, 21, 25, 26, 30, 32, 33, 34],
    },
    '1': {
        active: [3, 7, 8, 13, 18, 23, 28, 32, 33, 34],
    },
    '2': {
        active: [2, 3, 4, 6, 10, 15, 19, 23, 27, 31, 32, 33, 34, 35],
    },
    '3': {
        active: [2, 3, 4, 6, 10, 15, 18, 19, 25, 26, 30, 32, 33, 34],
    },
    '4': {
        active: [1, 5, 6, 10, 11, 15, 16, 17, 18, 19, 20, 25, 30, 35],
    },
    '5': {
        active: [
            1, 2, 3, 4, 5, 6, 11, 16, 17, 18, 19, 20, 25, 30, 31, 32, 33, 34,
        ],
    },
    '6': {
        active: [2, 3, 4, 6, 11, 16, 17, 18, 19, 21, 25, 26, 30, 32, 33, 34],
    },
    '7': {
        active: [1, 2, 3, 4, 5, 10, 15, 19, 23, 27, 31],
    },
    '8': {
        active: [
            2, 3, 4, 6, 10, 11, 15, 17, 18, 19, 21, 25, 26, 30, 32, 33, 34,
        ],
    },
    '9': {
        active: [2, 3, 4, 6, 10, 11, 15, 17, 18, 19, 20, 25, 30, 32, 33, 34],
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
const shouldReduceMotion = useReducedMotion();
const reanimationCycles = reactive<Record<string, number>>({});
const reanimationTimers = new Map<string, number>();

const characters = computed<PixelCharacter[]>(() =>
    String(props.value)
        .split('')
        .map((character, index) => ({
            character,
            id: `${character}-${index}`,
            isDigit: Object.prototype.hasOwnProperty.call(
                pixelDigits,
                character,
            ),
            isSpace: character.trim() === '',
        })),
);

const readableText = computed(() => props.copyText ?? String(props.value));

const isActivePixel = (digit: string, pixelId: number): boolean => {
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

const reanimationDelay = (): number => {
    const minDelay = Math.max(0, props.reanimateMinDelay);
    const maxDelay = Math.max(minDelay, props.reanimateMaxDelay);

    return Math.round(minDelay + Math.random() * (maxDelay - minDelay));
};

const clearReanimationTimers = (): void => {
    reanimationTimers.forEach((timer) => {
        window.clearTimeout(timer);
    });

    reanimationTimers.clear();
};

const scheduleDigitReanimation = (characterId: string): void => {
    const timer = window.setTimeout(() => {
        reanimationCycles[characterId] =
            (reanimationCycles[characterId] ?? 0) + 1;
        scheduleDigitReanimation(characterId);
    }, reanimationDelay());

    reanimationTimers.set(characterId, timer);
};

const syncReanimationTimers = (): void => {
    clearReanimationTimers();

    if (!props.animate || !props.reanimate || shouldReduceMotion.value) {
        return;
    }

    characters.value
        .filter((pixelCharacter) => pixelCharacter.isDigit)
        .forEach((pixelCharacter) => {
            scheduleDigitReanimation(pixelCharacter.id);
        });
};

const pixelAnimationKey = (
    pixelCharacter: PixelCharacter,
    pixelId: number,
): string => {
    return `${pixelCharacter.id}-${pixelId}-${reanimationCycles[pixelCharacter.id] ?? 0}`;
};

onMounted(syncReanimationTimers);

watch(
    [
        characters,
        shouldReduceMotion,
        () => props.animate,
        () => props.reanimate,
        () => props.reanimateMaxDelay,
        () => props.reanimateMinDelay,
    ],
    syncReanimationTimers,
    { flush: 'post' },
);

onUnmounted(clearReanimationTimers);
</script>

<template>
    <span
        class="pixel-digits"
        :class="{ 'pixel-digits--selectable': selectable }"
    >
        <span class="pixel-digits__visual" aria-hidden="true">
            <template
                v-for="pixelCharacter in characters"
                :key="pixelCharacter.id"
            >
                <span v-if="pixelCharacter.isDigit" class="pixel-digits__digit">
                    <motion.span
                        v-for="pixelId in pixelIds"
                        :key="pixelAnimationKey(pixelCharacter, pixelId)"
                        class="pixel-digits__pixel"
                        :class="{
                            'is-active': isActivePixel(
                                pixelCharacter.character,
                                pixelId,
                            ),
                        }"
                        :initial="
                            animate && !shouldReduceMotion
                                ? {
                                      opacity: isStartPixel(pixelId) ? 1 : 0,
                                  }
                                : undefined
                        "
                        :whileInView="
                            animate && !shouldReduceMotion
                                ? {
                                      opacity: isActivePixel(
                                          pixelCharacter.character,
                                          pixelId,
                                      )
                                          ? 1
                                          : 0,
                                  }
                                : undefined
                        "
                        :viewport="{
                            once: false,
                            amount: viewportAmount,
                        }"
                        :transition="{
                            duration: 0,
                            delay: pixelFrame(pixelId) * 0.1,
                        }"
                    ></motion.span>
                </span>

                <span
                    v-else-if="pixelCharacter.isSpace"
                    class="pixel-digits__space"
                ></span>

                <span v-else class="pixel-digits__symbol">
                    {{ pixelCharacter.character }}
                </span>
            </template>
        </span>

        <span v-if="selectable" class="pixel-digits__copy">
            {{ readableText }}
        </span>
    </span>
</template>

<style scoped>
.pixel-digits {
    --pixel-digit-size: var(--pixel-size);
    --pixel-digit-gap: calc(var(--pixel-digit-size) * 1.25);
    --pixel-digit-color: currentColor;
    display: inline-flex;
    align-items: center;
    line-height: 0;
    color: var(--pixel-digit-color);
}

.pixel-digits--selectable {
    position: relative;
    display: inline-flex;
}

.pixel-digits__visual {
    display: inline-flex;
    align-items: center;
    gap: var(--pixel-digit-gap);
    pointer-events: none;
}

.pixel-digits__digit {
    display: grid;
    grid-template-columns: repeat(5, var(--pixel-digit-size));
    grid-template-rows: repeat(7, var(--pixel-digit-size));
    gap: 0;
}

.pixel-digits__pixel {
    display: block;
    width: var(--pixel-digit-size);
    height: var(--pixel-digit-size);
    background: var(--pixel-digit-color);
    opacity: 0;
}

.pixel-digits__pixel.is-active {
    opacity: 1;
}

.pixel-digits__space {
    width: var(--pixel-space-width, calc(var(--pixel-digit-size) * 2));
    height: calc(var(--pixel-digit-size) * 7);
}

.pixel-digits__symbol {
    display: inline-flex;
    width: var(--pixel-symbol-width, calc(var(--pixel-digit-size) * 3));
    height: calc(var(--pixel-digit-size) * 7);
    align-items: center;
    justify-content: center;
    font-family: var(--font-grotesk), sans-serif;
    font-size: calc(var(--pixel-digit-size) * 5);
    font-weight: 700;
    line-height: 1;
}

.pixel-digits__copy {
    position: absolute;
    inset: 0;
    color: transparent;
    font-family: var(--font-grotesk), sans-serif;
    font-size: var(--pixel-copy-font-size, calc(var(--pixel-digit-size) * 7));
    font-weight: 700;
    letter-spacing: var(--pixel-copy-letter-spacing, 0.08em);
    line-height: 1;
    overflow: hidden;
    user-select: text;
    white-space: pre;
}
</style>
