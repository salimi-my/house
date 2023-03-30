<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
import Price from './Price.vue';

const props = defineProps({
  offer: Object,
  listingPrice: Number,
  isSold: Boolean
})

const difference = computed(
  () => props.offer.amount - props.listingPrice,
)

const madeOn = computed(
  () => new Date(props.offer.created_at).toLocaleDateString('en-MY', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
)
</script>

<template>
  <div
    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative overflow-hidden">
    <section class="flex items-center justify-between">
      <div>
        <h5 class="inline-block text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-2">
          Offer for
          <Price :price="offer.amount" class="inline-block" />
        </h5>
        <div class="text-gray-500 dark:text-white mb-2">
          Price Difference:
          <Price :price="difference" class="inline-block font-medium" />
        </div>
        <div class="text-gray-500 dark:text-white text-sm font-medium">
          Made {{ offer.user.name }}
        </div>
        <div class="text-gray-500 dark:text-white text-sm font-medium">
          Made on {{ madeOn }}
        </div>
      </div>
      <div>
        <Link v-if="!isSold" :href="`/user-account/offer/${offer.id}/accept`" method="put" as="button"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Accept
        </Link>
      </div>
    </section>
    <div v-if="offer.accepted_at" class="absolute right-0 top-0 h-16 w-16">
      <div
        class="absolute right-[-23px] top-[14px] w-[100px] transform rotate-45 bg-green-500 text-center text-white text-xs font-semibold py-1 shadow-md uppercase">
        Accepted
      </div>
    </div>
  </div>
</template>