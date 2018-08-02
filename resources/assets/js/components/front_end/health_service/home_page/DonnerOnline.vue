<template lang="html">
  <section class="container is-fullhd ">
    <article class="media" v-for="(person,index) in allActiveUsers" :key="index" v-if="auth_id != person.id" @click="getPersonDetail(person.id)">
      <figure class="media-left" @click="makeMessageActive=!makeMessageActive">
        <p class="image is-64x64">
          <img :src="person.photo_url" :alt="person.name">
        </p>
      </figure>
      <!-- {{person}} -->
      <div class="media-content" @click="makeMessageActive=!makeMessageActive">
        <div class="content">
          <p>
            <strong>{{person.name}}</strong>

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
  props:['auth_id'],
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
    }
  },
  methods:{
    getPersonDetail(personId){
      this.$store.dispatch('getPersonDetail',personId);

    }
  },
  created(){
    this.$store.dispatch('allActiveUsers');
    // console.log(this.allActiveUsers);
  },
}
</script>

<style lang="css" scoped>
article:hover{
  background-color: #DDDFE2;
  cursor: pointer;
}
p.image img{
  border-radius: 50%;
}
</style>
