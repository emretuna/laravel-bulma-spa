<template>
  <section class="section">
    <div class="columns">
      <div class="column is-8 is-offset-2">
        <card :title="$t('verify_email')">
          <template v-if="success">
            <div class="notification is-success" role="alert">
              {{ success }}
            </div>
            <b-button tag="router-link" type="is-success" :to="{ name: 'login' }" outlined>
              {{ $t('login') }}
            </b-button>
          </template>
          <template v-else>
            <div class="notification is-danger" role="alert">
              {{ error || $t('failed_to_verify_email') }}
            </div>
            <b-button tag="router-link" :to="{ name: 'verification.resend' }" type="is-danger" outlined>
              {{ $t('resend_verification_link') }}
            </b-button>
          </template>
        </card>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

export default {
  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('verify_email') }
  },

  async beforeRouteEnter (to, from, next) {
    try {
      const { data } = await axios.post(`/api/email/verify/${to.params.id}?${qs(to.query)}`)

      next(vm => { vm.success = data.status })
    } catch (e) {
      next(vm => { vm.error = e.response.data.status })
    }
  },

  data: () => ({
    error: '',
    success: ''
  })
}
</script>
