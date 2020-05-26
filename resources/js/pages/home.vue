<template>
  <section class="section">
    <card :title="$t('home')">
      {{ $t('you_are_logged_in') }}
    </card>
  </section>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
