<script setup>
import Card from '../../Components/Card.vue';

defineProps({
  listings: Array
})
</script>

<template>
  <div class="container max-w-6xl grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10 md:gap-y-16 my-20 px-4 xl:px-0">
    <Card v-for="listing in listings" :listing="listing" :key="listing.id" />
  </div>
</template>