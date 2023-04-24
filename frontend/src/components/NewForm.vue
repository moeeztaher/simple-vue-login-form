<template>
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <form class="w-full max-w-md bg-white rounded-lg shadow-md p-6" @submit.prevent="submitForm">
      <a href="https://systemhaus.com"
        class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-96 h-24" src="https://systemhaus.com/img/logos/logo.webp" alt="logo">
      </a>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">
          Name
        </label>
        <input
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="name" type="text" placeholder="" v-model.trim="name" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">
          E-Mail
        </label>
        <input
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="email" type="email" placeholder="" v-model.trim="email" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="street">
          Street & Number
        </label>
        <input
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="street" type="text" placeholder="" v-model.trim="street" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="postcode">
          Postcode
        </label>
        <input
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="postcode" type="text" placeholder="" v-model.trim="postcode" @keypress="isNumber($event)" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="city">
          City
        </label>
        <input
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="city" type="text" placeholder="" v-model.trim="city" required>
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2" for="message">
          Message
        </label>
        <textarea
          class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="message" placeholder="" v-model.trim="message" required></textarea>
      </div>
      <div v-if="showError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
        role="alert">
        <strong class="font-bold">Error! </strong>
        <span class="block sm:inline">Could not submit the form.</span>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit"
          class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
      </div>
    </form>
  </div>
  <div class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
    v-if="showSuccess">
    <div class="bg-white rounded-lg overflow-hidden" style="max-width: 400px;">
      <div class="py-4 px-6">
        <div class="font-bold text-lg mb-2">Form successfully submitted!</div>
      </div>
      <div class="px-6 py-4 bg-gray-100 text-right">
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400"
          @click="showSuccess = null">Close</button>
      </div>
    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      street: '',
      postcode: '',
      city: '',
      message: '',
      showSuccess: false,
      showError: false,
    };
  },
  methods: {
    async submitForm() {
      const formData = {
        name: this.name,
        email: this.email,
        street: this.street,
        postcode: this.postcode,
        city: this.city,
        message: this.message,
      };
      const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ formData })
      };
      const response = await fetch("http://localhost:8000/api/newform", requestOptions);
      const data = await response;
      console.log(data.status);
      
      if (data.status==200) {
        this.showSuccess = true
        this.clearForm();
      } else {
        this.showSuccess = false
      }
    },
    isNumber: function (evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },
    clearForm(){
      this.name = "";
      this.email = "";
      this.postcode = "";
      this.street = "";
      this.city = "";
      this.message = "";
    }
  },
};
</script>
  