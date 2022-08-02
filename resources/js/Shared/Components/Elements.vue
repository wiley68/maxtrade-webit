<template>
  <div
    class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200"
  >
    <div class="mr-1 user-select-none">
      <svg class="w-4 h-4" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M3,3H9V7H3V3M15,10H21V14H15V10M15,17H21V21H15V17M13,13H7V18H13V20H7L5,20V9H7V11H13V13Z"
        />
      </svg>
    </div>
    <div
      class="flex-grow font-medium text-sm user-select-none select-none truncate"
    >
      ELEMENTS TREE
    </div>
    <button
      @click.stop="elementsFullScreen"
      class="hover:bg-gray-200 cursor-pointer"
      title="Full screen elements tree panel"
    >
      <svg class="w-5 h-5" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z"
        />
      </svg>
    </button>
    <button
      @click.stop="elementsRestoreScreen"
      class="hover:bg-gray-200 cursor-pointer"
      title="Restore size elements tree panel"
    >
      <svg class="w-5 h-5" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z"
        />
      </svg>
    </button>
  </div>
  <div id="elements_tree" class="p-1">
    <tree-menu
      :key_tree="project.root.key"
      :value="project.root.value"
      :children="project.root.children"
      :depth="0"
    ></tree-menu>
  </div>
</template>

<script setup>
import { inject } from 'vue'
import TreeMenu from '@/Components/TreeMenu.vue'

const project = inject('project')

const emit = defineEmits(['elementsFullScreen', 'elementsRestoreScreen'])
</script>
