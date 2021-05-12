<template>
  <authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cadastrar Projeto
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form-projeto :projeto="projeto" :store="false"></form-projeto>
            </div>
          </div>
        </div>
      </div>
    </div>
  </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import FormProjeto from "./FormProjeto";

export default {
  components: {
    AuthenticatedLayout,
    FormProjeto,
  },

  props: {
    projeto: Object,
  },
};
</script>