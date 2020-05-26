<template>
  <div class="card">
    <div v-if="title" class="card-header">
      <p class="card-header-title">
      {{ title }}
      </p>
    </div>

    <div class="card-content">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  name: 'Card',

  props: {
    title: { type: String, default: null }
  }
}
</script>
