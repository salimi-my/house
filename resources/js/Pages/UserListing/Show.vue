<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import Offer from '../../Components/Offer.vue'
import Price from '../../Components/Price.vue'

const props = defineProps({
  listing: Object
})

const hasOffers = computed(() => props.listing.offers.length)
</script>

<template>
  <h1 class="text-3xl font-bold mb-1 text-gray-900 dark:text-white mt-20">
    Your Property Offers
  </h1>
  <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
    Below are all properties's offers made on our site.
  </h2>

  <div class="container max-w-6xl mt-0 px-4 xl:px-0">
    <Link href="/user-account/my-listing"
      class="text-md font-bold tracking-tight text-gray-500 dark:text-white hover:text-blue-700 dark:hover:text-blue-700">
    <i class="fa-solid fa-arrow-left mr-1"></i> Back to Listing
    </Link>
  </div>

  <div class="container max-w-6xl grid lg:grid-cols-5 mt-4 mb-20 px-4 xl:px-0 gap-4">
    <div class="flex flex-col lg:col-span-2 space-y-4">
      <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-4">House Details</h5>
        <div class="flex justify-between items-center mb-4">
          <Price :price="listing.price" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />
          <span
            class="inline-flex items-center justify-center border border-blue-700 rounded-full px-3 font-semibold text-sm text-blue-700">
            <i class="fa-regular fa-building mr-2"></i> {{ listing.type }}
          </span>
        </div>
        <div class="mb-4 flex flex-col">
          <div class="mb-1 flex space-x-2 items-center">
            <i class="fa-solid fa-map-location-dot text-blue-700"></i>
            <p class="font-semibold text-gray-700 dark:text-white">
              Address
            </p>
          </div>
          <p class="font-normal text-gray-700 dark:text-white">
            {{ listing.address }}, {{ listing.zip_code }} {{ listing.city }}, {{ listing.state }}, {{ listing.country }}
          </p>
        </div>
        <div class="grid grid-cols-5">
          <div class="flex justify-between items-center text-gray-900 dark:text-white font-semibold col-span-2">
            <div><i class="fa-solid fa-bed text-blue-700 mr-1"></i> {{ listing.bedrooms }}</div>
            <div><i class="fa-solid fa-bath text-blue-700 mr-1"></i> {{ listing.bathrooms }}</div>
            <div><i class="fa-solid fa-car text-blue-700 mr-1"></i> {{ listing.carparks }}</div>
          </div>
          <h5 class="text-gray-900 dark:text-white text-right font-semibold col-span-3">{{ listing.area }} sqft</h5>
        </div>
      </div>
    </div>

    <div v-if="hasOffers" class="w-full lg:col-span-3 min-height-listing-offers">
      <Offer v-for="offer in listing.offers" :key="offer.id" class="mb-4" :offer="offer" :listing-price="listing.price"
        :is-sold="listing.sold_at != null" />
    </div>

    <div v-else class="w-full lg:col-span-3 min-height-listing-offers">
      <div class="p-6 py-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <p class="font-semibold text-gray-700 dark:text-white text-center">
          There are no offers currently.
        </p>
      </div>
    </div>
  </div>
</template>