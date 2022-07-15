<template>
  <div class="bg-gray-100 hidden md:flex w-48 h-full">
    <LeftSidebarMenu></LeftSidebarMenu>
    <!-- left sidebar component -->
    <div
      class="flex flex-col items-center flex-grow border-r border-r-gray-200 pt-2"
    >
      <div class="">lang</div>
      <div class="">charset</div>
      <div class="">viewport</div>
      <div class="">title</div>
      <div class="">description</div>
      <div class="">keywords</div>
    </div>
  </div>
</template>

<script setup>
import LeftSidebarMenu from './LeftSidebarMenu.vue'
</script>
