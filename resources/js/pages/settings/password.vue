<template>
  <card :title="$t('your_password')">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <b-message v-if="form.successful" title="Success" type="is-success" aria-close-label="Close message">
        {{ $t('password_updated') }}
      </b-message>

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
        {{ $t('update') }}
      </b-button>
    </form>
  </card>
</template>

<script>
import Form from 'vform'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    async update () {
      await this.form.patch('/api/settings/password')

      this.form.reset()
    }
  }
}
</script>
