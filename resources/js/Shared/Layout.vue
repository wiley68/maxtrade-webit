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

const state = ref({
  show_pallete: true,
  pallete: 'head',
  show_settings: true,
  window: 'file',
})
const project = ref({
  name: 'Project 1',
  description: 'Description of project 1',
  html: {
    lang: 'en',
    elements: {
      head: {
        title: 'Project 1',
        meta: [
          {
            charset: 'utf-8',
          },
          {
            name: 'description',
            content: 'Description of project 1',
          },
          {
            name: 'keywords',
            content: 'key1, key2',
          },
        ],
        link: [
          {
            href: 'https://fonts.googleapis.com/css?family=Exo+2:400,400i,500,500i,600,700,700i,900,900i&display=swap',
            rel: 'stylesheet',
          },
          {
            href: 'favicon.ico',
            rel: 'shortcut icon',
            type: 'image/x-icon',
          },
        ],
      },
      body: [
        {
          el_id: 'el_1',
          el_type: 'div',
          class: 'font-sans text-gray-900 antialiased',
          html: 'div dody',
        },
      ],
    },
  },
})
provide('state', state)
provide('project', project)
</script>
