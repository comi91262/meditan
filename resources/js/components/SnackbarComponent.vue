<template>
  <v-card>
    <v-snackbar
      v-model="snackbar"
      :multi-line="true"
      :timeout="6000"
      :top="false"
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
};
</script>