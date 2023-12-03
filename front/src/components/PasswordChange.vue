<script setup lang="ts">
//import { RouterLink, RouterView } from 'vue-router'
// Определение интерфейса для данных формы
  interface FormData {
    fio: string;
    email: string;
    phone: string;
    zip: string;
    city: string;
    street: string;
    building: string;
    appartment: string;
    isPrivateHouse: boolean;
  }

  // Получение формы и ее элементов
  const form = document.querySelector('form');

  if (form instanceof HTMLFormElement) {
    const fioInput = document.getElementById('fio') as HTMLInputElement;
    const emailInput = document.getElementById('mail') as HTMLInputElement;
    const phoneInput = document.getElementById('phone') as HTMLInputElement;
    const zipInput = document.getElementById('zip') as HTMLInputElement;
    const cityInput = document.getElementById('city') as HTMLInputElement;
    const streetInput = document.getElementById('street') as HTMLInputElement;
    const buildingInput = document.getElementById('building') as HTMLInputElement;
    const appartmentInput = document.getElementById('appartments') as HTMLInputElement;
    const isPrivateHouseCheckbox = document.getElementById('subscribe') as HTMLInputElement;

    // Заполнение формы из сохраненных данных
    const savedData: FormData = {
      fio: "", // Здесь должны быть сохраненные данные из бд
      email: "",
      phone: "",
      zip: "",
      city: "",
      street: "",
      building: "",
      appartment: "",
      isPrivateHouse: false
    };

    fioInput.value = savedData.fio;
    emailInput.value = savedData.email;
    phoneInput.value = savedData.phone;
    zipInput.value = savedData.zip;
    cityInput.value = savedData.city;
    streetInput.value = savedData.street;
    buildingInput.value = savedData.building;
    appartmentInput.value = savedData.appartment;
    isPrivateHouseCheckbox.checked = savedData.isPrivateHouse;

    // Обработчик события для кнопки "Редактировать данные"
    form.addEventListener('submit', (event) => {
      event.preventDefault(); // Предотвращение отправки формы

      // Сохранение измененных данных
      const editedData: FormData = {
        fio: fioInput.value,
        email: emailInput.value,
        phone: phoneInput.value,
        zip: zipInput.value,
        city: cityInput.value,
        street: streetInput.value,
        building: buildingInput.value,
        appartment: appartmentInput.value,
        isPrivateHouse: isPrivateHouseCheckbox.checked
      };

      // Здесь нужно сохранить данные в базе данных

      // Если данные успешно обновлены, отобразить сообщение об успешном обновлении данных
      console.log('Данные успешно обновлены:', editedData);
    });
  } else {
    console.error('Форма не была найдена на странице');
  }
</script>

<template>
  <body>
    <section>
      <form action="/submit_form" method="post">
        <section>  
          <div>
            <label for="old_password" style="float: left">Старый пароль</label>
            <input type="password" id="old_password" name="old_password"><br>
          </div>
          <div>
            <label for="new_password" style="float: left">Новый пароль</label>
            <input type="password" id="new_password" name="mnew_passwordail"><br>
          </div>
          <div>
            <label for="new_password2" style="float: left">Повторите новый пароль</label>
            <input type="password" id="new_password2" name="new_password2"><br>
          </div>
        </section>
        
        <button type="submit">Сохранить</button>
      </form>
    </section>
  </body>
</template>