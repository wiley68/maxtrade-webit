<template>
  <div class="w-full h-full flex items-center mb-0.5">
    <div class="bg-2 w-1/2 h-full flex">
      <div
        class="bg-white w-64 flex-none flex flex-col border-r border-r-gray-100"
      >
        <button
          v-for="project in projects"
          :key="project.id"
          @click.stop="currentProject = getProject(project)"
          class="group flex flex-col bg-gray-100 m-1 rounded border px-1"
          :class="
            currentProject.key == getProject(project).key
              ? 'border-sky-300'
              : 'border-gray-200'
          "
        >
          <div
            class="text-sm font-medium text-gray-600 group-hover:text-sky-600 truncate"
          >
            {{ getProject(project).value }}
          </div>
          <div class="text-xs text-gray-500 group-hover:text-sky-500 truncate">
            {{ getProject(project).description }}
          </div>
        </button>
      </div>
      <div class="bg-white flex-grow flex flex-col px-1 text-sm">
        <div v-if="Object.keys(currentProject).length !== 0">
          <div>
            Name: <span class="font-medium">{{ currentProject.value }}</span>
          </div>
          <div>
            Description:
            <span class="font-medium">{{ currentProject.description }}</span>
          </div>
          <div class="">Created At:</div>
          <div class="">Updated At:</div>
          <div class="">
            Type: <span class="font-medium">{{ currentProject.type }}</span>
          </div>
          <div class="">attributes: {{ currentProject.attributes }}</div>
          <div class="">children: {{ currentProject.children }}</div>
        </div>
      </div>
    </div>
    <div class="h-full w-1 bg-2"></div>
    <div class="bg-2 w-1/2 h-full flex">
      <div class="bg-white w-64"></div>
      <div class="bg-white flex-grow"></div>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted, defineProps, ref } from 'vue'

const state = inject('state')
const props = defineProps({
  projects: Object,
})
const currentProject = ref({})

const getProject = (project) => {
  return JSON.parse(project.project).root
}

onMounted(() => {
  state.value.show_explorer = false
  state.value.show_properties = false
})
</script>
