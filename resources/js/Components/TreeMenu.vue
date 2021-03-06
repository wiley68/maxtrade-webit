<template>
  <div v-if="value">
    <div
      class="flex items-center justify-between text-sm"
      :style="{ paddingLeft: depth * 10 + 'px' }"
    >
      <div
        v-if="children.length > 0"
        :class="iconClasses"
        @click="toggleChildren"
      ></div>
      <button
        class="flex-grow cursor-help text-left truncate hover:text-sky-600 border hover:border-sky-200 px-0.5 py-0 rounded hover:bg-white"
        :class="
          key_tree === state.current_element
            ? 'text-sky-600 border-sky-200 bg-white'
            : 'text-gray-500 border-gray-100 bg-gray-100'
        "
        @click.stop="changeElement"
      >
        {{ value }}{{ depth === 0 ? ' [root]' : '' }}
      </button>
      <div
        v-if="key_tree == 'project'"
        class="flex justify-center items-center"
      >
        <button
          class="hover:bg-gray-200 cursor-pointer"
          title="Shrink all"
          @click.stop="showChildren = false"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z"
            />
          </svg>
        </button>
      </div>
      <button
        @click.stop="deleteElement()"
        v-if="key_tree !== 'project' && key_tree === state.current_element"
        title="Delete element"
      >
        <svg class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
          <path
            fill="currentColor"
            d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z"
          />
        </svg>
      </button>
    </div>
    <div v-if="showChildren">
      <tree-menu
        v-for="element in children"
        :key="element.key"
        :key_tree="element.key"
        :value="element.value"
        :children="element.children"
        :depth="depth + 1"
      >
      </tree-menu>
    </div>
  </div>
</template>

<script>
export default {
  name: 'tree-menu',
}
</script>

<script setup>
import { ref, computed, inject } from 'vue'

const state = inject('state')
const project = inject('project')

const props = defineProps({
  key_tree: String,
  value: String,
  children: Array,
  depth: Number,
})

const showChildren = ref(false)

const iconClasses = computed(() => {
  return {
    'elements-caret': !showChildren.value,
    'elements-caret-down': showChildren.value,
  }
})

const toggleChildren = () => {
  showChildren.value = !showChildren.value
}

const changeElement = () => {
  state.value.current_element = props.key_tree
}

const deleteElement = () => {
  project.value.remove(state.value.current_element)
  state.value.current_element = ''
}
</script>

<style scoped>
.elements-caret {
  content: '';
  filter: invert(45%) sepia(6%) saturate(856%) hue-rotate(182deg)
    brightness(95%) contrast(89%);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px;' viewBox='0 0 24 24'%3E%3Cpath fill='currentColor' d='M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z' /%3E%3C/svg%3E");
  display: inline-flex;
  background-size: 16px 16px;
  height: 16px;
  width: 16px;
  margin-right: 3px;
  cursor: pointer;
}
.elements-caret-down {
  content: '';
  filter: invert(45%) sepia(6%) saturate(856%) hue-rotate(182deg)
    brightness(95%) contrast(89%);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px' viewBox='0 0 24 24'%3E%3Cpath fill='currentColor' d='M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7,13H17V11H7' /%3E%3C/svg%3E");
  display: inline-flex;
  background-size: 16px 16px;
  height: 16px;
  width: 16px;
  margin-right: 3px;
  cursor: pointer;
}
</style>
