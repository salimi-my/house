<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
  profile: Boolean,
  setting: Boolean
})

const user = computed(() => usePage().props.user)
</script>

<template>
  <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center py-10">
      <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
        :src="user?.avatar ? user?.avatar : '/assets/images/avatar.svg'" alt="user photo" />
      <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ user?.name }}</h5>
      <span class="text-sm text-gray-500 dark:text-gray-400">{{ user?.email }}</span>

      <div class="w-full px-6 mt-8">
        <Link href="/user-account/profile" as="button"
          :class="[profile ? 'bg-blue-700 text-white dark:text-white' : '', 'w-full mb-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800']">
        Profile
        </Link>
        <Link href="/user-account/setting" as="button"
          :class="[setting ? 'bg-blue-700 text-white dark:text-white' : '', 'w-full mb-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800']">
        Settings
        </Link>
        <Link href="/user-account/my-listing" as="button"
          class="w-full mb-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
        Listings
        </Link>
        <hr class="my-2 dark:border-gray-600" />
        <Link href="/logout" method="delete" as="button"
          class="w-full my-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
        <i class="fa-solid fa-right-from-bracket"></i> Sign out
        </Link>
      </div>
    </div>
  </div>
</template>