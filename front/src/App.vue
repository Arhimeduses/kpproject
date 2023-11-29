<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <body>
    
    <div class="rightbuttons">
      <button class="rightbuttons-elements" type="submit"><RouterLink to="/">Персональные данные</RouterLink></button>
      <button class="rightbuttons-elements" type="submit"><RouterLink to="/OrdersHistory">История заказов</RouterLink></button>
      <button class="rightbuttons-elements" type="submit">Смена пароля</button>
    </div>
    <div style="margin-right: 300px;">
      <RouterView />
    </div>
  
  </body>
  
</template>

