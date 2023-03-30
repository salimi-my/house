<script setup>
import { computed } from 'vue'
import Price from './Price.vue'

const props = defineProps({
  offer: Object,
})

const offerMadeOn = computed(
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
    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:col-span-3">
    <h5 class="text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-2">Offer Made</h5>

    <Price :price="offer.amount" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />

    <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-900 dark:text-white">
      <div>Made by you on</div>
      <div class="font-medium">{{ offerMadeOn }}</div>
    </section>
  </div>
</template>