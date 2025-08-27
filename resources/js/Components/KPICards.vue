<template>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <KPICard
      v-for="kpi in kpiData"
      :key="kpi.title"
      :kpi="kpi"
    />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import KPICard from './KPICard.vue'

const kpiData = ref([
  {
    title: 'Revenue',
    value: '$47,829',
    change: '+18.2%',
    changeText: 'vs last month',
    trend: 'up',
    icon: 'dollar',
    color: 'green'
  },
  {
    title: 'Orders',
    value: '1,247',
    change: '+12.5%',
    changeText: 'vs last month',
    trend: 'up',
    icon: 'orders',
    color: 'blue'
  },
  {
    title: 'Low Stock',
    value: '23',
    change: 'Needs attention',
    trend: 'warning',
    icon: 'warning',
    color: 'orange'
  },
  {
    title: 'Shop Health',
    value: '94%',
    change: 'Excellent',
    trend: 'up',
    icon: 'check',
    color: 'green'
  }
])
</script>