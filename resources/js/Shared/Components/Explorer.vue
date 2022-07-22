<template>
  <div
    ref="explorer_panel"
    class="bg-1 hidden md:flex md:flex-col md:justify-between w-64 h-full"
  >
    <div
      class="bg-red-300 flex flex-col"
      :style="{ height: explorer_panel_libraries_h + 'px' }"
      v-if="state.show_explorer_libraries"
    >
      <div class="">libraries</div>
      <div class="bg-red-200 flex-grow">libraries content</div>
    </div>
    <div
      class="bg-2 w-full flex-grow cursor-row-resize"
      @mousedown="explorerStart"
      @mousemove="explorerMove"
    ></div>
    <div
      class="bg-green-300 flex flex-col"
      :style="{ height: explorer_panel_elements_h + 'px' }"
      v-if="state.show_explorer_elements"
    >
      <div class="">elements tree</div>
      <div class="bg-green-200 flex-grow">elements tree content</div>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted, ref } from 'vue'

const state = inject('state')

const explorer_panel = ref(null)
const explorer_panel_libraries_h = ref(0)
const explorer_panel_elements_h = ref(0)
const explorer_change = ref(false)
const explorer_change_y = ref(0)

onMounted(() => {
  window.addEventListener('mouseup', () => {
    explorer_change.value = false
    explorer_change_y.value = 0
  })
  explorer_panel_libraries_h.value = (explorer_panel.value.clientHeight - 3) / 2
  explorer_panel_elements_h.value = (explorer_panel.value.clientHeight - 3) / 2
})

const explorerStart = (e) => {
  explorer_change.value = true
  explorer_change_y.value = e.clientY
}

const explorerMove = (e) => {
  if (explorer_change.value) {
    const currentY = e.clientY - explorer_change_y
    console.log(currentY)
  }
}
</script>
