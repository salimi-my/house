<script setup>
import Card from '../../Components/Card.vue'
import UserFilter from '../../Components/UserFilter.vue'
import Pagination from '../../Components/Pagination.vue'
import { initDismisses } from 'flowbite'
import { ref, watch, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'

onMounted(() => {
  initDismisses()
})

defineProps({
  listings: Object,
  filters: Object
})

const flashSuccess = ref(null)

watch(
  () => usePage().props.flash.success,
  (message) => {
    flashSuccess.value = message
  }
)
</script>

<template>
  <h1 class="text-3xl font-bold mb-1 text-gray-900 dark:text-white mt-20">
    Your Properties
  </h1>
  <h2 class="text-lg font-medium text-gray-900 dark:text-white">
    Below are all properties you own listed on our site.
  </h2>

  <div class="container max-w-6xl px-4 mt-0 xl:px-0 flex justify-center">
    <div id="success-alert"
      :class="[flashSuccess === null ? 'hidden' : '', 'flex p-4 my-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 items-center w-full lg:max-w-[310px] xl:max-w-[363px] -mb-12']"
      role="alert">
      <i class="fa-solid fa-circle-check"></i>
      <span class="sr-only">Success</span>
      <div class="ml-3 text-sm font-medium">
        {{ flashSuccess }}
      </div>
      <button @click="() => flashSuccess = null" type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex justify-center items-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#success-alert" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
  </div>

  <div
    class="container max-w-6xl mt-10 px-4 xl:px-0 flex flex-col max-sm:flex-col-reverse lg:flex-row justify-between items-center">
    <p class="font-normal text-gray-700 dark:text-gray-400 md:py-4">
      Showing {{ listings.from }} to {{ listings.to }} of {{ listings.total }} Results
    </p>
    <UserFilter :filters="filters" />
  </div>

  <div v-if="listings.data.length"
    class="container max-w-6xl grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10 md:gap-y-16 mb-4 mt-2 px-4 xl:px-0">
    <Card v-for="listing in listings.data" :listing="listing" :key="listing.id" :user-listing="true" />
  </div>

  <div v-else class="container max-w-6xl px-4 mt-10 mb-4 xl:px-0">
    <div
      class="flex justify-center items-center border border-gray-300 dark:border-gray-700 rounded-lg min-height-user-listing px-4">
      <p class="text-gray-900 dark:text-white text-xl text-center">
        There is no properties currently. Add now!
      </p>
    </div>
  </div>

  <div v-if="listings.data.length" class="w-full flex justify-center mt-10 mb-20">
    <Pagination :links="listings.links" />
  </div>
</template>