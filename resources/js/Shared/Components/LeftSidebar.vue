<template>
  <div class="bg-gray-100 hidden md:flex w-48 h-full">
    <LeftSidebarMenu></LeftSidebarMenu>
    <LeftSidebarComponent></LeftSidebarComponent>
  </div>
</template>

<script setup>
import LeftSidebarMenu from './LeftSidebarMenu.vue'
import LeftSidebarComponent from './LeftSidebarComponent.vue'
</script>
