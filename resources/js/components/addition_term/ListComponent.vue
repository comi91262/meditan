<template>
        <el-table
            :data="terms"
            style="width: 100%">
            <el-table-column
                prop="term_jp"
                label="日本語"
                width="180">
            </el-table-column>
            <el-table-column
                prop="term_en"
                label="英語"
                width="180">
            </el-table-column>
            <el-table-column
                prop="department"
                label="カテゴリ"
                width="180">
            </el-table-column>
            <el-table-column>
                <template slot-scope="scope">
                 <el-button
                   size="mini"
                   type="danger"
                   @click="handleDelete(scope.$index, terms)">Delete</el-button>
                </template>
            </el-table-column>
        </el-table>
</template>

<script>
export default {
  data: function() {
    return {
      japaneseTerm: '',
      englishTerm: '',
      departments: [],
      departmentSelection: '',
      primary_lording: false,
      terms: []
    };
  },
  created: function() {
    this.getUserTerms();
  },
  methods: {
    getUserTerms: function() {
      axios
        .get('/api/user_terms')
        .then(response => {
          this.terms = response.data.terms;
        })
        .catch(error => {});
    },
    handleDelete(index, rows) {
      let id = rows[index].id;
      axios
        .delete('/api/user_terms/' + id)
        .then(response => {
          this.$message('単語を削除しました', 'success');
          rows.splice(index, 1);
        })
        .catch(error => {});
    }
  }
};
</script>