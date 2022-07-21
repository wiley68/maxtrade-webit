<template>
  <Head :title="$page.component"></Head>
  <div class="w-full h-screen flex flex-col overflow-hidden">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow overflow-hidden">
      <Explorer class="flex-none" v-if="state.show_explorer"></Explorer>
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
import Explorer from './Components/Explorer.vue'
import RightSidebar from './Components/RightSidebar.vue'
import WorkPanelMenu from './Components/WorkPanelMenu.vue'
import { Tree } from '@/Components/project'

const state = ref({
  show_explorer: true,
  pallete: 'head',
  show_settings: true,
  window: 'file',
})

const project = ref(new Tree('project', 'Project 1'))

project.value.insertNode('project', 'html', 'HTML')
project.value.find('html').attributes = { lang: 'en' }

project.value.insertNode('html', 'head', 'HEAD')
project.value.insertNode('head', 'title', 'TITLE')
project.value.insertNode('head', 'meta.charset', 'CHARSET')
project.value.insertNode('head', 'meta.viewport', 'viewport')
project.value.insertNode('head', 'meta.description', 'description')
project.value.insertNode('head', 'meta.keywords', 'keywords')
project.value.insertNode('head', 'link.font', 'font')
project.value.insertNode('head', 'link.icon', 'icon')

project.value.insertNode('project', 'body', 'BODY')

provide('state', state)
provide('project', project)
</script>
