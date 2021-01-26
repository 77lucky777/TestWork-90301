export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Test Work 90301',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/axios'
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    'bootstrap-vue/nuxt',
    '@nuxtjs/axios',
    '@nuxtjs/auth-next'
  ],

  router: {
    middleware: ['auth']
  },

  auth: {
    redirect: {
      login: '/auth/login',
      logout: '/',
      callback: '/auth/login',
      home: '/book/list'
    },
    strategies: {
      local: {
        token: {
          property: 'token',
        },
        user: {
          property: 'user',
        },
        endpoints: {
          login: { url: 'http://127.0.0.1:8000/api/login', method: 'post' },
          logout: { url: 'http://127.0.0.1:8000/api/logout', method: 'post' },
          user: { url: 'http://127.0.0.1:8000/api/user', method: 'get' },
        }
      },
    }
  },

  axios: {
    // proxy: true,
    credentials: true,
    baseURL: 'http://localhost:8000/api/',
  },

  // proxy: {
  //   '/laravel': {
  //     target: 'https://laravel-auth.nuxtjs.app',
  //     pathRewrite: { '^/laravel': '/' }
  //   }
  // },

  bootstrapVue: {
    icons: true
  },
  

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
