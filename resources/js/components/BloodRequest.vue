<template>
    <div class="container">
          <!-- top nav bar -->
    <nav class="navbar top-header mt-3">
      <router-link :to="{name:'home'}" class="link-light rounded"><i class="fa-solid fa-arrow-left-long"></i></router-link><h3 class="text-center">Blood Request</h3><i class="fa-solid fa-circle-user fs-2"></i> 
    </nav> 
      <!-- top nav bar -->
      <!-- main -->
    
      <tr v-for="post in requestdonates" :key="post.id">
    <div class="card-body shadow text-center myposts p-2 mt-5">
      <div class="row">
        <div class="col-6">
            <i class="fa-solid fa-circle-user fs-1 "></i><span class="fs-1 ml-5" style="margin-left:50px">{{ post.request_name }}</span>
        </div>
        <div class="col-6">
          <button class="p-2 btn border-0 shadow fs-4"
            :style="{ backgroundColor: post.isInterested ? '#EB762A' : '#fff4ed' }"
            @click="toggleInterest(post)">Intarest</button>
        </div>
    
        <div class="col-6 mt-5">
          <div class="card-body" style="border-radius: 5%; height: 110%; background-color: #fff4ed;"> 
            <div style="display: inline-table;">
              <img :src="getBloodImage()" alt="blood">
            </div>
    
            <div style="display: inline-table;margin-left: 7%; ">
              <h2>{{ post.blood_group }}</h2>
              <h2>Blood</h2>
            </div>
          </div>
        </div>
    
        <div class="col-6 mt-5">
          <div class="card-body" style="border-radius: 5%;  background-color: #fff4ed; height: 110%;"> 
            <div style="display: inline-table;">
              <img :src="getUserImage()" alt="blood">
            </div>
            <div style="display: inline-table;margin-left: 7%;">
              <h2>{{ post.name }}</h2>
            </div>
          </div>
        </div>
    
        <div class="col-6 mt-5">
          <div class="card-body" style="border-radius: 5%;  background-color: #fff4ed; height: 110%;"> 
            <div style="display: inline-table;">
              <img :src="getLocationImage()" alt="blood">
            </div>
    
            <div style="display: inline-table;margin-left: 7%; ">
              <h2>{{ post.location }}</h2>
            </div>
          </div>
        </div>
    
        <div class="col-6 mt-5">
          <div class="card-body" style="border-radius: 5%;  background-color: #fff4ed; height: 110%;"> 
            <div style="display: inline-table;">
              <img :src="getPhoneImage()" alt="blood">
            </div>
            <div style="display: inline-table;margin-left: 7%;">
              <h2>{{ post.request_phone }}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="see_more p-2 mt-5">
        <button class="btn fs-4" @click="toggleDetails(index)">
          {{ showDetails[index] ? 'See Less' : 'See More' }}
        </button>
        <p class="card-text fs-4" v-if="showDetails[index]">{{ post.request_details }}</p>
      </div>
  
            
    </div>
    
    </tr>
    
    
      <!-- main -->
    </div>
    </template>
    
    <script>
    export default {
      data() {
        return {
          /* For Post Data */
          newPost: {
            
          },
          /* For Get Data */
    
          requestdonates: [ ],

          showDetails: Array(3).fill(false),
    
        };
       
      },
      created() {
        this.fetchRequests();
    
      },
    
        methods:{

                toggleDetails(index) {
                this.showDetails[index] = !this.showDetails[index];
                },
                toggleInterest(post) {
                post.isInterested = !post.isInterested;
                },


                getBloodImage(){
                    return  'img/blood.png';
                },
                getUserImage(){
                    return  'img/user.png';
                },
                getLocationImage(){
                    return  'img/location.png';
                },
                getPhoneImage(){
                    return  'img/tel.png';
                },
    
    
              /* Get/Fetch All Post */
    
              fetchRequests() {
                  axios.get('/api/requestdonates')
                    .then((response) => {
                      this.requestdonates = response.data;
                    })
                    .catch((error) => {
                      console.error(error);
                    });
                },
                  
                  
    
              }
          }
          
      </script>
    