<template>
    <div class="container">
      <!-- top nav bar -->
      <nav class="navbar top-header mt-3">
  <router-link :to="{name:'home'}" class="link-light rounded"><i class="fa-solid fa-arrow-left-long"></i></router-link><h3 class="text-center">My Blood Post</h3><i class="fa-solid fa-circle-user fs-2"></i> 
</nav> 
  <!-- top nav bar -->


        <div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Md Mizanur Rahman</h3>
    </div>
    <div class="col-6">
      <button class="p-3 btn border-0 rounded rounded-pill shadow fs-5" style="background-color: #EB762A;color:#fff;">Intarested</button>
    </div>
    <div class="col-6 text-center">
        <div style="display: inline-table;">
          <img :src="getPhoneImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>01700-000000</h2>
        </div>
            <br>
        <div style="display: inline-table;">
          <img :src="getLocationImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>Dhanmondi, Dhaka, 1205</h2>
        </div>
    </div>
    <div class="col-6">
        <img :src="getManImage()" alt="blood">
    </div>

  </div>
</div>

<div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Md Mizanur Rahman</h3>
    </div>
    <div class="col-6">
      <button class="p-3 btn border-0 rounded rounded-pill shadow fs-5" style="background-color: #EB762A;color:#fff;">Intarested</button>
    </div>
    <div class="col-6 text-center">
        <div style="display: inline-table;">
          <img :src="getPhoneImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>01700-000000</h2>
        </div>
            <br>
        <div style="display: inline-table;">
          <img :src="getLocationImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>Dhanmondi, Dhaka, 1205</h2>
        </div>
    </div>
    <div class="col-6">
        <img :src="getManImage()" alt="blood">
    </div>

  </div>
</div>

<div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Kurt Bates</h3>
    </div>
    <div class="col-6">
      <button class="p-3 btn border-0 rounded rounded-pill shadow fs-5" style="background-color: #EB762A;color:#fff;">Intarested</button>
    </div>
    <div class="col-6 text-center">
        <div style="display: inline-table;">
          <img :src="getPhoneImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>01700-000000</h2>
        </div>
            <br>
        <div style="display: inline-table;">
          <img :src="getLocationImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>Dhanmondi, Dhaka, 1205</h2>
        </div>
    </div>
    <div class="col-6">
        <img :src="getManImage()" alt="blood">
    </div>

  </div>
</div>


<div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Stephanie Nicol</h3>
    </div>
    <div class="col-6">
      <button class="p-3 btn border-0 rounded rounded-pill shadow fs-5" style="background-color: #EB762A;color:#fff;">Intarested</button>
    </div>
    <div class="col-6 text-center">
        <div style="display: inline-table;">
          <img :src="getPhoneImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>01700-000000</h2>
        </div>
            <br>
        <div style="display: inline-table;">
          <img :src="getLocationImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>Dhanmondi, Dhaka, 1205</h2>
        </div>
    </div>
    <div class="col-6">
        <img :src="getManImage()" alt="blood">
    </div>

  </div>
</div>


<div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Daniel Hamilton</h3>
    </div>
    <div class="col-6">
      <button class="p-3 btn border-0 rounded rounded-pill shadow fs-5" style="background-color: #EB762A;color:#fff;">Intarested</button>
    </div>
    <div class="col-6 text-center">
        <div style="display: inline-table;">
          <img :src="getPhoneImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>01700-000000</h2>
        </div>
            <br>
        <div style="display: inline-table;">
          <img :src="getLocationImage()" alt="blood">
        </div>

        <div style="display: inline-table;margin-left: 7%; ">
          <h2>Dhanmondi, Dhaka, 1205</h2>
        </div>
    </div>
    <div class="col-6">
        <img :src="getManImage()" alt="blood">
    </div>

  </div>
</div>


    </div>
</template>

<script>
export default {
  data() {
    return {
    
    };
   
  },
 

    methods:{
            getLocationImage(){
                return  'img/location.png';
            },
            getPhoneImage(){
                return  'img/tel.png';
            },

            getManImage(){
                return  'img/man.PNG';
            },

             

          }
      }
      
  </script>
