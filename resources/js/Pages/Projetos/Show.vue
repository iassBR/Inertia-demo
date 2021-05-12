<template>
  <authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projeto {{ projeto.titulo }}
      </h2>
    </template>

    <div class="p-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <flash-messages></flash-messages>
      <div
        class="bg-white p-6 rounded-lg flex items-center shadow hover:shadow-xl mb-5"
      >
        <div class="flex-grow p-2">
          <h2 class="text-2xl font-bold mb-2 text-gray-800">
            {{ projeto.titulo }}
          </h2>
          <p class="text-gray-700">{{ projeto.descricao }}</p>
          <p class="text-muted mt-1">{{ projeto.created_at }}</p>
        </div>
        <div class="p-2 flex items-start">
          <inertia-link :href="route('projetos.edit', projeto)" class="text-indigo-600 hover:text-indigo-900">
            <svg
              class="mr-1 h-6 w-6 text-gray-900 hover:text-indigo-900"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              aria-hidden="true"
            >
              <path
                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
              ></path>
            </svg>
          </inertia-link>
          <a href="#" class="text-red-600 hover:text-red-900 block">
            <svg
              class="mr-1 h-6 w-6 text-red-600 hover:text-red-900"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <projeto-tarefas :projeto="projeto"></projeto-tarefas>
  </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import FlashMessages from "@/Components/FlashMessages"
import ProjetoTarefas from './ProjetoTarefas.vue';
export default {
  components: {
    AuthenticatedLayout,
    ProjetoTarefas,
    FlashMessages
  },
  props: {
    projeto: Object,
  },
    mounted()  {
        // console.log( "show",this.projeto)  
    },
};
</script>