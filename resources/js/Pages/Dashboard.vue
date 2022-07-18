<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    {{ projects }}
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
const projects = [...project.value.preOrderTraversal()].map((x) => {
  const xkey = x.key
  const xvalue = x.value
  const result = { '${xkey}': xvalue }
  return result
})
</script>
