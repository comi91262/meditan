<template>
  <v-container>
    <v-form ref="form" lazy-validation>
      <v-layout row wrap>
        <v-flex xs12>
          <h2>カテゴリを選択してください</h2>
            <v-checkbox v-model="selectedDepartments"
              v-for="(department, key) in this.departments"
              :key="key"
              :label="department.name"
              :value="department.id"
            ></v-checkbox>
        </v-flex>

        <v-flex xs12>
          <h2>問題文の言語を選択してください</h2>
          <v-radio-group v-model="language">
            <v-radio-group>
              <v-radio label="日本語" :value="0"></v-radio>
              <v-radio label="English" :value="1"></v-radio>
            </v-radio-group>
          </v-radio-group>
        </v-flex>

        <v-flex xs12>
          <v-btn color="cyan" @click="onSubmit">Start</v-btn>
          <v-btn to="/" color="cyan">トップ画面に戻る</v-btn>
        </v-flex>
      </v-layout>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      selectedDepartments: [],
      language: 0,
      number: 0,
      departments: []
    };
  },
  created: function() {
    this.getDepartments();
  },
  methods: {
    onSubmit() {
      axios
        .post('/api/questions/_kind/category', {
          categories: this.selectedDepartments,
          language: this.language
        })
        .then(response => {
          if (response.data.result !== null) {
            let term = response.data.result;
            this.$router.push({ path: '/exam' });
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
    backHome() {
      this.$router.go(-1);
    },
    getDepartments: function() {
      axios
        .get('/api/departments')
        .then(response => {
          this.departments = response.data.departments;
        })
        .catch(error => {});
    }
  }
};
</script>