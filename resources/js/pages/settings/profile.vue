<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <b-message v-if="form.successful" title="Success" type="is-success" aria-close-label="Close message">
        {{ $t('info_updated') }}
      </b-message>
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
      <!-- Submit Button -->
      <b-button :loading="form.busy" native-type="submit">
        {{ $t('update') }}
      </b-button>
    </form>
  </card>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key]
    })
  },

  methods: {
    async update () {
      const { data } = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    }
  }
}
</script>
