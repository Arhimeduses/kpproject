import { createRouter, createWebHistory } from 'vue-router'
import Main from '../views/Main.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Main',
      component: Main
    },

    //какие-то штуки для импорта файликов из папки components
    {
      path: '/PersonalData',
      name: 'PersonalData',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../components/PersonalData.vue')
    },

    {
      path: '/OrdersHistory',
      name: 'OrdersHistory',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../components/OrdersHistory.vue')
    },

    {
      path: '/PasswordChange',
      name: 'PasswordChange',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../components/PasswordChange.vue')
    }
    
  ]
})

export default router
