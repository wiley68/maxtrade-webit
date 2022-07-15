<template>
  <Head :title="$page.component"></Head>
  <div class="w-full h-screen flex flex-col">
    <Menu></Menu>
    <div class="flex items-center w-full flex-grow">
      <LeftSidebar></LeftSidebar>
      <div class="flex-grow flex flex-col h-full">
        <WorkPanelMenu></WorkPanelMenu>
        <!-- work panel body -->
        <div class="flex-grow">
          <slot></slot>
        </div>
      </div>
      <RightSidebar></RightSidebar>
    </div>
  </div>

  <!-- <slot></slot> -->
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import Menu from './Components/Menu.vue'
import LeftSidebar from './Components/LeftSidebar.vue'
import RightSidebar from './Components/RightSidebar.vue'
import WorkPanelMenu from './Components/WorkPanelMenu.vue'
</script>
