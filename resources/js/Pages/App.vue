<template>
  <WorkPanelMenu class="flex-none"></WorkPanelMenu>
  <div class="bg-white flex-grow overflow-auto">
    <div class="w-full h-full text-sm">
      <div v-if="state.work_panel == 'PROJECT' && project.root.value">
        <json-viewer
          :value="project"
          expanded
          copyable
          :expand-depth="10"
          show-double-quotes
          show-array-index
        ></json-viewer>
      </div>
      <div v-if="state.work_panel == 'CONSTRUCTOR'">CONSTRUCTOR</div>
      <div v-if="state.work_panel == 'CODE'">CODE</div>
      <div v-if="state.work_panel == 'PREVIEW'">PREVIEW</div>
      <div v-if="state.work_panel == 'HELP'">HELP</div>
    </div>
  </div>
  <div
    v-if="project.root.value"
    class="bg-1 h-10 flex-none w-full border-t border-gray-300 flex items-center p-1"
  >
    <button
      @click.stop="saveProject()"
      type="button"
      class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-sky-50 hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
    >
      <div class="flex items-center">
        <svg class="w-4 h-4" viewBox="0 0 24 24">
          <path
            fill="currentColor"
            d="M17 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V7L17 3M19 19H5V5H16.17L19 7.83V19M12 12C10.34 12 9 13.34 9 15S10.34 18 12 18 15 16.66 15 15 13.66 12 12 12M6 6H15V10H6V6Z"
          /></svg
        ><span class="ml-1">Save project</span>
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
            <div class="text-lg font-semibold text-gray-800">Attention!</div>
          </div>
          <!-- Modal content -->
          <div class="text-sm mb-10">
            <div class="space-y-2">
              <p>
                Do you want to delete the project? The action is irreversible!
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
</template>

<script setup>
import { inject, onMounted, ref } from 'vue'
import WorkPanelMenu from '@/Shared/Components/WorkPanelMenu.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import ModalBlank from '@/Components/ModalBlank.vue'
import { Tree } from '@/Components/project'
import JsonViewer from 'vue-json-viewer'
import { notify } from '@kyvg/vue3-notification'

const state = inject('state')
const project = inject('project')
const deleteProjectModal = ref(false)

const deleteProjectCheck = () => {
  deleteProjectModal.value = true
}

const deleteProject = () => {
  deleteProjectModal.value = false
  const form = useForm({
    id: project.value.data.id,
  })
  form.post('/project/delete', {
    onSuccess: () => {
      project.value = new Tree('project', '')
      Inertia.visit('/dashboard')
    },
  })
}

const saveProject = () => {
  const form = useForm({
    id: project.value.data.id,
    name: project.value.data.name,
    user_id: project.value.data.user_id,
    created_at: project.value.data.created_at,
    updated_at: project.value.data.updated_at,
    type: project.value.data.type,
    project: '{"root":' + JSON.stringify(project.value.root, null, 2) + '}',
  })
  form.post('/project/save', {
    onSuccess: () => {
      notify({
        type: 'success',
        title: 'Message',
        text: 'You have successfully saved your changes.',
      })
    },
  })
}

onMounted(() => {
  state.value.show_explorer = true
  state.value.show_properties = true
})
</script>
