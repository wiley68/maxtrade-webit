<template>
  <div class="bg-1 hidden md:flex md:flex-col md:justify-between w-64 h-full">
    <div class="bg-red-300 flex flex-col" v-if="state.show_explorer_libraries">
      <div class="">libraries</div>
      <div class="bg-red-200">libraries content</div>
    </div>
    <div class="bg-green-300 flex flex-col" v-if="state.show_explorer_elements">
      <div class="">elements tree</div>
      <div class="bg-green-200">elements tree content</div>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'

const state = inject('state')
</script>
