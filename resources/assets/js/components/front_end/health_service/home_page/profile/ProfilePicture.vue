<template lang="html">
  <section>
    <div class="card">
      <div class="card-image">
        <figure class="image profilePoster"  @mouseover="showEditProfilePoster = true" @mouseleave="showEditProfilePoster = false">
          <button type="button" class="button is-small is-primary" @click="showEditProfileModal = !showEditProfileModal" v-if="showEditProfilePoster" name="button">Edit Profile Poster</button>
          <img :src="baseUrl+'/'+profilePosterUrl | changeProfilePosterUrl" alt="Placeholder image">
        </figure>
      </div>
      <div class="card-content backColor">
        <div class="media">
          <div class="media-left">
            <figure class="image is-64x64" @mouseover="showEditProfilePicture = true" @mouseleave="showEditProfilePicture = false">
              <button type="button" v-if="showEditProfilePicture" @mouseover="showEditProfilePicture = true" @click="showEditProfilePictureModal = true"  class="button is-small is-primary" name="button">Edit Profile Picture</button>
              <img :src="baseUrl+'/'+auth_photo_url | changePhotoPath" alt="Placeholder image">
            </figure>
          </div>
          <div class="media-content ">
            <p class="title is-4" v-text="auth_name"></p>

          </div>
        </div>

        <div class="content">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Phasellus nec iaculis mauris. <a>@bulmaio</a>.

        </div>
      </div>
    </div>

  </section>
</template>

<script>
export default {
  data(){
    return {
      showEditProfilePoster:false,
      showEditProfilePicture:false,

    }
  },
  filters:{
    changePhotoPath: function (value) {
      if (!value) {
        return '';
      }else {
        let newPhotoUrl = _.replace(value,'public/','public/storage/');
        return newPhotoUrl;
      }
    },
    changeProfilePosterUrl:function (url) {
      if (!url) {
        return '';
      }else {
        let newPhotoUrl = _.replace(url,'public/','public/storage/');
        return newPhotoUrl;
      }
    }
  },
  props:['auth_name','auth_id','auth_photo_url'],
  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
    showEditProfileModal:{
      get(){return this.$store.state.showEditProfileModal;},
      set(value){this.$store.commit('showEditProfileModal',value)}
    },
    showEditProfilePictureModal:{
      get(){return this.$store.state.showEditProfilePictureModal;},
      set(value){this.$store.commit('showEditProfilePictureModal',value)}
    },
    ModalClass:{
      get(){return this.$store.state.ModalClass;},
      set(value){this.$store.commit('ModalClass',value)}
    },
    profilePosterUrl:{
      get(){return this.$store.state.profilePosterUrl;},
      set(value){this.$store.commit('profilePosterUrl',value)}
    },
  },
  methods:{

  },
  mounted(){
    // console.log(this.auth_name);
    // get user profile info from the profiles table
    axios.get(this.baseUrl+'/home/user-profile/get-user-info')
    .then(res=>{
      // console.log(res.data.profile_poster_url);
      this.profilePosterUrl = res.data.profile_poster_url;
      this.$store.commit('profilePosterUrl',res.data.profile_poster_url);
    })
    .catch(error=>{console.log(error);})
  },
}
</script>

<style lang="css" scoped>
figure.profilePoster img{
  height: 20rem;
}
.backColor{
  background-color: #CBCBCB;
}
.card-image{
  position: relative;
}
figure.profilePoster button{
  position: absolute;
  left: 0;
}
.media{
  position: relative;
}
.media button{
  position: absolute;
  left: 0;
}
</style>
