<template lang="html">
  <nav class="navbar">
    <div class="navbar-brand">
      <a class="navbar-item" :href="baseUrl">
        <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      </a>
      <div :class="showBurgerClass" @click="showMenu()" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div id="navbarExampleTransparentExample" :class="showNavClass" >
      <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="/documentation/overview/start/">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                <p class="title">TimeLine</p>
              </div>
            </div>
          </a>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="/documentation/overview/start/">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">List View</p>
                </div>
              </div>
            </a>
            <a class="navbar-item" href="/documentation/overview/start/">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">Grid View</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <a class="navbar-item" href="/documentation/overview/start/">

          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
              <p class="title">About</p>
            </div>
          </div>
        </a>
        <a class="navbar-item" href="/documentation/overview/start/">

          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
              <p class="title">Friends</p>
            </div>
          </div>
        </a>
        <a class="navbar-item " href="">

          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
              <p class="title">Photos</p>
            </div>
          </div>
        </a>
        <a class="navbar-item " href="">

          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
              <p class="title">Archive</p>
            </div>
          </div>
        </a>

        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="/documentation/overview/start/">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                <p class="title">More</p>
              </div>
            </div>
          </a>
          <div class="navbar-dropdown is-boxed ">
            <a class="navbar-item " href="">
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">Videos</p>
                </div>
              </div>
            </a>
            <a class="navbar-item" href="/documentation/overview/start/">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">Sports</p>
                </div>
              </div>
            </a>
            <a class="navbar-item" href="/documentation/overview/start/">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">Movies</p>
                </div>
              </div>
            </a>
            <a class="navbar-item " href="">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                  <p class="title">Music</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
    makeActive(){
      return this.$store.state.makeActive;
    },
    showNavClass(){
      return {
        'navbar-menu': true,
        'is-active': this.makeActive,
      };
    },
    showBurgerClass(){
      return{
        'navbar-burger burger': true,
        'is-active': this.makeActive,
      };
    },
  },
  methods:{
    showMenu(){
      this.$store.dispatch('showMenu');
    },
  },
}
</script>

<style lang="css" scoped>
nav.navbar,div.navbar-dropdown,div.navbar-menu{
  background-color: #2B2F64;
}
p.heading, p.title{
  color: white;
  font-size: 12px;
}
a.navbar-link,a.navbar-item:hover p{
  color: #2B2F64;
}
div.navbar-item.has-dropdown:hover a.navbar-link{
  background-color: #2B2F64 !important;
}
div.navbar-burger span{
  color: white;
}
.is-active{
  animation: showWithScroll .5s;
}

@keyframes showWithScroll {
  from{opacity: 0}
  to{opacity: 1}
}
.navbar-brand img{
  margin-left: 0.5rem;
}
.navbar-item{
  padding-right: 3rem;
}
</style>
