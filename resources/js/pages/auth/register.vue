<template>
  <section class="section">
    <div class="columns">
      <div class="column is-8 is-offset-2">
        <card v-if="mustVerifyEmail" :title="$t('register')">
          <div class="notification is-success" role="alert">
            {{ $t('verify_email_address') }}
          </div>
        </card>
        <card v-else :title="$t('register')">
          <form @submit.prevent="register" @keydown="form.onKeydown($event)">
            <!-- Name -->
            <b-field :label="$t('name')" :message=" form.errors.has('name') ? form.errors.errors.name:null"
                     :type="{ 'is-danger': form.errors.has('name') }"
            >
              <b-input v-model="form.name" type="text" name="name"/>
            </b-field>

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

            <!-- Password Confirmation -->
            <b-field :label="$t('confirm_password')" :message=" form.errors.has('password_confirmation') ? form.errors.errors.password_confirmation:null"
                     :type="{ 'is-danger': form.errors.has('password_confirmation') }"
            >
              <b-input v-model="form.password_confirmation" type="password" name="password_confirmation" />
            </b-field>

            <div class="form-group row">
              <div class="col-md-7 offset-md-3 d-flex">
                <!-- Submit Button -->
                <b-button :loading="form.busy" native-type="submit">
                  {{ $t('register') }}
                </b-button>
                <!-- GitHub Register Button -->
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
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
