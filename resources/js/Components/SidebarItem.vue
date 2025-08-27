<template>
  <li>
    <a 
      :href="item.href" 
      :class="linkClasses"
    >
      <component :is="iconComponent" class="w-5 h-5 mr-3" />
      {{ item.name }}
      <span v-if="item.badge" class="ml-auto bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
        {{ item.badge }}
      </span>
    </a>
  </li>
</template>
<script setup>
import { computed } from 'vue';

const props = defineProps({
  item: {
    type: Object,
    required: true
  }
});

const iconComponent = computed(() => {
  const icons = {
    dashboard: 'svg-dashboard-icon',
    catalog: 'svg-catalog-icon',
    orders: 'svg-orders-icon',
    users: 'svg-users-icon',
    facebook: 'svg-facebook-icon',
    instagram: 'svg-instagram-icon',
    settings: 'svg-settings-icon'
  };
  return icons[props.item.icon] || 'svg-default-icon';
});

const linkClasses = computed(() => [
  'flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-colors',
  props.item.active 
    ? 'text-white bg-meta-blue' 
    : 'text-gray-700 hover:bg-gray-100'
]);
</script>
<style scoped>
</style>