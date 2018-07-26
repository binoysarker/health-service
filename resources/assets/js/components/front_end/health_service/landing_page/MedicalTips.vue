<template lang="html">
  <section >
    <div class="hero">
      <div class="hero-body">
        <h1 class="title">Medical Tips</h1>
      </div>
    </div>
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img :src="baseUrl+'public/img/lading_page/health-tips.png'" alt="get start">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong><a href="#">Daily Exersice Prediction</a></strong>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros,
          </p>
        </div>

      </div>

    </article>
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img :src="baseUrl+'public/img/lading_page/health-tips.png'" alt="get start">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong><a href="#">Daily Exersice Prediction</a></strong>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros,
          </p>
        </div>

      </div>

    </article>
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img :src="baseUrl+'public/img/lading_page/health-tips.png'" alt="get start">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong><a href="#">Daily Exersice Prediction</a></strong>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros,
          </p>
        </div>

      </div>

    </article>
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img :src="baseUrl+'public/img/lading_page/health-tips.png'" alt="get start">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong><a href="#">Daily Exersice Prediction</a></strong>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros,
          </p>
        </div>

      </div>

    </article>
    <!-- more tips section -->
    <nav class="label">
      <div class="label-left">
        <div class="label-item">
          <a href="#">More Tips...</a>
        </div>
      </div>
    </nav>
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
nav.label{
  padding-top: 2rem;
}
</style>
