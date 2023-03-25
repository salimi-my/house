<script setup>
import Card from '../../Components/Card.vue';
import Pagination from '../../Components/Pagination.vue';

defineProps({
  listings: Object
})
</script>

<template>
  <div class="container max-w-6xl grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10 md:gap-y-16 mt-20 px-4 xl:px-0">
    <Card v-for="listing in listings.data" :listing="listing" :key="listing.id" />
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-10 mb-20">
    <Pagination :links="listings.links" />
  </div>
</template>