<template>
  <button
    type="submit"
    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-25 transition"
    :disabled="$attrs.disabled"
  >
    <slot />
  </button>
</template>

<script setup>
defineProps({
  disabled: Boolean,
});
</script>
