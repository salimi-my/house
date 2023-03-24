<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed, onMounted } from 'vue'
import { initCollapses, initTooltips } from 'flowbite'
import { useDark, useToggle } from '@vueuse/core'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'

onMounted(() => {
  initCollapses()
  initTooltips()
})

const isDark = useDark()
const toggleDark = useToggle(isDark)

const props = defineProps({
  title: String,
  description: String
})

const user = computed(() => usePage().props.user)

const d = new Date();
let year = d.getFullYear();
</script>

<template>
  <Head>
    <title>{{ props.title }}</title>
    <meta name="description" :content="props.description" />
  </Head>
  <main class="relative">
    <header class="sticky top-0 z-10">
      <nav
        class="bg-white px-2 sm:px-4 py-2 md:py-1 w-full dark:bg-gray-800 drop-shadow-md border-b dark:border-gray-700">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
          <Link href="/" class="flex items-center">
          <img src="/assets/images/house-logo.png" class="h-6 mr-3 sm:h-9" alt="House Logo" />
          <span class="self-center text-xl font-bold whitespace-nowrap text-blue-700 dark:text-gray-400">House</span>
          </Link>
          <div class="flex md:order-2">
            <button @click="toggleDark()" id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
              class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
              <svg v-if="!isDark" aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <svg v-else aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                  fill-rule="evenodd" clip-rule="evenodd"></path>
              </svg>
              <span class="sr-only">Switch Mode</span>
            </button>
            <div id="tooltip-toggle" role="tooltip"
              class="absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm tooltip opacity-0 invisible"
              style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1320px, -62px);"
              data-popper-placement="top">
              Switch Mode
              <div class="tooltip-arrow" data-popper-arrow=""
                style="position: absolute; left: 0px; transform: translate(69px, 0px);"></div>
            </div>

            <Menu v-if="user" as="div" class="relative inline-block text-left self-center">
              <div>
                <MenuButton
                  class="flex items-center text-sm font-medium p-1 text-gray-700 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 mr-2 rounded-full object-cover"
                    :src="user?.avatar ? user?.avatar : '/assets/images/avatar.svg'" alt="user photo">
                  <span class="w-0 lg:w-full truncate lg:mr-2">{{ user?.name }}</span>
                  <i class="fa-solid fa-caret-down"></i>
                </MenuButton>
              </div>

              <transition enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0">
                <MenuItems
                  class="absolute right-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
                  <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="font-medium">{{ user?.name }}</div>
                    <div class="truncate">{{ user?.email }}</div>
                  </div>
                  <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                    <Link href="/user-account/profile" :class="[
                      active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
                      'group flex w-full items-center rounded-md px-4 py-2 text-sm',
                    ]">
                    Profile
                    </Link>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                    <button :class="[
                      active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
                      'group flex w-full items-center rounded-md px-4 py-2 text-sm',
                    ]">
                      Settings
                    </button>
                    </MenuItem>
                  </div>
                  <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                    <Link href="/logout" :class="[
                      active ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : 'text-gray-700 dark:text-gray-200',
                      'group flex w-full items-center rounded-md px-4 py-2 text-sm',
                    ]" method="delete" as="button">
                    Sign out
                    </Link>
                    </MenuItem>
                  </div>
                </MenuItems>
              </transition>
            </Menu>

            <Link v-else href="/login"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <span class="mr-2">Sign in</span>
            <i class="fa-solid fa-right-to-bracket"></i>
            </Link>

            <button data-collapse-toggle="navbar-cta" type="button"
              class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 ml-1"
              aria-controls="navbar-cta" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
              class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-900 md:dark:bg-gray-800 dark:border-gray-700">
              <li>
                <Link href="/"
                  class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                  aria-current="page">Home</Link>
              </li>
              <li>
                <a href="#"
                  class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
              </li>
              <li>
                <Link href="/listing"
                  class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Listing</Link>
              </li>
              <li>
                <a href="#"
                  class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
              </li>
              <li>
                <a href="#"
                  class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="flex flex-col justify-center items-center">
      <slot />
    </div>

    <footer class="bg-gray-100 dark:bg-gray-700">
      <div class="mx-auto w-full container py-16 px-4 sm:px-6">
        <div class="md:flex md:justify-between">
          <div class="grid gap-12 lg:grid-cols-6 lg:gap-8 xl:gap-24">
            <div class="col-span-2">
              <a href="#" class="flex mb-5">
                <img src="/assets/images/house-logo.png" class="h-8 mr-3" alt="House Logo">
                <span class="self-center text-xl font-bold whitespace-nowrap text-blue-700 dark:text-white">House</span>
              </a>
              <p class="max-w-lg mb-3 text-gray-600 dark:text-gray-400">
                House is the best place to search, whether you are
                selling, or buying your own home. Find houses for sale with detailed info about each property, including
                maps and photos.
              </p>
            </div>
            <div>
              <h3 class="mb-6 text-sm font-semibold text-gray-400 uppercase dark:text-white">Properties</h3>
              <ul>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    All Listing
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Buy Houses
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Sell Houses
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="mb-6 text-sm font-semibold text-gray-400 uppercase dark:text-white">Help and support</h3>
              <ul>
                <li class="mb-4">
                  <a href="#" rel="noreferrer nofollow"
                    class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    About us
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" rel="noreferrer nofollow"
                    class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Contact us
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="mb-6 text-sm font-semibold text-gray-400 uppercase dark:text-white">Follow us</h3>
              <ul>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Github
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" rel="noreferrer nofollow"
                    class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Twitter
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" rel="noreferrer nofollow"
                    class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Facebook
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="mb-6 text-sm font-semibold text-gray-400 uppercase dark:text-white">Legal</h3>
              <ul>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Privacy Policy
                  </a>
                </li>
                <li class="mb-4">
                  <a href="#" class="font-normal text-gray-600 dark:text-gray-400 dark:hover:text-white hover:underline">
                    Terms &amp; Conditions
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-600 lg:my-8" />
        <div class="flex flex-col items-center justify-center">
          <p class="font-normal text-gray-600 dark:text-gray-400">
            House © {{ year }}. Created by <a href="https://www.salimi.my" target="_blank"
              class="hover:underline">Salimi</a>.
            All Rights Reserved
          </p>
          <div class="flex mt-4 gap-4 sm:justify-center">
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <i class="fa-brands fa-facebook fa-lg"></i>
              <span class="sr-only">Facebook page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <i class="fa-brands fa-instagram fa-lg"></i>
              <span class="sr-only">Instagram page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <i class="fa-brands fa-twitter fa-lg"></i>
              <span class="sr-only">Twitter page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <i class="fa-brands fa-github fa-lg"></i>
              <span class="sr-only">GitHub account</span>
            </a>
          </div>
        </div>
      </div>
    </footer>

  </main>
</template>