<template>
  <div class="w-full h-full flex items-center mb-0.5">
    <div class="bg-2 w-1/2 h-full flex flex-col">
      <div
        class="h-10 bg-gray-100 border-b border-gray-200 flex items-center font-medium"
      >
        <Link
          :href="route('project.new')"
          method="post"
          as="button"
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
            v-for="pr in projects"
            :key="pr.id"
            @click.stop="changeProject(pr)"
            class="group flex flex-col bg-gray-100 hover:border-sky-300 m-1 rounded border px-1 py-0.5"
            :class="
              project.root.value == getProject(pr).value
                ? 'border-sky-300'
                : 'border-gray-200'
            "
          >
            <div
              class="text-sm font-medium text-gray-600 group-hover:text-sky-600 truncate"
              :class="
                project.root.value == getProject(pr).value
                  ? 'text-sky-600'
                  : 'text-gray-600'
              "
            >
              {{ getProject(pr).value }}
            </div>
            <div
              class="text-xs text-gray-500 group-hover:text-sky-500 truncate"
              :class="
                project.root.value == getProject(pr).value
                  ? 'text-sky-500'
                  : 'text-gray-500'
              "
            >
              {{ getProject(pr).description }}
            </div>
          </button>
        </div>
        <div class="bg-gray-50 flex-grow flex flex-col text-sm pt-1">
          <div v-if="project.root.value.length !== 0" class="flex-grow px-1">
            <div>
              Name:
              <span class="font-medium text-sky-600">{{
                project.root.value
              }}</span>
            </div>
            <div>Description: {{ project.root.description }}</div>
            <div>
              Created At:
              {{ project.data.created_at }}
            </div>
            <div>
              Updated At:
              {{ project.data.updated_at }}
            </div>
            <div>
              Type:
              {{ project.data.type }}
            </div>
            <div
              class="flex justify-center items-center border border-gray-200 mt-2 rounded h-64 shadow-lg bg-white"
            >
              project
            </div>
          </div>
          <div
            v-if="project.root.value.length !== 0"
            class="h-10 w-full border-t border-gray-300 flex items-center p-1"
          >
            <Link
              :href="route('app')"
              as="button"
              class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Edit project
            </Link>
            <button
              type="button"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Clone project
            </button>
            <Link
              :href="route('project.delete')"
              method="post"
              as="button"
              :data="{ id: project.data.id }"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Delete project
            </Link>
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
import { Tree } from '@/Components/project'

const state = inject('state')
const project = inject('project')
const props = defineProps({
  projects: Object,
  projects_others: Object,
})

const getProject = (new_project) => {
  return JSON.parse(new_project.project).root
}

const changeProject = (new_project) => {
  project.value = new Tree('project', '')
  const project_info = getProject(new_project)
  project.value.data.id = new_project.id
  project.value.data.created_at = new_project.created_at
  project.value.data.updated_at = new_project.updated_at
  project.value.data.type = new_project.type
  project.value.root.key = project_info.key
  project.value.root.value = project_info.value
  project.value.root.description = project_info.description
  project.value.root.parent = project_info.parent
  project.value.root.type = project_info.type
  project.value.root.innerText = project_info.innerText
  project.value.root.innerHTML = project_info.innerHTML
  project.value.root.attributes = project_info.attributes
  project.value.root.children = project_info.children
}

onMounted(() => {
  state.value.show_explorer = false
  state.value.show_properties = false
})
</script>
