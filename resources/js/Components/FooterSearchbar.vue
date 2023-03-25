<script setup>
import { useForm } from '@inertiajs/vue3'

const filterForm = useForm({
  search: null
})

const filter = () => {
  filterForm.transform((data) => {
    let filterData = {}
    for (const property in data) {
      const value = data[property]
      if (!value) continue
      filterData[property] = value
    }
    return filterData
  }).get('/listing')
}
</script>

<template>
  <section @submit.prevent="filter" class="w-full mt-16 mb-20">
    <h3 class="md:col-span-7 mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white text-center">
      Search for next home now!
    </h3>
    <form class="max-w-lg mx-4 md:mx-auto mt-3">
      <div class="flex">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
          Email
        </label>
        <div class="relative w-full">
          <input v-model="filterForm.search" type="search" id="search-dropdown"
            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg rounded-l-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
            placeholder="Search City, Neighborhood, Postcode, State, Street Address..." required>
          <button type="submit"
            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <span class="sr-only">Search</span>
          </button>
        </div>
      </div>
    </form>
  </section>
</template>