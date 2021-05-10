<template>
  <authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projetos
      </h2>
    </template>

    <div class="p-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <flash-messages ></flash-messages>
      <span class="flex rounded-md justify-end mb-5">
        <inertia-link
          :href="route('projetos.create')"
          type="button"
          class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            />
          </svg>
          Novo Projeto
        </inertia-link>
      </span>

      <div
        v-for="(projeto, index) in projetos"
        :key="index"
        class="bg-white p-6 rounded-lg shadow-lg"
      >
        <h2 class="text-2xl font-bold mb-2 text-gray-800">
          {{ projeto.titulo }}
        </h2>
        <p class="text-gray-700">{{projeto.descricao}}</p>
      </div>
    </div>
  </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import FlashMessages from "@/Components/FlashMessages";
export default {
  components: {
    AuthenticatedLayout,
    FlashMessages
  },

  props: {
    projetos: Array,
  },

    mounted() {
    console.log(this.$page);
  },
};
</script>