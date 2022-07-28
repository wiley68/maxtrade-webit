<template>
  <WorkPanelMenu class="flex-none"></WorkPanelMenu>
  <div class="bg-white flex-grow overflow-auto">
    <div class="w-full h-full text-sm">
      <div v-if="state.work_panel == 'PROJECT' && project.value">
        <pre>{{ JSON.stringify(project, null, 2) }}</pre>
      </div>
      <div v-if="state.work_panel == 'CONSTRUCTOR'">CONSTRUCTOR</div>
      <div v-if="state.work_panel == 'CODE'">CODE</div>
      <div v-if="state.work_panel == 'PREVIEW'">PREVIEW</div>
      <div v-if="state.work_panel == 'HELP'">HELP</div>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted } from 'vue'
import WorkPanelMenu from '@/Shared/Components/WorkPanelMenu.vue'

const state = inject('state')
const project = inject('project')
const props = defineProps({
  new_project: Object,
})

onMounted(() => {
  state.value.show_explorer = true
  state.value.show_properties = true
})
</script>
