<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  listings: Array
})
</script>

<template>
  <div v-for="listing in listings" :key="listing.id">
    <div>
      <Link :href="`/listing/${listing.id}`">
      {{ listing.address }}, {{ listing.zip_code }} {{ listing.city }}, {{ listing.state }} for MYR{{ listing.price }}
      </Link>
    </div>
    <div>
      <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
    </div>
    <div>
      <Link :href="`/listing/${listing.id}`" method="delete" as="button">Delete</Link>
    </div>
  </div>
</template>