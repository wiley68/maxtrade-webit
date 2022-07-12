<template>
  <h1>dashboard</h1>
  <Link :href="route('logout')" method="post" as="button"> logout </Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>
