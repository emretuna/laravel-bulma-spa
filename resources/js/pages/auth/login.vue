<template>
  <section class="section">
    <div class="columns">
      <div class="column is-8 is-offset-2">
        <card :title="$t('login')">
          <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <!-- Email -->
            <b-field :label="$t('email')" :message=" form.errors.has('email') ? form.errors.errors.email:null"
                     :type="{ 'is-danger': form.errors.has('email') }"
            >
              <b-input v-model="form.email" type="email" name="email" />
            </b-field>
            <!-- Password -->
            <b-field :label="$t('password')" :message=" form.errors.has('password') ? form.errors.errors.password:null"
                     :type="{ 'is-danger': form.errors.has('password') }"
            >
              <b-input v-model="form.password" type="password" name="password" />
            </b-field>
            <!-- Remember Me -->
            <div class="columns">
              <div class="column">
                <div class="field">
                  <b-checkbox v-model="remember" name="remember">
                    {{ $t('remember_me') }}
                  </b-checkbox>
                </div>
              </div>
              <div class="column">
                <p class="has-text-right">
                  <router-link :to="{ name: 'password.request' }">
                    {{ $t('forgot_password') }}
                  </router-link>
                </p>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-7 offset-md-3 d-flex">
                <!-- Submit Button -->
                <b-button :loading="form.busy" native-type="submit">
                  {{ $t('login') }}
                </b-button>

                <!-- GitHub Login Button -->
                <login-with-github />
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>
  </section>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
