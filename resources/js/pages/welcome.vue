<template>
  <section class="hero is-fullheight is-secondary">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
      <navbar />
    </div>
    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title">
          Laravel - Buefy - SPA
        </h1>
        <br>
        <h2 class="subtitle">
          <h3>Wellcome,start here and build something cool!</h3>
        </h2>
      </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <nav class="tabs">
        <div class="container">
          <ul>
            <li><a href="https://buefy.org" target="_blank">Buefy</a></li>
            <li><a href="https://github.com/cretueusebiu/laravel-vue-spa" target="_blank">Laravel-Vue SPA</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
</template>

<script>
import { mapGetters } from 'vuex'
import Navbar from '~/components/Navbar'

export default {
  layout: 'basic',
  components: {
    Navbar
  },
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>
