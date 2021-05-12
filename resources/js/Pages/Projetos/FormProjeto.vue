<template>
  <div>
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
          <div class="grid grid-cols-6 gap-6">
            <!-- Título -->
            <div class="col-span-6">
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
</template>

<script>
import BreezeLabel from "@/Components/Label";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
export default {
  components: {
    BreezeInput,
    BreezeLabel,
    BreezeInput,
    BreezeButton,
    BreezeInputError,
  },

  props: {
    projeto: null,
    store: Boolean,
  },

  data() {
    return {
      form: this.$inertia.form({
        titulo: this.projeto != null ? this.projeto.titulo : '',
        descricao: this.projeto != null ? this.projeto.descricao : '',
      }),
    };
  },

  methods: {
    submit() {
      if (this.store == true) {
        this.form.post(this.route("projetos.store"));
      }else {
            this.form.put(this.route("projetos.update", this.projeto));
      }
    },
  },
};
</script>