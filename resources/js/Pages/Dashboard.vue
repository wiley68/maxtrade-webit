<template>
  <h1>dashboard</h1>
  <a :href="route('index')" @click="logout()"> logout </a>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({})
const logout = () => {
  form.post(route('logout'))
}
</script>
