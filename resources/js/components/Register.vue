

<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
      <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
        <div class="app-body">
          <div class="scroll-body">
  <div class="container"> 
    <div class="logregimg">
    <img :src="getRegLogImage()" alt="RegLog">
  </div>
    <div class="card-body p-4 bg-white rounded-4 mb-4 text-justify"> 
    <h2 class="mb-3 fs-24 fw-bold logreg-h">Register as a Human</h2>
    <form @submit.prevent="register" class="mt-3">
      <div class="w-100 mb-3 post-item position-relative">
          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getUserImage()" alt="User">
        <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="name" v-model="name" placeholder="Your Name" required>
  </div>
  <div class="w-100 mb-3 post-item position-relative">
          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getUserImage()" alt="User">
        <input type="email" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="email" v-model="email" placeholder="Your Email Address" required>
  </div>

  <div class="w-100 mb-3 post-item position-relative">
          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getPasswordImage()" alt="User">
        <input type="password" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="password" v-model="password" placeholder="Your Password" required>
  </div>
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn rounded-pill fs-18 px-5 py-2 bg-theme text-white shadow-h" :disabled="processing" >
          {{ processing ? "Please wait" : "Register" }}
        </button>
        </div>
      
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',

      processing:false
    };
  },
  methods: {

    getPasswordImage(){
      return  'img/lock-removebg-preview.png';
    },

    getRegLogImage(){
      return  'img/Capture-removebg-preview.png';
    },
    getUserImage(){
      return  'img/user.png';
    },

    async register() {
      this.processing = true;
      try {
        const response = await axios.post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
        });
        this.$router.push('/login');
        console.log(response.data); // Display the response for now
        

        // You can handle successful registration here (e.g., show a success message, redirect, etc.)
      } catch (error) {
        console.error('Registration failed:', error.response.data);
        // You can handle registration failure here (e.g., show an error message)
      }finally{
        this.processing = false;
      }
    }
  }
};
</script>
<style>
.logregimg{
  text-align: center;
}
.logreg-h{
  text-align: center;
}

</style>