<template>
  <el-container>
    <el-header>
        <h1>単語の登録</h1>
    </el-header>
    <el-main>
        <el-input placeholder="日本語を入力してね" v-model="japaneseTerm"></el-input>
        <el-input placeholder="英語を入力してね" v-model="englishTerm"></el-input>
        <div>
            <h2>
                カテゴリーを選択してください
            </h2>
            <el-radio-group v-model="departmentSelection">
                <el-radio-button v-for="(department, key) in this.departments"
                                 :key="key"
                                 :label="department.id">
                                 {{department.name}}
                </el-radio-button>
            </el-radio-group>
        </div>
        <el-button type="primary" v-on:click="register" :loading="primary_lording">登録</el-button>
    </el-main>
  </el-container>
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
    this.getDepartments();
  },
  methods: {
    register: function(event) {
      axios
        .post('/api/user_terms', {
          japaneseTerm: this.japaneseTerm,
          englishTerm: this.englishTerm,
          department: this.departmentSelection
        })
        .then(response => {
          if (response.data.result !== null) {
            let term = response.data.result;
            this.terms.push({
              id: term.id,
              term_jp: term.term_jp,
              term_en: term.term_en,
              department: term.department
            });
            this.japaneseTerm = '';
            this.englishTerm = '';
            this.$message('登録完了', 'success');
          } else {
            this.$message.error(response.data.message);
          }
        })
        .catch(error => {
          if (error.response.status === 401) {
            this.$message.error('認証エラーです。もう一度ログインください');
          } else {
            this.$message.error('通信エラーです。もう一度試してください');
          }
        });
    },
    getDepartments: function() {
      axios
        .get('/api/departments')
        .then(response => {
          this.departments = response.data.departments;
        })
        .catch(error => {});
    },
  }
};
</script>