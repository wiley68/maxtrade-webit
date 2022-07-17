<template>
  <div v-if="state.window == 'file'" class="flex flex-col justify-center p-2">
    <div
      class="cursor-pointer hover:border hover:border-blue-100 mb-1"
      :class="
        project.status
          ? 'bg-blue-50 border border-blue-100'
          : 'bg-white border border-white'
      "
      @click.stop="project.status = !project.status"
    >
      {
    </div>
    <div
      class="ml-4 cursor-pointer hover:border hover:border-blue-100 mb-1"
      :class="
        project.name.status
          ? 'bg-blue-50 border border-blue-100'
          : 'bg-white border border-white'
      "
      @click.stop="project.name.status = !project.name.status"
    >
      "name": "{{ project.name.value }}",
    </div>
    <div
      class="ml-4 cursor-pointer hover:border hover:border-blue-100 mb-1"
      :class="
        project.description.status
          ? 'bg-blue-50 border border-blue-100'
          : 'bg-white border border-white'
      "
      @click.stop="project.description.status = !project.description.status"
    >
      "description": "{{ project.description.value }}",
    </div>
    <div>}</div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
const project = inject('project')
</script>
