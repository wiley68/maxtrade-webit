<template>
  <Head :title="$page.component"></Head>
  <div class="w-full h-screen flex flex-col overflow-hidden">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow overflow-hidden">
      <LeftSidebar class="flex-none" v-if="state.show_pallete"></LeftSidebar>
      <div class="flex-grow flex flex-col h-full overflow-hidden">
        <WorkPanelMenu class="flex-none"></WorkPanelMenu>
        <div class="flex-grow overflow-auto">
          <slot></slot>
        </div>
      </div>
      <RightSidebar class="flex-none" v-if="state.show_settings"></RightSidebar>
    </div>
  </div>

  <!-- <slot></slot> -->
</template>

<script setup>
import { ref, provide } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import Menu from './Components/Menu.vue'
import LeftSidebar from './Components/LeftSidebar.vue'
import RightSidebar from './Components/RightSidebar.vue'
import WorkPanelMenu from './Components/WorkPanelMenu.vue'
import { Tree, TreeNode } from '@/Components/project'

const state = ref({
  show_pallete: true,
  pallete: 'head',
  show_settings: true,
  window: 'file',
})

const project = ref(new Tree())

const current_el = ref({})

provide('state', state)
provide('project', project)
</script>
