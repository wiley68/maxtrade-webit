<template>
  <div
    class="bg-1 hidden md:flex md:flex-col md:justify-between w-full h-full text-gray-500"
  >
    <div id="libraries" ref="libraries">
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
      <div class="flex-grow bg-1">libraries content</div>
    </div>
    <div id="separator" ref="separator">
      <svg class="h-4 text-gray-400" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"
        />
      </svg>
    </div>
    <div id="elements" ref="elements">
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
      <div class="flex-grow bg-1">elements tree content</div>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted, ref } from 'vue'

const state = inject('state')
const libraries = ref(null)
const elements = ref(null)
const separator = ref(null)

function dragElement(element) {
  var md

  element.onmousedown = onMouseDown

  function onMouseDown(e) {
    md = {
      e,
      offsetLeft: element.offsetLeft,
      offsetTop: element.offsetTop,
      firstHeight: libraries.value.offsetHeight,
      secondHeight: elements.value.offsetHeight,
    }

    document.onmousemove = onMouseMove
    document.onmouseup = () => {
      document.onmousemove = document.onmouseup = null
    }
  }

  function onMouseMove(e) {
    var delta = { x: e.clientX - md.e.clientX, y: e.clientY - md.e.clientY }

    delta.y = Math.min(Math.max(delta.y, -md.firstHeight), md.secondHeight)

    element.style.top = md.offsetTop + delta.y + 'px'
    libraries.value.style.height = md.firstHeight + delta.y + 'px'
    elements.value.style.height = md.secondHeight - delta.y + 'px'
  }
}

const librariesFullScreen = () => {
  libraries.value.style.height = '100%'
  elements.value.style.height = '24px'
}

const librariesRestoreScreen = () => {
  libraries.value.style.height = '50%'
  elements.value.style.height = '50%'
}

const elementsFullScreen = () => {
  elements.value.style.height = '100%'
  libraries.value.style.height = '24px'
}

const elementsRestoreScreen = () => {
  libraries.value.style.height = '50%'
  elements.value.style.height = '50%'
}

onMounted(() => {
  dragElement(separator.value)
})
</script>

<style scoped>
#libraries {
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
#separator {
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: row-resize;
  background-color: #e4e4e4;
  width: 100%;
  height: 6px;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#elements {
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
</style>
