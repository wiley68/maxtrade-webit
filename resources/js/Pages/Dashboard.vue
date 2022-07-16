<template>
  <pre>{{ JSON.stringify(project, null, '\t') }}</pre>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
