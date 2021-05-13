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
          :message="'Salvo com sucesso !'"
        />
        <!-- Lista de Tarefas -->
        <fieldset>
          <div class="mt-4 space-y-4">
            <div
              v-for="(tarefa, index) in projeto.tarefas"
              :key="index"
              class="flex items-start"
            >
              <!-- ItemLista exibir descrição -->
              <div class="flex" v-show="!tarefa.editando">
                <!-- CheckBox -->
                <div class="flex items-center h-5">
                  <input
                    @click.prevent="completar(tarefa)"
                    name="completado"
                    type="checkbox"
                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                    v-model="tarefa.completado"
                  />
                </div>
                <!-- Descrição -->
                <div class="ml-3 text-sm">
                  <label for="tarefa" class="font-medium text-gray-700">{{
                    tarefa.descricao
                  }}</label>
                </div>

                <!-- Editar tarefa -->
                <a
                  class="text-indigo-600 hover:text-indigo-900"
                  @click.prevent="editTarefa(tarefa)"
                  :href="'#'"
                >
                  <svg
                    class="ml-1 h-5 w-5 text-gray-900 hover:text-indigo-900"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </a>
              </div>
              <!-- Input para editar a tarefa -->
              <div class="flex items-center" v-show="tarefa.editando">
                <breeze-input
                  :id="tarefa.id"
                  type="text"
                  class="items-center block mt-1 w-full"
                  autofocus
                  v-model="formTarefa.descricao"
                />
                <breeze-input-error
                  v-if="formTarefa.errors.descricao"
                  :message="formTarefa.errors.descricao"
                />

                <a
                  @click.prevent="updateTarefa(tarefa)"
                  class="text-indigo-600 hover:text-indigo-900"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ml-1 h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 13l4 4L19 7"
                    />
                  </svg>
                </a>
                <a @click.prevent="cancelarEditTarefa(tarefa)">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ml-1 h-6 w-6 text-red-600 hover:text-red-900"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </fieldset>
        <!-- Nova Tarefa -->
        <form @submit.prevent="submit">
          <div class="mt-5 grid grid-cols-6">
            <div class="col-span-6">
              <!-- Descrição -->
              <breeze-label
                for="descricao"
                value="Adicionar Tarefa"
                class="block"
              />
              <div class="inline-flex items-center">
                <breeze-input
                  id="descricao"
                  type="text"
                  class="items-center block mt-1 w-full"
                  autofocus
                  v-model="form.descricao"
                />
                <breeze-button
                  :class="{ 'opacity-25': form.processing }"
                  class="inline-flex items-center ml-1"
                  :disabled="form.processing"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0"
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
                </breeze-button>
              </div>
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
import BreezeButton from "@/Components/Button";
import BreezeInputError from "@/Components/InputError";
import RecentlySuccessful from "@/Components/RecentlySuccessful";

export default {
  props: {
    projeto: Object,
    tarefas: Object,
  },
  components: {
    BreezeInput,
    BreezeLabel,
    BreezeInputError,
    RecentlySuccessful,
    BreezeButton,
  },
  data() {
    return {
      form: this.$inertia.form({
        descricao: "",
      }),
      tarefas: this.tarefas.map((projeto) => {
        return { ...projeto, editando: false };
      }),
      formTarefa: this.$inertia.form({
        descricao: "",
      }),

      showTarefaDescricao: true,
      showTarefaDescricaoEdit: false,
    };
  },
  mounted() {
  },
  methods: {
    submit() {
      this.form.post(
        this.route("projetos.tarefa", this.projeto),
        {
          onFinish: () => this.form.reset(),
        },
        {
          preserveScroll: true,
        },
        {
          resetOnSuccess: false,
        }
      );
    },
    completar(tarefa) {
      if (tarefa.completado == true) {
        this.form.delete(
          this.route("completar.tarefa", tarefa),
          { onFinish: () => console.log(this.tarefas) },
          {
            preserveScroll: true,
          },
          {
            resetOnSuccess: false,
          }
        );
      } else {
        this.form.post(
          this.route("completar.tarefa", tarefa),
          { onFinish: () => console.log(this.tarefas) },
          {
            preserveScroll: true,
          },
          {
            resetOnSuccess: false,
          }
        );
      }
    },
    editTarefa(tarefa) {
      console.log(this.tarefas);
      this.tarefas = this.tarefas.map((task) =>
        task.id == tarefa.id ? { ...task, editando: true } : task
      );

      this.formTarefa.descricao = tarefa.descricao;

      console.log(this.formTarefa);
    },
    cancelarEditTarefa(tarefa) {
      this.tarefas = this.tarefas.map((task) =>
        task.id == tarefa.id ? { ...task, editando: false } : task
      );
    },
    updateTarefa(tarefa) {
      this.formTarefa.put(this.route("projetos.update-tarefa", tarefa), {
        onFinish: () => {
          this.formTarefa.reset();
          this.cancelarEditTarefa(tarefa);
        },
      });
    },
  },
};
</script>