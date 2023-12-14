<template>
  <body>
    <section>
      <form action="/submit_form" method="post">
        <section>  
          <div>
            <label for="email" style="float: left">Email</label>
            <input type="email" id="email" name="email"><br>
          </div>
          <div>
            <label for="password" style="float: left">Пароль</label>
            <input type="password" id="password" name="password"><br>
          </div>
        </section>
        <div class="loginbutton">
          <RouterLink class="loginbutton-elements" to="/">Войти</RouterLink>
        </div>
      </form>
    </section>
  </body>
</template>
