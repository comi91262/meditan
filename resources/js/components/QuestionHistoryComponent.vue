<template>
  <dev>
    <v-data-table
      :headers="headers"
      :items="questions"
      hide-actions
      :pagination.sync="pagination"
      class="elevation-1"
    >
      <template v-slot:items="props">
        <td>{{ props.item.answer_datetime }}</td>
        <td class="text-xs-right">{{ props.item.question }}</td>
        <td class="text-xs-right">{{ props.item.answer }}</td>
        <td class="text-xs-right">{{ props.item.user_answer }}</td>
      </template>
    </v-data-table>
    <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
    </div>
  </dev>

  <!--
  <el-container>
    <el-header>
      <h1>回答履歴</h1>
    </el-header>
    <el-main>
      <el-table :data="questions" style="width: 100%" :row-class-name="successClass">
        <el-table-column prop="answer_datetime" label="回答日時" width="180"></el-table-column>
        <el-table-column prop="question" label="問題" width="180"></el-table-column>
        <el-table-column prop="answer" label="正答" width="180"></el-table-column>
        <el-table-column prop="user_answer" label="回答" width="180"></el-table-column>
      </el-table>
    </el-main>
  </el-container>
  -->
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
        { text: '問題', value: 'question' },
        { text: '正答', value: 'answer' },
        { text: '回答', value: 'user_answer' }
      ],
      questions: [],
      pagination: {},
      primary_lording: false
    };
  },
  created: function() {
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
        })
        .catch(error => {});
    },
    successClass({ row, rowIndex }) {
      if (row.success === 1) {
        return 'success-row';
      } else {
        return 'wrong-row';
      }
      return '';
    }
  }
};
</script>

<style>
.el-table .success-row {
  background: rgb(22, 173, 219);
}
.el-table .wrong-row {
  background: rgb(238, 123, 123);
}
</style>
