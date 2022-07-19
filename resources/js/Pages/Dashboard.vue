<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    <div
      class="flex bg-teal-800 hover:bg-teal-500 w-64 cursor-pointer px-2 py-1 rounded border-2 border-teal-800 hover:border-orange-500"
      :title="project.root.description"
    >
      <div class="text-sm text-gray-100 truncate">
        {{ project.root.name }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
console.log(project.value)
</script>
