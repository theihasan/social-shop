<template>
  <div class="bg-white rounded-2xl shadow-md">
    <div class="p-6 border-b border-gray-200">
      <h2 class="text-xl font-bold text-gray-900">Activity Timeline</h2>
    </div>
    <div class="p-6">
      <div class="relative">
        <!-- Timeline line -->
        <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gray-200"></div>
        
        <div class="space-y-6">
          <ActivityTimelineItem
            v-for="activity in activities"
            :key="activity.id"
            :activity="activity"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import ActivityTimelineItem from './ActivityTimelineItem.vue'

const activities = ref([
  {
    id: 1,
    title: 'Order #1247 completed',
    description: 'Customer received Wireless Bluetooth Headphones',
    time: '2 hours ago',
    type: 'success',
    icon: 'check'
  },
  {
    id: 2,
    title: 'New product added',
    description: 'Gaming Mouse Pro added to catalog',
    time: '3 hours ago',
    type: 'info',
    icon: 'plus'
  },
  {
    id: 3,
    title: 'Low stock alert',
    description: 'Organic Cotton T-Shirt running low (5 left)',
    time: '5 hours ago',
    type: 'warning',
    icon: 'warning'
  },
])
</script>