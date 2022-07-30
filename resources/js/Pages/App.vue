<template>
  <WorkPanelMenu class="flex-none"></WorkPanelMenu>
  <div class="bg-white flex-grow overflow-auto">
    <div class="w-full h-full text-sm">
      <div v-if="state.work_panel == 'PROJECT' && project.root.value">
        <pre>{{ JSON.stringify(project, null, 2) }}</pre>
      </div>
      <div v-if="state.work_panel == 'CONSTRUCTOR'">CONSTRUCTOR</div>
      <div v-if="state.work_panel == 'CODE'">CODE</div>
      <div v-if="state.work_panel == 'PREVIEW'">PREVIEW</div>
      <div v-if="state.work_panel == 'HELP'">HELP</div>
    </div>
  </div>
  <div
    class="bg-1 h-10 flex-none w-full border-t border-gray-300 flex items-center p-1"
  >
    <button
      @click.stop="saveProject()"
      type="button"
      class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-sky-50 hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
    >
      Save project
    </button>
    <button
      @click.stop="saveProject()"
      type="button"
      class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
    >
      Delete project
    </button>
  </div>
</template>

<script setup>
import { inject, onMounted } from 'vue'
import WorkPanelMenu from '@/Shared/Components/WorkPanelMenu.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const state = inject('state')
const project = inject('project')

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
  form.post('/project/save')
}

onMounted(() => {
  state.value.show_explorer = true
  state.value.show_properties = true
})
</script>
