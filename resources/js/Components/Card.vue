<script setup>
import { Link } from '@inertiajs/vue3'
import Price from './Price.vue'
import Carousel from './Carousel.vue'
import CardDropdown from './CardDropdown.vue'

defineProps({
  listing: Object,
  userListing: Boolean
})
</script>

<template>
  <div
    class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-lg hover:scale-[1.01] transition ease-in-out duration-100 relative w-full">
    <Link :href="`/listing/${listing.id}`">
    <Carousel />
    </Link>
    <Link :href="`/listing/${listing.id}`">
    <div class="p-5">
      <Price :price="listing.price" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />
      <span
        class="inline-flex items-center justify-center border border-blue-700 rounded-full px-3 font-semibold text-sm text-blue-700 mb-2">
        <i class="fa-regular fa-building mr-2"></i> {{ listing.type }}
      </span>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 min-h-[70px]">
        {{ listing.address }}, {{ listing.zip_code }} {{ listing.city }}, {{ listing.state }}
      </p>
    </div>
    <div class="w-full p-5 absolute bottom-0">
      <div class="grid grid-cols-2">
        <div class="flex justify-between items-center text-gray-900 dark:text-white">
          <div><i class="fa-solid fa-bed"></i> {{ listing.bedrooms }}</div>
          <div><i class="fa-solid fa-bath"></i> {{ listing.bathrooms }}</div>
          <div><i class="fa-solid fa-car"></i> {{ listing.carparks }}</div>
        </div>
        <h5 class="text-gray-900 dark:text-white text-right">{{ listing.area }} sqft</h5>
      </div>
    </div>
    </Link>
    <CardDropdown v-if="userListing" :listing="listing" />
  </div>
</template>