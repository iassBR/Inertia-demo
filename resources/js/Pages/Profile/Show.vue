<template>
  <authenticated>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Perfil</h2>
    </template>

    <!-- Dados Pessoais -->
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <dados-pessoais :user="user"></dados-pessoais>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Alterar Senha -->
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <alterar-senha :user="user"></alterar-senha>
          </div>
        </div>
      </div>
    </div>

  </authenticated>
</template>


<script>
import Authenticated from "../../Layouts/Authenticated";
import AlterarSenha from "./AlterarSenha.vue";
import DadosPessoais from "./DadosPessoais";

export default {
  components: {
    Authenticated,
    DadosPessoais,
    AlterarSenha,
  },
  data() {
    return { user: this.$page.props.auth.user };
  },
};
</script>