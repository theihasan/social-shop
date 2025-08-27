<template>
  <div class="flex h-full">
    <MobileOverlay :show="sidebarOpen" @close="closeSidebar" />
    <Sidebar :open="sidebarOpen" @close="closeSidebar" />
    
    <div class="flex-1 flex flex-col min-h-0 lg:ml-0">
      <TopNavigation @toggle-sidebar="toggleSidebar" />
      <main class="flex-1 overflow-y-auto">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import Sidebar from '../Components/Sidebar.vue'
import TopNavigation from '../Components/TopNavigation.vue'
import MobileOverlay from '../Components/MobileOverlay.vue'

const sidebarOpen = ref(false)

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value
}

const closeSidebar = () => {
  sidebarOpen.value = false
}

// Close on escape
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeSidebar()
  }
})
</script>