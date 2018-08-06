<template lang="html">
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      <form >
        <legend class="title">Notification Form</legend>

        <div class="field">
          <label class="label">Title</label>
          <div class="control has-icons-right">
            <input class="input " name="title" v-model="notificationTitle" type="text" placeholder="Title " value="" required>
            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>

          </div>

          <p class="help is-danger">title error</p>

        </div>
        <div class="field">
          <label class="label">Message</label>
          <div class="control has-icons-right">
            <textarea name="message" class="textarea" v-model="notificationMessage" required></textarea>
            <span class="icon is-small is-right">
              <i class="fas fa-envelope"></i>
            </span>

            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>

          </div>

          <p class="help is-danger">message error</p>

        </div>
        <div class="field">
          <label class="label">Want to send notification to many users at a time?</label>
          <div class="control">
            <label class="radio">
              <input type="radio" name="answer" value="yes" @click="showUserCategory = true" v-model="notificationPicked">
              Yes
            </label>
            <label class="radio">
              <input type="radio" name="no" value="no" @click="showSingleUserSearch()" v-model="notificationPicked">
              No
            </label>
          </div>
        </div>
        <div class="field" v-if="showUserCategory">
          <label class="label">Choose User Category</label>
          <div class="select">
            <select v-model="notificationSelected">
              <option value="registered">Registered</option>
              <option value="blood_donner">Blood Donner</option>
              <option value="not_blood_donner">Don't Donate Blood</option>
            </select>
          </div>
        </div>
        <div class="field" v-if="showSingleUserSearchForm">
          <label class="label">Search for Single User name</label>
          <div class="control">
            <input class="input" v-model="notificationSearchValue" type="text" placeholder="Search here..." @keyup="searchUserName()" required>
          </div>
          <div class="box">
           <div class="content">
            <ul>
              <li v-for="(user,index) in notificationUserNames">
                <a class=" is-link" @click="getUserInfo(user)">
                  {{user.name}}
                </a>
              </li>
            </ul>
           </div>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="button" @click="sendNotification()" class="button is-link">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data(){
    return {
      showUserCategory:false,
      showSingleUserSearchForm:false,
    }
  },
  computed:{
    notificationTitle:{
      get(){return this.$store.state.notificationTitle;},
      set(value){this.$store.commit('notificationTitle',value)},
    },
    notificationMessage:{
      get(){return this.$store.state.notificationMessage;},
      set(value){this.$store.commit('notificationMessage',value)},
    },
    notificationPicked:{
      get(){return this.$store.state.notificationPicked;},
      set(value){this.$store.commit('notificationPicked',value)},
    },
    notificationSelected:{
      get(){return this.$store.state.notificationSelected;},
      set(value){this.$store.commit('notificationSelected',value)},
    },
    notificationSearchValue:{
      get(){return this.$store.state.notificationSearchValue;},
      set(value){this.$store.commit('notificationSearchValue',value)},
    },
    notificationUserNames:{
      get(){return this.$store.state.notificationUserNames;},
      set(value){this.$store.commit('notificationUserNames',value)},
    },
    notification_user_id:{
      get(){return this.$store.state.notification_user_id;},
      set(value){this.$store.commit('notification_user_id',value)},
    },
  },
  methods:{
    sendNotification(){
      this.$store.dispatch('sendNotification');
    },
    searchUserName(){
      this.$store.dispatch('searchUserName');
    },
    getUserInfo(user){
      this.$store.commit('getUserInfo',user);
    },
    showSingleUserSearch(){
      this.showUserCategory = false;
      this.showSingleUserSearchForm = true;
    },
  },
}
</script>

<style lang="css" scoped>
.box{
  height: 8rem;
  overflow: scroll;
}
.box ul{
  list-style-type: none;
}
</style>
