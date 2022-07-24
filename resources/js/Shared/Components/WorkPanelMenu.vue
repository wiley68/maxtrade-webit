<template>
  <div class="bg-1 h-8 flex text-sm font-medium text-gray-500">
    <button
      class="px-2 hover:bg-white h-full flex items-center cursor-pointer border-r border-r-gray-200"
      :class="state.work_panel == 'PROJECT' ? 'bg-white' : 'bg-1'"
      @click.stop="state.work_panel = 'PROJECT'"
    >
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M3,3H9V7H3V3M15,10H21V14H15V10M15,17H21V21H15V17M13,13H7V18H13V20H7L5,20V9H7V11H13V13Z"
        />
      </svg>
      <span class="ml-1 select-none">PROJECT</span>
    </button>
    <div
      class="px-2 hover:bg-white h-full flex items-center cursor-pointer border-r border-r-gray-200"
      :class="state.work_panel == 'CONSTRUCTOR' ? 'bg-white' : 'bg-1'"
      @click.stop="state.work_panel = 'CONSTRUCTOR'"
    >
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M3 21H11V13H3M5 15H9V19H5M3 11H11V3H3M5 5H9V9H5M13 3V11H21V3M19 9H15V5H19M18 16H21V18H18V21H16V18H13V16H16V13H18Z"
        />
      </svg>
      <span class="ml-1 select-none">CONSTRUCTOR</span>
    </div>
    <div
      class="px-2 hover:bg-white h-full flex items-center cursor-pointer border-r border-r-gray-200"
      :class="state.work_panel == 'CODE' ? 'bg-white' : 'bg-1'"
      @click.stop="state.work_panel = 'CODE'"
    >
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z"
        />
      </svg>
      <span class="ml-1 select-none">CODE</span>
    </div>
    <div
      class="px-2 hover:bg-white h-full flex items-center cursor-pointer border-r border-r-gray-200"
      :class="state.work_panel == 'PREVIEW' ? 'bg-white' : 'bg-1'"
      @click.stop="state.work_panel = 'PREVIEW'"
    >
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z"
        />
      </svg>
      <span class="ml-1 select-none">PREVIEW</span>
    </div>
    <div
      class="px-2 hover:bg-white h-full flex items-center cursor-pointer border-r border-r-gray-200"
      :class="state.work_panel == 'HELP' ? 'bg-white' : 'bg-1'"
      @click.stop="state.work_panel = 'HELP'"
    >
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M11,18H13V16H11V18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,6A4,4 0 0,0 8,10H10A2,2 0 0,1 12,8A2,2 0 0,1 14,10C14,12 11,11.75 11,15H13C13,12.75 16,12.5 16,10A4,4 0 0,0 12,6Z"
        />
      </svg>
      <span class="ml-1 select-none">HELP</span>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
</script>
