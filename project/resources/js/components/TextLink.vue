<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    tabindex: Number,
    method: String,
    as: String,
});
</script>

<template>
    <Link
        :href="href"
        :tabindex="tabindex"
        :method="method"
        :as="as"
        class="text-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
    >
        <slot />
    </Link>
</template>
