<template lang="html">
  <section class="container is-fullhd ">
    <div  v-for="(person,index) in allActiveUsers" :key="index" >
      <article class="media" @click="getPersonDetail(single)" v-for="(single,i) in  person" :key="i" v-if="auth_name != single.name">
        <figure class="media-left" >
          <p class="image is-32x32"  >

            <img :src="(single.photo_url).replace('public/','public/storage/')" :alt="single.name">
            <!-- {{single}} -->
          </p>
        </figure>
        <div class="media-content" >
          <div class="content"  @click="getPersonDetail(single)">
            <p>
              <strong @click="getPersonDetail(single)">{{single.name}}</strong>

            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item image is-24x24">
                <img src="public/img/home_page/online.png" alt="active" title="online" height="28">
              </a>
            </div>
          </nav>
        </div>
      </article>
    </div>


  </section>
</template>

<script>
export default {
  props:['auth_name'],

  computed:{
    baseUrl(){
      return this.$store.state.baseUrl;
    },
    makeMessageActive:{
      get(){return this.$store.state.makeMessageActive;},
      set(value){this.$store.commit('setMakeMessageActive',value)},
    },
    allActiveUsers(){
      return this.$store.state.allActiveUsers;
    },
    
  },
  methods:{
    getPersonDetail(person){
      this.makeMessageActive = ! this.makeMessageActive;
      this.$store.commit('getPersonDetail',person);

    }
  },
  created(){
    // this.$store.dispatch('allActiveUsers');
    // console.log(this.allActiveUsers);
  },
}
</script>

<style lang="css" scoped>
article:hover{
  background-color: #DDDFE2;
  cursor: pointer;
}

</style>
