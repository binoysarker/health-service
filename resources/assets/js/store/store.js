import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex,axios);

export const store = new Vuex.Store({
  state:{
    baseUrl: 'http://localhost/health-service',
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
    notificationTitle:'',
    notificationMessage:'',
    notificationSelected:'',
    notificationPicked:'',
    notificationSearchValue:'',
    notificationUserNames:{},
    notification_user_id:'',
    showAllNotifications:'',
    tabListItems:[ // this data is in the PostSection.vue file
      { item: 'make post', active: true, faClass:'fas fa-pencil-alt'},
      { item: 'photo', active: false, faClass:'fas fa-camera'}
    ],
    PostText:'',// this data is in the PostSection.vue file
    showEditProfileModal:false,// this data is in the EditProfileModal.vue file
    showEditProfilePictureModal:false,// this data is in the EditProfileModal.vue file
    ModalClass:'is-active',// this data is in the EditProfileModal.vue file
    profileFile:'',// this data is in the EditProfileModal.vue file
    profilePictureFile:'',// this data is in the EditProfileModal.vue file
    profilePosterUrl:'',// this data is in the EditProfileModal.vue file
    UserAllProfilePosts:'',// this data is in the PostSection.vue file
  },
  getters:{

  },
  mutations:{
    showMenu:(state)=>{
      state.makeActive = !state.makeActive;
    },
    PostText:(state,value)=>{// this data is in the PostSection.vue file
      state.PostText = value;
    },
    showEditProfileModal:(state,value)=>{// this data is in the showEditProfileModal.vue file
      state.showEditProfileModal = value;
    },
    showEditProfilePictureModal:(state,value)=>{// this data is in the showEditProfilePictureModal.vue file
      state.showEditProfilePictureModal = value;
    },
    profileFile:(state,value)=>{// this data is in the showEditProfileModal.vue file
      state.profileFile = value;
    },
    profilePictureFile:(state,value)=>{// this data is in the showEditProfileModal.vue file
      state.profilePictureFile = value;
    },
    profilePosterUrl:(state,profile_poster_url)=>{// this data is in the showEditProfileModal.vue file
      state.profilePosterUrl = profile_poster_url;
    },
    ModalClass:(state,value)=>{
      state.ModalClass = value;
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
      // console.log(user);
      state.allActiveUsers.push({
        'name':user.name,
        'photo_url':_.replace(user.photo_url, 'public/', 'public/storage/')
      });
    },
    notificationTitle:(state,value)=>{
      state.notificationTitle = value;
    },
    notificationMessage:(state,value)=>{
      state.notificationMessage = value;
    },
    notificationSelected:(state,value)=>{
      state.notificationSelected = value;
    },
    notificationPicked:(state,value)=>{
      state.notificationPicked = value;
    },
    notificationSearchValue:(state,value)=>{
      state.notificationSearchValue = value;
    },
    getUserInfo:(state,user)=>{
      state.notificationSearchValue = user.name;
      state.notification_user_id = user.id;
    },
    showAllNotifications:(state,data)=>{
      state.showAllNotifications = data;
    },
    tabListItems:(state,data)=>{
      state.tabListItems = data;
    },
    makeListItemActive:(state,tabListItem)=>{
      // now itterate over all the items in an array and checking for active status and making it true or false
      _.map(state.tabListItems,function (item) {
        if (item.item == tabListItem.item) {
          return item.active = true;
        }else {
          return item.active = false;
        }
      });
    },
    PostText:(state,text)=>{// in PostSection.vue file
      state.PostText = text;
    },
    UserAllProfilePosts:(state,userInfo)=>{// in PostSection.vue file
      state.UserAllProfilePosts = userInfo;
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
      axios.post(context.state.baseUrl+'/home/get-user-info',users)
      .then(res=>{
        // now here i have done the most beautifule and hard task for me is that to customize 2d array to 1d array
        // console.log(res.data);
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
        // console.log(finalArray);
      })
      .catch(err=>{console.log(err);})
      // state.allActiveUsers = users;
    },
    sendData:(context,UserData)=>{
      // console.log(UserData);
      axios.post(context.state.baseUrl+'/home/send-chat-message',UserData)
      .then(res =>{
        // the Response data is empty so no console.log();
        // console.log(res);
      })
      .catch(err=>{console.log(err);});

      // context.state.chatInputText = e.message;
      // context.commit('sendData');
    },
    getSinglePersonInfo:(context,user)=>{
      // console.log(user);
      axios.post(context.state.baseUrl+'/home/get-singleperson-info',user.message)
      .then(res=>{
        // console.log(res.data);
        context.commit('getSinglePersonInfo',res.data);

      })
      .catch(err=>{console.log(err);})
    },
    sendNotification:(context)=>{
      // console.log(context.state.notificationTitle,context.state.notificationMessage);
      axios.post(context.state.baseUrl+'/admin/notification',{
        title:context.state.notificationTitle,
        message:context.state.notificationMessage,
        picked:context.state.notificationPicked,
        selected:context.state.notificationSelected,
        search_value:context.state.notificationSearchValue,
        user_id:context.state.notification_user_id,
      })
      .then(res=>{
        // console.log(res);
      })
      .catch(error=>{console.log(error);})
    },
    searchUserName:(context)=>{
      // make a request to get all the users according to their name
      axios.post(context.state.baseUrl+'/admin/notification/get-user-info',{
        name:context.state.notificationSearchValue
      })
      .then(res=>{
        // console.log(res.data);
        context.state.notificationUserNames = res.data;
      })
      .catch(err=>{console.log(err);});
    },
    showAllNotifications:(context,userId)=>{
      // now make a axios request to get all the notifications and show this on the table
      axios.post(context.state.baseUrl+'/admin/show-all-notifications',{id:userId})
      .then(res=>{
        // now i am getting all the notifications of a specifiec user
        // console.log(res.data.data);
        context.commit('showAllNotifications',res.data.data);


      })
      .catch(err=>{console.log(err);})
    },
    sendPostData:(context,text)=>{
      // make a axios request to send the post data to the profiles table
      axios.post(context.state.baseUrl+'/home/user-profile/send-post-data',{profile_uploaded_posts:text})
      .then(res=>{
        // console.log(res.data);
        context.commit('UserAllProfilePosts',res.data);
        // location.reload();
      })
      .catch(error=>{console.log(error);})
    },
    UserAllProfilePosts:(context)=>{
      axios.get(context.state.baseUrl+'/home/user-profile/get-user-posts-data')
      .then(res=>{
        // console.log(res.data);
        context.commit('UserAllProfilePosts',res.data);
      })
      .catch(error=>{console.log(error);})
      context.commit('UserAllProfilePosts');
    },
  },
});
