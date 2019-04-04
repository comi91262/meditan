<template>
  <v-container>
    <v-layout row>
      <v-flex xs12 sm6 offset-sm3>
        <v-card>
          <v-toolbar class="primary">
            <v-toolbar-side-icon></v-toolbar-side-icon>
            <v-toolbar-title>ようこそ</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn icon>
              <v-icon>home</v-icon>
            </v-btn>
          </v-toolbar>

          <v-list>
            <v-list-group
              v-for="item in items"
              :key="item.title"
              v-model="item.active"
              :prepend-icon="item.action"
              no-action
            >
              <template v-slot:activator>
                <v-list-tile @click="jumpPage(item.routeName)">
                  <v-list-tile-content>
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
              </template>

              <v-list-tile
                v-for="subItem in item.items"
                :key="subItem.title"
                @click="jumpPage(subItem.routeName)"
              >
                <v-list-tile-content>
                  <v-list-tile-title>{{ subItem.title }}</v-list-tile-title>
                </v-list-tile-content>

                <v-list-tile-action>
                  <v-icon>{{ subItem.action }}</v-icon>
                </v-list-tile-action>
              </v-list-tile>
            </v-list-group>
          </v-list>
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
  data: function() {
    return {
      items: [
        {
          title: '問題を解く',
          action: 'edit',
          items: [
            { title: 'カテゴリテスト', routeName: 'category' },
            { title: '似た単語テスト', routeName: 'similar' },
            { title: 'やり直しテスト', routeName: 'retry' }
          ]
        },
        { title: 'テスト履歴へ', action: 'history', routeName: 'history' },
        { title: '単語の一覧を表示', action: 'list', routeName: 'allTerms' },
        { title: '単語の追加', action: 'note_add', routeName: 'additionTerms' }
      ],
      snackText: '',
      color: 'success',
      snackbar: false
    };
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
          break;
        case 'retry':
          axios
            .post('/api/questions/_kind/retry')
            .then(response => {
              if (response.data.result !== null) {
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
          break;
        case 'history':
          this.$router.push({ path: '/history' });
          break;
        case 'allTerms':
          this.$router.push({ path: '/list' });
          break;
        case 'additionTerms':
          this.$router.push({ path: '/addition_term/create' });
          break;
      }
    }
  }
};
</script>