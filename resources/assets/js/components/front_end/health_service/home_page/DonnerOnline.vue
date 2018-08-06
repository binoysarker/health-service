<template lang="html">
  <section class="container is-fullhd ">
      <article class="media" @click="getPersonDetail(person)" v-for="(person,index) in allActiveUsers" :key="index" v-if="auth_name != person.name">
        <!-- {{person}} -->
        <figure class="media-left" >
          <p class="image is-32x32"  >

            <img :src="person.photo_url" :alt="person.name">
            <!-- {{person}} -->
          </p>
        </figure>
        <div class="media-content" >
          <div class="content"  @click="getPersonDetail(person)">
            <p>
              <strong @click="getPersonDetail(person)">{{person.name}}</strong>

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
    allActiveUsers:{
      get(){return this.$store.state.allActiveUsers;},
      set(value){this.$store.commit('allActiveUsers',value)}
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
