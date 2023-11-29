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
            <label for="fio" style="float: left">ФИО</label>
            <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" readonly><br>
          </div>
          <div>
            <label for="email" style="float: left">Email</label>
            <input type="email" id="mail" name="mail" placeholder="ivanivanov@gmail.com"><br>
          </div>
          <div>
            <label for="phone" style="float: left">Телефон</label>
            <input type="text" id="phone" name="phone" placeholder="+7 (777) 777 77-77"><br>
          </div>
        </section>
        <section>
          <h2>Адрес доставки</h2>
          <div>
            <div style="display: inline-block; margin: 10px; width: 20%;">
              <label for="zip" style="">Индекс</label>
              <input type="text" id="zip" name="zip" placeholder="400003"><br>
            </div>
            <div style="display: inline-block; margin: 10px; width: 70%;">
              <label for="city">Город</label>
              <input type="text" id="city" name="city" placeholder="г. Волгоград" style=""><br>
            </div>
          </div>
          <div style="display: inline-block; margin: 10px; width: 70%;">
            <label for="street">Улица</label>
            <input type="text" id="street" name="street" placeholder="ул. Штеменко 23"><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 20%;">
            <label for="building">Корпус</label>
            <input type="text" id="building" name="building" placeholder="2Б" style=""><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 20%;">
            <label for="appartments">Квартира</label>
            <input type="text" id="appartments" name="appartments" placeholder="50"><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 70%;">
            <label for="subscribe" style="margin: 30px;">Частный дом</label>
            <input type="checkbox" id="subscribe" name="subscribe" value="yes">
          </div>
        </section>
        <button type="submit">Редактировать данные</button>
      </form>
    </section>
  </body>
</template>