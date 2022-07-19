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
import { Tree } from '@/Components/project'

const state = ref({
  show_pallete: true,
  pallete: 'head',
  show_settings: true,
  window: 'file',
})

const project = ref(
  new Tree('project', 'Project 1', 'Description of Project 1')
)
project.value.insertHtmlNode('project', 'project.html', 'en')
project.value.insertHeadNode('project.html', 'project.html.head')
project.value.insertTitleNode(
  'project.html.head',
  'project.html.head.title',
  'Title project 1'
)
project.value.insertMetaNode('project.html.head', 'project.html.head.meta[0]')
let node_meta = []
node_meta[0] = project.value.find('project.html.head.meta[0]').attributes = {
  charset: 'utf-8',
}

provide('state', state)
provide('project', project)
</script>
