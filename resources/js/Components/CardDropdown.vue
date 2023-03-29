<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Link } from '@inertiajs/vue3'
import Ellipsis from './SVG/Ellipsis.vue'

defineProps({
  listing: Object
})
</script>

<template>
  <div class="absolute top-1 right-1 z-10">
    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton
          class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <Ellipsis />
        </MenuButton>
      </div>

      <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
        <MenuItems
          class="absolute right-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700 dark:divide-gray-600">
          <div class="px-1 py-1">
            <MenuItem v-if="!listing.deleted_at" v-slot="{ active }">
            <a :href="`/listing/${listing.id}`" :class="[
              active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
              'group flex w-full items-center rounded-md px-4 py-2 text-sm',
            ]" target="_blank">
              <i class="fa-regular fa-eye fa-lg flex justify-center w-6 h-auto mr-2"></i> View
            </a>
            </MenuItem>
            <MenuItem v-slot="{ active }">
            <Link :href="`/user-account/my-listing/${listing.id}/edit`" :class="[
              active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
              'group flex w-full items-center rounded-md px-4 py-2 text-sm',
            ]">
            <i class="fa-solid fa-pen-to-square fa-lg flex justify-center w-6 h-auto mr-2"></i> Edit
            </Link>
            </MenuItem>
            <MenuItem v-if="!listing.deleted_at" v-slot="{ active }">
            <Link :href="`/user-account/my-listing/${listing.id}/image/create`" :class="[
              active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
              'group flex w-full items-center rounded-md px-4 py-2 text-sm',
            ]">
            <i class="fa-regular fa-images fa-lg flex justify-center w-6 h-auto mr-2"></i> Images
            ({{ listing.images_count }})
            </Link>
            </MenuItem>
            <MenuItem v-if="!listing.deleted_at" v-slot="{ active }">
            <Link :href="`/user-account/my-listing/${listing.id}`" method="delete" as="button" :class="[
              active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
              'group flex w-full items-center rounded-md px-4 py-2 text-sm',
            ]">
            <i class="fa-regular fa-trash-can fa-lg flex justify-center w-6 h-auto mr-2"></i> Delete
            </Link>
            </MenuItem>
            <MenuItem v-if="listing.deleted_at" v-slot="{ active }">
            <Link :href="`/user-account/my-listing/${listing.id}/restore`" method="put" as="button" :class="[
              active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
              'group flex w-full items-center rounded-md px-4 py-2 text-sm',
            ]">
            <i class="fa-solid fa-repeat fa-lg flex justify-center w-6 h-auto mr-2"></i> Restore
            </Link>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>