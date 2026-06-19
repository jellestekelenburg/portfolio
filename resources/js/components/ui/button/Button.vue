<script setup lang="ts">
import { Link } from "@inertiajs/vue3"
import type { PrimitiveProps } from "reka-ui"
import { Primitive } from "reka-ui"
import type { HTMLAttributes } from "vue"
import { computed, useAttrs, useSlots } from "vue"
import type { ButtonVariants } from "."
import { buttonVariants } from "."
import { cn } from "@/lib/utils"

defineOptions({
  inheritAttrs: false,
})

interface Props extends PrimitiveProps {
  variant?: ButtonVariants["variant"]
  size?: ButtonVariants["size"]
  class?: HTMLAttributes["class"]
  href?: string
  rel?: string
  target?: string
  type?: "button" | "submit" | "reset"
}

const props = withDefaults(defineProps<Props>(), {
  variant: "default",
  size: "default",
})

const attrs = useAttrs()
const slots = useSlots()

const pixelBolt = {
  defaultOff: [13],
  endOff: [1, 6, 7, 8, 11, 12, 14, 16, 18, 19, 22, 23, 24, 25],
  frames: [
    [1, 5, 6, 7, 9, 12, 16, 20, 22, 24],
    [3, 11, 13, 15, 18, 21],
    [2, 4, 8, 19, 25],
    [10, 14, 17, 23],
  ],
}

const pixelBoltPixels = Array.from({ length: 25 }, (_, index) => {
  const id = index + 1
  const frame = pixelBolt.frames.findIndex((ids) => ids.includes(id))

  return {
    id,
    defaultOff: pixelBolt.defaultOff.includes(id),
    endOff: pixelBolt.endOff.includes(id),
    frame: frame === -1 ? 0 : frame,
  }
})

const isPixelBolt = computed(() => props.variant === "default")
const isOutline = computed(() => props.variant === "outline")
const hasAnimatedText = computed(() => isPixelBolt.value || isOutline.value)
const isExternalHref = computed(() => /^https?:\/\//i.test(props.href ?? ""))
const isInternalHref = computed(() => props.href?.startsWith("/") ?? false)

const resolvedAs = computed(() => {
  if (props.as) return props.as
  if (isInternalHref.value) return Link
  if (props.href) return "a"

  return "button"
})

const rootAttributes = computed(() => {
  const attributes: Record<string, unknown> = { ...attrs }

  if (props.href) {
    attributes.href = props.href
  }

  if (props.target || isExternalHref.value) {
    attributes.target = props.target ?? "_blank"
  }

  if (props.rel || isExternalHref.value) {
    attributes.rel = props.rel ?? "noopener noreferrer"
  }

  if (resolvedAs.value === "button") {
    attributes.type = props.type ?? "button"
  }

  return attributes
})

const slotText = computed(() => {
  const text = slots.default?.()
    .map((node) => (typeof node.children === "string" ? node.children : ""))
    .join("")
    .replace(/\s+/g, " ")
    .trim()

  return text || ""
})

const characterCount = computed(() => Math.max(slotText.value.length, 1))
</script>

<template>
  <Primitive
    v-bind="rootAttributes"
    data-slot="button"
    :data-cursor-variant="variant"
    :as="resolvedAs"
    :as-child="asChild"
    :class="
      cn(
        buttonVariants({ variant, size }),
        isPixelBolt &&
          'button-pixel-bolt bg-transparent px-0 py-0 dark:bg-transparent',
        isOutline && 'button-outline',
        props.class,
      )
    "
    :style="hasAnimatedText ? { '--characters': characterCount } : undefined"
  >
    <template v-if="hasAnimatedText">
      <span v-if="isPixelBolt" class="button-pixel-bolt__bg" aria-hidden="true">
        <span class="button-pixel-bolt__bg-mid"></span>
        <span class="button-pixel-bolt__pixels">
          <span
            v-for="pixel in pixelBoltPixels"
            :key="pixel.id"
            class="button-pixel-bolt__pixel"
            :class="{
              'is-default-off': pixel.defaultOff,
              'is-end-off': pixel.endOff,
            }"
            :data-id="pixel.id"
            :style="{ '--index': pixel.frame }"
          ></span>
        </span>
      </span>

      <span
        :class="
          isPixelBolt ? 'button-pixel-bolt__inner' : 'button-outline__inner'
        "
        :data-text="slotText"
      >
        <span
          :class="
            isPixelBolt ? 'button-pixel-bolt__text' : 'button-outline__text'
          "
        >
          <slot />
        </span>
      </span>
    </template>

    <template v-else>
      <slot />
    </template>
  </Primitive>
</template>

<style scoped>
@reference '../../../../css/app.css';

.button-pixel-bolt {
  --pixel-bolt-step: 60ms;
  --pixel-bolt-size: 2.25rem;
  grid-template-areas: "button";
  -webkit-tap-highlight-color: transparent;
  @apply relative isolate inline-grid select-none overflow-visible text-gray-50 no-underline transition-transform dark:text-gray-900;
}

.button-outline {
  grid-template-areas: "button";
  -webkit-tap-highlight-color: transparent;
  @apply relative inline-grid select-none overflow-hidden no-underline;
}

.button-pixel-bolt::after {
  content: "";
  @apply absolute -inset-1 block;
}

.button-pixel-bolt:active {
  transform: scaleX(0.993) scaleY(0.992);
}

.button-pixel-bolt__bg {
  grid-area: button;
  grid-template-columns: 1fr auto;
  @apply pointer-events-none grid h-full;
}

.button-pixel-bolt__bg-mid {
  @apply bg-dark-primary dark:bg-primary;
}

.button-pixel-bolt__pixels {
  grid-area: 1 / 2;
  grid-template-columns: repeat(5, minmax(0, 1fr));
  grid-template-rows: repeat(5, minmax(0, 1fr));
  width: var(--pixel-bolt-size);
  height: var(--pixel-bolt-size);
  @apply grid;
}

.button-pixel-bolt__pixel {
  transition: opacity 0s;
  transition-delay: calc(var(--index) * var(--pixel-bolt-step));
  @apply h-full w-full bg-dark-primary dark:bg-primary;
}

.button-pixel-bolt__pixel.is-default-off {
  opacity: 0;
}

.button-pixel-bolt__inner {
  grid-area: button;
  min-height: var(--pixel-bolt-size);
  @apply grid items-center overflow-hidden px-3 py-0 pr-12;
}

.button-outline__inner {
  grid-area: button;
  @apply grid min-h-full items-center overflow-hidden;
}

.button-pixel-bolt__inner::after,
.button-outline__inner::after {
  content: attr(data-text);
  grid-area: 1 / 1;
  pointer-events: none;
  white-space: nowrap;
  width: 0;
  overflow: clip;
  opacity: 0;
  transition: width 0s;
}

.button-pixel-bolt__text,
.button-outline__text {
  grid-area: 1 / 1;
}

@media (hover: hover) and (pointer: fine) {
  .button-pixel-bolt:is(:hover, :focus-visible)
    .button-pixel-bolt__inner::after,
  .button-outline:is(:hover, :focus-visible) .button-outline__inner::after {
    width: 100%;
    opacity: 1;
    transition: width 0.3s steps(var(--characters));
  }

  .button-pixel-bolt:is(:hover, :focus-visible) .button-pixel-bolt__text,
  .button-outline:is(:hover, :focus-visible) .button-outline__text {
    opacity: 0;
  }

  .button-pixel-bolt:is(:hover, :focus-visible) .button-pixel-bolt__pixel {
    opacity: 1;
  }

  .button-pixel-bolt:is(:hover, :focus-visible) .button-pixel-bolt__pixel.is-end-off {
    opacity: 0;
  }
}

@media (hover: none) or (pointer: coarse) {
  .button-pixel-bolt:active .button-pixel-bolt__pixel {
    opacity: 1;
    transition-delay: 0s;
  }

  .button-pixel-bolt:active .button-pixel-bolt__pixel.is-end-off {
    opacity: 0;
  }
}
</style>
