<template lang="html">
  <section class="container is-fullhd">
    <article class="media">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img src="public/img/advertisement.png" alt="Placeholder image">
        </p>
      </figure>
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>

          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
    </article>
    <article class="media">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img src="public/img/advertisement.png" alt="Placeholder image">
        </p>
      </figure>
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>

          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
    </article>
    <article class="media">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img src="public/img/advertisement.png" alt="Placeholder image">
        </p>
      </figure>
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>

          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
    </article>
    <article class="media">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img src="public/img/advertisement.png" alt="Placeholder image">
        </p>
      </figure>
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>

          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
    </article>
    <article class="media">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img src="public/img/advertisement.png" alt="Placeholder image">
        </p>
      </figure>
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>

          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
    </article>

  </section>
</template>

<script>
export default {
  computed:{
    makeMessageActive:{
      get(){return this.$store.state.makeMessageActive;},
      set(value){this.$store.commit('setMakeMessageActive',value)},
    },
  },
}
</script>

<style lang="css" scoped>
article:hover{
  background-color: #DDDFE2;
  cursor: pointer;
}
p.image img{
  border-radius: 50%;
}
</style>
