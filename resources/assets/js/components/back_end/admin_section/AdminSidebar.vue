<template lang="html">
  <aside class="menu ">
    <p class="menu-label">
      <article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="https://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
        <strong>John Smith</strong>
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
    </p>
    <ul class="menu-list">
      <li>
        <a @click="showItem1 = !showItem1">
          Dashboard
          <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
        <transition name="slide">
          <ul v-if="showItem1">
            <li><a :href="baseUrl+'/admin/notification'">send notification</a></li>
            <li><a>Plugins</a></li>
            <li><a>Add a member</a></li>
          </ul>
        </transition>
      </li>
      <li>
        <a @click="showItem2 = !showItem2">
          Hospital
          <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
        <transition name="slide">
          <ul v-if="showItem2">
            <li><a>Members</a></li>
            <li><a>Plugins</a></li>
            <li><a>Add a member</a></li>
          </ul>
        </transition>
      </li>
      <li>
        <a @click="showItem3 = !showItem3">
          Blood
          <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
        <transition name="slide">
          <ul v-if="showItem3">
            <li><a>Members</a></li>
            <li><a>Plugins</a></li>
            <li><a>Add a member</a></li>
          </ul>
        </transition>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {
  data(){
    return {
      showItem1:false,
      showItem2:false,
      showItem3:false,
    }
  },
  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
  },
}
</script>

<style lang="css" scoped>
aside{
  background-color: #2D3E4E;
  height: 100%;
}
ul,li,a,p,strong{
  color: white;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-enter-active {
  animation: slide .5s;
}
.slide-leave-active {
  animation: slide .5s reverse;
}
@keyframes slide {
  0%{
    transform: scaleY(0);
  }
  100%{
    transform: scaleY(1);
  }
}
</style>
