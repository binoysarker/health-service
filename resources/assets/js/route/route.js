import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

const routes = [
  // { path: '/foo', component: Foo },
  // { path: '/bar', component: Bar }
]

export const router = new VueRouter({
  mode:'history',
  routes // short for `routes: routes`
})
