<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { initDismisses } from 'flowbite'

onMounted(() => {
  initDismisses()
})

const form = useForm({
  email: null,
  password: null,
  remember: false
})

const login = () => {
  form.clearErrors()
  form.post('/login')
}
</script>

<template>
  <section class="w-full bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-32 py-36 mx-auto min-height-screen">
      <Link href="/" class="flex items-center mb-6 text-2xl font-bold text-blue-700 dark:text-white">
      <img class="w-8 h-8 mr-2" src="../../Assets/Images/house-logo.png" alt="House Logo">
      House
      </Link>
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Sign in to your account
          </h1>
          <form @submit.prevent="login" class="space-y-4 md:space-y-6">
            <div id="login-error"
              class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 items-center"
              :class="{ hidden: !form.errors.auth }" role="alert">
              <i class="fa-solid fa-circle-exclamation"></i>
              <span class="sr-only">Info</span>
              <div class="ml-3 text-sm font-medium">
                {{ form.errors.auth }}
              </div>
              <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex justify-center items-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#login-error" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
              <input v-model="form.email" type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@domain.com" />
              <p v-if="form.errors.email" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-5">
                {{ form.errors.email }}
              </p>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
              <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              <p v-if="form.errors.password" class="mt-0 text-sm text-red-600 dark:text-red-500 -mb-5">
                {{ form.errors.password }}
              </p>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input v-model="form.remember" id="remember" name="remember" aria-describedby="remember" type="checkbox"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800 cursor-pointer" />
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
              </div>
              <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                Forgot password?
              </a>
            </div>
            <button type="submit"
              class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Sign in
            </button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Don't have an account yet?
              <Link href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
              Sign up
              </Link>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>