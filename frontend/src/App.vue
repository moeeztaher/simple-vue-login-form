<template>
  <div class="flex flex-row min-h-screen">
    <!-- Sidebar -->
    <header class="bg-gray-900 text-white w-64 flex-shrink-0" :class="{ 'hidden': !showSidebar }">
      <div class="flex justify-between items-center px-4 py-3">
        <h1 class="text-xl font-bold">Menu</h1>
        <button @click="showSidebar = false" class="text-white focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
            </path>
          </svg>
        </button>
      </div>
      <nav class="px-4 py-2">
        <ul>
          <li>
            <a @click="newForm" class="block text-gray-300 cursor-pointer hover:text-white py-2">
              New Form
            </a>
          </li>
          <li>
            <a @click="formViewer" class="block text-gray-300 cursor-pointer hover:text-white py-2">
              Form Viewer
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="flex-grow mb-0" >
      <button @click="showSidebar = !showSidebar"
        class="block w-12 h-12 text-gray-500 hover:text-white focus:text-white focus:outline-none">
        <svg class="w-6 h-6 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
import router from './router';
export default {
  data() {
    return {
      showSidebar: false
    }
  },
  methods: {
    formViewer() {
      router.push({ path: 'Login' })
    },
    newForm() {
      router.push({ path: 'NewForm' })
    }
  }
}
</script>
<style scoped>
/* Styles for the expand button */
button:focus-visible {
  outline: none;
}

button:focus-visible>svg {
  stroke: white;
}</style>
