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
              <form @submit.prevent="submit">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <!-- Título -->
                        <breeze-label for="titulo" value="Título" />
                        <breeze-input
                          id="titulo"
                          type="text"
                          class="mt-1 block w-full"
                          autofocus
                          v-model="form.titulo"
                        />
                        <breeze-input-error
                          v-if="form.errors.titulo"
                          :message="form.errors.titulo"
                        />
                      </div>

                      <!-- Descrição -->
                      <div class="col-span-6">
                        <breeze-label for="descricao" value="Descrição" />
                        <textarea
                          name="descricao"
                          id="descricao"
                          class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                          cols="30"
                          rows="10"
                          v-model="form.descricao"
                        ></textarea>
                       
                        <breeze-input-error
                          v-if="form.errors.descricao"
                          :message="form.errors.descricao"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <breeze-button
                      class="ml-4"
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing"
                    >
                      Salvar
                    </breeze-button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeLabel from "@/Components/Label";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";

export default {
  components: {
    AuthenticatedLayout,
    BreezeInput,
    BreezeLabel,
    BreezeInput,
    BreezeButton,
    BreezeInputError,
  },

  data() {
    return {
      form: this.$inertia.form({
        titulo: "",
        descricao: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route('projetos.store'));
    },
  },
};
</script>