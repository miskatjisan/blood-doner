<!-- resources/js/components/Login.vue -->

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
    <h2 class="mb-3 fs-24 fw-bold logreg-h">Sign In</h2>
    <form @submit.prevent="login" class="mt-3">
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
          {{ processing ? "Please wait" : "Sign In" }}
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

    async login() {
      try {
        this.processing = true;
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password,
        });
        this.$router.push('/');
        console.log(response.data); // Display the response for now
   

        // You can handle successful login here (e.g., show a success message, redirect, etc.)
      } catch (error) {
        console.error('Login failed:', error.response.data);
        // You can handle login failure here (e.g., show an error message)
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