<template>
  <v-form ref="form" lazy-validation>
    <v-container>
      <v-layout>
        <v-flex xs12 md4>
          <v-text-field v-model="japaneseTerm" :counter="30" label="日本語" required></v-text-field>
        </v-flex>

        <v-flex xs12 md4>
          <v-text-field v-model="englishTerm" :counter="50" label="English" required></v-text-field>
        </v-flex>
      </v-layout>
    </v-container>

    <v-container>
      <v-radio-group v-model="departmentSelection" :mandatory="false">
        <v-radio
          v-for="(department, key) in this.departments"
          :key="key"
          :label="department.name"
          :value="department.id"
        ></v-radio>
      </v-radio-group>
    </v-container>
    <v-container>
      <v-btn color="cyan" @click="register">登録</v-btn>
    </v-container>
  </v-form>
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
    }
  }
};
</script>