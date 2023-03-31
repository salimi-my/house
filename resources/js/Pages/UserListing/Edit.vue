<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: Object,
  countries: Array
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

const update = () => form.put(`/user-account/my-listing/${props.listing.id}`)
</script>

<template>
  <section class="w-full bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-32 py-36 lg:w-[650px] mx-auto min-height-screen">
      <Link href="/" class="flex items-center mb-0 text-2xl font-bold text-blue-700 dark:text-white">
      <img class="w-8 h-8 mr-2" src="../../Assets/Images/house-logo.png" alt="House Logo">
      House
      </Link>
      <div class="w-full flex justify-start mb-3 ml-1">
        <Link href="/user-account/my-listing"
          class="text-md font-bold tracking-tight text-gray-500 dark:text-white hover:text-blue-700 dark:hover:text-blue-700">
        <i class="fa-solid fa-arrow-left mr-1"></i> Back to Listing
        </Link>
      </div>
      <div class="w-full bg-white rounded-lg shadow dark:border xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Update listing
          </h1>
          <form @submit.prevent="update" class="space-y-4 md:space-y-6">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">House type</label>
                <select v-model="form.type"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  id="type">
                  <option value="" selected disabled>Select type</option>
                  <option v-for="option in typeOptions" :key="option" :value="option">{{ option }}</option>
                </select>
                <p v-if="form.errors.type" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.type }}
                </p>
              </div>
              <div>
                <label for="bedrooms"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bedrooms</label>
                <input v-model.number="form.bedrooms" type="number" id="bedrooms" placeholder="Enter bedrooms"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.bedrooms" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.bedrooms }}
                </p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="bathrooms"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bathrooms</label>
                <input v-model.number="form.bathrooms" type="number" id="bathrooms" placeholder="Enter bathrooms"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.bathrooms" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.bathrooms }}
                </p>
              </div>
              <div>
                <label for="carparks"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carparks</label>
                <input v-model.number="form.carparks" type="number" id="carparks" placeholder="Enter carparks"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.carparks" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.carparks }}
                </p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                <input v-model.number="form.area" type="number" id="area" placeholder="Enter area"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.area" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.area }}
                </p>
              </div>
              <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input v-model="form.address" type="text" id="address" placeholder="Enter address"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.address" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.address }}
                </p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                <input v-model="form.city" type="text" id="city" placeholder="Enter city"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.city" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.city }}
                </p>
              </div>
              <div>
                <label for="zip_code"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                <input v-model="form.zip_code" type="text" id="zip_code" placeholder="Enter postcode"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.zip_code" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.zip_code }}
                </p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                <input v-model="form.state" type="text" id="state" placeholder="Enter state"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.state" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.state }}
                </p>
              </div>
              <div>
                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                <select v-model="form.country"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  id="country">
                  <option value="" selected disabled>Select country</option>
                  <option v-for="country in countries" :key="country.id" :value="country.name">{{ country.name }}</option>
                </select>
                <p v-if="form.errors.country" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.country }}
                </p>
              </div>
            </div>

            <div>
              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
              <div class="flex">
                <span
                  class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                  RM
                </span>
                <input v-model.number="form.price" type="number" id="price" min="0"
                  class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Enter price">
              </div>
              <p v-if="form.errors.price" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                {{ form.errors.price }}
              </p>
            </div>

            <div>
              <button type="submit"
                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>