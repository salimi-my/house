<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const props = defineProps({
  title: String,
  description: String
})

const flashSuccess = computed(() => usePage().props.flash.success)
</script>

<template>
  <Head>
    <title>{{ props.title }}</title>
    <meta name="description" :content="props.description">
  </Head>
  <main>
    <header>
      <Link href="/listing">Listings</Link>&emsp;
      <Link href="/listing/create">New Listing</Link>
    </header>
    <div v-if="flashSuccess">
      {{ flashSuccess }}
    </div>
    <slot />
  </main>
</template>