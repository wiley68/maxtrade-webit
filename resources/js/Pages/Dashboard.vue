<template>
  <div class="w-full h-full text-sm">
    <div v-if="state.work_panel == 'PROJECT'">
      <pre>{{ JSON.stringify(project, null, 2) }}</pre>
    </div>
    <div v-if="state.work_panel == 'CONSTRUCTOR'">CONSTRUCTOR</div>
    <div v-if="state.work_panel == 'CODE'">CODE</div>
    <div v-if="state.work_panel == 'PREVIEW'">PREVIEW</div>
    <div v-if="state.work_panel == 'HELP'">HELP</div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
