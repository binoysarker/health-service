/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vuex
import {store} from './store/store';
// vue chat scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * font awesome section start
 */

import {library} from '@fortawesome/fontawesome-svg-core'
import {faUser,faReply,faInfo,faEnvelope,faExclamationTriangle,faComment,faCartPlus,faBook,faFlask,faBookOpen,faBriefcase,faSignOutAlt,faMale,faHeart,faKey,faUpload,faAngleDown} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import { dom } from '@fortawesome/fontawesome-svg-core'

dom.watch() // This will kick of the initial replacement of i to svg tags and configure a MutationObserver
library.add(faUser,faReply,faInfo,faEnvelope,faExclamationTriangle,faComment,faCartPlus,faBook,faFlask,faBookOpen,faBriefcase,faSignOutAlt,faMale,faHeart,faKey,faUpload,faAngleDown)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

/**
 * font awesome section end
 */

/**
 * Vue component section start
 */
 // landing page section start
Vue.component('landing-component', require('./components/front_end/health_service/landing_page/LandingPage.vue'));
Vue.component('get-started', require('./components/front_end/health_service/landing_page/GetStarted.vue'));
Vue.component('user-feedback', require('./components/front_end/health_service/landing_page/UserFeedback.vue'));
Vue.component('medical-tips', require('./components/front_end/health_service/landing_page/MedicalTips.vue'));
Vue.component('vue-advertisement', require('./components/front_end/health_service/landing_page/Advertise.vue'));
Vue.component('emergency-service', require('./components/front_end/health_service/landing_page/EmergencyService.vue'));
// landing page section end


// home page section start

Vue.component('vue-navbar',
require('./components/front_end/health_service/home_page/Navbar.vue'));
Vue.component('vue-user-article',
require('./components/front_end/health_service/home_page/UserArticle.vue'));
Vue.component('donner-story',
require('./components/front_end/health_service/home_page/DonnerStory.vue'));
Vue.component('donner-online',
require('./components/front_end/health_service/home_page/DonnerOnline.vue'));
Vue.component('chat-box',
require('./components/front_end/health_service/home_page/ChatBox.vue'));
Vue.component('footer-section',
require('./components/front_end/health_service/home_page/Footer.vue'));

// home page section end
Vue.component('admin-navbar',
require('./components/back_end/admin_section/AdminNavbar.vue'));
Vue.component('admin-sidebar',
require('./components/back_end/admin_section/AdminSidebar.vue'));

// admin section start
Vue.component('notification-form',
require('./components/back_end/admin_section/AdminNotificationForm.vue'));
// admin section end

/**
 * Vue component section start
 */

const app = new Vue({
    el: '#app',
    store: store,
});
