<template>
  <div :class="sidebarClasses">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
      <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-meta-blue rounded-lg flex items-center justify-center">
          <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
          </svg>
        </div>
        <span class="text-xl font-bold text-gray-900">Meta Shops</span>
      </div>
      <button @click="$emit('close')" class="p-2 rounded-md lg:hidden hover:bg-gray-100">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
    
    <nav class="mt-8 px-4">
      <ul class="space-y-2">
        <SidebarItem
          v-for="item in navigationItems"
          :key="item.name"
          :item="item"
        />
        
        <li class="pt-4">
          <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Platform</p>
        </li>
        
        <SidebarItem
          v-for="item in platformItems"
          :key="item.name"
          :item="item"
        />
      </ul>
    </nav>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import SidebarItem from './SidebarItem.vue'

const props = defineProps({
  open: Boolean
})

defineEmits(['close'])

const page = usePage()

const sidebarClasses = computed(() => [
  'fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0',
  props.open ? 'translate-x-0' : '-translate-x-full'
])

const currentUrl = computed(() => page.url || '')

const navigationItems = computed(() => [
  {
    name: 'Dashboard',
    href: '/social-shop/dashboard',
    icon: 'dashboard',
    active: currentUrl.value.includes('/social-shop/dashboard') || currentUrl.value === '/social-shop'
  },
  {
    name: 'Catalog',
    href: '/social-shop/catalog',
    icon: 'catalog',
    active: currentUrl.value.includes('/social-shop/catalog')
  },
  {
    name: 'Orders',
    href: '/social-shop/orders',
    icon: 'orders',
    badge: '3',
    active: currentUrl.value.includes('/social-shop/orders')
  },
  {
    name: 'Team Members',
    href: '/social-shop/users',
    icon: 'users',
    active: currentUrl.value.includes('/social-shop/users')
  }
])

const platformItems = computed(() => [
  {
    name: 'Facebook Shop',
    href: '/social-shop/facebook',
    icon: 'facebook',
    active: currentUrl.value.includes('/social-shop/facebook')
  },
  {
    name: 'Instagram Shop',
    href: '/social-shop/instagram',
    icon: 'instagram',
    active: currentUrl.value.includes('/social-shop/instagram')
  },
  {
    name: 'Settings',
    href: '/social-shop/settings',
    icon: 'settings',
    active: currentUrl.value.includes('/social-shop/settings')
  }
])
</script>