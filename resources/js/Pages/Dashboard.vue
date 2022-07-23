<template>
  <div class="w-full h-full">
    <pre>{{ JSON.stringify(project, null, 2) }}</pre>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
