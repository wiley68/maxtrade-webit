<template>
  <div class="w-full h-full flex items-center mb-0.5">
    <div class="bg-2 w-1/2 h-full flex flex-col">
      <div
        class="h-10 bg-gray-100 border-b border-gray-200 flex items-center font-medium"
      >
        <Link
          href="/project/new"
          method="post"
          as="button"
          type="button"
          class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-sky-50 hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
        >
          New project
        </Link>
        <div class="flex items-center flex-grow justify-center">
          <div>Own projects</div>
          <svg class="w-4 h-4 text-gray-400 mx-1" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"
            />
          </svg>
          <div class="font-normal">{{ projects.length }}</div>
        </div>
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
        <div class="bg-gray-50 flex-grow flex flex-col text-sm pt-1">
          <div
            v-if="Object.keys(currentProject).length !== 0"
            class="flex-grow px-1"
          >
            <div>
              Name:
              <span class="font-medium text-sky-600">{{
                currentProject.value
              }}</span>
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
          <div
            v-if="Object.keys(currentProject).length !== 0"
            class="h-10 w-full border-t border-gray-300 flex items-center p-1"
          >
            <button
              type="button"
              class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Edit project
            </button>
            <button
              type="button"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Clone project
            </button>
            <button
              type="button"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Delete project
            </button>
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
import { inject, onMounted, ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

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
