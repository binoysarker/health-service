<template lang="html">
  <section>
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="baseUrl+'public/img/advertisement.png'" alt="Placeholder image">
        </figure>
      </div>

    </div>
  </section>
</template>

<script>
export default {
  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
  },
}
</script>

<style lang="css">
</style>
