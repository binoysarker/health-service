<template lang="html">
  <transition name="slide-fade">
    <section class="navbar is-fixed-bottom message-container navbar-end" v-if="makeMessageActive">
      <article class="message is-primary is-small">
        <div class="message-header">
          <p>User Name</p>
          <button class="delete" aria-label="delete" @click="makeMessageActive = !makeMessageActive"></button>
        </div>
        <div class="message-body">
          <!-- notification from person 1 section start-->
          <div class="notification is-primary">
            Primar lorem ipsum dolor sit amet, consectetur
          </div>
          <!-- notification from person 1 section end-->
          <!-- form section start-->
          <!-- notification from person 2 section start-->
          <div class="notification is-info ">
            Primar lorem ipsum dolor sit amet, consectetur <i class="em em-smile"></i>
          </div>
          <!-- notification from person 2 section end-->
          <!-- form section start-->
          <nav class="level">
            <!-- Left side -->
            <div class="level-left">

              <div class="level-item">
                <div class="field has-addons">
                  <p class="control">
                    <input class="input" type="text" placeholder="Find a post">
                  </p>
                  <p class="control">
                    <button type="button" class="button"  name="button">
                      <i class="em em-smiley"></i>
                    </button>
                  </p>
                </div>
              </div>
            </div>
          </nav>
          <!-- form section end-->

        </div>
      </article>
    </section>
  </transition>
</template>

<script>
export default {
  computed:{
    makeMessageActive:{
      get(){return this.$store.state.makeMessageActive;},
      set(value){this.$store.commit('setMakeMessageActive',value)},
    },
  },
  methods:{

  },

}
</script>

<style lang="css" scoped>
.message-container{
  width: 22.5rem;
  border-radius: 5px;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
