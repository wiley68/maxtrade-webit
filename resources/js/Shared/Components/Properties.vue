<template>
  <div class="bg-1 hidden md:flex md:flex-col md:justify-between w-full h-full text-gray-500">
    <div class="bg-1 flex flex-col justify-between w-full h-32 flex-none text-gray-500 border-b-4 border-b-gray-200">
      <div class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200">
        <div class="mr-1 user-select-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z" />
          </svg>
        </div>
        <div class="flex-grow font-medium text-sm user-select-none select-none truncate">
          PROJECT PROPERTIES
        </div>
      </div>
      <div v-if="Object.keys(project.data).length > 0"
        class="flex flex-col flex-grow text-xs bg-1 px-1 overflow-y-auto">
        <div class="font-medium">
          id:<span class="font-normal ml-1">{{ project.data.id }}</span>
        </div>
        <div class="font-medium">
          name:<span class="text-sky-600 ml-1 truncate">{{
              project.data.name
          }}</span>
        </div>
        <div class="font-medium">
          user:<span class="font-normal ml-1 truncate">{{
              $page.props.users.find(
                (element) => element.id == project.data.user_id
              ).name
          }}</span>
        </div>
        <div class="font-medium">
          created:<span class="font-normal ml-1">{{
              formatDateTime(project.data.created_at)
          }}</span>
        </div>
        <div class="font-medium">
          updated:<span class="font-normal ml-1">{{
              formatDateTime(project.data.updated_at)
          }}</span>
        </div>
        <div class="font-medium">
          type:
          <select
            class="ring-0 focus:ring-0 focus:outline-none pl-1 pr-8 py-0 text-xs font-normal rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"
            v-model="project.data.type">
            <option value="1">Free for all</option>
            <option value="0">Just for me</option>
          </select>
        </div>
      </div>
    </div>
    <div class="bg-1 flex flex-col justify-between w-full flex-grow text-gray-500">
      <div class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200">
        <div class="mr-1 user-select-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M15.9,18.45C17.25,18.45 18.35,17.35 18.35,16C18.35,14.65 17.25,13.55 15.9,13.55C14.54,13.55 13.45,14.65 13.45,16C13.45,17.35 14.54,18.45 15.9,18.45M21.1,16.68L22.58,17.84C22.71,17.95 22.75,18.13 22.66,18.29L21.26,20.71C21.17,20.86 21,20.92 20.83,20.86L19.09,20.16C18.73,20.44 18.33,20.67 17.91,20.85L17.64,22.7C17.62,22.87 17.47,23 17.3,23H14.5C14.32,23 14.18,22.87 14.15,22.7L13.89,20.85C13.46,20.67 13.07,20.44 12.71,20.16L10.96,20.86C10.81,20.92 10.62,20.86 10.54,20.71L9.14,18.29C9.05,18.13 9.09,17.95 9.22,17.84L10.7,16.68L10.65,16L10.7,15.31L9.22,14.16C9.09,14.05 9.05,13.86 9.14,13.71L10.54,11.29C10.62,11.13 10.81,11.07 10.96,11.13L12.71,11.84C13.07,11.56 13.46,11.32 13.89,11.15L14.15,9.29C14.18,9.13 14.32,9 14.5,9H17.3C17.47,9 17.62,9.13 17.64,9.29L17.91,11.15C18.33,11.32 18.73,11.56 19.09,11.84L20.83,11.13C21,11.07 21.17,11.13 21.26,11.29L22.66,13.71C22.75,13.86 22.71,14.05 22.58,14.16L21.1,15.31L21.15,16L21.1,16.68M6.69,8.07C7.56,8.07 8.26,7.37 8.26,6.5C8.26,5.63 7.56,4.92 6.69,4.92A1.58,1.58 0 0,0 5.11,6.5C5.11,7.37 5.82,8.07 6.69,8.07M10.03,6.94L11,7.68C11.07,7.75 11.09,7.87 11.03,7.97L10.13,9.53C10.08,9.63 9.96,9.67 9.86,9.63L8.74,9.18L8,9.62L7.81,10.81C7.79,10.92 7.7,11 7.59,11H5.79C5.67,11 5.58,10.92 5.56,10.81L5.4,9.62L4.64,9.18L3.5,9.63C3.41,9.67 3.3,9.63 3.24,9.53L2.34,7.97C2.28,7.87 2.31,7.75 2.39,7.68L3.34,6.94L3.31,6.5L3.34,6.06L2.39,5.32C2.31,5.25 2.28,5.13 2.34,5.03L3.24,3.47C3.3,3.37 3.41,3.33 3.5,3.37L4.63,3.82L5.4,3.38L5.56,2.19C5.58,2.08 5.67,2 5.79,2H7.59C7.7,2 7.79,2.08 7.81,2.19L8,3.38L8.74,3.82L9.86,3.37C9.96,3.33 10.08,3.37 10.13,3.47L11.03,5.03C11.09,5.13 11.07,5.25 11,5.32L10.03,6.06L10.06,6.5L10.03,6.94Z" />
          </svg>
        </div>
        <div class="flex-grow font-medium text-sm user-select-none select-none truncate">
          ELEMENT PROPERTIES
        </div>
      </div>
      <div v-if="state.current_element !== ''" class="flex flex-col items-center flex-grow bg-1 px-1">
        <div class="flex items-center font-medium border-b border-dotted border-b-sky-200 w-full truncate text-sky-600">
          <div class="flex-grow">{{ element.value }}</div>
          <button @click.stop="deleteElement()" v-if="state.current_element !== 'project'" title="Delete element">
            <svg class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
              <path fill="currentColor"
                d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
            </svg>
          </button>
        </div>
        <div class="flex w-full">
          <div class="text-sm font-light">
            Id:<span class="font-medium ml-1">{{ element.key }}</span>
          </div>
        </div>
        <div class="flex flex-col w-full">
          <div class="text-sm font-light">Name:</div>
          <input type="text" maxlength="45" v-model="element.value" @keydown="checkKeyDownAlphaNumeric($event)"
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600" />
        </div>
        <div class="flex flex-col w-full">
          <div class="text-sm font-light">Description:</div>
          <textarea v-model="element.description"
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"></textarea>
        </div>
        <div class="flex flex-col w-full">
          <div class="text-sm font-light">
            Parent:<span class="ml-1 font-medium">{{ element.parent }}</span>
          </div>
        </div>
        <div class="flex flex-col w-full">
          <div class="text-sm font-light">Type:</div>
          <select :disabled="
            state.current_element === 'project' ||
            state.current_element === 'html' ||
            state.current_element === 'head' ||
            state.current_element === 'title' ||
            element.type === 'meta' ||
            element.type === 'link'
          " class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 disabled:border-gray-400 hover:border-sky-600"
            v-model="element.type">
            <option value="project">Root Project</option>
            <option value="html">HTML Tag</option>
            <option value="head">HEAD Tag</option>
            <option value="title">TITLE Tag</option>
            <option value="meta">META Tag</option>
            <option value="link">LINK Tag</option>
          </select>
        </div>
        <div v-if="element.type !== 'project'" class="flex flex-col w-full">
          <div class="text-sm font-light">InnerText:</div>
          <textarea v-model="element.innerText"
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"></textarea>
        </div>
        <div v-if="element.type !== 'project'" class="flex flex-col w-full">
          <div class="text-sm font-light">InnerHTML:</div>
          <textarea v-model="element.innerHTML"
            class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600"></textarea>
        </div>
        <div
          class="flex items-center justify-center mt-2 text-sm font-medium border-b border-dotted border-b-gray-200 w-full text-center">
          attributes
          <button @click.stop="add_attr = !add_attr">
            <div v-if="add_attr" title="Hide attributes panel">
              <svg class="w-5 h-5 ml-1 cursor-pointer text-gray-500 hover:text-sky-600" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M17,14L12,9L7,14H17Z" />
              </svg>
            </div>
            <div v-else title="Add new attribute">
              <svg class="w-5 h-5 ml-1 cursor-pointer text-gray-500 hover:text-sky-600" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z" />
              </svg>
            </div>
          </button>
        </div>
        <div v-if="add_attr" class="w-full flex flex-col items-start text-sm border-b border-dotted border-b-gray-200">
          <div class="w-full flex items-center justify-start mt-1">
            <div class="w-12">name:</div>
            <div class="flex-grow">
              <input v-model="attr_name" type="text" maxlength="45"
                class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600" />
            </div>
          </div>
          <div class="w-full flex items-center justify-start mt-1">
            <div class="w-12">value:</div>
            <div class="flex-grow">
              <input v-model="attr_value" type="text" maxlength="245"
                class="ring-0 focus:ring-0 focus:outline-none w-full px-1 py-0 text-sm rounded-sm border border-gray-400 focus:border-sky-600 hover:border-sky-600" />
            </div>
          </div>
          <div class="w-full flex items-center justify-start my-1">
            <button @click.stop="addAttribute()" title="Add attribute">
              <svg class="w-6 h-6 text-gray-600 cursor-pointer" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M17 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V7L17 3M19 19H5V5H16.17L19 7.83V19M12 12C10.34 12 9 13.34 9 15S10.34 18 12 18 15 16.66 15 15 13.66 12 12 12M6 6H15V10H6V6Z" />
              </svg>
            </button>
            <button @click.stop="deleteAttribute()" title="Delete attribute">
              <svg class="w-6 h-6 text-red-600 cursor-pointer" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
              </svg>
            </button>
          </div>
        </div>
        <div class="flex flex-col w-full">
          <button
            class="truncate text-sm text-left cursor-help hover:text-sky-600 border border-gray-100 hover:border-sky-200 px-0.5 py-0 mt-0.5 rounded hover:bg-white"
            :class="
              key === attr_name
                ? 'text-sky-600 border-sky-200 bg-white'
                : 'text-gray-500 border-gray-100 bg-gray-100'
            " v-for="(value, key, index) in element.attributes" :key="`${key}-${index}`"
            @click.stop="changeAttribute(key, value)">
            "{{ key }}"="{{ value }}"
          </button>
        </div>
        <div class="mt-2 text-sm font-medium border-b border-dotted border-b-gray-200 w-full text-center">
          children elements
        </div>
        <div class="flex flex-col w-full">
          <button
            class="truncate text-sm text-left cursor-help hover:text-sky-600 border border-gray-100 hover:border-sky-200 px-0.5 py-0 mt-0.5 rounded hover:bg-white"
            v-for="child in element.children" :key="child.key" @click.stop="changeElement(child.key)">
            {{ child.value }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, inject, ref, watch } from 'vue'
import moment from 'moment'
import { notify } from '@kyvg/vue3-notification'

const state = inject('state')
const project = inject('project')
const attr_name = ref('')
const attr_value = ref('')
const add_attr = ref(false)

const element = computed(() => {
  return project.value.find(state.value.current_element)
})

const changeElement = (key) => {
  state.value.current_element = key
}

const checkKeyDownAlphaNumeric = (event) => {
  if (!/[a-zA-Z0-9_\s]/.test(event.key)) {
    event.target.ignoredValue = event.key ? event.key : ''
    event.preventDefault()
  }
}

watch(
  () => project.value.root.value,
  () => {
    project.value.data.name = project.value.root.value
  }
)

const formatDateTime = (value) => {
  if (value) {
    return moment(String(value)).format('YYYY-MM-DD HH:mm')
  }
}

const addAttribute = () => {
  if (attr_name.value.length == 0 || attr_value.value.length == 0) {
    notify({
      type: 'error',
      title: 'Error',
      text: 'You must enter the fields: "name" and "value"!',
    })
  } else {
    var obj = {}
    obj[attr_name.value] = attr_value.value
    element.value.attributes = { ...element.value.attributes, ...obj }
    attr_name.value = ''
    attr_value.value = ''
    add_attr.value = false
    state.value.work_panel = ''
    setTimeout(() => {
      state.value.work_panel = 'PROJECT'
    }, 10)
  }
}

const deleteAttribute = () => {
  if (attr_name.value.length == 0) {
    notify({
      type: 'error',
      title: 'Error',
      text: 'You must enter the field: "name"!',
    })
  } else {
    delete element.value.attributes[attr_name.value]
    attr_name.value = ''
    attr_value.value = ''
    add_attr.value = false
  }
}

const changeAttribute = (key, value) => {
  add_attr.value = true
  attr_name.value = key
  attr_value.value = value
}

const deleteElement = () => {
  project.value.remove(state.value.current_element)
  state.value.current_element = ''
}
</script>
