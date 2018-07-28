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
          <a class="navbar-item " href="">
            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-comment" aria-hidden="true"></i></p>
                <p class="title">Chat with a doctor</p>
              </div>
            </div>
          </a>
          <a class="navbar-item" href="/documentation/overview/start/">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-cart-plus" aria-hidden="true"></i></p>
                <p class="title">Order Medicnes</p>
              </div>
            </div>
          </a>
          <a class="navbar-item" href="/documentation/overview/start/">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-book" aria-hidden="true"></i></p>
                <p class="title">View medical records</p>
              </div>
            </div>
          </a>
          <a class="navbar-item " href="">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-flask" aria-hidden="true"></i></p>
                <p class="title">Book Tests</p>
              </div>
            </div>
          </a>
          <a class="navbar-item " href="">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-book-open" aria-hidden="true"></i></p>
                <p class="title">Read articles</p>
              </div>
            </div>
          </a>
          <a class="navbar-item " href="">

            <div class="level-item has-text-centered">
              <div>
                <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                <p class="title">For health care providers</p>
              </div>
            </div>
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="/documentation/overview/start/">

              <div class="level-item has-text-centered">
                <div>
                  <p class="heading"><i class="fas fa-cart-plus" aria-hidden="true"></i></p>
                  <p class="title">For clinic & Hospital</p>
                </div>
              </div>
            </a>
            <div class="navbar-dropdown is-boxed ">
              <a class="navbar-item " href="">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-comment" aria-hidden="true"></i></p>
                    <p class="title">Chat with a doctor</p>
                  </div>
                </div>
              </a>
              <a class="navbar-item" href="/documentation/overview/start/">

                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-cart-plus" aria-hidden="true"></i></p>
                    <p class="title">Order Medicnes</p>
                  </div>
                </div>
              </a>
              <a class="navbar-item" href="/documentation/overview/start/">

                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-book" aria-hidden="true"></i></p>
                    <p class="title">View medical records</p>
                  </div>
                </div>
              </a>
              <a class="navbar-item " href="">

                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-flask" aria-hidden="true"></i></p>
                    <p class="title">Book Tests</p>
                  </div>
                </div>
              </a>
              <a class="navbar-item " href="">

                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-book-open" aria-hidden="true"></i></p>
                    <p class="title">Read articles</p>
                  </div>
                </div>
              </a>
              <a class="navbar-item " href="">

                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading"><i class="fas fa-briefcase" aria-hidden="true"></i></p>
                    <p class="title">For health care providers</p>
                  </div>
                </div>
              </a>

            </div>
          </div>
        </div>
        <!-- login section -->
        <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">


              <slot name="guest_name"></slot>
              <slot name="user_name"></slot>

            <div class="navbar-dropdown is-boxed">

              <slot name="guest_section"></slot>
              <slot name="user_section"></slot>
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

<style lang="css">
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

</style>
