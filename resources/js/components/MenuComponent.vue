<template>
  <v-navigation-drawer stateless value="true">
    <v-list>
      <v-list-tile>
        <v-list-tile-action>
          <v-icon>home</v-icon>
        </v-list-tile-action>
        <v-list-tile-title>ようこそ</v-list-tile-title>
      </v-list-tile>

      <v-list-group prepend-icon="account_circle" value="true">
        <template v-slot:activator>
          <v-list-tile>
            <v-list-tile-title>問題を解く</v-list-tile-title>
          </v-list-tile>
        </template>

        <v-list-tile v-for="(test, i) in tests" :key="i" @click="jumpPage(test[2])">
          <v-list-tile-title v-text="test[0]"></v-list-tile-title>
          <v-list-tile-action>
            <v-icon v-text="test[1]"></v-icon>
          </v-list-tile-action>
        </v-list-tile>
      </v-list-group>

      <v-list-group prepend-icon="account_circle" value="true" @click="jumpPage('history')">
        <template v-slot:activator>
          <v-list-tile>
            <v-list-tile-title>テスト履歴へ</v-list-tile-title>
          </v-list-tile>
        </template>
      </v-list-group>

      <v-list-group prepend-icon="account_circle" value="true" @click="jumpPage('allTerms')">
        <template v-slot:activator>
          <v-list-tile>
            <v-list-tile-title>単語の一覧を表示</v-list-tile-title>
          </v-list-tile>
        </template>
      </v-list-group>

      <v-list-group prepend-icon="account_circle" value="true" @click="jumpPage('additionTerms')">
        <template v-slot:activator>
          <v-list-tile>
            <v-list-tile-title>単語の追加</v-list-tile-title>
          </v-list-tile>
        </template>
      </v-list-group>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  data: function() {
    return {
      tests: [
        ['カテゴリテスト', 'settings', 'category'],
        ['似た単語テスト', 'settings', 'similar'],
        ['やり直しテスト', 'settings', 'retry']
      ]
    };
  },
  methods: {
    jumpPage(key) {
      switch (key) {
        case 'category':
          this.$router.push({ path: '/select' });
          break;
        case 'similar':
          axios
            .post('/api/questions/_kind/similar')
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
          break;
        case 'retry':
          axios
            .post('/api/questions/_kind/retry')
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
          break;
        case 'history':
          this.$router.push({ path: '/history' });
          break;
        case 'allTerms':
          this.$router.push({ path: '/list' });
          break;
        case 'additionTerms':
          this.$router.push({ path: '/addition_term' });
          break;
      }
    }
  }
};
</script>