<template>
  <Head :title="$page.component"></Head>
  <div class="w-full h-screen flex flex-col">
    <Menu></Menu>
    <!-- body -->
    <div class="flex items-center w-full flex-grow">
      <!-- left sidebar -->
      <div class="bg-g-100 hidden md:flex w-48 h-full">
        <!-- left sidebar menu -->
        <div class="bg-g-300 w-12">lsm</div>
        <!-- left sidebar component -->
        <div class="flex-grow">lsc</div>
      </div>
      <!-- work panel -->
      <div class="flex-grow flex flex-col h-full">
        <!-- work panel menu -->
        <div class="bg-g-100 h-8">work panel menu</div>
        <!-- work panel body -->
        <div class="flex-grow">
          <slot></slot>
        </div>
      </div>
      <!-- right sidebar -->
      <div class="bg-g-100 hidden md:flex flex-col w-64 h-full">
        right sidebar
      </div>
    </div>
  </div>

  <!-- <slot></slot> -->
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import Menu from './Components/Menu.vue'
</script>

<style scoped>
.bg-g-300 {
  background-color: #e5e5e5;
}
.bg-g-200 {
  background-color: #ececec;
}
.bg-g-100 {
  background-color: #f3f3f3;
}
</style>
