<template>
  <div class="w-full h-full flex items-center mb-0.5">
    <div class="bg-2 w-1/2 h-full flex flex-col">
      <div
        class="h-8 bg-gray-100 border-b border-gray-200 flex justify-center items-center text-sm font-medium"
      >
        Own projects - <span class="font-normal">{{ projects.length }}</span>
      </div>
      <div class="h-full flex flex-grow">
        <div
          class="bg-gray-50 w-64 flex-none flex flex-col border-r border-r-gray-200 pt-1"
        >
          <button
            v-for="project in projects"
            :key="project.id"
            @click.stop="currentProject = getProject(project)"
            class="group flex flex-col bg-gray-100 hover:border-sky-300 m-1 rounded border px-1 py-0.5"
            :class="
              currentProject.key == getProject(project).key
                ? 'border-sky-300'
                : 'border-gray-200'
            "
          >
            <div
              class="text-sm font-medium text-gray-600 group-hover:text-sky-600 truncate"
              :class="
                currentProject.key == getProject(project).key
                  ? 'text-sky-600'
                  : 'text-gray-600'
              "
            >
              {{ getProject(project).value }}
            </div>
            <div
              class="text-xs text-gray-500 group-hover:text-sky-500 truncate"
              :class="
                currentProject.key == getProject(project).key
                  ? 'text-sky-500'
                  : 'text-gray-500'
              "
            >
              {{ getProject(project).description }}
            </div>
          </button>
        </div>
        <div class="bg-gray-50 flex-grow flex flex-col px-1 text-sm pt-1">
          <div v-if="Object.keys(currentProject).length !== 0">
            <div>
              Name: <span class="font-medium">{{ currentProject.value }}</span>
            </div>
            <div>
              Description:
              <span class="font-medium">{{ currentProject.description }}</span>
            </div>
            <div>Created At:</div>
            <div>Updated At:</div>
            <div>Type:</div>
            <div
              class="flex justify-center items-center border border-gray-200 mt-2 rounded h-64 shadow-lg bg-white"
            >
              project
            </div>
          </div>
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
  projects_others: Object,
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
