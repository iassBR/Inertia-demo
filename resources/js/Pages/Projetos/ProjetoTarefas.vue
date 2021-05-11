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
        <fieldset>
          <div class="mt-4 space-y-4">
            <div
              v-for="(tarefa, index) in projeto.tarefas"
              :key="index"
              class="flex items-start"
            >
              <div class="flex items-center h-5">
                <input
                  @click.prevent="completar(tarefa)"
                  name="completado"
                  type="checkbox"
                  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                  v-model="tarefa.completado"
                />
              </div>
              <div class="ml-3 text-sm">
                <label for="tarefa" class="font-medium text-gray-700">{{
                  tarefa.descricao
                }}</label>
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
                <breeze-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
                </breeze-button>
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
import BreezeButton from "@/Components/Button";
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
    RecentlySuccessful,
    BreezeButton,
  },
  data() {
    return {
      form: this.$inertia.form({
        descricao: "",
      }),
    };
  },
  mounted() {
    console.log("montou");
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
          {
            preserveScroll: true,
          },
          {
            resetOnSuccess: false,
          }
        );
      }
    },
  },
};
</script>