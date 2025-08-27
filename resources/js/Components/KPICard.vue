<template>
  <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-shadow">
    <div class="flex items-center justify-between">
      <div class="flex-1">
        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">
          {{ kpi.title }}
        </p>
        <p class="text-3xl font-bold text-gray-900 mt-2">
          {{ kpi.value }}
        </p>
        <div class="flex items-center mt-2">
          <span v-html="trendIconSvg"></span>
          <span :class="changeClasses">{{ kpi.change }}</span>
          <span v-if="kpi.changeText" class="text-sm text-gray-500 ml-2">
            {{ kpi.changeText }}
          </span>
        </div>
      </div>
      <div :class="iconBgClasses">
        <span v-html="mainIconSvg"></span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  kpi: Object
})

const trendIconSvg = computed(() => {
  const classes = `w-4 h-4 mr-1 ${props.kpi.color === 'green' ? 'text-green-500' : 
    props.kpi.color === 'blue' ? 'text-blue-500' : 'text-orange-500'}`
  
  if (props.kpi.trend === 'warning') {
    return `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
    </svg>`
  }
  return `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
  </svg>`
})

const changeClasses = computed(() => [
  'text-sm font-medium',
  props.kpi.color === 'green' ? 'text-green-600' : 
  props.kpi.color === 'blue' ? 'text-blue-600' : 'text-orange-600'
])

const iconBgClasses = computed(() => [
  'p-3 rounded-2xl',
  props.kpi.color === 'green' ? 'bg-green-100' : 
  props.kpi.color === 'blue' ? 'bg-blue-100' : 'bg-orange-100'
])

const iconClasses = computed(() => [
  'w-8 h-8',
  props.kpi.color === 'green' ? 'text-green-600' : 
  props.kpi.color === 'blue' ? 'text-blue-600' : 'text-orange-600'
])

const mainIconSvg = computed(() => {
  const classes = `w-8 h-8 ${props.kpi.color === 'green' ? 'text-green-600' : 
    props.kpi.color === 'blue' ? 'text-blue-600' : 'text-orange-600'}`
  
  const icons = {
    dollar: `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
    </svg>`,
    orders: `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
    </svg>`,
    warning: `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
    </svg>`,
    check: `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>`
  }
  return icons[props.kpi.icon] || icons.check
})
</script>
