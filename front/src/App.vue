<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <body>
    <div class="rightbuttons">
      <RouterLink class="rightbuttons-elements" to="/">Персональные данные</RouterLink>
      <RouterLink class="rightbuttons-elements" to="/OrdersHistory">История заказов</RouterLink>
      <RouterLink class="rightbuttons-elements" to="/PasswordChange">Смена пароля</RouterLink>
    </div>
    <div style="margin-right: 300px;">
      <RouterView />
    </div>
  </body>
</template>

<style scoped>
.rightbuttons {
  display: flex;
  flex-direction: column;
  gap: 1cm; /* Расстояние между кнопками */
}

.rightbuttons-elements {
  text-decoration: none;
  color: white; /* Белый цвет текста */
  background-color: grey; /* Черный цвет фона */
  padding: 10px; /* Поля вокруг текста для создания кнопки */
  text-align: center; /* Выравнивание текста по центру */
  cursor: pointer;
}

.rightbuttons-elements:hover {
  text-decoration: underline;
}
</style>
