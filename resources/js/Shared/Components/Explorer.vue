<template>
  <div class="bg-1 hidden md:flex md:flex-col md:justify-between w-64 h-full">
    <div id="libraries" ref="libraries">
      <div class="h-6">libraries</div>
      <div class="bg-red-200 flex-grow">libraries content</div>
    </div>
    <div id="separator" ref="separator"></div>
    <div id="elements" ref="elements">
      <div class="">elements tree</div>
      <div class="bg-green-200 flex-grow">elements tree content</div>
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
  background-color: red;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
#separator {
  cursor: row-resize;
  background-color: #aaa;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='10' height='30'><path d='M2 0 v30 M5 0 v30 M8 0 v30' fill='none' stroke='black'/></svg>");
  background-repeat: no-repeat;
  background-position: center;
  width: 100%;
  height: 10px;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#elements {
  background-color: green;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
</style>
