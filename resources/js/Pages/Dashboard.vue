<template>
  <div
    v-if="state.window == 'file'"
    class="flex flex-col justify-center p-2 space-y-1"
  >
    <div
      class="flex bg-teal-800 hover:bg-teal-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-teal-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-4 bg-cyan-800 hover:bg-cyan-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-cyan-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-8 bg-sky-800 hover:bg-sky-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-sky-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-12 bg-blue-800 hover:bg-blue-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-blue-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-12 bg-indigo-800 hover:bg-indigo-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-indigo-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-16 bg-violet-800 hover:bg-violet-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-violet-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
    <div
      class="flex ml-16 bg-violet-800 hover:bg-violet-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-violet-800 hover:border-orange-500"
    >
      <div class="text-sm text-gray-100 truncate"></div>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')

console.log(project.value)
</script>
