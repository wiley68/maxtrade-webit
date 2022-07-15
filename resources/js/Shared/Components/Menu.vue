<template>
  <div class="flex items-center w-full h-7 bg-g-300">
    <div id="menu_container">
      <ul id="menu">
        <li>
          <a href="#">File</a>
          <ul>
            <li><a :href="route('index')" @click="logout()">Exit</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Help</a>
          <ul>
            <li><a href="#">About</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({})
const logout = () => {
  form.post(route('logout'))
}
</script>

<style scoped>
#menu_container {
  position: relative;
  height: 100%;
  width: 100%;
}
#menu_container:after {
  content: '';
  display: block;
  clear: both;
  height: 0;
}
#menu {
  position: relative;
  float: left;
  width: 100%;
  padding: 0 3rem;
  background: #e5e5e5;
}
#menu,
#menu ul {
  list-style: none;
}
#menu > li {
  float: left;
  position: relative;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  box-shadow: 1px 0 0 rgba(255, 255, 255, 0.25);
  perspective: 1000px;
}
#menu > li:first-child {
  border-left: 1px solid rgba(255, 255, 255, 0.25);
  box-shadow: -1px 0 0 rgba(0, 0, 0, 0.1), 1px 0 0 rgba(255, 255, 255, 0.25);
}
#menu a {
  display: block;
  position: relative;
  z-index: 10;
  padding: 8px;
  text-decoration: none;
  color: #4b5563;
  line-height: 1;
  font-size: 14px;
  letter-spacing: -0.05em;
  background: transparent;
  transition: all 0.25s ease-in-out;
}
#menu > li:hover > a {
  background: #f3f3f3;
}
#menu li ul {
  position: absolute;
  left: 0;
  z-index: 1;
  width: 200px;
  padding: 0;
  opacity: 0;
  visibility: hidden;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  background: transparent;
  overflow: hidden;
  transform-origin: 50% 0%;
}
#menu li:hover ul {
  padding: 5px 0;
  background: #f3f3f3;
  opacity: 1;
  visibility: visible;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}
#menu li li a {
  padding-left: 15px;
  padding-top: 6px;
  padding-bottom: 6px;
  font-weight: 400;
  color: #4b5563;
  border-top: dotted 1px transparent;
  border-bottom: dotted 1px #ececec;
  transition: all 0.15s linear;
}
#menu li li a:hover {
  border-top: dotted 1px #60a5fa;
  border-bottom: dotted 1px #60a5fa;
  background: #3b82f6;
  color: #f3f4f6;
}
</style>
