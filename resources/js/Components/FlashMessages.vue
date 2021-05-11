<template>
  <div>
    <div
      v-if="this.$page.props.flash.message"
      id="alert"
      class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full bg-green-200 shadow rounded"
    >
      {{this.$page.props.flash.message }}
      <svg
        onclick="document.getElementById('alert').remove();"
        class="fill-current"
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 18 18"
      >
        <path
          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
        ></path>
      </svg>
    </div>

    <div
      v-if="this.$page.props.flash.success"
      id="alert"
      class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full bg-green-200 shadow rounded"
    >
      {{this.$page.props.flash.success }}
      <svg
        onclick="document.getElementById('alert').remove();"
        class="fill-current"
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 18 18"
      >
        <path
          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
        ></path>
      </svg>
    </div>

    <div
      v-if="this.$page.props.flash.error"
      id="alert"
      class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full bg-red-200 shadow rounded"
    >
      {{ this.$page.props.flash.error }}
      <svg
        onclick="document.getElementById('alert').remove();"
        class="fill-current"
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 18 18"
      >
        <path
          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
        ></path>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  props: {},

  mounted() {
    // console.log(this.$page.props.flash);
  },
};
</script>