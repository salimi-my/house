<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  user: Object
})
</script>

<template>
  <Menu as="div" class="relative inline-block text-left self-center">
    <div>
      <MenuButton
        class="flex items-center text-sm font-medium p-1 text-gray-700 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-500 md:mr-0 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 mr-2 rounded-full object-cover"
          :src="user?.avatar ? user?.avatar : '/assets/images/avatar.svg'" alt="user photo">
        <span class="w-0 lg:w-full truncate lg:mr-2">{{ user?.name }}</span>
        <i class="fa-solid fa-caret-down"></i>
      </MenuButton>
    </div>

    <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
      leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
      <MenuItems
        class="absolute right-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <div class="font-medium">{{ user?.name }}</div>
          <div class="truncate">{{ user?.email }}</div>
        </div>
        <div class="px-1 py-1">
          <MenuItem v-slot="{ active }">
          <Link href="/user-account/profile" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'group flex w-full items-center rounded-md px-4 py-2 text-sm',
          ]">
          My Profile
          </Link>
          </MenuItem>
          <MenuItem v-slot="{ active }">
          <Link href="/user-account/my-listing" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'group flex w-full items-center rounded-md px-4 py-2 text-sm',
          ]">
          My Listing
          </Link>
          </MenuItem>
          <MenuItem v-slot="{ active }">
          <Link href="/user-account/setting" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'group flex w-full items-center rounded-md px-4 py-2 text-sm',
          ]">
          My Settings
          </Link>
          </MenuItem>
        </div>
        <div class="px-1 py-1">
          <MenuItem v-slot="{ active }">
          <Link href="/logout" :class="[
            active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
            'group flex w-full items-center rounded-md px-4 py-2 text-sm',
          ]" method="delete" as="button">
          Sign out
          </Link>
          </MenuItem>
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>