<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    <div class="flex justify-between w-full">
      <div class="w-8 border-r border-gray-100 mr-1 text-cyan-500">1</div>
      <div class="flex-grow">{</div>
    </div>
    <div
      v-for="([key, value], index) in Object.entries(project)"
      :key="key"
      class="flex justify-between w-full"
    >
      <div class="w-8 border-r border-gray-100 mr-1 text-cyan-500">
        {{ index + 2 }}
      </div>
      <div class="flex-grow pl-4">
        "{{ key }}": {{ typeof value === 'object' ? '' : '"' }}{{ value
        }}{{ typeof value === 'object' ? '' : '"' }},
      </div>
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
</script>
