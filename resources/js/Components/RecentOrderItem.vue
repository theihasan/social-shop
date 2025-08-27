<template>
  <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
    <div class="flex items-center space-x-4">
      <div :class="orderIdClasses">
        <span :class="orderIdTextClasses">{{ order.id }}</span>
      </div>
      <div>
        <p class="font-semibold text-gray-900">{{ order.product }}</p>
        <p class="text-sm text-gray-500">{{ order.customer }} • {{ order.time }}</p>
      </div>
    </div>
    <div class="text-right">
      <p class="font-bold text-gray-900">{{ order.amount }}</p>
      <span :class="statusClasses">{{ capitalizedStatus }}</span>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  order: Object
})

const orderIdClasses = computed(() => [
  'w-12 h-12 rounded-2xl flex items-center justify-center',
  props.order.color === 'meta-blue' ? 'bg-meta-blue-light' :
  props.order.color === 'blue' ? 'bg-blue-100' :
  props.order.color === 'purple' ? 'bg-purple-100' :
  props.order.color === 'green' ? 'bg-green-100' : 'bg-orange-100'
])

const orderIdTextClasses = computed(() => [
  'font-bold text-sm',
  props.order.color === 'meta-blue' ? 'text-meta-blue' :
  props.order.color === 'blue' ? 'text-blue-600' :
  props.order.color === 'purple' ? 'text-purple-600' :
  props.order.color === 'green' ? 'text-green-600' : 'text-orange-600'
])

const statusClasses = computed(() => [
  'inline-flex px-3 py-1 text-xs font-semibold rounded-full',
  props.order.status === 'completed' ? 'bg-green-100 text-green-700' :
  props.order.status === 'processing' ? 'bg-yellow-100 text-yellow-700' :
  props.order.status === 'shipped' ? 'bg-blue-100 text-blue-700' :
  props.order.status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'
])

const capitalizedStatus = computed(() => {
  return props.order.status.charAt(0).toUpperCase() + props.order.status.slice(1)
})
</script>