<template>
  <div class="bg-white rounded-2xl shadow-md">
    <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Recent Orders</h2>
        <a href="/social-shop/orders" class="text-meta-blue hover:text-meta-blue-dark font-semibold text-sm transition-colors">
          View all
        </a>
      </div>
    </div>
    <div class="p-6">
      <div class="space-y-4">
        <RecentOrderItem
          v-for="order in orders"
          :key="order.id"
          :order="order"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import RecentOrderItem from './RecentOrderItem.vue'

const orders = ref([
  {
    id: '#1247',
    product: 'Wireless Bluetooth Headphones',
    customer: 'Sarah Johnson',
    time: '2 hours ago',
    amount: '$89.99',
    status: 'completed',
    color: 'meta-blue'
  },
  {
    id: '#1243',
    product: 'Premium Yoga Mat',
    customer: 'Lisa Park',
    time: '12 hours ago',
    amount: '$45.99',
    status: 'processing',
    color: 'orange'
  }
])
</script>