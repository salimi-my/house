<script setup>
defineProps({
  listing: Object
})
</script>

<template>
  <div>
    {{ listing.address }}, {{ listing.zip_code }} {{ listing.city }}, {{ listing.state }} for MYR{{ listing.price }}
  </div>
</template>