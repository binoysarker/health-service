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
    showNotification(data){
      // Let's check if the browser supports notifications
      if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
      }

      // Let's check whether notification permissions have already been granted
      else if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        _.forEach(data,function (item) {
          var notification = new Notification(item.title, {
            body: item.message
          });
          notification.onclick = function(event) {
            event.preventDefault(); // prevent the browser from focusing the Notification's tab
            window.open('http://www.mozilla.org', '_blank');
          }
        });
      }

      // Otherwise, we need to ask the user for permission
      else if (Notification.permission !== "denied") {
        Notification.requestPermission(function (permission) {
          // If the user accepts, let's create a notification
          if (permission === "granted") {
            _.forEach(data,function (item) {
              var notification = new Notification(item.title, {
                body: item.message
              });
              notification.onclick = function(event) {
                event.preventDefault(); // prevent the browser from focusing the Notification's tab
                window.open('http://www.mozilla.org', '_blank');
              }
            });
          }
        });
      }

      // At last, if the user has denied notifications, and you
      // want to be respectful there is no need to bother them any more.
    },
  },
  mounted(){ // this section is to send a request and check for user notifications
    // make axios request
    axios.get(this.baseUrl+'/get-user-notification')
    .then(res=>{
      // console.log(res.data);
      // now it's time to show the desktop notification using javascript desktop notification system
      this.showNotification(res.data);
    })
    .catch(error=>{console.log(error);})
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
.navbar-brand img{
  margin-left: 0.5rem;
}
</style>
