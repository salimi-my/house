<script setup>
import Card from '../../Components/Card.vue'
import Searchbar from '../../Components/Searchbar.vue'
import Filter from '../../Components/Filter.vue'
import Pagination from '../../Components/Pagination.vue'

defineProps({
  listings: Object,
  filters: Object
})
</script>

<template>
  <div class="container max-w-2xl mt-20 px-4 xl:px-0 flex flex-col justify-between items-center">
    <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-white">Search for Properties</h1>
    <h2 class="text-base font-medium mb-6 text-gray-900 dark:text-white">
      Use our search tool to find the right home for you.
    </h2>
    <Searchbar :filters="filters" />
  </div>

  <div
    class="container max-w-6xl mt-10 md:mt-20 px-4 xl:px-0 flex flex-col max-sm:flex-col-reverse lg:flex-row justify-between items-center">
    <p class="font-normal text-gray-700 dark:text-gray-400 md:py-4">
      Showing {{ listings.from }} to {{ listings.to }} of {{ listings.total }} Results
    </p>
    <Filter :filters="filters" />
  </div>
  <div class="container max-w-6xl grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10 md:gap-y-16 mt-4 px-4 xl:px-0">
    <Card v-for="listing in listings.data" :listing="listing" :key="listing.id" />
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-10 mb-20">
    <Pagination :links="listings.links" />
  </div>
</template>