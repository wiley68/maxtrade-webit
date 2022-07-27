<template>
  <div class="bg-white w-full h-full"><h1>Dashboard</h1></div>
</template>

<script setup>
import { inject, onMounted } from 'vue'

const state = inject('state')

onMounted(() => {
  state.value.show_explorer = false
  state.value.show_properties = false
})
</script>
