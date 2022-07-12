<template>
  <Head :title="$page.component"></Head>
  <h1>layout</h1>
  <slot></slot>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
</script>
