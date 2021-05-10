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
        <form action="#" method="POST">
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 md:col-span-3">
                  <!-- Email -->
                  <breeze-label for="nome" value="Nome" />
                  <breeze-input
                    id="nome"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="useremail"
                    v-model="form.email"
                  />
                </div>

                <!-- Nome -->
                <div class="col-span-6 md:col-span-3">
                  <breeze-label for="email" value="Email" />
                  <breeze-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                    v-model="form.name"
                  />
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Save
              </button>
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
import ValidationErrors from "@/Components/ValidationErrors";

export default {
  components: {
    BreezeInput,
    BreezeLabel,
    ValidationErrors,
    BreezeInput,
  },

  props: {
    user: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: this.user.email,
        name: this.user.name,
      }),
    };
  },
};
</script>