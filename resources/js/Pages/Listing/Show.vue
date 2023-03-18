<script setup>
import CarouselGallery from '../../Components/CarouselGallery.vue';


defineProps({
  listing: Object
})
</script>

<template>
  <div class="container max-w-6xl grid lg:grid-cols-2 mt-20 px-4 xl:px-0 big-carousel">
    <CarouselGallery />
  </div>
</template>