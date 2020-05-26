<template>
  <section class="section">
    <div class="columns">
      <div class="column is-8 is-offset-2">
        <card :title="$t('reset_password')">
          <form @submit.prevent="send" @keydown="form.onKeydown($event)">
            <b-message v-if="status" title="Success" type="is-success" aria-close-label="Close message">
              {{ status }}
            </b-message>
            <!-- Email -->
            <b-field :label="$t('email')" :message=" form.errors.has('email') ? form.errors.errors.email:null"
                     :type="{ 'is-danger': form.errors.has('email') }"
            >
              <b-input v-model="form.email" type="email" name="email" />
            </b-field>
            <!-- Submit Button -->
            <b-button :loading="form.busy" native-type="submit">
              {{ $t('send_password_reset_link') }}
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
      email: ''
    })
  }),

  methods: {
    async send () {
      const { data } = await this.form.post('/api/password/email')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
