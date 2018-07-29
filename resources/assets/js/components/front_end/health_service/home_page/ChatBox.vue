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
          <div class="notification is-info " v-html="chatInputText"></div>
          <!-- notification from person 2 section end-->
          <!-- form section start-->
          <nav class="level">
            <!-- Left side -->
            <div class="level-left">

              <div class="level-item">
                <div class="field has-addons">
                  <p class="control">
                    <!-- <input class="input" v-model="chatInputText" type="text" placeholder="Start Typing"> -->
                    <textarea name="name" v-model.trim="chatInputText"
                    @keyup.enter="sendData()"
                    class="textarea" placeholder="Start Typing"></textarea>
                  </p>
                  <p class="control">
                    <button type="button emojiButton" class="button" @click="showEmojiSection = !showEmojiSection"  name="button">
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
      <!-- show emojies section start -->
      <div class="notification is-info showEmojiSection" v-if="showEmojiSection">
        <button class="delete" @click="showEmojiSection = !showEmojiSection"></button>
        <button class="button is-info"
        v-for="(emoji,index) in emojiNamesInClass" :key="index"
        @click="getEmojiName(index)">
          <i :class="emoji.name" ></i>
        </button>
      </div>
      <!-- show emojies section end -->
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
    emojiNamesInClass(){
      return this.$store.state.emojiNamesInClass;
    },
    showEmojiSection:{
      get() {return this.$store.state.showEmojiSection;},
      set(value){this.$store.commit('showEmojiSection',value)},
    },
    chatInputText:{
      get(){return this.$store.state.chatInputText;},
      set(value){this.$store.commit('chatInputText',value)}
    },
  },
  methods:{
    getEmojiName(index){
      this.$store.dispatch('getEmojiName',index);
    },
    sendData(){
      // console.log(this.auth_id);
      let auth_id = this.auth_id;
      this.$store.dispatch('sendData',auth_id);
    },
  },
  props:['auth_id'],

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
/*
showEmojiSection
*/
.emojiButton{
  position: relative;
}
.showEmojiSection{
  position: absolute;
  z-index: 40;
  left: 6rem;
  top: 7.5rem;
  overflow: scroll;
  height: 7rem;
}
</style>
