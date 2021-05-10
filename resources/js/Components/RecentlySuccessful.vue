<template>
  <div
    v-show="message"
    class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full bg-green-200 shadow rounded"
  >
    {{ message }}
  </div>
</template>

<script>
export default {
  props: ['message']
};
</script>
