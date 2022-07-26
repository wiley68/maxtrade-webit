<template>
  <div
    class="bg-1 hidden md:flex md:flex-col md:justify-between w-full h-full text-gray-500"
  >
    <div id="libraries" ref="libraries">
      <div
        class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200"
      >
        <div class="mr-1 user-select-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z"
            />
          </svg>
        </div>
        <div
          class="flex-grow font-medium text-sm user-select-none select-none truncate"
        >
          LIBRARIES
        </div>
        <button
          @click.stop="librariesFullScreen"
          class="hover:bg-gray-200 cursor-pointer"
          title="Full screen libraries panel"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z"
            />
          </svg>
        </button>
        <button
          @click.stop="librariesRestoreScreen"
          class="hover:bg-gray-200 cursor-pointer"
          title="Restore size libraries panel"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z"
            />
          </svg>
        </button>
      </div>
      <div class="flex-grow bg-1"></div>
    </div>
    <div id="separator" ref="separator">
      <svg class="h-4 text-gray-400" viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"
        />
      </svg>
    </div>
    <div id="elements" ref="elements">
      <div
        class="bg-1 h-6 flex items-center justify-between p-1 border-b border-b-gray-200"
      >
        <div class="mr-1 user-select-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M3,3H9V7H3V3M15,10H21V14H15V10M15,17H21V21H15V17M13,13H7V18H13V20H7L5,20V9H7V11H13V13Z"
            />
          </svg>
        </div>
        <div
          class="flex-grow font-medium text-sm user-select-none select-none truncate"
        >
          ELEMENTS TREE
        </div>
        <button
          @click.stop="elementsFullScreen"
          class="hover:bg-gray-200 cursor-pointer"
          title="Full screen elements tree panel"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z"
            />
          </svg>
        </button>
        <button
          @click.stop="elementsRestoreScreen"
          class="hover:bg-gray-200 cursor-pointer"
          title="Restore size elements tree panel"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24">
            <path
              fill="currentColor"
              d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z"
            />
          </svg>
        </button>
      </div>
      <div id="elements_tree" class="p-1">
        <tree-menu
          :key_tree="project.root.key"
          :value="project.root.value"
          :children="project.root.children"
          :depth="0"
        ></tree-menu>
      </div>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted, ref, watch } from 'vue'
import TreeMenu from '@/Components/TreeMenu.vue'

const state = inject('state')
const project = inject('project')
const libraries = ref(null)
const elements = ref(null)
const separator = ref(null)

function dragElement(element) {
  var md

  element.onmousedown = onMouseDown

  function onMouseDown(e) {
    md = {
      e,
      offsetLeft: element.offsetLeft,
      offsetTop: element.offsetTop,
      firstHeight: libraries.value.offsetHeight,
      secondHeight: elements.value.offsetHeight,
    }

    document.onmousemove = onMouseMove
    document.onmouseup = () => {
      document.onmousemove = document.onmouseup = null
    }
  }

  function onMouseMove(e) {
    var delta = { x: e.clientX - md.e.clientX, y: e.clientY - md.e.clientY }

    delta.y = Math.min(Math.max(delta.y, -md.firstHeight), md.secondHeight)

    element.style.top = md.offsetTop + delta.y + 'px'
    libraries.value.style.height = md.firstHeight + delta.y + 'px'
    elements.value.style.height = md.secondHeight - delta.y + 'px'
  }
}

const librariesFullScreen = () => {
  libraries.value.style.height = '100%'
  elements.value.style.height = '24px'
}

const librariesRestoreScreen = () => {
  libraries.value.style.height = '50%'
  elements.value.style.height = '50%'
}

const elementsFullScreen = () => {
  elements.value.style.height = '100%'
  libraries.value.style.height = '24px'
}

const elementsRestoreScreen = () => {
  libraries.value.style.height = '50%'
  elements.value.style.height = '50%'
}

onMounted(() => {
  dragElement(separator.value)
  //const tree = toHtml(project.value.root, true)
  //document.getElementById('elements_tree').appendChild(tree)
})

// const toggleElement = (element) => {
//   document
//     .getElementById('elements-ul')
//     .querySelectorAll('span')
//     .forEach((el) => {
//       el.classList.remove('elements-selected')
//     })
//   document
//     .getElementById('elements-ul')
//     .querySelectorAll('li')
//     .forEach((el) => {
//       el.classList.remove('elements-selected')
//     })
//   element.classList.toggle('elements-selected')
// }

// function toHtml(data, isRoot = true) {
//   const ul = document.createElement('ul')

//   if (isRoot) {
//     ul.id = 'elements-ul'
//   } else {
//     ul.classList.add('elements-nested')
//   }

//   let isVisible = isRoot
//   const li = document.createElement('li')
//   li.classList.add('cursor-pointer')
//   const text = document.createElement('span')

//   if (data.hasChildren) {
//     text.textContent = data.value
//     text.id = data.key
//     text.classList.add('elements-caret')
//     li.appendChild(text)
//     text.addEventListener('click', function () {
//       var nestedul = text.parentElement.childNodes
//       nestedul.forEach(function (element) {
//         if (element.classList.contains('elements-nested')) {
//           element.classList.toggle('elements-active')
//         }
//       })
//       text.classList.toggle('elements-caret-down')
//       state.value.current_element = data.key
//     })
//   } else {
//     li.innerText = data.value
//     li.id = data.key
//     li.addEventListener('click', function () {
//       state.value.current_element = data.key
//     })
//   }

//   if (data.hasChildren) {
//     data.children.forEach((element) => {
//       const children = toHtml(element, false)
//       li.appendChild(children)
//     })
//   }

//   if (isRoot) {
//     li.style.paddingLeft = '0px'
//   } else {
//     li.style.paddingLeft = '10px'
//   }

//   ul.appendChild(li)

//   return ul
// }

// watch(
//   () => state.value.current_element,
//   () => {
//     toggleElement(document.getElementById(state.value.current_element))
//   }
// )
</script>

<style>
ul,
#elements-ul {
  list-style-type: none;
}
#elements-ul {
  margin: 0;
  padding: 0;
}
.elements-caret {
  font-size: 14px;
  line-height: 20px;
  display: flex;
  align-items: center;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.elements-caret::before {
  content: '';
  filter: invert(45%) sepia(6%) saturate(856%) hue-rotate(182deg)
    brightness(95%) contrast(89%);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px;' viewBox='0 0 24 24'%3E%3Cpath fill='currentColor' d='M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z' /%3E%3C/svg%3E");
  display: inline-flex;
  background-size: 16px 16px;
  height: 16px;
  width: 16px;
  margin-right: 3px;
}
.elements-nested {
  display: none;
}
.elements-caret-down::before {
  content: '';
  filter: invert(45%) sepia(6%) saturate(856%) hue-rotate(182deg)
    brightness(95%) contrast(89%);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px' viewBox='0 0 24 24'%3E%3Cpath fill='currentColor' d='M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7,13H17V11H7' /%3E%3C/svg%3E");
}
.elements-active {
  display: flex;
  align-items: center;
}
.elements-selected {
  color: #0284c7;
}
</style>

<style scoped>
#libraries {
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
#separator {
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: row-resize;
  background-color: #e4e4e4;
  width: 100%;
  height: 6px;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#elements {
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  height: 50%;
  min-height: 24px;
}
</style>
