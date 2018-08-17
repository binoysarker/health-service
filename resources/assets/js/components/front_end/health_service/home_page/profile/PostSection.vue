<template lang="html">
  <div class="">
    <section class="">
      <div class="tabs">
        <ul>
          <li v-for="(tabListItem, index) in tabListItems" :key="index" :class="{'is-active':tabListItem.active}"><a @click="showForm(tabListItem)"><i :class="tabListItem.faClass"></i>{{tabListItem.item}} </a></li>
        </ul>
      </div>
      <div class="columns">
        <div class="column">
          <!-- this section is to show the make post form section start -->
          <section class="section" v-if="showMakePostForm">
            <div class="field">
              <div class="control">
                <textarea name="textarea" v-model="PostText" class="textarea" ></textarea>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input class="button is-small is-primary" @click="sendPostData()" type="button" value="Add Post">
              </div>
            </div>
          </section>
          <!-- this section is to show the make post form section end -->
          <!-- this section is to show upload photo form section start -->
          <section class="section" v-if="showUploadPhotoForm">
            <div class="file has-name is-boxed is-primary">
              <label class="file-label">
                <input class="file-input" ref="upload_post_picture" @change="getFileInfo()" type="file" name="resume">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Upload Photo
                  </span>
                </span>
                <span class="notification is-danger" v-if="hasError">
                  {{fileError[0]}}
                </span>
                <span class="file-name" v-else>
                  {{fileName}}
                </span>
              </label>
            </div>

          </section>
          <!-- this section is to show upload photo form section end -->

        </div>
      </div>
    </section>
    <!-- this section is to show the uploaded posts/photo/video start -->
    <section class="">
     <div class="box">
      <div class="content">
       <p>
         {{PostText}}
       </p>
      </div>
     </div>
    </section>
    <!-- make a forloop to show the uploaded posts start -->
    <section class="box" v-for="(user,index) in UserAllProfilePosts" :key="user.id">
     <article class="content" >
       <p>
         {{user.profile_uploaded_posts}}
       </p>
       <figure class="image is-128x128">
         <img :src="baseUrl+'/'+user.profile_uploaded_photo | changePhotoPath" alt="">
       </figure>
     </article>
    </section>
    <!-- make a forloop to show the uploaded posts end -->
    <!-- this section is to show the uploaded posts/photo/video end -->
  </div>
</template>

<script>
export default {
  filters:{
    changePhotoPath: function (value) {
      if (!value) {
        return '';
      }else {
        let newPhotoUrl = _.replace(value,'public/','public/storage/');
        return newPhotoUrl;
      }
    },
  },
  data(){
    return {
      showMakePostForm:true,
      showUploadPhotoForm:false,
      fileName:'',
      fileError:'',
      hasError:false
    }
  },
  props: ["auth_photo_url"],
  computed: {
    baseUrl() {
      return this.$store.state.baseUrl;
    },
    tabListItems: {
      get() {
        return this.$store.state.tabListItems;
      },
      set(value) {
        this.$store.commit("tabListItems", value);
      }
    },
    PostText: {
      get() {
        return this.$store.state.PostText;
      },
      set(value) {
        this.$store.commit("PostText", value);
      }
    },
    UserAllProfilePosts: {
      get() {
        return this.$store.state.UserAllProfilePosts;
      },
      set(value) {
        this.$store.commit("UserAllProfilePosts", value);
      }
    },
  },
  methods:{
    showForm(tabListItem){
      // console.log(tabListItem.item);
      // showing form according to the item
      if (tabListItem.item == 'make post') {
        this.$store.commit('makeListItemActive',tabListItem);
        this.showMakePostForm = true;
        this.showUploadPhotoForm = false;
      }
      else if (tabListItem.item == 'photo') {
        this.$store.commit('makeListItemActive',tabListItem);
        this.showUploadPhotoForm = true;
        this.showMakePostForm = false;
      }
    },
    sendPostData(){
      this.$store.dispatch('sendPostData',this.PostText);
      this.PostText = '';
    },
    getFileInfo(){
      let file = this.$refs.upload_post_picture.files[0];
      this.fileName = file.name;
      let formData = new FormData();
      formData.append('profile_uploaded_posts_picture',file);
      // now make an axios request to send the file info and save it into the database
      axios.post(this.baseUrl+'/home/user-profile/send-post-data',formData,
      {
        headers:{
          'Content-Type':'multipart/form-data'
        }
      })
      .then(res=>{
        if (res.data.profile_uploaded_posts_picture) {
          // console.log(res.data.profile_uploaded_posts_picture);
          this.hasError = true;
          this.fileError = res.data.profile_uploaded_posts_picture;
        }else {
          this.hasError = false;
          this.$store.dispatch('UserAllProfilePosts');
          // location.reload();
          // console.log(res.data);
        }
      })
      .catch(error=>{
        console.log(error);
      });
    },
  },
  mounted(){
    this.$store.dispatch('UserAllProfilePosts');
  },
}
</script>

<style lang="css">
</style>
