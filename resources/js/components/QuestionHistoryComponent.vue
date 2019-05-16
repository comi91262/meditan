<template>
  <v-container>
    <v-card>
      <v-layout row wrap>
        <v-flex xs12 md12>
          <v-toolbar class="primary">
            <v-toolbar-title>回答履歴</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn @click="goHome" icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-toolbar>
          <v-data-table
            color="primary"
            :headers="headers"
            :items="questions"
            hide-actions
            :pagination.sync="pagination"
            class="elevation-1"
          >
            <template v-slot:items="props" class="red lighten-1">
              <td>{{ props.item.answer_datetime }}</td>
              <td>{{ props.item.question }}</td>
              <td>{{ props.item.answer }}</td>
              <td v-bind:class="success(props.item.success)">{{ props.item.user_answer }}</td>
            </template>
          </v-data-table>
        </v-flex>

        <v-flex class="text-xs-center pt-2">
          <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
        </v-flex>
      </v-layout>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data: function() {
    return {
      headers: [
        {
          text: '回答日時',
          align: 'left',
          sortable: true,
          value: 'answer_datetime'
        },
        { text: '問題', sortable: false, value: 'question' },
        { text: '正答', sortable: false, value: 'answer' },
        { text: '回答', sortable: false, value: 'user_answer' }
      ],
      questions: [],
      pagination: {}
    };
  },
  created: function() {
    const perPage = 15;
    this.pagination.rowsPerPage = perPage;
    this.getHistory();
  },
  computed: {
    pages() {
      if (this.pagination.rowsPerPage == null || this.pagination.totalItems == null) return 0;

      return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage);
    }
  },
  methods: {
    getHistory: function(event) {
      axios
        .get('/api/questions')
        .then(response => {
          this.questions = response.data.questions;
          this.pagination.totalItems = this.questions.length;
        })
        .catch(error => {});
    },
    success(isSuccess) {
      if (isSuccess === 0) {
        return 'red lighten-1';
      }
      return '';
    },
    goHome() {
      this.$router.go(-1);
    },
  }
};
</script>