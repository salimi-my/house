<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { computed, onMounted } from 'vue'
import { initDismisses } from 'flowbite'

onMounted(() => {
  initDismisses()
})

const form = useForm({
  name: null,
  email: null,
  phone: null,
  password: null,
  password_confirmation: null,
  accept: false
})

const register = () => {
  form.clearErrors()
  form.post('/user')
}

const flashSuccess = computed(() => usePage().props.flash.success)
</script>

<template>
  <section class="w-full bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-32 py-36 lg:w-[650px] mx-auto min-height-screen">
      <Link href="/" class="flex items-center mb-6 text-2xl font-bold text-blue-700 dark:text-white">
      <img class="w-8 h-8 mr-2" src="../../Assets/Images/house-logo.png" alt="House Logo">
      House
      </Link>
      <div class="w-full bg-white rounded-lg shadow dark:border xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Create an account
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
          <form @submit.prevent="register" class="space-y-4 md:space-y-6">
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

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input v-model="form.email" type="email" name="email" id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="name@domain.com" />
                <p v-if="form.errors.email" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.email }}
                </p>
              </div>
              <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                  number</label>
                <input v-model="form.phone" type="tel" id="phone"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="e.g. 0123456789">
                <p v-if="form.errors.phone" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.phone }}
                </p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.password" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.password }}
                </p>
              </div>
              <div>
                <label for="password_confirmation"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" name="password_confirmation"
                  id="password_confirmation" placeholder="••••••••"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <p v-if="form.errors.password_confirmation" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.password_confirmation }}
                </p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input v-model="form.accept" id="terms" aria-describedby="terms" type="checkbox"
                  class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800 cursor-pointer">
                <p v-if="form.errors.accept" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-3">
                  {{ form.errors.accept }}
                </p>
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                  By signing up, you are creating a House account, and you agree to House's and
                  <Link href="/terms-and-condition"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                  Terms of Use
                  </Link>
                  and
                  <Link href="/privacy-and-policy"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                  Privacy Policy.
                  </Link>
                </label>
              </div>
            </div>
            <button type="submit"
              class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Create an account
            </button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Already have an account?
              <Link href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
              Sign in here
              </Link>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>