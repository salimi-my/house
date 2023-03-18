<script setup>
import { FreeMode, Thumbs, Navigation } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { ref } from 'vue'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/thumbs'

const thumbsSwiper = ref(null);
const setThumbsSwiper = (swiper) => {
  thumbsSwiper.value = swiper;
}
</script>

<template>
  <div class="">
    <Swiper :modules="[FreeMode, Navigation, Thumbs]" :loop="true" :thumbs="{ swiper: thumbsSwiper }" navigation>
      <SwiperSlide v-for="n in 5" :key="n">
        <img class="rounded-lg w-full h-[300px] md:h-[500px] object-cover" :src="'/assets/images/property-' + n + '.webp'"
          alt="" />
      </SwiperSlide>
    </Swiper>

    <Swiper :modules="[FreeMode, Navigation, Thumbs]" :loop="true" :slidesPerView="3" :spaceBetween="10" :freeMode="true"
      slide watch-slides-progress navigation @swiper="setThumbsSwiper" class="mt-4">
      <SwiperSlide v-for="n in 5" :key="n">
        <img class="rounded-md w-full h-[100px] md:h-[130px] object-cover cursor-pointer hover:opacity-80"
          :src="'/assets/images/property-' + n + '.webp'" alt="" />
      </SwiperSlide>
    </Swiper>
  </div>
</template>