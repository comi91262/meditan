<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex sm6 offset-sm3>
        <v-card>
          <v-tabs centered color="primary" icons-and-text>
            <v-tabs-slider color="black"></v-tabs-slider>
            <v-tab @click="jump('add')">
              単語の追加
              <v-icon>add</v-icon>
            </v-tab>
            <v-tab @click="jump('list')">
              単語の一覧
              <v-icon>list</v-icon>
            </v-tab>
            <v-spacer></v-spacer>
            <v-btn @click="goHome" icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-tabs>
          <router-view></router-view>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  methods: {
    jump(key) {
      switch (key) {
        case 'add':
          this.$router.push({ path: '/addition_term/create' });
          break;
        case 'list':
          this.$router.push({ path: '/addition_term/list' });
          break;
      }
    },
    goHome() {
      this.$router.go(-1);
    },
  }
};
</script>