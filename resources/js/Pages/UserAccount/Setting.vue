<script setup>
import { ref, computed, onMounted } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import ProfileLayout from '../../Layouts/ProfileLayout.vue'
import { initDismisses } from 'flowbite'

onMounted(() => {
  initDismisses()
})

const flashSuccess = computed(() => usePage().props.flash.success)

const form = useForm({
  current_password: null,
  password: null,
  password_confirmation: null
})

const update = () => {
  form.clearErrors()
  form.post(
    '/user-account/setting',
    { onSuccess: () => form.reset() }
  )
}

</script>

<template>
  <ProfileLayout :setting="true">
    <div class="flex justify-center items-center py-10">
      <form @submit.prevent="update" class="w-full space-y-4 md:space-y-6 mx-8 mb-9 max-w-[600px]">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
          Your Settings
        </h1>
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
          <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Current Password
          </label>
          <input v-model="form.current_password" type="password" name="current_password" id="current_password"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="••••••••" />
          <p v-if="form.errors.current_password" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
            {{ form.errors.current_password }}
          </p>
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            New Password
          </label>
          <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          <p v-if="form.errors.password" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
            {{ form.errors.password }}
          </p>
        </div>
        <div>
          <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Confirm Password
          </label>
          <input v-model="form.password_confirmation" type="password" name="password_confirmation"
            id="password_confirmation" placeholder="••••••••"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          <p v-if="form.errors.password_confirmation" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
            {{ form.errors.password_confirmation }}
          </p>
        </div>
        <button type="submit"
          class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Change Password
        </button>
      </form>
    </div>
  </ProfileLayout>
</template>