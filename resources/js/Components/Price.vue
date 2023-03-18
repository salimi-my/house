<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: [Number, String]
})

const formattedPrice = computed(
  () => Number(props.price).toLocaleString('en-MY', {
    style: 'currency',
    currency: 'MYR',
    maximumFractionDigits: 0,
  }),
)
</script>

<template>
  <h5>{{ formattedPrice }}</h5>
</template>