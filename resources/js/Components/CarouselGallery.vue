<script setup>
import { FreeMode, Thumbs, Navigation } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { ref } from 'vue'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/thumbs'

defineProps({
  images: Array
})

const thumbsSwiper = ref(null);
const setThumbsSwiper = (swiper) => {
  thumbsSwiper.value = swiper;
}
</script>

<template>
  <div class="">
    <Swiper :modules="[FreeMode, Navigation, Thumbs]" :loop="true" :thumbs="{ swiper: thumbsSwiper }" navigation>
      <SwiperSlide v-if="images.length" v-for="image in images" :key="image.id">
        <img class="rounded-lg w-full h-[300px] md:h-[500px] object-cover" :src="image.src" alt="" />
      </SwiperSlide>
      <SwiperSlide v-else>
        <img class="rounded-lg w-full h-[300px] md:h-[500px] object-cover" src="../Assets/Images/image-placeholder.jpg"
          alt="" />
      </SwiperSlide>
    </Swiper>

    <Swiper :modules="[FreeMode, Navigation, Thumbs]" :loop="true" :slidesPerView="3" :spaceBetween="10" :freeMode="true"
      slide watch-slides-progress navigation @swiper="setThumbsSwiper" class="mt-4">
      <SwiperSlide v-if="images.length" v-for="image in images" :key="image.id">
        <img class="rounded-md w-full h-[100px] md:h-[130px] object-cover cursor-pointer hover:opacity-80"
          :src="image.src" alt="" />
      </SwiperSlide>
      <SwiperSlide v-else>
        <img class="rounded-md w-full h-[100px] md:h-[130px] object-cover cursor-pointer hover:opacity-80"
          src="../Assets/Images/image-placeholder.jpg" alt="" />
      </SwiperSlide>
    </Swiper>
  </div>
</template>