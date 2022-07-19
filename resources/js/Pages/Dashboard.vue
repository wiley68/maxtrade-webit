<template>
  <div
    v-if="state.window == 'file'"
    class="flex flex-col justify-center p-2"
  ></div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')

const result = Object.values(project.value).map(Object.values)
console.log(project.value)
console.log(result)
</script>
