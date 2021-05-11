<template>
  <div>
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl mb-5">
      <h2 class="text-2xl font-bold mb-2 text-gray-800">
        <inertia-link
          class="hover:text-blue-500"
          :href="route('projetos.show', projeto)"
        >
          {{ projeto.titulo }}
        </inertia-link>
      </h2>
      <p class="text-gray-700">{{ projeto.descricao }}</p>
      <p class="text-muted mt-1">{{ projeto.created_at }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    projeto: Object,
  },
};
</script>