<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import CarouselGallery from '../../Components/CarouselGallery.vue'
import Price from '../../Components/Price.vue'
import { useMonthlyPayment } from '../../Composables/useMonthlyPayment'

const props = defineProps({
  listing: Object
})

const interestRate = ref(2.5)
const duration = ref(25)

const { monthlyPayment, totalPaid, totalInterestPaid } = useMonthlyPayment(props.listing.price, interestRate, duration)
</script>

<template>
  <div class="container max-w-6xl mt-16 px-4 xl:px-0">
    <Link href="/listing"
      class="text-md font-bold tracking-tight text-gray-500 dark:text-white hover:text-blue-700 dark:hover:text-blue-700">
    <i class="fa-solid fa-arrow-left mr-1"></i> Back to Listing
    </Link>
  </div>

  <div class="container max-w-6xl grid lg:grid-cols-5 mt-2 px-4 xl:px-0 big-carousel gap-4">

    <div
      class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:col-span-3">
      <CarouselGallery />
    </div>

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

      <div
        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:col-span-3">
        <h5 class="text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-4">Estimated Monthly Payment</h5>
        <div>
          <label class="text-gray-900 dark:text-white">Interest rate ({{ interestRate }}%)</label>
          <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
          <label class="text-gray-900 dark:text-white">Duration ({{ duration }} years)</label>
          <input v-model.number="duration" type="range" min="3" max="35" step="1"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
          <div class="text-gray-900 dark:text-white mt-2">
            <p>Your Monthly Payment</p>
            <Price :price="monthlyPayment" class="text-2xl font-bold tracking-tight" />
          </div>
          <div class="mt-4 text-gray-900 dark:text-white">
            <div class="flex justify-between">
              <div>Total Paid</div>
              <div>
                <Price :price="totalPaid" class="font-bold" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Principle Paid</div>
              <div>
                <Price :price="listing.price" class="font-bold" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Interest Paid</div>
              <div>
                <Price :price="totalInterestPaid" class="font-bold" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>