<script setup>
defineProps({
  class: String
})
</script>

<template>
  <svg viewBox="0 0 44 44" aria-hidden="true" focusable="false" role="img" status="info" :class="class"
    style="display: inline-block;vertical-align: top;height: 44px;width: 44px;">
    <title>Rent or Buy</title>
    <g>
      <path style="fill: rgb(166, 229, 255);"
        d="M40.1,18.506l-12.744-12a2.529,2.529,0,0,0-3.032,0l-12.743,12a2.526,2.526,0,0,0-.9,1.932V39.474A2.526,2.526,0,0,0,13.211,42H38.474A2.526,2.526,0,0,0,41,39.474V20.438A2.528,2.528,0,0,0,40.1,18.506Z">
      </path>
      <path style="fill: rgb(13, 69, 153);"
        d="M28.429,2H7.857A2.579,2.579,0,0,0,5.286,4.571V35.429A2.579,2.579,0,0,0,7.857,38H28.429A2.579,2.579,0,0,0,31,35.429V4.571A2.579,2.579,0,0,0,28.429,2ZM16.857,35.429V29h2.572v6.429Zm11.572,0H22V27.071a.642.642,0,0,0-.643-.642H14.929a.642.642,0,0,0-.643.642v8.358H7.857V4.571H28.429Z">
      </path>
      <rect style="fill: rgb(13, 69, 153);" x="11.714" y="16.143" width="5.143" height="5.143" rx="0.5">
      </rect>
      <rect style="fill: rgb(13, 69, 153);" x="19.429" y="16.143" width="5.143" height="5.143" rx="0.5">
      </rect>
      <rect style="fill: rgb(13, 69, 153);" x="11.714" y="8.429" width="5.143" height="5.143" rx="0.5"></rect>
      <rect style="fill: rgb(13, 69, 153);" x="19.429" y="8.429" width="5.143" height="5.143" rx="0.5"></rect>
      <rect style="fill: rgb(192, 192, 192);" x="16.857" y="29" width="2.571" height="6.429"></rect>
    </g>
  </svg>
</template>