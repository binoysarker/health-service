<template lang="html">
  <transition name="slide-fade">
    <section class="navbar is-fixed-bottom message-container navbar-end" v-if="makeMessageActive">
      <article class="message is-primary is-small">
        <div class="message-header">
          <p>{{singlePersonDetails.name}}</p>
          <button class="delete" aria-label="delete" @click="makeMessageActive = !makeMessageActive"></button>
        </div>
        <div class="message-body" v-chat-scroll>
          <!-- notification from person 1 section start-->
          <div :class="notificationClass" v-for="(message,index) in allMessages" :key="index" v-if="index > 0" >
            <span class="tag is-dark" v-if="message.user">{{message.user}}</span>
            <span class="tag is-dark" v-else>you</span>
            <p v-html="message.message"></p>
          </div>

          <!-- notification from person 1 section end-->

          <!-- form section end-->
        </div>
        <p>
          <div class="notification is-primary" v-text="chatInputText">
            <!-- all the written text message will be shown here -->
          </div>
          <span class="tag is-danger" v-show="typing">{{typing}}</span>
        </p>
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
  data(){
    return{
      // allMessages:[{'text_body':''}],
      makeNotificationClassPrimary:true,
      makeNotificationClassInfo:false,
      typing:'',
    }
  },
  computed:{
    notificationClass(){
      return{
        'notification': true,
        'is-primary': this.makeNotificationClassPrimary,
        'is-info': this.makeNotificationClassInfo
      }
    },
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
    allActiveUsers(){
      return this.$store.state.allActiveUsers;
    },
    singlePersonDetails(){
      return this.$store.state.singlePersonDetails;
    },
    lastChatMessages(){
      return this.$store.state.lastChatMessages;
    },
    allMessages(){
      return this.$store.state.allMessages;
    },
  },
  watch:{
    chatInputText(){
      Echo.private('chatting')
    .whisper('typing', {
        message: this.chatInputText
    });
    },
  },
  methods:{
    getEmojiName(index){
      this.$store.dispatch('getEmojiName',index);
    },
    sendData(){
      // console.log(this.auth_id);

      // this is to show the typed message in the array for first time
      this.allMessages.push({message: this.chatInputText});
      // now send the message with data
      this.$store.dispatch('sendData',{message:this.chatInputText,user:this.singlePersonDetails.name});

      // now to hide the typing text
      this.showTyping = false;
      // now empty up the chatbox
      this.chatInputText = '';
    },
  },
  mounted(){
    // console.log(this.allActiveUsers);
    // after sending data you will get it and push it to the array
    Echo.private("chatting")
    .listen('ChatEvent', (e) => {
      // this.chatInputText = e.message;
      this.allMessages.push({
        'message':e.message,
        'user':e.user
      });
      console.log(e);
    })
    // now to listen for the whisper event and show typing in the chatbox
    .listenForWhisper('typing', (e) => {
      if(e.message != ''){
        // console.log('typing');
        this.typing = 'typing...';
      }else{
        // console.log('');
        this.typing = '';
      }
        // console.log(e.message);
    });
    // now time to making function to show the users joining and leaving the chat room
    Echo.join('chatting')
    .here((users) => {
        console.log(users);
    })
    .joining((user) => {
        // console.log(user.name);
    })
    .leaving((user) => {
        // console.log(user.name);
    });
  },
  props:['auth_id','auth_name'],

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
.message-body{
  max-height: 10rem;
  overflow: scroll;
}
textarea.textarea{
  min-height: 3rem;
}
.message{
  width: 23rem;
}
</style>
