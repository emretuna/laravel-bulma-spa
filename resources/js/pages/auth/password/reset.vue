<template>
  <section class="section">
    <div class="columns">
      <div class="column is-8 is-offset-2">
        <card :title="$t('reset_password')">
          <form @submit.prevent="reset" @keydown="form.onKeydown($event)">
            <alert-success :form="form" :message="status" />
            <b-message v-if="status" title="Success" type="is-success" aria-close-label="Close message">
              {{ status }}
            </b-message>
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

            <!-- Submit Button -->
            <b-button :loading="form.busy" native-type="submit">
              {{ $t('reset_password') }}
            </b-button>
          </form>
        </card>
      </div>
    </div>
  </section>
</template>

<script>
import Form from 'vform'

export default {
  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('reset_password') }
  },

  data: () => ({
    status: '',
    form: new Form({
      token: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),

  created () {
    this.form.email = this.$route.query.email
    this.form.token = this.$route.params.token
  },

  methods: {
    async reset () {
      const { data } = await this.form.post('/api/password/reset')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
