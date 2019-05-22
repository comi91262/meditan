<template>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12 md12>
        <v-card>
          <v-toolbar class="primary">
            <v-toolbar-title>カテゴリを選択</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn @click="goHome" icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-toolbar>

          <v-card-text>
            <v-checkbox
              class="text-xs-center mt-auto pt-0"
              v-model="selectedDepartments"
              v-for="(department, key) in this.departments"
              :rules="[rules.required]"
              :key="key"
              :label="department.name"
              :value="department.id"
            ></v-checkbox>
          </v-card-text>
        </v-card>
      </v-flex>

      <v-flex xs12 md12>
        <v-card>
          <v-toolbar class="primary">
            <v-toolbar-title>問題文の言語の選択</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn @click="goHome" icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
            <v-radio-group v-model="language" class="text-xs-center mt-2">
              <v-radio-group>
                <v-radio :name="language" label="日本語" :value="0"></v-radio>
                <v-radio :name="language" label="English" :value="1"></v-radio>
              </v-radio-group>
            </v-radio-group>
          </v-card-text>
        </v-card>
      </v-flex>

      <v-flex xs12 md12>
        <v-card>
          <v-btn color="primary" @click="onSubmit">Start</v-btn>
        </v-card>
      </v-flex>
    </v-layout>
    <snackbar-component
      :text="snackText"
      :color="color"
      :publish-snackbar="snackbar"
      v-on:close-snackbar="closeSnackbar"
    ></snackbar-component>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      selectedDepartments: [],
      language: 0,
      number: 0,
      departments: [],
      valid: false,
      snackText: '',
      color: 'success',
      snackbar: false,
      rules: {
        required: value => !!value || 'Required.',
        min: v => v.length >= 8 || 'Min 8 characters',
        max: v => v.length <= 255 || '',
        email: v => /.+@.+/.test(v) || 'E-mail must be valid'
      }
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
            this.publishSnackbar(response.data.message, 'error');
          }
        })
        .catch(error => {
          if (error.response.status === 401) {
            this.publishSnackbar('認証エラーです。もう一度ログインください', 'error');
          } else {
            this.publishSnackbar('通信エラーです。もう一度試してください', 'error');
          }
        });
    },
    goHome() {
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