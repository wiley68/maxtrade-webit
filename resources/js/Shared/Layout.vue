<template>
  <Head :title="$page.component"></Head>
  <div class="bg-2 w-full h-screen flex flex-col overflow-hidden">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow overflow-hidden">
      <div id="explorer" ref="explorer">
        <Explorer></Explorer>
      </div>
      <div id="separator" ref="separator">
        <div class="bg-gray-400 w-0.5 h-0.5 rounded-full mb-0.5"></div>
        <div class="bg-gray-400 w-0.5 h-0.5 rounded-full mb-0.5"></div>
        <div class="bg-gray-400 w-0.5 h-0.5 rounded-full"></div>
      </div>
      <div id="work" ref="work">
        <div id="work_panel" ref="work_panel">
          <WorkPanelMenu class="flex-none"></WorkPanelMenu>
          <div class="bg-white flex-grow overflow-auto">
            <slot></slot>
          </div>
        </div>
        <div id="separator_properties" ref="separator_properties">
          <div class="bg-gray-400 w-0.5 h-0.5 rounded-full mb-0.5"></div>
          <div class="bg-gray-400 w-0.5 h-0.5 rounded-full mb-0.5"></div>
          <div class="bg-gray-400 w-0.5 h-0.5 rounded-full"></div>
        </div>
        <div id="properties" ref="properties"><Properties></Properties></div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, provide, onMounted, watch } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import Menu from './Components/Menu.vue'
import Explorer from './Components/Explorer.vue'
import Properties from './Components/Properties.vue'
import WorkPanelMenu from './Components/WorkPanelMenu.vue'
import { Tree } from '@/Components/project'

const state = ref({
  show_explorer: true,
  show_properties: true,
  work_panel: 'PROJECT',
  current_element: '',
})

const project = ref(new Tree('project', 'Untitled-1'))
project.value.find('project').description = 'Description of Untitled-1'
project.value.find('project').type = 'project'

project.value.insertNode('project', 'html', 'HTML')
project.value.find('html').attributes = { lang: 'en' }

project.value.insertNode('html', 'head', 'HEAD')
project.value.insertNode('head', 'title', 'title')
project.value.find('title').innerText = 'Title of project 1'
project.value.insertNode('head', 'meta.charset', 'CHARSET')
project.value.insertNode('head', 'meta.viewport', 'viewport')
project.value.insertNode('head', 'meta.description', 'description')
project.value.insertNode('head', 'meta.keywords', 'keywords')
project.value.insertNode('head', 'link.font', 'font')
project.value.insertNode('head', 'link.icon', 'icon')

project.value.insertNode('html', 'body', 'BODY')

const explorer = ref(null)
const separator = ref(null)
const work = ref(null)
const work_panel = ref(null)
const separator_properties = ref(null)
const properties = ref(null)

function dragElement(element) {
  var md

  element.onmousedown = onMouseDown

  function onMouseDown(e) {
    md = {
      e,
      offsetLeft: element.offsetLeft,
      offsetTop: element.offsetTop,
      firstWidth: explorer.value.offsetWidth,
      secondWidth: work.value.offsetWidth,
    }

    document.onmousemove = onMouseMove
    document.onmouseup = () => {
      document.onmousemove = document.onmouseup = null
    }
  }

  function onMouseMove(e) {
    var delta = { x: e.clientX - md.e.clientX, y: e.clientY - md.e.clientY }

    delta.x = Math.min(Math.max(delta.x, -md.firstWidth), md.secondWidth)

    element.style.left = md.offsetLeft + delta.x + 'px'
    explorer.value.style.width = md.firstWidth + delta.x + 'px'
    if (md.firstWidth + delta.x == 0) {
      state.value.show_explorer = false
    } else {
      if (!state.value.show_explorer) {
        state.value.show_explorer = true
      }
    }
    work.value.style.width = md.secondWidth - delta.x + 'px'
  }
}

function dragProperties(element) {
  var md

  element.onmousedown = onMouseDown

  function onMouseDown(e) {
    md = {
      e,
      offsetLeft: element.offsetLeft,
      offsetTop: element.offsetTop,
      firstWidth: work_panel.value.offsetWidth,
      secondWidth: properties.value.offsetWidth,
    }

    document.onmousemove = onMouseMove
    document.onmouseup = () => {
      document.onmousemove = document.onmouseup = null
    }
  }

  function onMouseMove(e) {
    var delta = { x: e.clientX - md.e.clientX, y: e.clientY - md.e.clientY }

    delta.x = Math.min(Math.max(delta.x, -md.firstWidth), md.secondWidth)

    element.style.left = md.offsetLeft + delta.x + 'px'
    work_panel.value.style.width = md.firstWidth + delta.x + 'px'
    if (md.firstWidth + delta.x == 0) {
      state.value.show_properties = false
    } else {
      if (!state.value.show_properties) {
        state.value.show_properties = true
      }
    }
    properties.value.style.width = md.secondWidth - delta.x + 'px'
  }
}

onMounted(() => {
  dragElement(separator.value)
  dragProperties(separator_properties.value)
})

watch(
  () => state.value.show_explorer,
  () => {
    if (state.value.show_explorer) {
      explorer.value.style.width = '15%'
      work.value.style.width = '85%'
    } else {
      explorer.value.style.width = '0px'
      work.value.style.width = '100%'
    }
  }
)

watch(
  () => state.value.show_properties,
  () => {
    if (state.value.show_properties) {
      work_panel.value.style.width = '85%'
      properties.value.style.width = '15%'
    } else {
      work_panel.value.style.width = '100%'
      properties.value.style.width = '0px'
    }
  }
)

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

<style scoped>
#explorer {
  flex: none;
  height: 100%;
  width: 15%;
}
#separator {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: col-resize;
  background-color: #e4e4e4;
  width: 6px;
  height: 100%;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#work {
  display: flex;
  height: 100%;
  width: 85%;
}
#properties {
  flex: none;
  height: 100%;
  width: 15%;
}
#separator_properties {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: col-resize;
  background-color: #e4e4e4;
  width: 6px;
  height: 100%;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#work_panel {
  display: flex;
  flex-direction: column;
  height: 100%;
  width: 85%;
}
</style>
