import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex,axios);

export const store = new Vuex.Store({
  state:{
    baseUrl: window.location.href,
    makeActive: false,
    makeMessageActive:false,
    emojiNamesInClass:[
      {name: 'em em-smile'},
      {name: 'em em---1'},
      {name: 'em em-angry'},
      {name: 'em em-bell'},
      {name: 'em em-blush'},
      {name: 'em em-boy'},
      {name: 'em em-carrot'},
      {name: 'em em-cop'},
      {name: 'em em-astonished'},
      {name: 'em em-banana'},
      {name: 'em em-blond-haired-man'},
    ],
    showEmojiSection: false,
    chatInputText: '',
    allActiveUsers:{},
    singlePersonDetails:{},
    allMessages:[{
      message:'',
      user:''
    }],
  },
  getters:{

  },
  mutations:{
    showMenu:(state)=>{
      state.makeActive = !state.makeActive;
    },
    setMakeMessageActive:(state,payload) =>{
      state.makeMessageActive = payload;
    },
    showEmojiSection:(state,payload)=>{
      state.showEmojiSection = payload;
    },
    chatInputText:(state,payload)=>{
      state.chatInputText = payload;
    },
    getEmojiName:(state,payload)=> {
      state.showEmojiSection = false;
      let emojiList = _.map(state.emojiNamesInClass,'name')
      // console.log(emojiList[payload]);
      state.chatInputText += ' <i class="'+emojiList[payload]+'" ></i>';
    },
    allActiveUsers:(state,allActiveUsers)=>{
      state.allActiveUsers = allActiveUsers;
    },
    getPersonDetail:(state,person)=>{
      state.singlePersonDetails = person;
      // console.log(person.name);
    },

  },
  actions:{
    showMenu:(context) => {
      context.commit('showMenu');
    },
    getEmojiName:(context,payload)=>{
      context.commit('getEmojiName',payload);
    },
    allActiveUsers:(context,users)=>{
      // console.log(users);
      // now get user info according to their names
      axios.post(context.state.baseUrl+'/get-user-info',users)
      .then(res=>{

        context.commit('allActiveUsers',res.data);
        // console.log(allUsers);
      })
      .catch(err=>{console.log(err);})
      // state.allActiveUsers = users;
    },
    sendData:(context,UserData)=>{
      // console.log(UserData);
      axios.post(context.state.baseUrl+'/send-chat-message',UserData)
      .then(res =>{
        // the Response data is empty so no console.log();
        // console.log(res);
      })
      .catch(err=>{console.log(err);});

      // context.state.chatInputText = e.message;
      // context.commit('sendData');
    },

  },
});
