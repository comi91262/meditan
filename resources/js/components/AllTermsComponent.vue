<template>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12 sm6 offset-sm3>
        <v-card>
          <v-toolbar class="primary">
            <v-toolbar-title>単語一覧</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn @click="goHome" icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-toolbar>
          <v-tabs
            color="primary"
            next-icon="mdi-arrow-right-bold-box-outline"
            prev-icon="mdi-arrow-left-bold-box-outline"
            show-arrows
          >
            <v-tabs-slider color="black"></v-tabs-slider>
            <v-tab
              v-for="department in this.departments"
              :key="department.id"
              v-on:change="select(department.id)"
              class="white--text"
            >{{ department.name }}</v-tab>

            <v-tabs-items>
              <v-data-table :headers="headers" :items="terms" class="elevation-1">
                <template v-slot:items="props">
                  <td>{{ props.item.japaneseTerm }}</td>
                  <td>{{ props.item.englishTerm }}</td>
                </template>
              </v-data-table>
            </v-tabs-items>
          </v-tabs>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data: function() {
    return {
      japaneseTerm: '',
      englishTerm: '',
      departments: [],
      terms: [],
      headers: [{ text: '日本語' }, { text: 'English' }]
    };
  },
  created: function() {
    this.getDepartments();
    this.select(1);
  },
  methods: {
    select: function(id) {
      axios
        .get('/api/terms/_department/' + id)
        .then(response => {
          this.terms = response.data.terms;
        })
        .catch(error => {});
    },
    getDepartments: function(event) {
      axios
        .get('/api/departments')
        .then(response => {
          response.data.departments.forEach(department => {
            this.departments.push(department);
          });
        })
        .catch(error => {});
    },
    goHome: function() {
      this.$router.go(-1);
    }
  }
};
</script>