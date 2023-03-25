<script setup>
import { useForm } from '@inertiajs/vue3'
import { watch } from 'vue'

const props = defineProps({
  filters: Object
})

const filterForm = useForm({
  search: props.filters.search ?? null,
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  bedrooms: props.filters.bedrooms ?? null,
  bathrooms: props.filters.bathrooms ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null
})

watch(props, (newProps) => {
  filterForm.search = newProps.filters.search
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
  }).get('/listing', {
    preserveState: true,
    preserveScroll: true
  })
}

const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.bedrooms = null
  filterForm.bathrooms = null
  filterForm.areaFrom = null
  filterForm.areaTo = null
  filter()
}
</script>

<template>
  <form @submit.prevent="filter">
    <div class="flex flex-wrap justify-center gap-2">
      <div class="max-sm:w-full flex flex-nowrap items-center">
        <input v-model.number="filterForm.priceFrom" type="text" placeholder="Price from"
          class="input-filter-l w-full md:w-[90px]" />
        <input v-model.number="filterForm.priceTo" type="text" placeholder="Price to"
          class="input-filter-r w-full md:w-[90px]" />
      </div>

      <div class="max-sm:w-full flex flex-nowrap items-center">
        <select v-model="filterForm.bedrooms" class="input-filter-l w-full md:w-28">
          <option :value="null">Bedrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select v-model="filterForm.bathrooms" class="input-filter-r w-full md:w-28">
          <option :value="null">Bathrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="max-sm:w-full flex flex-nowrap items-center">
        <input v-model.number="filterForm.areaFrom" type="text" placeholder="Sqft from"
          class="input-filter-l w-full md:w-[90px]" />
        <input v-model.number="filterForm.areaTo" type="text" placeholder="Sqft to"
          class="input-filter-r w-full md:w-[90px]" />
      </div>

      <div class="max-sm:w-full max-sm:mb-10 flex flex-nowrap gap-1 items-center justify-center">
        <button type="submit"
          class="max-sm:w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <i class="fa-solid fa-filter fa-xs"></i> Filter
        </button>
        <button @click="clear" type="reset"
          class="max-sm:w-full px-4 py-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          <i class="fa-solid fa-xmark"></i> Clear
        </button>
      </div>
    </div>
  </form>
</template>