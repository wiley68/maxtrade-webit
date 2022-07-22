<template>
  <div class="w-full h-full flex justify-center items-center">
    <div class="w-full mx-48 h-64 flex justify-center items-center bg-white">
      element
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')

console.log(project.value)
</script>
