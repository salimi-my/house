<script setup>
import { Pagination, Navigation } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

defineProps({
  images: Object
})
</script>

<template>
  <Swiper :modules="[Navigation, Pagination]" :pagination="true" :loop="true" navigation>
    <SwiperSlide v-if="images.length" v-for="image in images" :key="image.id">
      <img class="rounded-t-lg w-full h-[250px] object-cover" :src="image.src" alt="" />
    </SwiperSlide>
    <SwiperSlide>
      <img class="rounded-t-lg w-full h-[250px] object-cover" src="/assets/images/image-placeholder.jpg" alt="" />
    </SwiperSlide>
  </Swiper>
</template>