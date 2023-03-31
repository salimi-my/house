<script setup>
const d = new Date();
let year = d.getFullYear();
</script>

<template>
  <footer class="bg-gray-100 dark:bg-gray-700">
    <div class="mx-auto w-full container py-16 px-4 sm:px-6">
      <div class="md:flex md:justify-between">
        <div class="grid gap-12 lg:grid-cols-6 lg:gap-8 xl:gap-24">
          <div class="col-span-2">
            <a href="#" class="flex mb-5">
              <img src="../Assets/Images/house-logo.png" class="h-8 mr-3" alt="House Logo">
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
</template>