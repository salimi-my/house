<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Link } from '@inertiajs/vue3'
import Bell from './SVG/Bell.vue'
import Price from './Price.vue'

defineProps({
  count: Number,
  notifications: Array
})
</script>

<template>
  <Menu as="div" class="relative inline-block text-left self-center">
    <div>
      <MenuButton
        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5 mr-1">
        <span class="sr-only">Open notification menu</span>
        <div class="relative">
          <Bell :class="'w-5 h-5'" />
          <div v-if="count"
            class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-blue-600 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
            {{ count }}
          </div>
        </div>
      </MenuButton>
    </div>

    <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
      leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
      <MenuItems
        class="absolute right-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-1 py-1">
          <MenuItem v-if="notifications.length" v-for="notification in notifications" :key="notification.id"
            v-slot="{ active }">
          <Link :href="`/notification/${notification.id}/seen`" method="put" as="button" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'inline-block w-full items-center rounded-md px-4 py-2 text-sm',
          ]">
          <span>You have an offer for</span>
          <Price :price="notification.data.amount" class="inline ml-1" />.
          </Link>
          </MenuItem>
          <MenuItem v-else v-slot="{ active }">
          <Link href="#" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'inline-block w-full items-center rounded-md px-4 py-2 text-sm',
          ]">
          You have no notifications.
          </Link>
          </MenuItem>
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>