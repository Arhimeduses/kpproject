<template>
  <body>
    <section>
      <form @submit.prevent="submitForm">
        <section>  
          <div>
            <label for="fio" style="float: left">ФИО</label>
            <input v-model="formData.fio" @input="validateFio" type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович"><br>
            <span v-if="fioError" class="error">{{ fioError }}</span>
          </div>
          <div>
            <label for="email" style="float: left">Email</label>
            <input v-model="formData.email" @input="validateEmail" type="email" id="mail" name="mail" placeholder="ivanivanov@gmail.com"><br>
            <span v-if="emailError" class="error">{{ emailError }}</span>
          </div>
          <div>
            <label for="phone" style="float: left">Телефон</label>
            <input v-model="formData.phone" @input="validatePhone" type="text" id="phone" name="phone" placeholder="+7 (777) 777 77-77">
            <span v-if="phoneError" class="error">{{ phoneError }}</span>
          </div>
        </section>
        <section>
          <h2>Адрес доставки</h2>
          <div>
            <div style="display: inline-block; margin: 10px; width: 20%;">
              <label for="zip" style="">Индекс</label>
              <input v-model="formData.zip" type="text" id="zip" name="zip" placeholder="400003"><br>
            </div>
            <div style="display: inline-block; margin: 10px; width: 70%;">
              <label for="city">Город</label>
              <input v-model="formData.city" type="text" id="city" name="city" placeholder="г. Волгоград" style=""><br>
            </div>
          </div>
          <div style="display: inline-block; margin: 10px; width: 70%;">
            <label for="street">Улица</label>
            <input v-model="formData.street" type="text" id="street" name="street" placeholder="ул. Штеменко 23"><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 20%;">
            <label for="building">Корпус</label>
            <input v-model="formData.building" type="text" id="building" name="building" placeholder="2Б" style=""><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 20%;">
            <label for="appartments">Квартира</label>
            <input v-model="formData.appartment" type="text" id="appartments" name="appartments" placeholder="50"><br>
          </div>
          <div style="display: inline-block; margin: 10px; width: 70%;">
            <label for="subscribe" style="margin: 30px;">Частный дом</label>
            <input v-model="formData.isPrivateHouse" type="checkbox" id="subscribe" name="subscribe" value="yes">
          </div>
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

  hasValidationError.value = fioError.value !== null || emailError.value !== null || phoneError.value !== null;
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

  hasValidationError.value = emailError.value !== null || fioError.value !== null || phoneError.value !== null;
};

// Валидация телефона
const validatePhone = () => {
  const phonePattern = /^\+\d{1,3}\d{10}$/;

  if (formData.value.phone.trim() === '') {
    phoneError.value = null; // Очистка ошибки, если поле пустое
  } else if (!phonePattern.test(formData.value.phone) || formData.value.phone.replace(/[^\d]/g, '').length < 11) {
    phoneError.value = 'Неверный формат телефона или некорректная длина (минимум 11 цифр)';
  } else {
    phoneError.value = null;
  }

  hasValidationError.value = phoneError.value !== null || emailError.value !== null || fioError.value !== null;
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
