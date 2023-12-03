<template>
  <body>
    <section>
      <form @submit.prevent="submitForm">
        <section>  
          <div>
            <label for="fio" style="float: left">ФИО</label>
            <input v-model="formData.fio" @input="validateFio" type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович"><br>
            <p v-if="fioError" class="error">{{ fioError }}</p>
          </div>
          <div>
            <label for="email" style="float: left">Email</label>
            <input v-model="formData.email" @input="validateEmail" type="email" id="mail" name="mail" placeholder="ivanivanov@gmail.com"><br>
            <p v-if="emailError" class="error">{{ emailError }}</p>
          </div>
          <div>
            <label for="phone" style="float: left">Телефон</label>
            <input v-model="formData.phone" @input="validatePhone" type="text" id="phone" name="phone" placeholder="+7 (777) 777 77-77">
            <p v-if="phoneError" class="error">{{ phoneError }}</p>
          </div>
        </section>
        <section>
          <h2>Адрес доставки</h2>
          <div>
            <div style="display: inline-block; margin: 10px; width: 20%;">
              <label for="zip" style="">Индекс</label>
              <input v-model="formData.zip" @input="validateZip" type="text" id="zip" name="zip" placeholder="400003"><br>
            </div>
            <div style="display: inline-block; margin: 10px; width: 70%;">
              <label for="city">Город</label>
              <input v-model="formData.city" @input="validateCity" type="text" id="city" name="city" placeholder="Волгоград" style=""><br>
            </div>
            <p v-if="zipError" class="error">{{ zipError }}</p>
            <p v-if="cityError" class="error">{{ cityError }}</p>
          </div>
          <div>
            <div style="display: inline-block; margin: 10px; width: 70%;">
              <label for="street">Улица</label>
              <input v-model="formData.street" @input="validateStreet" type="text" id="street" name="street" placeholder="Штеменко"><br>
            </div>
            <div style="display: inline-block; margin: 10px; width: 20%;">
              <label for="building">Дом</label>
              <input v-model="formData.building" @input="validateBuilding" type="text" id="building" name="building" placeholder="2Б" style=""><br>
            </div>
            <p v-if="streetError" class="error">{{ streetError }}</p>
            <p v-if="buildingError" class="error">{{ buildingError }}</p>
          </div>
          <div style="display: inline-block; margin: 10px; width: 20%;">
            <label for="appartments">Квартира</label>
            <input v-model="formData.appartment" @input="validateAppartment" type="text" id="appartments" name="appartments" placeholder="50"><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 70%;">
            <label for="subscribe" style="margin: 30px;">Частный дом</label>
            <input v-model="formData.isPrivateHouse" type="checkbox" id="subscribe" name="subscribe" value="yes">
          </div>
          <p v-if="appartmentError" class="error">{{ appartmentError }}</p>
        </section>
        <button type="submit" :disabled="hasValidationError">Редактировать данные</button>
      </form>
    </section>
  </body>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const hasValidationError = ref(false);

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

// Состояние формы и ошибок валидации
const formData = ref<FormData>({
  fio: "",
  email: "",
  phone: "",
  zip: "",
  city: "",
  street: "",
  building: "",
  appartment: "",
  isPrivateHouse: false
});

const fioError = ref<string | null>(null);
const emailError = ref<string | null>(null);
const phoneError = ref<string | null>(null);
const zipError = ref<string | null>(null);
const cityError = ref<string | null>(null);
const streetError = ref<string | null>(null);
const buildingError = ref<string | null>(null);
const appartmentError = ref<string | null>(null);

// Валидация ФИО
const validateFio = () => {
  const fioPattern = /^[А-Яа-яЁё\s]+$/; // Регулярное выражение для проверки ФИО

  if (formData.value.fio.trim() === '') 
  {
    fioError.value = null; // Очистка ошибки, если поле пустое
  } 
  else if (!fioPattern.test(formData.value.fio)) 
  {
    fioError.value = 'ФИО не должно содержать латинские буквы и цифры';
  } 
  else 
  {
    fioError.value = null;
  }

  hasValidationError.value = fioError.value !== null;
};

// Валидация email
const validateEmail = () => {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (formData.value.email.trim() === '') {
    emailError.value = null; // Очистка ошибки, если поле пустое
  } else if (!emailPattern.test(formData.value.email)) {
    emailError.value = 'Неверный формат email';
  } else {
    emailError.value = null;
  }

  hasValidationError.value = emailError.value !== null;
};

// Валидация телефона
const validatePhone = () => {
  const phonePattern = /^\d{10,13}$/;

  if (formData.value.phone.trim() === '') {
    phoneError.value = null; // Очистка ошибки, если поле пустое
  } else if (!phonePattern.test(formData.value.phone) || formData.value.phone.replace(/[^\d]/g, '').length < 11) {
    phoneError.value = 'Неверный формат телефона или некорректная длина (минимум 11 цифр)';
  } else {
    phoneError.value = null;
  }

  hasValidationError.value = phoneError.value !== null;
};

// Валидация почтового индекса
const validateZip = () => {
  const zipPattern = /^\d{6}$/;
  
  if (formData.value.zip.trim() === '') {
    zipError.value = null; // Очистка ошибки, если поле пустое
  } else if (!zipPattern.test(formData.value.zip)) {
    zipError.value = 'Неверный почтовый индекс';
  } else {
    zipError.value = null;
  }

  hasValidationError.value = zipError.value !== null;
};

// Валидация города
const validateCity = () => {
  const cityPattern = /^[А-Яа-яЁё\-]+$/;
  
  if (formData.value.city.trim() === '') {
    cityError.value = null; // Очистка ошибки, если поле пустое
  } else if (!cityPattern.test(formData.value.city)) {
    cityError.value = 'Неверное наименование города';
  } else {
    cityError.value = null;
  }

  hasValidationError.value = cityError.value !== null;
};

// Валидация улицы
const validateStreet = () => {
  const streetPattern = /^[\u0400-\u04FF\s\-']+$/;
  
  if (formData.value.street.trim() === '') {
    streetError.value = null; // Очистка ошибки, если поле пустое
  } else if (!streetPattern.test(formData.value.street)) {
    streetError.value = 'Неверное наименование улицы';
  } else {
    streetError.value = null;
  }

  hasValidationError.value = streetError.value !== null;
};

// Валидация дома
const validateBuilding = () => {
  const buildingPattern = /^\d+[А-ЯЁа-яё]?$|^\d+К$|^\d+$/;
  
  if (formData.value.building.trim() === '') {
    buildingError.value = null; // Очистка ошибки, если поле пустое
  } else if (!buildingPattern.test(formData.value.building)) {
    buildingError.value = 'Неверно задан номер дома';
  } else {
    buildingError.value = null;
  }

  hasValidationError.value = buildingError.value !== null;
};

// Валидация квартиры
const validateAppartment = () => {
  const appartmentPattern = /^\d{1,5}$/;
  
  if (formData.value.appartment.trim() === '') {
    appartmentError.value = null; // Очистка ошибки, если поле пустое
  } else if (!appartmentPattern.test(formData.value.appartment)) {
    appartmentError.value = 'Неверно задан номер квартиры';
  } else {
    appartmentError.value = null;
  }

  hasValidationError.value = appartmentError.value !== null; 
};

// Обработчик отправки формы
const submitForm = () => {
  // Если есть ошибки валидации, прерываем отправку формы
  if (hasValidationError.value) {
    return;
  }

  // Ваш код для сохранения данных в базе данных

  console.log('Данные успешно обновлены:', formData.value);
};
</script>

<style>
.error {
  color: red;
}
</style>