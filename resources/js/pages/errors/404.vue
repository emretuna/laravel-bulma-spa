<template>
  <section class="section">
    <card class="text-center">
      <h1 class="title">
        {{ $t('page_not_found') }}
      </h1>
      <router-link :to="{ name: 'welcome' }">
        {{ $t('go_home') }}
      </router-link>
    </card>
  </section>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
