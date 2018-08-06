<template lang="html">
 <!-- login form section start -->
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      <form >
        <legend class="title">Notification Form</legend>
        
        <div class="field">
          <label class="label">Title</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" v-model="newNotificationTitle" name="title" type="text" placeholder="Email " value="" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
           
          </div>
          
            <p class="help is-danger">title is wrong</p>
          
        </div>
        <div class="field">
          <label class="label">Description</label>
          <div class="control">
            <textarea class="textarea" v-model="newNotificationDesc" name="description" placeholder="Description"></textarea>
            
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            
              <p class="help is-danger">description has problem</p>
            
          </div>
        </div>
        

        <div class="field">
          <div class="control">
            <button type="button" @click="addNotification()" class="button is-link">Notification</button>
          </div>
        </div>
        
      </form>
    </div>
  </section>
  <!-- login form section end -->
</template>

<script>
  export default {
    data() {
      return {
        newNotificationTitle: "", 
        newNotificationDesc: "" 
      }
    },
    created() {
      this.listenForChanges();
    },
    computed:{
      baseUrl(){
        return this.$store.state.baseUrl;
      },
    },
    methods: {
      addNotification() {
        // check if entries are not empty
        // if(!NotificationName || !NotificationDesc)
        //   return;

        // make API to save Notification
        axios.post(this.baseUrl+'/send-notification', {
          'title': this.newNotificationTitle,
          'description': this.newNotificationDesc
        })
        .then( response => {
          console.log(response.data);
          // if(response.data) { 
          //   this.newNotificationTitle = this.newNotificationDesc = "";
          // }
        })
        .catch(err =>{console.log(err);})
      },
      listenForChanges() {
        Echo.private('chatting')
          .listen('NotificationPublished', Notification => {
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }

            Notification.requestPermission( permission => {
              let notification = new Notification('New Notification alert!', {
                body: Notification.title, // content for the alert
                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
              });

              // link to page on clicking the notification
              notification.onclick = () => {
                window.open(window.location.href);
              };
            });
          })
        }
      } 
    }
</script>

<style lang="css">
</style>
