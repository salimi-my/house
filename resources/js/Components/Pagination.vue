<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  links: Array
})
</script>

<template>
  <nav aria-label="Page navigation">
    <ul class="inline-flex -space-x-px">
      <li v-for="(link, index) in links" :key="index">
        <Link :href="link.url === null ? '' : link.url" :class="[link.url === null ? 'opacity-60 cursor-not-allowed' : '',
        index === 0 ? 'rounded-l-lg' : '', links.length - 1 === index ? 'rounded-r-lg' : '',
        link.active ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white' :
          'text-gray-500 bg-white hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white hover:bg-gray-100',
          'px-3 py-2 leading-tight border border-gray-300 dark:border-gray-700',
        ]">
        <span v-if="index === 0">
          <i class="fa-solid fa-chevron-left fa-xs"></i>&nbsp;Previous
        </span>
        <span v-else-if="links.length - 1 === index">
          &nbsp;Next&nbsp;<i class="fa-solid fa-chevron-right fa-xs"></i>&nbsp;
        </span>
        <span v-else>
          {{ link.label }}
        </span>
        </Link>
      </li>
    </ul>
  </nav>
</template>