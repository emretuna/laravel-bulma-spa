<template>
  <b-navbar wrapper-class="container">
    <template slot="brand">
      <b-navbar-item tag="router-link" :to="{ name: user ? 'home' : 'welcome' }">
        {{ appName }}
      </b-navbar-item>
    </template>
    <template slot="end">
      <b-navbar-dropdown :label="locales[locale]">
        <b-navbar-item v-for="(value, key) in locales" :key="key" tag="a" href="#" @click.native="setLocale(key)">
          {{ value }}
        </b-navbar-item>
      </b-navbar-dropdown>
      <!-- <b-navbar-item ></b-navbar-item>-->
    </template>

    <template v-if="user" slot="end">
      <!-- Authenticated -->
      <b-dropdown>
        <a slot="trigger" class="navbar-item navbar-link" role="button">
          <figure class="image is-24x24">
            <img class="is-rounded" :src="user.photo_url" :alt="user.name">
          </figure>
          &nbsp;<span>{{ user.name }}</span>
        </a>
        <b-dropdown-item has-link>
          <router-link :to="{ name: 'settings.profile' }">
            <fa icon="cog" fixed-width />&nbsp;{{ $t('settings') }}
          </router-link>
        </b-dropdown-item>
        <b-dropdown-item has-link>
          <a href="#" @click.prevent="logout">
            <fa icon="sign-out-alt" fixed-width />&nbsp;{{ $t('logout') }}
          </a>
        </b-dropdown-item>
      </b-dropdown>
    </template>
    <!-- Guest -->
    <template v-else slot="end">
      <b-navbar-item tag="router-link" :to="{ name: 'login' }" class="navbar-item">
        {{ $t('login') }}
      </b-navbar-item>

      <b-navbar-item tag="router-link" :to="{ name: 'register' }" class="navbar-item">
        {{ $t('register') }}
      </b-navbar-item>
    </template>
  </b-navbar>
</template>

<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'

export default {
  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user',
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    setLocale (locale) {
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)
        this.$store.dispatch('lang/setLocale', { locale })
      }
    }
  }
}
</script>
