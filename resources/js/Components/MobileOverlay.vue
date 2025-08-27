<template>
  <div 
    v-if="show"
    @click="$emit('close')"
    class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
  ></div>
</template>

<script setup>
defineProps({
  show: Boolean
})

defineEmits(['close'])
</script>