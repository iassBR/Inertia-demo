<template>
  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Dados pessoais
          </h3>
          <!-- <p class="mt-1 text-sm text-gray-600">
            This information will be displayed publicly so be careful what you
            share.
          </p> -->
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
       <recently-successful v-if="form.recentlySuccessful" :message="'Atualizado com sucesso!'" />
        <form @submit.prevent="submit">
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 md:col-span-3">
                  <!-- Nome -->
                  <breeze-label for="nome" value="Nome" />
                  <breeze-input
                    id="nome"
                    type="text"
                    class="mt-1 block w-full"
                    
                    autofocus
                    autocomplete="username"
                    v-model="form.name"
                  />
                  <breeze-input-error
                    v-if="form.errors.name"
                    :message="form.errors.name"
                  />
                </div>

                <!-- Email -->
                <div class="col-span-6 md:col-span-3">
                  <breeze-label for="email" value="Email" />
                  <breeze-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    
                    autofocus
                    autocomplete="useremail"
                    v-model="form.email"
                  />
                  <breeze-input-error
                    v-if="form.errors.email"
                    :message="form.errors.email"
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
</template>

<script>
import BreezeLabel from "@/Components/Label";
import RecentlySuccessful from "@/Components/RecentlySuccessful";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
import ValidationErrors from "@/Components/ValidationErrors";

export default {
  components: {
    BreezeInput,
    BreezeLabel,
    ValidationErrors,
    BreezeInput,
    BreezeButton,
    BreezeInputError,
    RecentlySuccessful,
  },

  props: {
    user: Object,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: this.user.email,
        name: this.user.name,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("perfil.update", this.user));
    },
  },
};
</script>