<template>
  <Head :title="$page.component"></Head>
  <div class="bg-2 w-full h-screen flex flex-col overflow-hidden">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow overflow-hidden">
      <Explorer class="flex-none" v-if="state.show_explorer"></Explorer>
      <div class="flex-grow flex flex-col h-full overflow-hidden mx-0.5">
        <WorkPanelMenu class="flex-none"></WorkPanelMenu>
        <div class="flex-grow overflow-auto mt-0.5">
          <slot></slot>
        </div>
      </div>
      <Properties class="flex-none" v-if="state.show_properties"></Properties>
    </div>
  </div>
</template>

<script setup>
import { ref, provide } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import Menu from './Components/Menu.vue'
import Explorer from './Components/Explorer.vue'
import Properties from './Components/Properties.vue'
import WorkPanelMenu from './Components/WorkPanelMenu.vue'
import { Tree } from '@/Components/project'

const state = ref({
  show_explorer: true,
  show_properties: true,
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

<style>
.bg-1 {
  background-color: #f5f5f5;
}
.bg-2 {
  background-color: #e4e4e4;
}
</style>
