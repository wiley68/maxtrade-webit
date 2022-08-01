<template>
  <div class="bg-1 flex justify-between items-center w-full h-10 mb-0.5">
    <div id="menu_container">
      <ul id="menu">
        <li>
          <Link
            :href="route('dashboard')"
            as="logo"
            title="Go to Dashboard"
            class="flex justify-center items-center w-12 h-10 cursor-pointer group"
          >
            <svg
              class="w-6 h-6 text-sky-600 group-hover:text-sky-800"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="M22.7 14.4L21.7 15.4L19.6 13.3L20.6 12.3C20.8 12.1 21.2 12.1 21.4 12.3L22.7 13.6C22.9 13.8 22.9 14.1 22.7 14.4M13 19.9L19.1 13.8L21.2 15.9L15.1 22H13V19.9M11 19.9V19.1L11.6 18.5L12.1 18H8V16H6V8H8V6H16V8H18V12.1L19.1 11L19.3 10.8C19.5 10.6 19.8 10.4 20.1 10.3V8H22.1V2H16.1V4H8V2H2V8H4V16H2V22H8V20L11 19.9M18 4H20V6H18V4M4 4H6V6H4V4M6 20H4V18H6V20Z"
              />
            </svg>
          </Link>
        </li>
        <li>
          <button>File</button>
          <ul>
            <li>
              <Link
                :href="route('dashboard')"
                as="button"
                class="w-full text-left"
                >Open Dashboard</Link
              >
            </li>
            <li>
              <a :href="route('index')" as="button" @click="logout()">Exit</a>
            </li>
          </ul>
        </li>
        <li>
          <button>Project</button>
          <ul>
            <li>
              <Link
                v-if="$page.component === 'Dashboard'"
                :href="route('project.new')"
                method="post"
                as="button"
                class="w-full text-left"
              >
                <div class="flex justify-start items-center">
                  <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <path
                      fill="currentColor"
                      d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z"
                    /></svg
                  ><span class="ml-1">New Project</span>
                </div>
              </Link>
            </li>
            <li>
              <Link
                v-if="project.root.value.length !== 0"
                :href="route('app')"
                as="button"
                class="w-full text-left"
                >Edit Current Project</Link
              >
            </li>
            <li>
              <button
                v-if="
                  $page.component === 'App' && project.root.value.length !== 0
                "
                @click.stop="saveProject()"
                type="button"
                class="w-full text-left"
              >
                Save Current Project
              </button>
            </li>
            <li>
              <button
                v-if="
                  $page.component === 'Dashboard' &&
                  project.root.value.length !== 0
                "
                @click.stop="cloneProject()"
                type="button"
                class="w-full text-left"
              >
                Clone Current Project
              </button>
            </li>
            <li>
              <button
                v-if="project.root.value.length !== 0"
                @click.stop="deleteProjectCheck()"
                type="button"
                class="w-full text-left"
              >
                Delete Current Project
              </button>
            </li>
          </ul>
        </li>
        <li>
          <button>View</button>
          <ul>
            <li v-if="$page.component === 'App'">
              <button @click.stop="toggleExplorer">
                <div
                  class="flex items-center text-gray-600 hover:text-gray-100"
                >
                  <svg
                    v-if="state.show_explorer"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"
                    />
                  </svg>
                  <div v-else class="w-4 h-4"></div>
                  <span class="ml-1">Explorer</span>
                </div>
              </button>
            </li>
            <li v-if="$page.component === 'App'">
              <button
                @click.stop="state.show_properties = !state.show_properties"
              >
                <div
                  class="flex items-center text-gray-600 hover:text-gray-100"
                >
                  <svg
                    v-if="state.show_properties"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"
                    />
                  </svg>
                  <div v-else class="w-4 h-4"></div>
                  <span class="ml-1">Properties</span>
                </div>
              </button>
            </li>
            <li>
              <Link :href="route('app')" as="button">
                <div
                  class="flex items-center text-gray-600 hover:text-gray-100"
                >
                  <svg
                    v-if="$page.component === 'App'"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"
                    />
                  </svg>
                  <div v-else class="w-4 h-4"></div>
                  <span class="ml-1">Application</span>
                </div>
              </Link>
            </li>
            <li>
              <Link :href="route('dashboard')" as="button">
                <div
                  class="flex items-center text-gray-600 hover:text-gray-100"
                >
                  <svg
                    v-if="$page.component === 'Dashboard'"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"
                    />
                  </svg>
                  <div v-else class="w-4 h-4"></div>
                  <span class="ml-1">Dashboard</span>
                </div>
              </Link>
            </li>
          </ul>
        </li>
        <li>
          <button>Help</button>
          <ul>
            <li><button>About</button></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="w-1/3 flex flex-col">
      <div class="w-full text-sm text-gray-600 text-center">
        <span class="font-medium">{{ project.find('project').value }}</span>
        <span class="text-gray-400">
          - Maxtrade Webit [{{ $page.props.auth.user.name }}]</span
        >
      </div>
      <div class="w-full text-xs text-gray-500 text-center truncate">
        {{ project.find('project').description }}
      </div>
    </div>
    <div class="w-1/3 flex justify-end items-center">
      <button
        v-if="$page.component === 'App'"
        @click.stop="toggleExplorer"
        class="cursor-pointer mr-0.5"
        title="Toggle explorer bar"
      >
        <svg
          class="w-5 h-5 hover:text-gray-500"
          :class="state.show_explorer ? 'text-gray-500' : 'text-gray-300'"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="M21.71 20.29L20.29 21.71A1 1 0 0 1 18.88 21.71L7 9.85A3.81 3.81 0 0 1 6 10A4 4 0 0 1 2.22 4.7L4.76 7.24L5.29 6.71L6.71 5.29L7.24 4.76L4.7 2.22A4 4 0 0 1 10 6A3.81 3.81 0 0 1 9.85 7L21.71 18.88A1 1 0 0 1 21.71 20.29M2.29 18.88A1 1 0 0 0 2.29 20.29L3.71 21.71A1 1 0 0 0 5.12 21.71L10.59 16.25L7.76 13.42M20 2L16 4V6L13.83 8.17L15.83 10.17L18 8H20L22 4Z"
          />
        </svg>
      </button>
      <button
        v-if="$page.component === 'App'"
        @click.stop="state.show_properties = !state.show_properties"
        class="ml-2 mr-2 cursor-pointer"
        title="Toggle properties bar"
      >
        <svg
          class="w-5 h-5 hover:text-gray-500"
          :class="state.show_properties ? 'text-gray-500' : 'text-gray-300'"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"
          />
        </svg>
      </button>
    </div>
  </div>
  <ModalBlank
    id="danger-modal"
    :modalOpen="deleteProjectModal"
    @close-modal="deleteProjectModal = false"
  >
    <div class="p-5 flex space-x-4">
      <div
        class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-red-100"
      >
        <svg
          class="w-4 h-4 shrink-0 fill-current text-red-600"
          viewBox="0 0 16 16"
        >
          <path
            d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"
          />
        </svg>
      </div>
      <div>
        <div class="mb-2">
          <div class="text-lg font-semibold text-gray-800">Attention!</div>
        </div>
        <!-- Modal content -->
        <div class="text-sm mb-10">
          <div class="space-y-2">
            <p>
              Do you want to delete the project? The action is irreversible!
            </p>
          </div>
        </div>
        <div class="flex flex-wrap justify-end space-x-2">
          <button
            class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            @click.stop="deleteProjectModal = false"
          >
            Cancel
          </button>
          <button
            class="ml-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            @click.stop="deleteProject()"
          >
            Delete
          </button>
        </div>
      </div>
    </div>
  </ModalBlank>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import { inject, ref } from 'vue'
import ModalBlank from '@/Components/ModalBlank.vue'
import { Tree } from '@/Components/project'

const state = inject('state')
const project = inject('project')
const form = useForm({})
const logout = () => {
  form.post(route('logout'))
}
const deleteProjectModal = ref(false)

const deleteProjectCheck = () => {
  deleteProjectModal.value = true
}

const deleteProject = () => {
  deleteProjectModal.value = false
  const form = useForm({
    id: project.value.data.id,
  })
  form.post('/project/delete', {
    onSuccess: () => {
      project.value = new Tree('project', '')
      Inertia.visit('/dashboard')
    },
  })
}

const saveProject = () => {
  const form = useForm({
    id: project.value.data.id,
    name: project.value.data.name,
    user_id: project.value.data.user_id,
    created_at: project.value.data.created_at,
    updated_at: project.value.data.updated_at,
    type: project.value.data.type,
    project: '{"root":' + JSON.stringify(project.value.root, null, 2) + '}',
  })
  form.post('/project/save')
}

const cloneProject = () => {
  const form = useForm({
    id: project.value.data.id,
  })
  form.post('/project/clone')
}

const toggleExplorer = () => {
  state.value.show_explorer = !state.value.show_explorer
}
</script>

<style scoped>
#menu_container {
  position: relative;
  height: 100%;
  width: 33.333333%;
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
  height: 100%;
  padding: 0px;
}
#menu,
#menu ul {
  list-style: none;
}
#menu > li {
  float: left;
  position: relative;
}
#menu > li:nth-child(2) {
  border-left: 1px solid #e4e4e4;
}
#menu button {
  display: block;
  position: relative;
  z-index: 10;
  padding: 13px;
  text-decoration: none;
  color: #6b7280;
  line-height: 1;
  font-size: 14px;
  letter-spacing: -0.05em;
  background: transparent;
}
#menu a {
  display: block;
  position: relative;
  z-index: 10;
  padding: 13px;
  text-decoration: none;
  color: #6b7280;
  line-height: 1;
  font-size: 14px;
  letter-spacing: -0.05em;
  background: transparent;
}
#menu > li:hover > button {
  background: #e4e4e4;
  color: #1f2937;
}
#menu > li:hover > a {
  background: #e4e4e4;
  color: #1f2937;
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
  background: #f3f4f6;
  opacity: 1;
  visibility: visible;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}
#menu li li button {
  padding-left: 15px;
  padding-top: 6px;
  padding-bottom: 6px;
  font-weight: 400;
  color: #4b5563;
  border-top: dotted 1px transparent;
  border-bottom: dotted 1px #e5e7eb;
  margin-left: 1px;
  margin-right: 1px;
}
#menu li li a {
  padding-left: 15px;
  padding-top: 6px;
  padding-bottom: 6px;
  font-weight: 400;
  color: #4b5563;
  border-top: dotted 1px transparent;
  border-bottom: dotted 1px #e5e7eb;
  margin-left: 1px;
  margin-right: 1px;
}
#menu li li button:hover {
  width: 100%;
  text-align: left;
  border-top: dotted 1px #2563eb;
  border-bottom: dotted 1px #2563eb;
  background: #0284c7;
  margin-left: 1px;
  margin-right: 1px;
  color: #f3f4f6;
}
#menu li li a:hover {
  width: 100%;
  text-align: left;
  border-top: dotted 1px #2563eb;
  border-bottom: dotted 1px #2563eb;
  background: #0284c7;
  margin-left: 1px;
  margin-right: 1px;
  color: #f3f4f6;
}
</style>
