<template>
  <el-container>
    <el-header>
        <h1>回答履歴</h1>
    </el-header>
    <el-main>
        <el-table
            :data="questions"
            style="width: 100%"
            :row-class-name="successClass">
            <el-table-column
                prop="answer_datetime"
                label="回答日時"
                width="180">
            </el-table-column>
            <el-table-column
                prop="question"
                label="問題"
                width="180">
            </el-table-column>
            <el-table-column
                prop="answer"
                label="正答"
                width="180">
            </el-table-column>
            <el-table-column
                prop="user_answer"
                label="回答"
                width="180">
            </el-table-column>
        </el-table>
    </el-main>
  </el-container>
</template>

<script>
export default {
    props: [ 'user-id' ],
    data: function () {
        return {
            questions: [],
            primary_lording: false,
        }
    },
    created: function () {
        this.getHistory();
    },
    methods: {
        getHistory: function (event) {
            axios
                .get('/api/questions/_user/' + this.userId)
                .then(response => {
                    this.questions = response.data.questions;
                })
                .catch(error => {
                })
        },
        successClass({row, rowIndex}) {
            if (row.success === 1) {
              return 'success-row';
            } else {
              return 'wrong-row';
            }
            return '';
         }
    }
}
</script>

<style>
  .el-table .success-row {
    background:  rgb(22, 173, 219)
  }
  .el-table .wrong-row {
    background:  rgb(238, 123, 123);
  }
</style>
