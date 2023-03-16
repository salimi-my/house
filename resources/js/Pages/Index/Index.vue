<script setup>
import Buy from './SVG/Buy.vue';
import Sell from './SVG/Sell.vue';
import Rent from './SVG/Rent.vue';

</script>

<template>
  <section class="w-full bg-[url('/assets/images/house-banner.jpg')] bg-center bg-cover flex justify-center">
    <div class="container h-[35rem] flex justify-center items-center">
      <form class="w-96 md:w-[40rem]">
        <h1 class="text-4xl text-white font-bold text-center mb-4 drop-shadow-lg">Find your next house</h1>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative drop-shadow-lg">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          <input type="search" id="default-search"
            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search for Houses..." required>
          <button type="submit"
            class="text-white absolute right-2.5 bottom-[9.5px] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
    </div>
  </section>


  <section
    class="max-w-5xl p-4 py-10 bg-white border border-gray-200 rounded-lg shadow lg:py-14 sm:px-24 dark:bg-gray-800 dark:border-gray-700 mx-4 xl:mx-auto -mt-12">
    <div class="grid lg:grid-cols-5 lg:gap-10">
      <div class="lg:col-span-2 relative">
        <h2 class="mb-2 text-3xl font-medium text-gray-700 dark:text-white text-center lg:text-left">Take the first step
        </h2>
        <p class="text-lg text-gray-700 dark:text-white mb-8 text-center lg:text-left">
          Search for house or list your house on our platform.
        </p>
        <img src="/assets/images/home.svg" class="absolute w-full top-64 lg:top-24 inset-x-0 h-32" />
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
          <button type="button"
            class="text-blue-700 bg-white hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
            Let's Go!
          </button>
        </div>
        <img src="/assets/images/malaysia-map.svg" class="w-40" />
      </div>
      <div class="grid grid-cols-2 mt-4 gap-4">
        <div class="bg-gray-400 dark:bg-gray-800 rounded-lg p-7">
          <h3 class="text-white text-lg md:text-3xl font-medium">We have property guides to help you</h3>
          <button type="button"
            class="text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read Them
          </button>
        </div>
        <div class="bg-blue-200 dark:bg-blue-300 rounded-lg p-7">
          <h3 class="text-gray-700 text-lg md:text-3xl font-medium">View the latest home pricing trends</h3>
          <button type="button"
            class="text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Check it Out
          </button>
        </div>
      </div>
    </div>
    <div class="w-full relative">
      <h3 class="text-gray-800 text-3xl font-semibold mb-4 dark:text-white">Begin your home journey</h3>
      <img src="/assets/images/home-couch.jpg"
        class="h-3/4 md:h-3/5 lg:h-auto xl:h-[68.5%] w-full rounded-lg brightness-50 object-cover" />
      <div class="absolute top-20 md:top-32 lg:top-20 left-10">
        <h3 class="text-white text-3xl md:text-4xl font-semibold">Let us guide you to<br />your new home</h3>
        <button type="button"
          class="text-white mt-4 md:mt-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Get Started
        </button>
      </div>
      <div class="absolute top-72 md:top-96 lg:top-[26rem] xl:top-[22rem] left-10">
        <a href="https://flowbite.com/" class="flex items-center">
          <img src="/assets/images/house-logo.png" class="h-16 md:h-20 mr-3" alt="House Logo" />
          <div>
            <h3 class="self-center text-2xl md:text-3xl font-bold whitespace-nowrap text-white">House</h3>
            <h3 class="text-white text-md md:text-xl font-medium">We'll see you home</h3>
          </div>
        </a>
      </div>
    </div>
  </section>
</template>