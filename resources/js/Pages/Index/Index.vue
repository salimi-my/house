<script setup>
import Buy from '../../Components/SVG/Buy.vue'
import Sell from '../../Components/SVG/Sell.vue'
import Rent from '../../Components/SVG/Rent.vue'
import Searchbar from '../../Components/Searchbar.vue'
import FooterSearchbar from '../../Components/FooterSearchbar.vue'
import State from '../../Components/State.vue'
import { Link } from '@inertiajs/vue3'

</script>

<template>
  <section class="w-full bg-[url('/storage/images/house-banner.jpg')] bg-center bg-cover flex justify-center">
    <div class="container h-[35rem] flex justify-center items-center">
      <div class="w-96 md:w-[50rem]">
        <h1 class="text-4xl text-white font-bold text-center mb-2 drop-shadow-lg">Find your next house</h1>
        <h2 class="text-lg text-white font-medium text-center mb-5 drop-shadow-lg">Start your journey to owning your own
          house with us.</h2>
        <Searchbar />
      </div>
    </div>
  </section>

  <section
    class=" max-w-5xl p-4 py-10 bg-white border border-gray-200 rounded-lg shadow lg:py-14 sm:px-24 dark:bg-gray-800 dark:border-gray-700 mx-4 xl:mx-auto -mt-12">
    <div class="grid lg:grid-cols-5 lg:gap-10">
      <div class="lg:col-span-2 relative">
        <h2 class="mb-2 text-3xl font-medium text-gray-700 dark:text-white text-center lg:text-left">Take the first
          step
        </h2>
        <p class="text-lg text-gray-700 dark:text-white mb-8 text-center lg:text-left">
          Search for house or list your house on our platform.
        </p>
        <img src="../../Assets/Images/home.svg" class="absolute w-full top-64 lg:top-24 inset-x-0 h-32" />
      </div>
      <div class="lg:col-span-3 grid grid-cols-3 gap-3 md:gap-10 lg:gap-5 dark:text-white mb-36 md:mb-44 lg:mb-0">
        <div
          class="flex flex-col justify-center items-center border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:shadow-lg hover:bg-blue-100 hover:text-gray-800 p-4 lg:pb-5 lg:pt-8">
          <Buy :class="'scale-100 md:scale-150'" />
          <h3 class="text-2xl font-semibold mt-0 lg:mt-3">Buy</h3>
        </div>
        <div
          class="flex flex-col justify-center items-center border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:shadow-lg hover:bg-blue-100 hover:text-gray-800 p-4 lg:pb-5 lg:pt-8">
          <Sell :class="'scale-100 md:scale-150'" />
          <h3 class="text-2xl font-semibold mt-0 lg:mt-3">Sell</h3>
        </div>
        <div
          class="flex flex-col justify-center items-center border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:shadow-lg hover:bg-blue-100 hover:text-gray-800 p-4 lg:pb-5 lg:pt-8">
          <Rent :class="'scale-100 md:scale-150'" />
          <h3 class="text-2xl font-semibold mt-0 lg:mt-3">Rent</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="max-w-6xl grid lg:grid-cols-2 gap-4 mx-4 xl:mx-auto mt-20">
    <div>
      <h3 class="text-gray-800 text-3xl font-semibold mb-4 dark:text-white">We'll see you home</h3>
      <div class="flex items-center bg-blue-700 dark:bg-blue-800 p-8 rounded-lg">
        <div>
          <h3 class="text-2xl font-semibold text-white mb-5">We have houses listing on all states in Malaysia!</h3>
          <Link href="/listing" as="button"
            class="text-blue-700 bg-white hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
          Let's Go!
          </Link>
        </div>
        <img src="../../Assets/Images/malaysia-map.svg" class="w-40" />
      </div>
      <div class="grid grid-cols-2 mt-4 gap-4">
        <div class="bg-gray-400 dark:bg-gray-800 rounded-lg p-7">
          <h3 class="text-white text-lg md:text-3xl font-medium">We have property guides to help you</h3>
          <Link href="/listing" as="button"
            class="text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Read Them
          </Link>
        </div>
        <div class="bg-blue-200 dark:bg-blue-300 rounded-lg p-7">
          <h3 class="text-gray-700 text-lg md:text-3xl font-medium">View the latest home pricing trends</h3>
          <Link href="/listing" as="button"
            class="text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Check it Out
          </Link>
        </div>
      </div>
    </div>
    <div class="w-full relative">
      <h3 class="text-gray-800 text-3xl font-semibold mb-4 dark:text-white">Begin your home journey</h3>
      <img src="../../Assets/Images/home-couch.jpg"
        class="h-3/4 md:h-3/5 lg:h-auto xl:h-[68.5%] w-full rounded-lg brightness-50 object-cover" />
      <div class="absolute top-20 md:top-32 lg:top-20 left-10">
        <h3 class="text-white text-3xl md:text-4xl font-semibold">Let us guide you to<br />your new home</h3>
        <Link href="/listing" as="button"
          class="text-white mt-4 md:mt-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Get Started
        </Link>
      </div>
      <div class="absolute top-72 md:top-96 lg:top-[26rem] xl:top-[22rem] left-10">
        <Link href="/listing" class="flex items-center">
        <img src="../../Assets/Images/house-logo.png" class="h-16 md:h-20 mr-3" alt="House Logo" />
        <div>
          <h3 class="self-center text-2xl md:text-3xl font-bold whitespace-nowrap text-white">House</h3>
          <h3 class="text-white text-md md:text-xl font-medium">We'll see you home</h3>
        </div>
        </Link>
      </div>
    </div>
  </section>

  <section class="w-full bg-gray-100 dark:bg-gray-700 -mt-16 md:-mt-40 lg:mt-20 xl:-mt-16">
    <div class="max-w-6xl grid lg:grid-cols-3 gap-4 mx-4 xl:mx-auto py-16">
      <div
        class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 py-10 hover:scale-105 transition ease-in-out duration-200">
        <Link href="/listing">
        <img class="rounded-t-lg" src="../../Assets/Images/buy-home.png" alt="" />
        </Link>
        <div class="p-5 px-8">
          <Link href="/listing">
          <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Buy a home
          </h3>
          </Link>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Find your place with an immersive photo experience and the most listings, including things you won't find
            anywhere else.
          </p>
          <Link href="/listing" as="button"
            class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
          Browse home
          <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
          </Link>
        </div>
      </div>
      <div
        class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 py-10 hover:scale-105 transition ease-in-out duration-200">
        <Link href="/listing">
        <img class="rounded-t-lg" src="../../Assets/Images/sell-home.png" alt="" />
        </Link>
        <div class="p-5 px-8">
          <Link href="/listing">
          <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Sell a home
          </h3>
          </Link>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            No matter what path you take to sell your home, we can help you navigate a successful sale.
          </p>
          <Link href="/register" as="button"
            class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
          Create account
          <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
          </Link>
        </div>
      </div>
      <div
        class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 py-10 hover:scale-105 transition ease-in-out duration-200">
        <Link href="/listing">
        <img class="rounded-t-lg" src="../../Assets/Images/rent-home.png" alt="" />
        </Link>
        <div class="p-5 px-8">
          <Link href="/listing">
          <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Rent a home
          </h3>
          </Link>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            We're creating a seamless online experience - from shopping on the largest rental network, to applying, to
            paying rent.
          </p>
          <Link href="/listing" as="button"
            class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
          Find rentals
          <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
          </Link>
        </div>
      </div>
    </div>
  </section>

  <section class="max-w-6xl grid lg:grid-cols-2 gap-4 mx-4 xl:mx-auto mt-20">
    <img src="../../Assets/Images/for-sale.png" class="w-full object-cover" />
    <div class="flex flex-col self-center p-8 items-center lg:items-start">
      <h3 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
        See neighborhoods
      </h3>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center lg:text-left">
        With more neighborhood insights than any other real estate website, we've captured the color and diversity of
        communities.
      </p>
      <div>
        <Link href="/listing" as="button"
          class="text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Check it Out
        </Link>
      </div>
    </div>
  </section>

  <State />

  <FooterSearchbar />
</template>