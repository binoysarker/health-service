import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex,axios);

export const store = new Vuex.Store({
  state:{
    baseUrl: window.location.href,
    makeActive: false,
    makeMessageActive:false,
  },
  getters:{

  },
  mutations:{
    showMenu:(state)=>{
      state.makeActive = !state.makeActive;
    },
    setMakeMessageActive:(state,payload) =>{
      state.makeMessageActive = payload;
    }
  },
  actions:{
    showMenu:(context) => {
      context.commit('showMenu');
    },

  },
});
