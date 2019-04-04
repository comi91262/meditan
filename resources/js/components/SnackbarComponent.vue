<template>
  <v-card>
    <v-snackbar
      v-model="snackbar"
      :multi-line="true"
      :timeout="1000"
      :top="true"
      :color="color"
    >{{ text }}</v-snackbar>
  </v-card>
</template>

<script>
export default {
  props: ['text', 'color', 'publishSnackbar'],
  computed: {
    snackbar: {
      get() {
        return this.publishSnackbar;
      },
      set(newVal) {
         if (this.publishSnackbar !== newVal) this.$emit('close-snackbar', newVal);
      }
    }
  },
  data: function() {
    return {
      timeout: 6000,
    };
  }
};
</script>