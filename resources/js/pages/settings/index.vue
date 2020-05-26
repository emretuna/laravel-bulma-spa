<template>
  <section class="section">
    <div class="columns">
      <div class="column is-3">
        <card :title="$t('settings')">
          <ul class="menu-list">
            <li v-for="tab in tabs" :key="tab.route">
              <router-link active-class="is-active" :to="{ name: tab.route }" exact>
                <fa :icon="tab.icon"></fa>
                {{ tab.name }}
              </router-link>
            </li>
          </ul>
        </card>
      </div>

      <div class="column is-9">
        <transition name="fade" mode="out-in">
          <router-view />
        </transition>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  middleware: 'auth',

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
