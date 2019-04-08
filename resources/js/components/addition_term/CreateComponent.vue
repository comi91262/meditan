<template>
  <v-container>
    <v-form ref="form" lazy-validation>
      <v-layout>
        <v-flex xs12 md4>
          <v-text-field v-model="japaneseTerm" :counter="30" label="日本語" required></v-text-field>
        </v-flex>

        <v-flex xs12 md4>
          <v-text-field v-model="englishTerm" :counter="50" label="English" required></v-text-field>
        </v-flex>
      </v-layout>

      <v-radio-group v-model="departmentSelection" :mandatory="false">
        <v-radio
          v-for="(department, key) in this.departments"
          :key="key"
          :label="department.name"
          :value="department.id"
        ></v-radio>
      </v-radio-group>
      <v-btn color="primary" @click="register">登録</v-btn>
      <v-btn color="primary" to="/">トップに戻る</v-btn>
      <snackbar-component
        :text="snackText"
        :color="color"
        :publish-snackbar="snackbar"
        v-on:close-snackbar="closeSnackbar"
      ></snackbar-component>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data: function() {
    return {
      japaneseTerm: '',
      englishTerm: '',
      departments: [],
      departmentSelection: '',
      terms: [],
      snackText: '',
      color: 'success',
      snackbar: false
    };
  },
  created: function() {
    this.getDepartments();
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
            this.publishSnackbar('登録完了', 'success');
          } else {
            this.publishSnackbar(response.data.message, 'error');
          }
        })
        .catch(error => {
          console.log(error);
          if (error.response.status === 401) {
            this.publishSnackbar('認証エラーです。もう一度ログインください', 'error');
          } else {
            this.publishSnackbar('通信エラーです。もう一度試してください', 'error');
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