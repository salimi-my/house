<script setup>
import { Pagination, Navigation } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

defineProps({
  height: String
})
</script>

<template>
  <Swiper :modules="[Navigation, Pagination]" :pagination="true" :loop="true" navigation>
    <SwiperSlide v-for="n in 5" :key="n" class="relative">
      <img class="rounded-t-lg w-full object-cover" :class="height" :src="'/assets/images/property-' + n + '.webp'"
        alt="" />
    </SwiperSlide>
  </Swiper>
</template>