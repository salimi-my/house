<script setup>
import ProfileCard from '../Components/ProfileCard.vue';

defineProps({
  profile: Boolean,
  setting: Boolean
})
</script>

<template>
  <section class="w-full bg-gray-50 dark:bg-gray-900 min-height-screen">
    <div class="w-full max-w-7xl grid lg:grid-cols-8 gap-4 px-4 xl:mx-auto my-20">
      <div class="lg:col-span-2">
        <ProfileCard :profile="profile" :setting="setting" />
      </div>
      <div class="lg:col-span-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <slot></slot>
      </div>
    </div>
  </section>
</template>