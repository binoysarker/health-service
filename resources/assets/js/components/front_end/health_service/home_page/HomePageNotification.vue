<template lang="html">

</template>

<script>
export default {
  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
  },
  methods:{
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
    axios.get(this.baseUrl+'/home/get-user-notification')
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
</style>
