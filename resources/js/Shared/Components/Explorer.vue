<template>
  <div class="bg-1 hidden md:flex md:flex-col md:justify-between w-64 h-full">
    <div id="libraries" ref="libraries">
      <div class="h-6">libraries</div>
      <div class="flex-grow">libraries content</div>
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
      <div class="">elements tree</div>
      <div class="flex-grow">elements tree content</div>
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

onMounted(() => {
  dragElement(separator.value)
})
</script>

<style scoped>
#libraries {
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
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
</style>
