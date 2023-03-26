<script setup>
import { reactive, watch, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import { debounce } from 'lodash'

const props = defineProps({
  filters: Object
})

const sortLabels = {
  created_at: [
    {
      label: 'Latest',
      value: 'desc',
    },
    {
      label: 'Oldest',
      value: 'asc',
    },
  ],
  price: [
    {
      label: 'Highest',
      value: 'desc',
    },
    {
      label: 'Lowest',
      value: 'asc',
    },
  ],
}
const sortOptions = computed(() => sortLabels[filterForm.by])

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by ?? 'created_at',
  order: props.filters.order ?? 'desc'
})

watch(
  filterForm, debounce(() =>
    router.get(
      '/user-account/my-listing',
      filterForm,
      { preserveState: true, preserveScroll: true },
    ), 1000)
)
</script>

<template>
  <form class="max-sm:w-full max-lg:mb-10">
    <div class="flex flex-wrap justify-center gap-2">
      <div
        class="max-sm:w-full flex flex-nowrap items-center text-gray-900 dark:placeholder-gray-400 dark:text-white border border-gray-300 dark:border-gray-700 rounded-md text-sm dark:bg-gray-800 focus:ring-blue-700 focus:border-blue-700 bg-gray-50 focus:z-10">
        <input id="deleted" v-model="filterForm.deleted" type="checkbox" value="" name="bordered-checkbox"
          class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ml-3">
        <label for="deleted" class="w-full py-2 ml-2 mr-3 text-sm text-gray-500 dark:text-white">Deleted</label>
      </div>

      <div class="max-sm:w-full flex flex-nowrap items-center">
        <select v-model="filterForm.by" class="input-filter-l w-full md:w-24">
          <option value="created_at">Date</option>
          <option value="price">Price</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-full md:w-24">
          <option v-for="option in sortOptions" :key="option.value" :value="option.value">
            {{ option.label }}
          </option>
        </select>
      </div>
    </div>
  </form>
</template>