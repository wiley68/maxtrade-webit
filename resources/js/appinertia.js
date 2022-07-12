import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'
import Layout from './Shared/Layout.vue'

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: async (name) => {
    let page = (await import(`./Pages/${name}.vue`)).default
    page.layout ??= Layout
    return page
  },
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .mount(el)
  },
})

InertiaProgress.init({ color: 'red', showSpinner: true })
