<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="questions"
      hide-actions
      :pagination.sync="pagination"
      class="elevation-1"
    >
      <template v-slot:items="props" class="red lighten-1">
        <tr v-bind:class="success(props.item.success)">
          <td>{{ props.item.answer_datetime }}</td>
          <td class="text-xs-right">{{ props.item.question }}</td>
          <td class="text-xs-right">{{ props.item.answer }}</td>
          <td class="text-xs-right">{{ props.item.user_answer }}</td>
        </tr>
      </template>
    </v-data-table>
    <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
    </div>
  </div>
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
    }
  }
};
</script>