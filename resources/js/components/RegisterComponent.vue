<template>
  <form>
    <v-container>
      <v-card>
        <v-card-title>
          <span class="title font-weight-light">Register</span>
        </v-card-title>
        <v-container>
          <v-text-field v-model="name" label="Name" required></v-text-field>
        </v-container>
        <v-container>
          <v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
        </v-container>
        <v-container>
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
        </v-container>
        <v-container>
          <v-text-field
            v-model="passwordConfirmation"
            :append-icon="show ? 'visibility' : 'visibility_off'"
            :rules="[rules.required, rules.min]"
            :type="show ? 'text' : 'password'"
            name="input-10-2"
            label="Password"
            hint="At least 8 characters"
            class="input-group--focused"
            @click:append="show = !show"
          ></v-text-field>
        </v-container>

        <v-btn @click="submit">Register</v-btn>
      </v-card>
    </v-container>
  </form>
</template>

<script>
export default {
  data: () => ({
    name: '',
    email: '',
    password: '',
    passwordConfirmation: '',
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
      formData.append('name', this.name);
      formData.append('email', this.email);
      formData.append('password', this.password);
      formData.append('passwordConfirmation', this.passwordConfirmation);

      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      };

      axios
        .post('/register', formData, config)
        .then(function(response) {
          if (response.data.redirect == '/') {
            window.location = '/';
          } else if (response.data.redirect == '/register') {
            window.location = '/register';
          }
        })
        .catch(function(error) {
          window.location = '/register';
        });
    }
  }
};
</script>