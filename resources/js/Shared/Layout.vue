<template>
  <Head :title="$page.component"></Head>
  <div class="w-full h-screen flex flex-col">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow">
      <LeftSidebar v-if="state.show_pallete"></LeftSidebar>
      <div class="flex-grow flex flex-col h-full">
        <WorkPanelMenu></WorkPanelMenu>
        <div class="flex-grow">
          <slot></slot>
        </div>
      </div>
      <RightSidebar></RightSidebar>
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

const state = ref({
  show_pallete: true,
  pallete: 'head',
})
const project = ref({
  name: 'Project 1',
  description: 'Description of project 1',
})
provide('state', state)
provide('project', project)
</script>
