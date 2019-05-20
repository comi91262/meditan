<template>
  <v-form v-model="valid">
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex sm6 offset-sm3>
          <v-card>
            <v-card-title class="primary">
              <span class="title white--text font-weight-light">登録</span>
            </v-card-title>
            <v-card-text>
              <v-text-field
                v-model="name"
                :rules="[rules.required, rules.max]"
                label="Name"
                required
              ></v-text-field>
              <v-text-field
                v-model="email"
                :rules="[rules.required, rules.email, rules.max]"
                label="E-mail"
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
              <v-btn @click="submit">登録する</v-btn>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-form>
</template>

<script>
export default {
  data: () => ({
    name: '',
    email: '',
    password: '',
    valid: false,
    show: false,
    rules: {
      required: value => !!value || 'Required.',
      min: v => v.length >= 8 || 'Min 8 characters',
      max: v => v.length <= 255 || '',
      email: v => /.+@.+/.test(v) || 'E-mail must be valid',
    }
  }),
  methods: {
    submit() {
      if (!this.valid) return;

      let formData = new FormData();
      formData.append('name', this.name);
      formData.append('email', this.email);
      formData.append('password', this.password);

      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      };

      axios
        .post('/register', formData, config)
        .then(function(response) {
          if (response.status = 200) {
            window.location = '/';
          } else {
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