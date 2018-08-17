<template lang="html">
  <div class="">
    <!-- showEditProfileModal form section start-->
    <div :class="{ModalClass:showEditProfileModal}" v-if="showEditProfileModal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Modal title</p>
          <button class="delete" aria-label="close"  @click="showEditProfileModal = false"></button>
        </header>
        <section class="modal-card-body">
          <form >
            <div class="file has-name is-boxed">
              <label class="file-label">
                <input class="file-input" ref="profileFile" type="file" @change="handleFileUpload()" name="editFile">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose a file…
                  </span>
                </span>
                <span class="file-name">
                  Screen Shot 2017-07-29 at 15.54.25.png
                </span>
              </label>
            </div>
          </form>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" @click="submitProfileFile()">Upload Profile Poster</button>
          <button class="button" @click="showEditProfileModal = false">Cancel</button>
        </footer>
      </div>
    </div>
    <!-- showEditProfileModal form section end-->
    <!-- showEditProfilePictureModal form section start-->
    <div :class="{ModalClass:showEditProfilePictureModal}" v-if="showEditProfilePictureModal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Modal title</p>
          <button class="delete" aria-label="close"  @click="showEditProfilePictureModal = false"></button>
        </header>
        <section class="modal-card-body">
          <form >
            <div class="file has-name is-boxed">
              <label class="file-label">
                <input class="file-input" ref="profilePictureFile" type="file" @change="handlePictureFileUpload()" name="editFile">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose a file…
                  </span>
                </span>
                <span class="file-name">
                  Screen Shot 2017-07-29 at 15.54.25.png
                </span>
              </label>
            </div>
          </form>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" @click="submitProfilePictureFile()">Upload Profile Picture</button>
          <button class="button" @click="showEditProfilePictureModal = false">Cancel</button>
        </footer>
      </div>
    </div>
    <!-- showEditProfilePictureModal form section end-->
  </div>
</template>

<script>
export default {
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
    profileFile:{
      get(){return this.$store.state.profileFile;},
      set(value){this.$store.commit('profileFile',value)}
    },
    profilePictureFile:{
      get(){return this.$store.state.profilePictureFile;},
      set(value){this.$store.commit('profilePictureFile',value)}
    },
  },
  methods:{
    handleFileUpload(){
      this.profileFile = this.$refs.profileFile.files[0];
      // console.log(this.profileFile);
    },
    handlePictureFileUpload(){
      this.profilePictureFile = this.$refs.profilePictureFile.files[0];
      // console.log(this.profileFile);
    },
    submitProfileFile(){
      let formData = new FormData();
      formData.append('profileFile',this.profileFile);
      // make a post request to upload the profileFile
      axios.post(this.baseUrl+'/home/user-profile',
      formData,
      {
        headers:{
          'Content-Type':'multipart/form-data'
        }
      }
    )
    .then(res=>{
      // console.log(res.data);
      location.reload();
    })
    .catch(error=>{console.log(error);})
    },
    submitProfilePictureFile(){
      let formData = new FormData();
      formData.append('profilePictureFile',this.profilePictureFile);
      // make a post request to upload the profilePictureFile
      axios.post(this.baseUrl+'/home/user-profile',
      formData,
      {
        headers:{
          'Content-Type':'multipart/form-data'
        }
      }
    )
    .then(res=>{
      // console.log(res.data);
      location.reload();
    })
    .catch(error=>{
      // console.log(error);
      // this.$store.commit('showEditProfilePictureModal',false);
      location.reload();
    })
    },
  },

}
</script>

<style lang="css">
</style>
