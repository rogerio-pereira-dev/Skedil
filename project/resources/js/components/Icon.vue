<script setup>
import { cn } from '@/lib/utils';
import * as icons from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps({
    name: String,
    class: String,
    size: [Number, String],
    color: String,
    strokeWidth: [Number, String],
});

withDefaults(props, {
    class: '',
    size: 16,
    strokeWidth: 2,
});

const className = computed(() => cn('h-4 w-4', props.class));

const icon = computed(() => {
    const iconName = props.name.charAt(0).toUpperCase() + props.name.slice(1);
    return icons[iconName];
});
</script>

<template>
    <component :is="icon" :class="className" :size="size" :stroke-width="strokeWidth" :color="color" />
</template>
