<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12>
        <v-card>
          <v-card-title class="primary">
            <span class="title white--text font-weight-light">Login</span>
          </v-card-title>
          <v-card-text>
            <v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
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
            ></v-text-field>
            <v-checkbox v-model="checkbox" label="Remember Me?" required></v-checkbox>
            <v-btn @click="submit">Login</v-btn>
            <!--
            <a class="btn btn-link" href="/password/reset">'Forgot Your Password?'</a>
            -->
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
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
    nameRules: [v => !!v || 'Name is required', v => v.length <= 10 || 'Name must be less than 10 characters'],
    emailRules: [v => !!v || 'E-mail is required', v => /.+@.+/.test(v) || 'E-mail must be valid'],
    rules: {
      required: value => !!value || 'Required.',
      min: v => v.length >= 8 || 'Min 8 characters',
      emailMatch: () => "The email and password you entered don't match"
    }
  }),
  methods: {
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
        .catch(function(error) {
          window.location = '/login';
        });
    }
  }
};
</script>