<template>
  <div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div
        class="bg-white p-6 rounded-lg items-center shadow hover:shadow-xl mb-5 col-span-2"
      >
        <h2 class="text-2xl font-semibold text-gray-800">Tarefas</h2>
        <p class="text-sm text-gray-500">
          As tarefas relacioanadas a esse projeto
        </p>
        <recently-successful
          v-if="form.recentlySuccessful"
          :message="'Tarefa cadastrada com sucesso !'"
        />
        <fieldset>
          <div class="mt-4 space-y-4">
            <div
              v-for="(tarefa, index) in tarefas"
              :key="index"
              class="flex items-start"
            >
              <div class="flex items-center h-5">
                <input
                  id="comments"
                  name="comments"
                  type="checkbox"
                  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                />
              </div>
              <div class="ml-3 text-sm">
                <label for="comments" class="font-medium text-gray-700">{{
                  tarefa.descricao
                }}</label>
                <!-- <p class="text-gray-500">
                 {{ tarefa.descricao }}
                </p> -->
              </div>
            </div>
          </div>
        </fieldset>
        <form @submit.prevent="submit">
          <div class="mt-5 grid grid-cols-6">
            <div class="col-span-3">
              <!-- Descrição -->
              <breeze-label for="descricao" value="Adicionar Tarefa" />
              <breeze-input
                id="descricao"
                type="text"
                class=" "
                autofocus
                v-model="form.descricao"
              />
              <span class="rounded-md justify-end ml-3">
                <inertia-link
                  :href="'#'"
                  @click.prevent="submit"
                  type="submit"
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
                </inertia-link>
              </span>
              <breeze-input-error
                v-if="form.errors.descricao"
                :message="form.errors.descricao"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
import RecentlySuccessful from "@/Components/RecentlySuccessful";

export default {
  props: {
    projeto: Object,
  },
  components: {
    BreezeInput,
    BreezeLabel,
    BreezeInputError,
    RecentlySuccessful
  },
  data() {
    return {
      tarefas: this.projeto.tarefas,
      form: this.$inertia.form({
        descricao: "",
      }),
    };
  },
    mounted()  {
        // console.log( "tarefas", this.projeto)  
    },
  methods: {
    submit() {
      this.form.post(this.route("projetos.tarefa", this.projeto));
    },
  },
};
</script>