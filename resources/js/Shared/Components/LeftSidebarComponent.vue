<template>
  <div
    v-if="state.pallete == 'head'"
    class="flex flex-col items-center flex-grow border-r border-r-gray-200 pt-2 px-1 space-y-1"
  >
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M12.87,15.07L10.33,12.56L10.36,12.53C12.1,10.59 13.34,8.36 14.07,6H17V4H10V2H8V4H1V6H12.17C11.5,7.92 10.44,9.75 9,11.35C8.07,10.32 7.3,9.19 6.69,8H4.69C5.42,9.63 6.42,11.17 7.67,12.56L2.58,17.58L4,19L9,14L12.11,17.11L12.87,15.07M18.5,10H16.5L12,22H14L15.12,19H19.87L21,22H23L18.5,10M15.88,17L17.5,12.67L19.12,17H15.88Z"
        />
      </svg>
      <div>lang</div>
    </button>
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M3 7A2 2 0 0 0 1 9V17H3V13H5V17H7V9A2 2 0 0 0 5 7H3M3 9H5V11H3M15 10.5V9A2 2 0 0 0 13 7H9V17H13A2 2 0 0 0 15 15V13.5A1.54 1.54 0 0 0 13.5 12A1.54 1.54 0 0 0 15 10.5M13 15H11V13H13V15M13 11H11V9H13M19 7A2 2 0 0 0 17 9V15A2 2 0 0 0 19 17H21A2 2 0 0 0 23 15V14H21V15H19V9H21V10H23V9A2 2 0 0 0 21 7Z"
        />
      </svg>
      <div>charset</div>
    </button>
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M17,22V20H20V17H22V20.5C22,20.89 21.84,21.24 21.54,21.54C21.24,21.84 20.89,22 20.5,22H17M7,22H3.5C3.11,22 2.76,21.84 2.46,21.54C2.16,21.24 2,20.89 2,20.5V17H4V20H7V22M17,2H20.5C20.89,2 21.24,2.16 21.54,2.46C21.84,2.76 22,3.11 22,3.5V7H20V4H17V2M7,2V4H4V7H2V3.5C2,3.11 2.16,2.76 2.46,2.46C2.76,2.16 3.11,2 3.5,2H7M13,17.25L17,14.95V10.36L13,12.66V17.25M12,10.92L16,8.63L12,6.28L8,8.63L12,10.92M7,14.95L11,17.25V12.66L7,10.36V14.95M18.23,7.59C18.73,7.91 19,8.34 19,8.91V15.23C19,15.8 18.73,16.23 18.23,16.55L12.75,19.73C12.25,20.05 11.75,20.05 11.25,19.73L5.77,16.55C5.27,16.23 5,15.8 5,15.23V8.91C5,8.34 5.27,7.91 5.77,7.59L11.25,4.41C11.5,4.28 11.75,4.22 12,4.22C12.25,4.22 12.5,4.28 12.75,4.41L18.23,7.59Z"
        />
      </svg>
      <div>viewport</div>
    </button>
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M20,4A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4H20M20,18V6H4V18H20M6,10H8V12H6V10M6,14H14V16H6V14M16,14H18V16H16V14M10,10H18V12H10V10Z"
        />
      </svg>
      <div>title</div>
    </button>
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M22 13H14V11H22V13M22 7H14V9H22V7M14 17H22V15H14V17M12 9V15C12 16.1 11.1 17 10 17H4C2.9 17 2 16.1 2 15V9C2 7.9 2.9 7 4 7H10C11.1 7 12 7.9 12 9M10.5 15L8.3 12L6.5 14.3L5.3 12.8L3.5 15H10.5Z"
        />
      </svg>
      <div>description</div>
    </button>
    <button
      type="button"
      class="w-full inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      <svg class="w-4 h-4 text-gray-700 mr-1" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M17.8 19C17.4 17.8 16.3 17 15 17C13.3 17 12 18.3 12 20S13.3 23 15 23C16.3 23 17.4 22.2 17.8 21H19V23H21V21H23V19H17.8M15 21.3C14.3 21.3 13.7 20.7 13.7 20S14.3 18.7 15 18.7 16.3 19.3 16.3 20 15.7 21.3 15 21.3M9 10H14V12H9V10M9 6H14V8H9V6M7 5C7 4.4 7.4 4 8 4H16V15.1C16.7 15.3 17.4 15.6 18 16V5C18 4.4 18.4 4 19 4S20 4.4 20 5V6H22V5C22 3.3 20.7 2 19 2H8C6.3 2 5 3.3 5 5V16H7V5M10 20C10 19.3 10.1 18.6 10.4 18H2V19C2 20.7 3.3 22 5 22H10.4C10.1 21.4 10 20.7 10 20M9 16H12C12.6 15.6 13.3 15.2 14 15.1V14H9V16Z"
        />
      </svg>
      <div>keywords</div>
    </button>
  </div>
  <div
    v-if="state.pallete == 'layouts'"
    class="flex flex-col items-center flex-grow border-r border-r-gray-200 pt-2 px-1 space-y-1"
  ></div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
</script>
