<template>
  <div>
    <v-tabs centered color="primary" icons-and-text>
      <v-tabs-slider color="black"></v-tabs-slider>
      <v-tab @click="jump('add')">
        単語の追加
        <v-icon>add_note</v-icon>
      </v-tab>
      <v-tab @click="jump('list')">
        単語の一覧と削除
        <v-icon>list_delete</v-icon>
      </v-tab>
    </v-tabs>
    <router-view></router-view>
  </div>
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
  }

  }
};
</script>