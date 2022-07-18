<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    <pre>{{ JSON.stringify(project, null, '\t') }}</pre>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
