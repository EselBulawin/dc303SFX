<template>
  <label :for="htmlFor" class="block font-medium text-sm text-gray-700">
    <slot>{{ value }}</slot>
  </label>
</template>

<script setup>
const props = defineProps({
  htmlFor: String,
  value: String,
});
</script>
