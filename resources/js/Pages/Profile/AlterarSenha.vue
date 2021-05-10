<template>
  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Alterar Senha
          </h3>
          <!-- <p class="mt-1 text-sm text-gray-600">
            This information will be displayed publicly so be careful what you
            share.
          </p> -->
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <recently-successful
          v-if="form.recentlySuccessful"
          :message="'Atualizado com sucesso!'"
        />
        <form @submit.prevent="alterarSenha">
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 md:col-span-3">
                  <!-- Senha Atual -->
                  <breeze-label for="current_password" value="Senha Atual" />
                  <breeze-input
                    id="current_password"
                    type="password"
                    class="mt-1 block w-full"
                    autofocus
                    v-model="form.current_password"
                  />
                  <breeze-input-error
                    v-if="form.errors.current_password"
                    :message="form.errors.current_password"
                  />
                </div>

                <!-- Nova Senha -->
                <div class="col-span-6 md:col-span-3">
                  <breeze-label for="password" value="Nova Senha" />
                  <breeze-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    autofocus
                    v-model="form.password"
                  />
                  <breeze-input-error
                    v-if="form.errors.password"
                    :message="form.errors.password"
                  />
                </div>

                <!-- Confirmar Nova Senha -->
                <div class="col-span-6 md:col-span-3">
                  <breeze-label
                    for="password_confirmation"
                    value="Confirme a Nova Senha"
                  />
                  <breeze-input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autofocus
                    v-model="form.password_confirmation"
                  />
                  <breeze-input-error
                    v-if="form.errors.password_confirmation"
                    :message="form.errors.password_confirmation"
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
        password: "",
        current_password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    alterarSenha() {
      this.form.put(this.route("perfil.alterar-senha", this.user), {
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>