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
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z"
            /></svg
          ><span class="ml-1">New project</span>
        </Link>
        <div class="flex items-center flex-grow justify-center">
          <div>{{ $page.props.auth.user.name }}</div>
          <div class="text-sm font-normal ml-1 text-gray-500">projects:</div>
          <div class="text-sm font-normal text-gray-500 ml-1">
            {{ projects.length }}
          </div>
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
            class="group flex flex-col bg-gray-100 hover:border-sky-300 mx-1 mb-1 rounded border px-1 py-0.5"
            :class="
              project.root.value == getProject(pr).value
                ? 'border-sky-300'
                : 'border-gray-200'
            "
          >
            <div
              class="text-sm font-medium text-gray-600 group-hover:text-sky-600 w-full text-left truncate"
              :class="
                project.root.value == getProject(pr).value
                  ? 'text-sky-600'
                  : 'text-gray-600'
              "
            >
              {{ getProject(pr).value }}
            </div>
            <div
              class="text-xs text-gray-500 group-hover:text-sky-500 w-full text-left truncate"
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
            <div
              class="flex items-start w-full space-x-1 text-base border-b border-dotted border-gray-300 mb-1.5"
            >
              <div class="font-medium w-20 flex-none">Name:</div>
              <div class="flex-grow font-medium text-sky-600">
                {{ project.root.value }}
              </div>
            </div>
            <div class="flex items-start w-full space-x-1">
              <div class="font-medium w-20 flex-none">Description:</div>
              <div class="flex-grow">
                {{ project.root.description }}
              </div>
            </div>
            <div class="flex items-start w-full space-x-1">
              <div class="font-medium w-20 flex-none">Created At:</div>
              <div class="flex-grow">
                {{ formatDateTime(project.data.created_at) }}
              </div>
            </div>
            <div class="flex items-start w-full space-x-1">
              <div class="font-medium w-20 flex-none">Updated At:</div>
              <div class="flex-grow">
                {{ formatDateTime(project.data.updated_at) }}
              </div>
            </div>
            <div class="flex items-start w-full space-x-1">
              <div class="font-medium w-20 flex-none">Type:</div>
              <div
                class="flex-grow"
                :class="
                  project.data.type == 1 ? 'text-green-600' : 'text-red-600'
                "
              >
                {{ project.data.type == 1 ? 'Free for all' : 'Just for me' }}
              </div>
            </div>
            <div
              class="flex justify-center items-center border border-gray-200 mt-3 rounded h-64 shadow-lg bg-white"
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
              <div class="flex items-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                  <path
                    fill="currentColor"
                    d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z"
                  /></svg
                ><span class="ml-1">Edit project</span>
              </div>
            </Link>
            <button
              @click.stop="cloneProject()"
              type="button"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              <div class="flex items-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                  <path
                    fill="currentColor"
                    d="M16,8H14V11H11V13H14V16H16V13H19V11H16M2,12C2,9.21 3.64,6.8 6,5.68V3.5C2.5,4.76 0,8.09 0,12C0,15.91 2.5,19.24 6,20.5V18.32C3.64,17.2 2,14.79 2,12M15,3C10.04,3 6,7.04 6,12C6,16.96 10.04,21 15,21C19.96,21 24,16.96 24,12C24,7.04 19.96,3 15,3M15,19C11.14,19 8,15.86 8,12C8,8.14 11.14,5 15,5C18.86,5 22,8.14 22,12C22,15.86 18.86,19 15,19Z"
                  /></svg
                ><span class="ml-1">Clone project</span>
              </div>
            </button>
            <button
              @click.stop="deleteProjectCheck()"
              type="button"
              class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              <div class="flex items-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                  <path
                    fill="currentColor"
                    d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z"
                  /></svg
                ><span class="ml-1">Delete project</span>
              </div>
            </button>
            <ModalBlank
              id="danger-modal"
              :modalOpen="deleteProjectModal"
              @close-modal="deleteProjectModal = false"
            >
              <div class="p-5 flex space-x-4">
                <div
                  class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-red-100"
                >
                  <svg
                    class="w-4 h-4 shrink-0 fill-current text-red-600"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"
                    />
                  </svg>
                </div>
                <div>
                  <div class="mb-2">
                    <div class="text-lg font-semibold text-gray-800">
                      Attention!
                    </div>
                  </div>
                  <!-- Modal content -->
                  <div class="text-sm mb-10">
                    <div class="space-y-2">
                      <p>
                        Do you want to delete the project? The action is
                        irreversible!
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-wrap justify-end space-x-2">
                    <button
                      class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                      @click.stop="deleteProjectModal = false"
                    >
                      Cancel
                    </button>
                    <button
                      class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                      @click.stop="deleteProject()"
                    >
                      Delete
                    </button>
                  </div>
                </div>
              </div>
            </ModalBlank>
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
import { inject, onMounted, watch, ref } from 'vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { Tree } from '@/Components/project'
import ModalBlank from '@/Components/ModalBlank.vue'
import moment from 'moment'

const state = inject('state')
const project = inject('project')
const props = defineProps({
  projects: Object,
  projects_others: Object,
})
const deleteProjectModal = ref(false)

const deleteProjectCheck = () => {
  deleteProjectModal.value = true
}

const cloneProject = () => {
  const form = useForm({
    id: project.value.data.id,
  })
  form.post('/project/clone')
}

const deleteProject = () => {
  deleteProjectModal.value = false
  const form = useForm({
    id: project.value.data.id,
  })
  form.post('/project/delete')
}

watch(props, async (newProjects, oldProjects) => {
  if (newProjects.projects.length > 0) {
    const last_project = newProjects.projects[0]
    changeProject(last_project)
  } else {
    project.value = new Tree('project', '')
  }
})

const getProject = (new_project) => {
  return JSON.parse(new_project.project).root
}

const changeProject = (new_project) => {
  const project_info = getProject(new_project)
  project.value.data.id = new_project.id
  project.value.data.name = new_project.name
  project.value.data.user_id = new_project.user_id
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

const formatDateTime = (value) => {
  if (value) {
    return moment(String(value)).format('YYYY-MM-DD hh:mm')
  }
}

onMounted(() => {
  state.value.show_explorer = false
  state.value.show_properties = false
})
</script>
