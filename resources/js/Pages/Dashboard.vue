<template>
  <DashboardLayout>
    <div class="p-4 lg:p-6">
      <KPICards />
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <RecentOrders />
        <ActivityTimeline />
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import KPICards from '@/Components/KPICards.vue'
import RecentOrders from '@/Components/RecentOrders.vue'
import ActivityTimeline from '@/Components/ActivityTimeline.vue'
</script>