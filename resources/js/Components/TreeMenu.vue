<template>
  <div>
    <div class="flex items-center text-sm" :style="indent">
      <div
        v-if="children.length > 0"
        :class="iconClasses"
        @click="toggleChildren"
      ></div>
      <div class="cursor-help">{{ value }}</div>
    </div>
    <tree-menu
      v-if="showChildren"
      v-for="element in children"
      :key_tree="element.key"
      :value="element.value"
      :children="element.children"
      :depth="depth + 1"
    >
    </tree-menu>
  </div>
</template>

<script>
export default {
  name: 'tree-menu',
}
</script>

<script setup>
import { ref, computed } from 'vue'

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

const indent = computed(() => {
  return { transform: `translate(${props.depth * 10}px)` }
})

const toggleChildren = () => {
  showChildren.value = !showChildren.value
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
