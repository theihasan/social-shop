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
          <component :is="trendIcon" :class="trendClasses" />
          <span :class="changeClasses">{{ kpi.change }}</span>
          <span v-if="kpi.changeText" class="text-sm text-gray-500 ml-2">
            {{ kpi.changeText }}
          </span>
        </div>
      </div>
      <div :class="iconBgClasses">
        <component :is="mainIcon" :class="iconClasses" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  kpi: Object
})

const trendIcon = computed(() => {
  return props.kpi.trend === 'warning' ? 'svg-warning-icon' : 'svg-trend-up-icon'
})

const trendClasses = computed(() => [
  'w-4 h-4 mr-1',
  props.kpi.color === 'green' ? 'text-green-500' : 
  props.kpi.color === 'blue' ? 'text-blue-500' : 'text-orange-500'
])

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

const mainIcon = computed(() => {
  const icons = {
    dollar: 'svg-dollar-icon',
    orders: 'svg-orders-icon',
    warning: 'svg-warning-icon',
    check: 'svg-check-icon'
  }
  return icons[props.kpi.icon] || 'svg-default-icon'
})
</script>
