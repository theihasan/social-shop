<template>
  <div class="relative flex items-start space-x-4">
    <div :class="iconContainerClasses">
      <component :is="iconComponent" class="w-6 h-6" />
    </div>
    <div class="flex-1">
      <p class="font-semibold text-gray-900">{{ activity.title }}</p>
      <p class="text-sm text-gray-500">{{ activity.description }}</p>
      <p class="text-xs text-gray-400 mt-1">{{ activity.time }}</p>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  activity: Object
})

const iconContainerClasses = computed(() => [
  'relative z-10 flex items-center justify-center w-12 h-12 rounded-2xl',
  props.activity.type === 'success' ? 'bg-green-100' :
  props.activity.type === 'warning' ? 'bg-orange-100' :
  props.activity.type === 'info' ? 'bg-blue-100' : 'bg-meta-blue-light'
])

const iconComponent = computed(() => {
  const iconClasses = props.activity.type === 'success' ? 'text-green-600' :
    props.activity.type === 'warning' ? 'text-orange-600' :
    props.activity.type === 'info' ? 'text-blue-600' : 'text-meta-blue'

  // Return SVG template strings based on icon type
  const icons = {
    check: () => `<svg class="${iconClasses}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>`,
    plus: () => `<svg class="${iconClasses}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>`,
    warning: () => `<svg class="${iconClasses}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
    </svg>`
  }
  
  return icons[props.activity.icon] || icons.check
})
</script>