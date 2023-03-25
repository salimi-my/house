<script setup>
import { Link } from '@inertiajs/vue3'

</script>

<template>
  <section class="w-full">
    <div class="max-w-6xl mx-4 xl:mx-auto mt-20">
      <div class="grid md:grid-cols-8 items-center mb-2">
        <h3 class="md:col-span-7 mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
          Explore Residential Areas in Malaysia
        </h3>
        <Link href="/listing"
          class="md:col-span-1 text-blue-700 hover:opacity-80 flex md:justify-end items-center gap-1 font-medium">
        More
        <i class="fa-solid fa-chevron-right"></i>
        </Link>
      </div>
      <div class="bg-gray-100 dark:bg-gray-700 rounded-lg grid grid-cols-4 py-5 px-6">
        <div class="flex flex-col">
          <Link href="/listing?search=Kuala%20Lumpur" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Kuala Lumpur
          </Link>
          <Link href="/listing?search=Kedah" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Kedah
          </Link>
          <Link href="/listing?search=Pahang" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Pahang
          </Link>
          <Link href="/listing?search=Sabah" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Sabah
          </Link>
        </div>
        <div class="flex flex-col">
          <Link href="/listing?search=Selangor" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Selangor
          </Link>
          <Link href="/listing?search=Kelantan" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Kelantan
          </Link>
          <Link href="/listing?search=Perak" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Perak
          </Link>
          <Link href="/listing?search=Sarawak" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Sarawak
          </Link>
        </div>
        <div class="flex flex-col">
          <Link href="/listing?search=Penang" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Penang
          </Link>
          <Link href="/listing?search=Melaka" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Melaka
          </Link>
          <Link href="/listing?search=Perlis" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Perlis
          </Link>
          <Link href="/listing?search=Terengganu" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Terengganu
          </Link>
        </div>
        <div class="flex flex-col">
          <Link href="/listing?search=Johor" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Johor
          </Link>
          <Link href="/listing?search=Negeri%20Sembilan" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Negeri Sembilan
          </Link>
          <Link href="/listing?search=Putrajaya" class="font-semibold leading-8 hover:opacity-80 dark:text-white">
          Putrajaya
          </Link>
        </div>
      </div>
    </div>
  </section>
</template>