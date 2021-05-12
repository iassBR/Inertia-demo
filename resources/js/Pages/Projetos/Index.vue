<template>
  <authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projetos
      </h2>
    </template>

    <div class="p-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <flash-messages></flash-messages>
     
      <create-button :text="'Novo Projeto'" :href="route('projetos.create')"></create-button>

      <projeto-card
        v-for="(projeto, index) in projetos.data"
        :key="index"
        :projeto="projeto"
      ></projeto-card>
      <pagination :links="projetos.links" />
    </div>
    
  </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import FlashMessages from "@/Components/FlashMessages";
import ProjetoCard from "./ProjetoCard";
import Pagination from '@/Components/Pagination';
import  CreateButton from '@/Components/CreateButton';

export default {
  components: {
    AuthenticatedLayout,
    FlashMessages,
    ProjetoCard,
    Pagination,
    CreateButton,
  },

  props: {
    projetos: Object,
  },

  mounted() {
    console.log("index", this.projetos.links);
  },
};
</script>