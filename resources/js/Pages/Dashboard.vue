<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    <div class="flex justify-between w-full">
      <div class="w-8 border-r border-gray-100 mr-1 text-cyan-500">1</div>
      <div class="flex-grow">{</div>
    </div>
    <div>
      {{ result() }}
    </div>
    <div class="flex justify-between w-full">
      <div class="w-8 border-r border-gray-100 mr-1 text-cyan-500">2</div>
      <div class="flex-grow">}</div>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')

const project_arr = (projecttemp) => {
  let result = []
  for (const [key, value] of Object.entries(projecttemp)) {
    result[key] = value
  }
  console.log(result)
  return result
}

const result = () => {
  console.log(project_arr(project))
}
</script>
