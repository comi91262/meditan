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
                <v-radio label="日本語" :value="0"></v-radio>
                <v-radio label="English" :value="1"></v-radio>
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