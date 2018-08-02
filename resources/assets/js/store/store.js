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
    lastChatMessages:{},
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

    singlePersonDetails:(state,personDetail)=>{
      state.singlePersonDetails = personDetail;
    },
  },
  actions:{
    showMenu:(context) => {
      context.commit('showMenu');
    },
    getEmojiName:(context,payload)=>{
      context.commit('getEmojiName',payload);
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
    allActiveUsers:(context)=>{
      // let request = function(){
      //   axios.get(context.state.baseUrl+'/get-all-users')
      //   .then(res=>{
      //     // now customizing the array
      //     let newArray = _.map(res.data,function(person){
      //       return {
      //         'id':person.id,
      //         'name': person.name,
      //         'photo_url': _.replace(person.photo_url,'public/','public/storage/'),
      //         'active': true,
      //       };
      //     });
      //     context.state.allActiveUsers = newArray;
      //     // location.reload();
      //     console.log(newArray);
      //   })
      //   .catch(err =>{console.log(err);});
      //
      // };
      // // now run the request
      // request();
      // // after a time run this request again and make this process repetadly
      // setInterval(function(){
      //   // request();
      // },40000);
    },
    getPersonDetail:(context,personId)=>{
      let getPersonDetail = _.find(context.state.allActiveUsers,function(person){
        return person.id == personId;
      });
      context.commit('singlePersonDetails',getPersonDetail);
      // now lets make a request to get all the message of the specific user
    },
  },
});
