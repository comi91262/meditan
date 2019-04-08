<template>
  <div>
    <v-data-table :headers="headers" :items="terms" hide-actions class="elevation-1">
      <template v-slot:items="props">
        <td>{{ props.item.term_jp }}</td>
        <td>{{ props.item.term_en }}</td>
        <td>{{ props.item.department }}</td>
        <td class="justify-center">
          <v-icon small @click="deleteItem(props.item)">delete</v-icon>
        </td>
      </template>
    </v-data-table>
    <snackbar-component
      :text="snackText"
      :color="color"
      :publish-snackbar="snackbar"
      v-on:close-snackbar="closeSnackbar"
    ></snackbar-component>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      headers: [
        { text: '日本語', sortable: false, value: 'term_jp' },
        { text: 'English', sortable: false, value: 'term_en' },
        { text: 'カテゴリ', sortable: false, value: 'category' },
        { text: '', value: 'name', sortable: false }
      ],
      terms: [],
      snackText: '',
      color: 'success',
      snackbar: false
    };
  },
  created: function() {
    this.getUserTerms();
  },
  methods: {
    publishSnackbar(text, color) {
      this.snackText = text;
      this.color = color;
      this.snackbar = true;
    },
    closeSnackbar() {
      this.snackbar = false;
    },
    getUserTerms: function() {
      axios
        .get('/api/user_terms')
        .then(response => {
          this.terms = response.data.terms;
        })
        .catch(error => {});
    },
    deleteItem(item) {
      const index = this.terms.indexOf(item);
      axios
        .delete('/api/user_terms/' + item.id)
        .then(response => {
          this.publishSnackbar('単語を削除しました', 'success')
          this.terms.splice(index, 1);
        })
        .catch(error => {});
    }
  }
};
</script>