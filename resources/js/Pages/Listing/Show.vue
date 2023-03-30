<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import CarouselGallery from '../../Components/CarouselGallery.vue'
import OfferSubmitted from '../../Components/OfferSubmitted.vue';
import Price from '../../Components/Price.vue'
import SubmitOffer from '../../Components/SubmitOffer.vue';
import { useMonthlyPayment } from '../../Composables/useMonthlyPayment'

const props = defineProps({
  listing: Object,
  offerMade: Object
})

const offer = ref(props.listing.price)

const interestRate = ref(2.5)
const duration = ref(25)

const { monthlyPayment, totalPaid, totalInterestPaid } = useMonthlyPayment(offer, interestRate, duration)

const user = computed(() => usePage().props.user)
</script>

<template>
  <div class="container max-w-6xl mt-16 px-4 xl:px-0">
    <Link href="/listing"
      class="text-md font-bold tracking-tight text-gray-500 dark:text-white hover:text-blue-700 dark:hover:text-blue-700">
    <i class="fa-solid fa-arrow-left mr-1"></i> Back to Listing
    </Link>
  </div>

  <div class="container max-w-6xl grid lg:grid-cols-5 mt-2 mb-20 px-4 xl:px-0 gap-4">

    <div class="w-full lg:col-span-3">
      <div class="p-6 pb-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-4">House Images</h5>
        <CarouselGallery :images="listing.images" />
      </div>
    </div>

    <div class="flex flex-col lg:col-span-2 space-y-4">
      <div
        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative overflow-hidden">
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
        <div v-if="listing.user_id == user?.id" class="absolute right-0 top-0 h-16 w-16">
          <div
            class="absolute right-[-28px] top-[10px] w-[100px] transform rotate-45 bg-blue-600 text-center text-white text-sm font-semibold py-1 shadow-md">
            Yours
          </div>
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

      <SubmitOffer v-if="user && !offerMade" @offer-updated="offer = $event" :listing-id="listing.id"
        :price="listing.price" />
      <OfferSubmitted v-if="user && offerMade" :offer="offerMade" />
    </div>

  </div>
</template>