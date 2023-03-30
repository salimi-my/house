<script setup>
import { useForm } from '@inertiajs/vue3'
import { computed, watch } from 'vue'
import Price from './Price.vue'
import { debounce } from 'lodash'

const props = defineProps({
  listingId: Number,
  price: Number,
})

const form = useForm({
  amount: props.price
})

const submitOffer = () => form.post(
  '/listing/' + props.listingId + '/offer', {
  preserveScroll: true,
  preserveState: true,
})

const difference = computed(() => form.amount - props.price)
const min = computed(() => Math.round(props.price / 2))
const max = computed(() => Math.round(props.price * 2))

const emit = defineEmits(['offerUpdated'])

watch(
  () => form.amount,
  debounce((value) => emit('offerUpdated', value), 10)
)
</script>

<template>
  <div
    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:col-span-3">
    <h5 class="text-lg font-bold tracking-tight text-gray-500 dark:text-white mb-4">Make an Offer</h5>
    <form @submit.prevent="submitOffer">
      <input v-model.number="form.amount" type="number"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      <input v-model.number="form.amount" type="range" :min="min" :max="max" step="1000"
        class="mt-2 w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
      <p v-if="form.errors.amount" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-4">
        {{ form.errors.amount }}
      </p>
      <button type="submit"
        class="mt-6 w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Submit Offer
      </button>
    </form>
    <div class="flex justify-between text-gray-900 dark:text-white mt-2">
      <div>Difference</div>
      <div>
        <Price :price="difference" />
      </div>
    </div>
  </div>
</template>