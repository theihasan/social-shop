<template>
  <header class="bg-white shadow-md border-b border-gray-200">
    <div class="flex items-center justify-between px-4 py-4 lg:px-6">
      <div class="flex items-center space-x-4">
        <button 
          @click="$emit('toggle-sidebar')" 
          class="p-2 rounded-md lg:hidden hover:bg-gray-100"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <h1 class="text-xl font-bold text-gray-900 lg:text-2xl">
          {{ title }}
        </h1>
      </div>

      <div class="flex items-center space-x-4">
        <!-- Search -->
        <div class="hidden md:flex relative">
          <input 
            v-model="searchQuery"
            type="text" 
            placeholder="Search products, orders..." 
            class="w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-meta-blue focus:border-transparent"
            @input="handleSearch"
          >
          <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>

        <!-- Notifications -->
        <button 
          @click="toggleNotifications"
          class="relative p-2 text-gray-400 hover:text-gray-600 rounded-2xl hover:bg-gray-100 transition-colors"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.07 2.82L8.43 4.12c-.13.11-.33.11-.46 0L6.33 2.82A1 1 0 005 3.56v7.88a1 1 0 00.33.74l4.67 4.07a1 1 0 001.33 0l4.67-4.07A1 1 0 0017 11.44V3.56a1 1 0 00-1.33-.74z"/>
          </svg>
          <span v-if="notificationCount > 0" class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
        </button>

        <!-- User Avatar -->
        <div class="relative">
          <button 
            @click="toggleUserMenu"
            class="flex items-center space-x-3 p-2 rounded-2xl hover:bg-gray-100 transition-colors"
          >
            <img 
              class="w-8 h-8 rounded-full bg-meta-blue" 
              :src="user.avatar" 
              :alt="user.name"
            >
            <span class="hidden md:block text-sm font-medium text-gray-700">
              {{ user.name }}
            </span>
            <svg class="hidden md:block w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          
          <!-- User Dropdown -->
          <div v-if="userMenuOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-lg z-50">
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
  title: {
    type: String,
    default: 'Shop Overview'
  }
})

defineEmits(['toggle-sidebar'])

const searchQuery = ref('')
const userMenuOpen = ref(false)
const notificationCount = ref(3)

const user = ref({
  name: 'John Doe',
  avatar: "data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 24 24'%3e%3cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3e%3c/svg%3e"
})

const handleSearch = () => {
  // Implement search logic
  console.log('Searching for:', searchQuery.value)
}

const toggleNotifications = () => {
  // Implement notifications logic
  console.log('Toggle notifications')
}

const toggleUserMenu = () => {
  userMenuOpen.value = !userMenuOpen.value
}
</script>