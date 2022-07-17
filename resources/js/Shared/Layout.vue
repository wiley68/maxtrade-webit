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
  status: false,
  name: {
    status: false,
    value: 'Project 1',
  },
  description: {
    status: false,
    value: 'Description of project 1',
  },
  html: {
    status: false,
    lang: 'en',
    head: {
      status: false,
      title: '',
      meta: [
        {
          status: false,
          charset: 'utf-8',
        },
        {
          status: false,
          name: 'viewport',
          content: 'width=device-width, initial-scale=1',
        },
        {
          status: false,
          name: 'description',
          content: '',
        },
        {
          status: false,
          name: 'keywords',
          content: '',
        },
      ],
      link: [
        {
          status: false,
          href: 'https://fonts.googleapis.com/css?family=Exo+2:400,400i,500,500i,600,700,700i,900,900i&display=swap',
          rel: 'stylesheet',
        },
        {
          status: false,
          href: 'favicon.ico',
          rel: 'shortcut icon',
          type: 'image/x-icon',
        },
      ],
    },
    body: [
      {
        status: false,
        el: 'div',
        class: 'font-sans text-gray-900 antialiased',
        value: 'Hellow',
      },
    ],
  },
})

const current_el = ref({})

provide('state', state)
provide('project', project)
</script>
