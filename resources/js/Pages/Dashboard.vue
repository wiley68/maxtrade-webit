<template>
  <div v-if="state.window == 'file'">
    <pre>{{ JSON.stringify(project, null, '\t') }}</pre>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
