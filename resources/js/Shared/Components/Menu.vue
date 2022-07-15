<template>
  <div class="flex items-center w-full h-7 bg-g-300">
    <div class="container hidden md:block">
      <ul class="menu">
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
.container {
  position: relative;
  height: 100%;
  width: 100%;
}
.container:after {
  content: '';
  display: block;
  clear: both;
  height: 0;
}
.menu {
  position: relative;
  float: left;
  width: 100%;
  padding: 0 3rem;
  box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.5),
    inset 0 -1px 0 rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.1);
  background: #e5e5e5;
}
.menu,
.menu ul {
  list-style: none;
}
.menu > li {
  float: left;
  position: relative;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  box-shadow: 1px 0 0 rgba(255, 255, 255, 0.25);
  perspective: 1000px;
}
.menu > li:first-child {
  border-left: 1px solid rgba(255, 255, 255, 0.25);
  box-shadow: -1px 0 0 rgba(0, 0, 0, 0.1), 1px 0 0 rgba(255, 255, 255, 0.25);
}
.menu a {
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
.menu > li:hover > a {
  background: #d1d5db;
}
.menu li ul {
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
.menu li:hover ul {
  padding: 5px 0;
  background: #d1d5db;
  opacity: 1;
  visibility: visible;
  box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.5);
  animation-name: swingdown;
  animation-duration: 1s;
  animation-timing-function: ease;
}
@keyframes swingdown {
  0% {
    opacity: 0.99999;
    transform: rotateX(90deg);
  }
  30% {
    transform: rotateX(-20deg) rotateY(5deg);
    animation-timing-function: ease-in-out;
  }
  65% {
    transform: rotateX(20deg) rotateY(-3deg);
    animation-timing-function: ease-in-out;
  }
  100% {
    transform: rotateX(0);
    animation-timing-function: ease-in-out;
  }
}
.menu li li a {
  padding-left: 15px;
  font-weight: 400;
  color: #4b5563;
  border-top: dotted 1px transparent;
  border-bottom: dotted 1px transparent;
  transition: all 0.15s linear;
}
.menu li li a:hover {
  border-top: dotted 1px #f3f4f6;
  border-bottom: dotted 1px #f3f4f6;
  background: #e5e5e5;
}
</style>
