<script setup lang="ts">
import type { PrimitiveProps } from "reka-ui"
import type { HTMLAttributes } from "vue"
import type { ButtonVariants } from "."
import { Primitive } from "reka-ui"
import { cn } from "@/lib/utils"
import { buttonVariants } from "."

interface Props extends PrimitiveProps {
  variant?: ButtonVariants["variant"]
  size?: ButtonVariants["size"]
  class?: HTMLAttributes["class"]
}

const props = withDefaults(defineProps<Props>(), {
  as: "button",
})
</script>

<template>
  <div  v-if="!props.variant || props.variant === 'default'" class="inline-flex btn-def cursor-pointer">
      <Primitive
      data-slot="button"
      :as="as"
      :as-child="asChild"
      :class="cn(buttonVariants({ variant, size }), props.class)"
  >
    <slot />
  </Primitive>
      <span v-if="!props.variant || props.variant === 'default'"
            class="grid grid-cols-5 grid-rows-5 h-[36px] aspect-square">
          <template v-for="i in 25">
              <span class="pixel" :data-id="i"></span>
          </template>
      </span>
  </div>
    <template v-else>
        <Primitive
            data-slot="button"
            :as="as"
            :as-child="asChild"
            :class="cn(buttonVariants({ variant, size }), props.class)"
        >
            <slot />
        </Primitive>
    </template>
</template>

<style scoped>
@reference '../../../../css/app.css';

.pixel {
    @apply bg-dark-primary dark:bg-primary w-full h-full
}

.btn-def:not(:hover) {
    .pixel:nth-of-type(13)
    {
        background: transparent !important;
    }
}

.btn-def:hover {
    .pixel:nth-of-type(1),
    .pixel:nth-of-type(6),
    .pixel:nth-of-type(7),
    .pixel:nth-of-type(8),
    .pixel:nth-of-type(11),
    .pixel:nth-of-type(12),
    .pixel:nth-of-type(14),
    .pixel:nth-of-type(16),
    .pixel:nth-of-type(18),
    .pixel:nth-of-type(19),
    .pixel:nth-of-type(22),
    .pixel:nth-of-type(23),
    .pixel:nth-of-type(24),
    .pixel:nth-of-type(25) {
        background: transparent !important;
    }
}

</style>
