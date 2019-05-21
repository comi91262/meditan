<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex sm6 offset-sm3>
        <v-card>
          <v-card-title class="primary">
            <span class="title white--text font-weight-light">ログイン</span>
          </v-card-title>
          <v-card-text>
            <v-text-field
              v-model="email"
              :rules="[rules.required, rules.email, rules.max]"
              label="メールアドレス"
              required
            ></v-text-field>
            <v-text-field
              v-model="password"
              :append-icon="show ? 'visibility' : 'visibility_off'"
              :rules="[rules.required, rules.min]"
              :type="show ? 'text' : 'password'"
              name="input-10-2"
              label="Password"
              hint="At least 8 characters"
              class="input-group--focused"
              @click:append="show = !show"
              autocomplete="off"
            ></v-text-field>
            <v-btn @click="submit">ログイン</v-btn>
            <!--
            <a class="btn btn-link" href="/password/reset">'Forgot Your Password?'</a>
            -->
          </v-card-text>
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
  data: () => ({
    email: '',
    password: '',
    checkbox: false,
    valid: false,
    show: false,
    rules: {
      required: value => !!value || 'Required.',
      min: v => v.length >= 8 || 'Min 8 characters',
      max: v => v.length <= 255 || '',
      email: v => /.+@.+/.test(v) || 'E-mail must be valid'
    },
    snackText: '',
    color: 'success',
    snackbar: false
  }),
  methods: {
    publishSnackbar(text, color) {
      this.snackText = text;
      this.color = color;
      this.snackbar = true;
    },
    closeSnackbar() {
      this.snackbar = false;
    },
    submit() {
      // とりあえず非同期で送る
      let formData = new FormData();
      formData.append('email', this.email);
      formData.append('password', this.password);

      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      };

      axios
        .post('/login', formData, config)
        .then(function(response) {
          if ((response.status = 302)) {
            window.location = '/';
          } else {
            window.location = '/login';
          }
        })
        .catch(error => {
          if (error.response.data.errors[0] != 'auth.failed') {
            this.publishSnackbar('認証に失敗しました', 'error');
          } else {
            window.location = '/login';
          }
        });
    }
  }
};
</script>