<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <body>
    <div class="rightbuttons">
      <RouterLink class="rightbuttons-elements" to="/">Персональные данные</RouterLink>
      <RouterLink class="rightbuttons-elements" to="/OrdersHistory">История заказов</RouterLink>
      <RouterLink class="rightbuttons-elements" to="/PasswordChange">Смена пароля</RouterLink>
      <RouterLink class="rightbuttons-elements" to="/LoginPage">Выход</RouterLink>
    </div>
    <div style="margin-right: 300px;">
      <RouterView />
    </div>
  </body>
</template>

