<template>
  <div class="w-full h-full">slot</div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')

console.log(project.value)
</script>
