<template>
  <div class="tree-menu">
    <div :style="indent" @click="toggleChildren">
      {{ key_tree }}
    </div>
    <tree-menu
      v-if="showChildren"
      v-for="node in children"
      :children="node.children"
      :key_tree="node.key"
      :depth="depth + 1"
    >
    </tree-menu>
  </div>
</template>
<script>
export default {
  props: ['key_tree', 'children', 'depth'],
  data() {
    return { showChildren: false }
  },
  name: 'tree-menu',
  computed: {
    iconClasses() {
      return {
        'fa-plus-square-o': !this.showChildren,
        'fa-minus-square-o': this.showChildren,
      }
    },
    labelClasses() {
      return { 'has-children': this.children }
    },
    indent() {
      return { transform: `translate(${this.depth * 10}px)` }
    },
  },
  methods: {
    toggleChildren() {
      this.showChildren = !this.showChildren
    },
  },
}
</script>
