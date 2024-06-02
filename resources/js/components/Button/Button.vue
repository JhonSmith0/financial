<script lang="ts" setup>
import type { Variant } from '@/types';
import { computed, type PropType } from 'vue';


const props = defineProps({
    disabled: Boolean,
    variant: String as PropType<Variant>
})

const className = computed(() => {
    const base = 'rounded-full text-[2rem] p-[1.4rem]'
    const styles: Record<Variant, string> = {
        blue: 'bg-[#364fc7] border border-transparent text-white hover:bg-[#4a61cd] active:bg-[#3147b3]',
        ghost: 'bg-transparent border border-[#364fc7] text-[#364fc7] hover:shadow-md active:border-[#202f77] active:text-[#202f77]',
    }



    return [base, styles[props.variant ?? 'blue']].join(' ');
})


</script>

<template>
    <button :disabled="disabled" type="submit" :class="className">
        <slot />
    </button>
</template>
