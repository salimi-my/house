<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps(
  { listing: Object },
)

const form = useForm({
  images: [],
})

const imageErrors = computed(() => Object.values(form.errors))

const canUpload = computed(() => form.images.length)

const upload = () => {
  form.post(
    '/user-account/my-listing/' + props.listing.id + '/image',
    { onSuccess: () => form.reset('images') },
  )
}

const addFiles = (e) => {
  for (const image of e.target.files) {
    form.images.push(image)
  }

  upload();
}

const back = () => window.history.back()
</script>

<template>
  <h1 class="text-3xl font-bold mb-1 text-gray-900 dark:text-white mt-20">
    Your Property Images
  </h1>
  <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
    Below are all properties's images listed on our site.
  </h2>

  <div class="container max-w-6xl px-4 mt-0 xl:px-0 flex flex-col items-center justify-center">
    <div class="w-full flex justify-start mb-3 ml-1">
      <a href="" @click.prevent="back"
        class="text-md font-bold tracking-tight text-gray-500 dark:text-white hover:text-blue-700 dark:hover:text-blue-700">
        <i class="fa-solid fa-arrow-left mr-1"></i> Back to Listing
      </a>
    </div>
    <form @submit.prevent="upload" enctype="multipart/form-data" class="w-full flex flex-col justify-center items-center">
      <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
          class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">
                Click to upload</span> or drag and drop
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG, JPEG, WEBP (MAX. 500MB)</p>
          </div>
          <input id="dropzone-file" type="file" class="hidden" multiple @input="addFiles" />
        </label>
      </div>

      <div v-if="imageErrors.length" class="mt-2 text-sm text-red-600 dark:text-red-500">
        <div v-for="(error, index) in imageErrors" :key="index">
          {{ error }}
        </div>
      </div>

      <div v-if="form.progress" class="w-full bg-gray-200 rounded-full dark:bg-gray-700 mt-4">
        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
          :style="{ width: form.progress.percentage + '%' }">
          Uploading {{ form.progress.percentage }}%
        </div>
      </div>

      <div v-if="listing.images.length"
        class="w-full mt-10 border border-gray-300 dark:border-gray-700 rounded-lg p-4 grid grid-cols-3 gap-4 mb-10">
        <div v-for="image in listing.images" :key="image.id" class="flex flex-col justify-between">
          <img :src="image.src" class="rounded-md object-cover h-full" />
          <Link :href="`/user-account/my-listing/${props.listing.id}/image/${image.id}`" method="delete" as="button"
            class="mt-2 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
          Delete
          </Link>
        </div>
      </div>

      <div v-else
        class="text-gray-500 dark:text-gray-400 w-full mt-10 border border-gray-300 dark:border-gray-700 rounded-lg p-4 flex justify-center items-center h-52 mb-10">
        There are no images yet. Start uploading.
      </div>
    </form>
  </div>
</template>