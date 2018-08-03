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
    getSinglePersonInfo:(state,user)=>{
      state.allActiveUsers.push({
        'name':user.name,
        'photo_url':_.replace(user.photo_url, 'public/', 'public/storage/')
      });
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
        // now here i have done the most beautifule and hard task for me is that to customize 2d array to 1d array
        let ArrayToConvert = res.data;
        let newArray = [];
        for (var i = 0; i < ArrayToConvert.length; i++) {
          newArray = _.concat(newArray, ArrayToConvert[i]); 
        };
        // now to modify the values in the array using map method
        let finalArray = _.map(newArray,function (person) {
          return{
            'name':person.name,
            'photo_url':_.replace(person.photo_url, 'public/', 'public/storage/')
          }
        })
        context.commit('allActiveUsers',finalArray);
        // console.log(newArray);
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
    getSinglePersonInfo:(context,user)=>{
      axios.post(context.state.baseUrl+'/get-singleperson-info',user)
      .then(res=>{
        // console.log(res.data);
        context.commit('getSinglePersonInfo',res.data);
        // context.state.allActiveUsers.push({
        //   'name':user.name,
        //   'photo_url':user.photo_url
        // });
      })
      .catch(err=>{console.log(err);})
    },
  },
});
