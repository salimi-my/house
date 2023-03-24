<script setup>
import { ref, computed, onMounted } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import ProfileLayout from '../../Layouts/ProfileLayout.vue'
import { initDismisses } from 'flowbite'

onMounted(() => {
  initDismisses()
})

const flashSuccess = computed(() => usePage().props.flash.success)

const props = defineProps({
  profile: Object
})

const form = useForm({
  avatar: null,
  name: props.profile.name,
  phone: props.profile.phone
})

const showAvatar = ref(null)
const filePicker = ref(null)

const resetAvatar = () => {
  form.reset('avatar')
}

const clickHandler = () => {
  filePicker.value.click()
}

const addFile = (e) => {
  const reader = new FileReader()
  if (e.target.files[0]) {
    reader.readAsDataURL(e.target.files[0])
  }
  reader.onload = (readerEvent) => {
    form.avatar = e.target.files[0]
    showAvatar.value = readerEvent.target.result
  }
}

const update = () => {
  form.clearErrors()
  form.post(
    '/user-account/profile',
    { onSuccess: () => form.reset('avatar') },
  )
}
</script>

<template>
  <ProfileLayout :profile="true">
    <div class="flex justify-center items-center py-10">
      <form @submit.prevent="update" enctype="multipart/form-data"
        class="w-full space-y-4 md:space-y-6 mx-8 mb-9 max-w-[600px]">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
          Your Profile
        </h1>
        <div class="flex flex-col items-center">
          <div @click="clickHandler" class="relative group">
            <img v-if="!form.avatar"
              class="w-24 h-24 rounded-full shadow-lg object-cover group-hover:brightness-50 cursor-pointer"
              :src="props.profile.avatar ? props.profile.src : '/assets/images/avatar.svg'" alt="user photo" />
            <img v-else class="w-24 h-24 rounded-full shadow-lg object-cover group-hover:brightness-50 cursor-pointer"
              :src="showAvatar" alt="user photo" />
            <div class="absolute top-9 left-5 hidden group-hover:flex justify-center items-center cursor-pointer">
              <p class="font-medium text-white">Change</p>
            </div>
            <div
              class="absolute right-1 bottom-1 w-5 h-5 p-1 bg-gray-300 rounded-full flex justify-center items-center ring-2 ring-white cursor-pointer">
              <i class="fa-solid fa-camera text-gray-600 fa-xs -mt-[0.1rem]"></i>
            </div>
          </div>
          <button v-if="form.avatar" @click="resetAvatar" type="button"
            class="mt-3 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            Remove
          </button>
          <input ref="filePicker" @input="addFile" type="file" name="avatar" hidden />
        </div>
        <div id="success-alert"
          class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 items-center"
          :class="{ hidden: !flashSuccess }" role="alert">
          <i class="fa-solid fa-circle-check"></i>
          <span class="sr-only">Success</span>
          <div class="ml-3 text-sm font-medium">
            {{ flashSuccess }}
          </div>
          <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex justify-center items-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#success-alert" aria-label="Close">
            <span class="sr-only">Close</span>
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div>
          <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
            Name</label>
          <input v-model="form.name" type="text" name="name" id="full_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="e.g. John Doe" />
          <p v-if="form.errors.name" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
            {{ form.errors.name }}
          </p>
        </div>
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
            Address</label>
          <input type="email" name="email" id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed"
            placeholder="name@domain.com" :value="props.profile.email" disabled />
        </div>
        <div>
          <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
            Number</label>
          <input v-model="form.phone" type="tel" id="phone"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="e.g. 0123456789">
          <p v-if="form.errors.phone" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
            {{ form.errors.phone }}
          </p>
        </div>
        <button type="submit"
          class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Update
        </button>
      </form>
    </div>
  </ProfileLayout>
</template>