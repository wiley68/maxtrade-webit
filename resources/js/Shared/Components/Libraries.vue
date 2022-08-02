<template>
  <div
    class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200"
  >
    <div class="mr-1 user-select-none">
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z"
        />
      </svg>
    </div>
    <div
      class="flex-grow font-medium text-sm user-select-none select-none truncate"
    >
      LIBRARIES
    </div>
    <button
      @click.stop="librariesFullScreen"
      class="hover:bg-gray-200 cursor-pointer"
      title="Full screen libraries panel"
    >
      <svg class="w-5 h-5" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z"
        />
      </svg>
    </button>
    <button
      @click.stop="librariesRestoreScreen"
      class="hover:bg-gray-200 cursor-pointer"
      title="Restore size libraries panel"
    >
      <svg class="w-5 h-5" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z"
        />
      </svg>
    </button>
  </div>
  <div class="flex-grow bg-1 flex">
    <div
      class="w-12 h-full flex-none flex flex-col items-center border-r border-r-gray-200 p-1"
    >
      <button
        @click.stop="state.library = 'html5'"
        title="HTML root tags library"
        class="hover:text-sky-600"
        :class="state.library === 'html5' ? 'text-sky-600' : 'text-gray-500'"
      >
        <svg class="w-8 h-8" viewBox="0 0 24 24">
          <path
            fill="currentColor"
            d="M12,17.56L16.07,16.43L16.62,10.33H9.38L9.2,8.3H16.8L17,6.31H7L7.56,12.32H14.45L14.22,14.9L12,15.5L9.78,14.9L9.64,13.24H7.64L7.93,16.43L12,17.56M4.07,3H19.93L18.5,19.2L12,21L5.5,19.2L4.07,3Z"
          />
        </svg>
      </button>
      <button
        @click.stop="state.library = 'attributes'"
        title="HTML root attributes library"
        class="hover:text-sky-600 mt-2"
        :class="
          state.library === 'attributes' ? 'text-sky-600' : 'text-gray-500'
        "
      >
        <svg class="w-8 h-8" viewBox="0 0 24 24">
          <path
            fill="currentColor"
            d="M5,3H7V5H5V10A2,2 0 0,1 3,12A2,2 0 0,1 5,14V19H7V21H5C3.93,20.73 3,20.1 3,19V15A2,2 0 0,0 1,13H0V11H1A2,2 0 0,0 3,9V5A2,2 0 0,1 5,3M19,3A2,2 0 0,1 21,5V9A2,2 0 0,0 23,11H24V13H23A2,2 0 0,0 21,15V19A2,2 0 0,1 19,21H17V19H19V14A2,2 0 0,1 21,12A2,2 0 0,1 19,10V5H17V3H19M12,15A1,1 0 0,1 13,16A1,1 0 0,1 12,17A1,1 0 0,1 11,16A1,1 0 0,1 12,15M8,15A1,1 0 0,1 9,16A1,1 0 0,1 8,17A1,1 0 0,1 7,16A1,1 0 0,1 8,15M16,15A1,1 0 0,1 17,16A1,1 0 0,1 16,17A1,1 0 0,1 15,16A1,1 0 0,1 16,15Z"
          />
        </svg>
      </button>
    </div>
    <div class="flex-grow flex flex-col p-1">
      <div v-if="state.library === 'html5'">
        <button
          @click.stop="addHtml()"
          :disabled="add_html_disabled"
          type="button"
          :class="add_html_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M12,17.56L16.07,16.43L16.62,10.33H9.38L9.2,8.3H16.8L17,6.31H7L7.56,12.32H14.45L14.22,14.9L12,15.5L9.78,14.9L9.64,13.24H7.64L7.93,16.43L12,17.56M4.07,3H19.93L18.5,19.2L12,21L5.5,19.2L4.07,3Z"
            />
          </svg>
          <span class="ml-1">HTML</span>
        </button>
        <button
          @click.stop="addHead()"
          :disabled="add_head_disabled"
          type="button"
          :class="add_head_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M6,2H18A2,2 0 0,1 20,4V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V4A2,2 0 0,1 6,2M6,4V8H18V4H6Z"
            />
          </svg>
          <span class="ml-1">head</span>
        </button>
        <button
          @click.stop="addTitle()"
          :disabled="add_title_disabled"
          type="button"
          :class="add_title_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path fill="currentColor" d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />
          </svg>
          <span class="ml-1">title</span>
        </button>
        <button
          @click.stop="addMeta('charset')"
          :disabled="add_metacharset_disabled"
          type="button"
          :class="add_metacharset_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z"
            />
          </svg>
          <span class="ml-1">meta.charset</span>
        </button>
        <button
          @click.stop="addMeta('viewport')"
          :disabled="add_metaviewport_disabled"
          type="button"
          :class="add_metaviewport_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z"
            />
          </svg>
          <span class="ml-1">meta.viewport</span>
        </button>
        <button
          @click.stop="addMeta('description')"
          :disabled="add_metadescription_disabled"
          type="button"
          :class="
            add_metadescription_disabled ? 'text-gray-300' : 'text-gray-600'
          "
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z"
            />
          </svg>
          <span class="ml-1">meta.description</span>
        </button>
        <button
          @click.stop="addMeta('keywords')"
          :disabled="add_metakeywords_disabled"
          type="button"
          :class="add_metakeywords_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z"
            />
          </svg>
          <span class="ml-1">meta.keywords</span>
        </button>
        <button
          @click.stop="custom_meta_div = !custom_meta_div"
          :disabled="add_meta_disabled"
          type="button"
          :class="add_meta_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z"
            />
          </svg>
          <span class="ml-1">meta</span>
        </button>
        <div v-if="custom_meta_div" class="flex items-center w-full">
          <input
            type="text"
            v-model="custom_meta_id"
            placeholder="meta id ..."
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"
          />
          <button
            @click.stop="addMetaCustom()"
            type="button"
            :class="add_meta_disabled ? 'text-gray-300' : 'text-gray-600'"
            class="ml-1 inline-flex px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
          >
            <svg class="w-4 h-4 flex-none" viewBox="0 0 24 24">
              <path
                fill="currentColor"
                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z"
              />
            </svg>
            <span class="ml-1">add</span>
          </button>
        </div>
        <button
          @click.stop="custom_link_div = !custom_link_div"
          :disabled="add_link_disabled"
          type="button"
          :class="add_link_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4 flex-none" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z"
            />
          </svg>
          <span class="ml-1">link</span>
        </button>
        <div v-if="custom_link_div" class="flex items-center w-full">
          <input
            type="text"
            v-model="custom_link_id"
            placeholder="link id ..."
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"
          />
          <button
            @click.stop="addLink()"
            type="button"
            :class="add_link_disabled ? 'text-gray-300' : 'text-gray-600'"
            class="ml-1 inline-flex px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
          >
            <svg class="w-4 h-4 flex-none" viewBox="0 0 24 24">
              <path
                fill="currentColor"
                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z"
              />
            </svg>
            <span class="ml-1">add</span>
          </button>
        </div>
      </div>
      <div v-if="state.library === 'attributes'">
        <button
          @click.stop="addAttrLang()"
          :disabled="add_attribute_disabled"
          type="button"
          :class="add_attribute_disabled ? 'text-gray-300' : 'text-gray-600'"
          class="inline-flex w-full px-1 py-0.5 border border-gray-300 shadow-sm text-xs rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M12.87,15.07L10.33,12.56L10.36,12.53C12.1,10.59 13.34,8.36 14.07,6H17V4H10V2H8V4H1V6H12.17C11.5,7.92 10.44,9.75 9,11.35C8.07,10.32 7.3,9.19 6.69,8H4.69C5.42,9.63 6.42,11.17 7.67,12.56L2.58,17.58L4,19L9,14L12.11,17.11L12.87,15.07M18.5,10H16.5L12,22H14L15.12,19H19.87L21,22H23L18.5,10M15.88,17L17.5,12.67L19.12,17H15.88Z"
            />
          </svg>
          <span class="ml-1">lang=en</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { inject, computed, ref } from 'vue'
import { notify } from '@kyvg/vue3-notification'

const state = inject('state')
const project = inject('project')
const custom_meta_div = ref(false)
const custom_meta_id = ref('')
const custom_link_div = ref(false)
const custom_link_id = ref('')

const props = defineProps({
  libraries: Object,
  elements: Object,
})

const emit = defineEmits(['librariesFullScreen', 'librariesRestoreScreen'])

const add_html_disabled = computed(() => {
  return (
    state.value.current_element !== 'project' ||
    project.value.find('html') !== undefined
  )
})

const add_head_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'html' ||
    project.value.find('head') !== undefined
  )
})

const add_title_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'head' ||
    project.value.find('title') !== undefined
  )
})

const add_metacharset_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'head' ||
    project.value.find('charset') !== undefined
  )
})

const add_metaviewport_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'head' ||
    project.value.find('viewport') !== undefined
  )
})

const add_metadescription_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'head' ||
    project.value.find('description') !== undefined
  )
})

const add_metakeywords_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element !== 'head' ||
    project.value.find('keywords') !== undefined
  )
})

const add_meta_disabled = computed(() => {
  return (
    state.value.current_element === '' || state.value.current_element !== 'head'
  )
})

const add_link_disabled = computed(() => {
  return (
    state.value.current_element === '' || state.value.current_element !== 'head'
  )
})

const add_attribute_disabled = computed(() => {
  return (
    state.value.current_element === '' ||
    state.value.current_element === 'project'
  )
})

const addHtml = () => {
  if (state.value.current_element === 'project') {
    const html = project.value.find('html')
    if (html === undefined) {
      if (project.value.insertNode('project', 'html', 'html')) {
        const html = project.value.find('html')
        html.type = 'html'
        state.value.work_panel = ''
        setTimeout(() => {
          state.value.work_panel = 'PROJECT'
        }, 10)
      } else {
        notify({
          type: 'error',
          title: 'Error',
          text: 'You cannot add the attribute!',
        })
      }
    }
  }
}

const addHead = () => {
  if (state.value.current_element === 'html') {
    const head = project.value.find('head')
    if (head === undefined) {
      if (project.value.insertNode('html', 'head', 'head')) {
        const head = project.value.find('head')
        head.type = 'head'
        state.value.work_panel = ''
        setTimeout(() => {
          state.value.work_panel = 'PROJECT'
        }, 10)
      } else {
        notify({
          type: 'error',
          title: 'Error',
          text: 'You cannot add the attribute!',
        })
      }
    }
  }
}

const addTitle = () => {
  if (state.value.current_element === 'head') {
    const title = project.value.find('title')
    if (title === undefined) {
      if (project.value.insertNode('head', 'title', 'title')) {
        const title = project.value.find('title')
        title.type = 'title'
        state.value.work_panel = ''
        setTimeout(() => {
          state.value.work_panel = 'PROJECT'
        }, 10)
      } else {
        notify({
          type: 'error',
          title: 'Error',
          text: 'You cannot add the attribute!',
        })
      }
    }
  }
}

const addMetaCustom = () => {
  if (custom_meta_id.value.length > 0) {
    if (project.value.find(custom_meta_id.value) === undefined) {
      addMeta(custom_meta_id.value)
    } else {
      notify({
        type: 'error',
        title: 'Error',
        text:
          'The meta id ("' +
          custom_meta_id.value +
          '") is already used in your project. Please choose another id!',
      })
    }
  } else {
    notify({
      type: 'error',
      title: 'Error',
      text: 'You must enter a meta id!',
    })
  }
}

const addMeta = (meta_id) => {
  custom_meta_id.value = ''
  custom_meta_div.value = false
  if (state.value.current_element === 'head') {
    const meta = project.value.find(meta_id)
    if (meta === undefined) {
      if (project.value.insertNode('head', meta_id, 'meta.' + meta_id)) {
        const meta = project.value.find(meta_id)
        meta.type = 'meta'
        var obj = {}
        switch (meta_id) {
          case 'charset':
            obj[meta_id] = 'utf-8'
            meta.attributes = { ...meta.attributes, ...obj }
            break
          case 'viewport':
            obj['name'] = meta_id
            obj['content'] = 'width=device-width, initial-scale=1'
            meta.attributes = { ...meta.attributes, ...obj }
            break
          case 'description':
            obj['name'] = meta_id
            obj['content'] = 'Project description ...'
            meta.attributes = { ...meta.attributes, ...obj }
            break
          case 'keywords':
            obj['name'] = meta_id
            obj['content'] = ''
            meta.attributes = { ...meta.attributes, ...obj }
            break
          default:
            break
        }
        state.value.work_panel = ''
        setTimeout(() => {
          state.value.work_panel = 'PROJECT'
        }, 10)
      } else {
        notify({
          type: 'error',
          title: 'Error',
          text: 'You cannot add the attribute!',
        })
      }
    }
  }
}

const addLink = () => {
  if (custom_link_id.value.length > 0) {
    if (project.value.find(custom_link_id.value) === undefined) {
      if (state.value.current_element === 'head') {
        if (
          project.value.insertNode(
            'head',
            custom_link_id.value,
            'link.' + custom_link_id.value
          )
        ) {
          const link = project.value.find(custom_link_id.value)
          link.type = 'link'
          var obj = {}
          obj['href'] = ''
          obj['rel'] = ''
          obj['type'] = ''
          link.attributes = { ...link.attributes, ...obj }
          custom_link_id.value = ''
          custom_link_div.value = false
          state.value.work_panel = ''
          setTimeout(() => {
            state.value.work_panel = 'PROJECT'
          }, 10)
        } else {
          notify({
            type: 'error',
            title: 'Error',
            text: 'You cannot add the attribute!',
          })
        }
      }
    } else {
      notify({
        type: 'error',
        title: 'Error',
        text:
          'The link id ("' +
          custom_link_id.value +
          '") is already used in your project. Please choose another id!',
      })
    }
  } else {
    notify({
      type: 'error',
      title: 'Error',
      text: 'You must enter a link id!',
    })
  }
}

const addAttrLang = () => {
  if (state.value.current_element !== 'project') {
    var element = project.value.find(state.value.current_element)
    if (element !== undefined) {
      var obj = {}
      obj['lang'] = 'en'
      element.attributes = { ...element.attributes, ...obj }
    }
  }
}
</script>
