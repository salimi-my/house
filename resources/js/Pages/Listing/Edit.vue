<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: Object
})

const form = useForm({
  type: props.listing.type,
  bedrooms: props.listing.bedrooms,
  bathrooms: props.listing.bathrooms,
  carparks: props.listing.carparks,
  area: props.listing.area,
  address: props.listing.address,
  city: props.listing.city,
  zip_code: props.listing.zip_code,
  state: props.listing.state,
  country: props.listing.country,
  price: props.listing.price,
})

const typeOptions = ['Highrise', 'Landed'];

const update = () => form.put(`/listing/${props.listing.id}`)
</script>

<template>
  <form @submit.prevent="update">
    <div>
      <div>
        <label>Type</label>
        <select v-model="form.type">
          <option v-for="option in typeOptions" :key="option" :value="option">{{ option }}</option>
        </select>
        <div v-if="form.errors.type">
          {{ form.errors.type }}
        </div>
      </div>

      <div>
        <label>Bedrooms</label>
        <input v-model.number="form.bedrooms" type="text" />
        <div v-if="form.errors.bedrooms">
          {{ form.errors.bedrooms }}
        </div>
      </div>

      <div>
        <label>Bathrooms</label>
        <input v-model.number="form.bathrooms" type="text" />
        <div v-if="form.errors.bathrooms">
          {{ form.errors.bathrooms }}
        </div>
      </div>

      <div>
        <label>Carparks</label>
        <input v-model.number="form.carparks" type="text" />
        <div v-if="form.errors.carparks">
          {{ form.errors.carparks }}
        </div>
      </div>

      <div>
        <label>Area</label>
        <input v-model.number="form.area" type="text" />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div>
        <label>Address</label>
        <input v-model="form.address" type="text" />
        <div v-if="form.errors.address">
          {{ form.errors.address }}
        </div>
      </div>

      <div>
        <label>City</label>
        <input v-model="form.city" type="text" />
        <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div>
        <label>Postcode</label>
        <input v-model="form.zip_code" type="text" />
        <div v-if="form.errors.zip_code">
          {{ form.errors.zip_code }}
        </div>
      </div>

      <div>
        <label>State</label>
        <input v-model="form.state" type="text" />
        <div v-if="form.errors.state">
          {{ form.errors.state }}
        </div>
      </div>

      <div>
        <label>Country</label>
        <input v-model="form.country" type="text" />
        <div v-if="form.errors.country">
          {{ form.errors.country }}
        </div>
      </div>

      <div>
        <label>Price</label>
        <input v-model.number="form.price" type="text" />
        <div v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Edit</button>
      </div>
    </div>
  </form>
</template>