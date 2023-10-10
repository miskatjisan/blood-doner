<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
    <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
      <div class="app-body">
        <div class="scroll-body">
          <div class="container">
            <!-- top nav bar -->
            <nav class="navbar d-flex justify-content-between mt-3 mb-4">
              <router-link :to="{name:'home'}" class="link-light rounded">
          
                <img class="h-25p w-25p" :src="getBackImage()" alt="back image" /> 
              </router-link>
              <h3 class="text-center dark-color"> Blood Request </h3>
              <i class="fa-solid fa-circle-user fs-2"></i> 
            </nav>

            <!-- Main Content -->
            <div v-for="(post, index) in requestdonates" :key="post.id">
              <div class="card-body bg-white text-center myposts p-3 mb-4 rounded-4">
                <div class="d-flex justify-content-between mb-4">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <i class="fa-solid fa-circle-user fs-2" style="font-size: 28px; height: 40px; width: 40px; display: flex; justify-content: center; align-items: center; "></i>
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h2 class="fs-17 mb-0 dark-color text-start"> {{ post.request_name }} </h2>
                    </div>
                  </div>
                  <button class="px-3 py-2 btn border-0 shadow fs-18" :style="{ backgroundColor: post.isInterested ? '#EB762A' : '#fff4ed' }"
                      @click="toggleInterest(post)"> Interest </button>
                </div>

                <div class="row">
                  <div class="col-6 mb-3">
                    <div class="d-flex align-items-center bg-theme-light rounded-3 p-2">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getBloodImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 mb-0 text-dark text-start"> {{ post.blood_group }} </h2>
                        <h2 class="fs-17 mb-0 text-dark text-start"> Blood </h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <div class="d-flex align-items-center bg-theme-light rounded-3 p-2">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getUserImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 mb-0 text-dark text-start"> {{ post.name }} </h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <div class="d-flex align-items-center bg-theme-light rounded-3 p-2">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getLocationImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 mb-0 text-dark text-start"> {{ post.area }} </h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <div class="d-flex align-items-center bg-theme-light rounded-3 p-2">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getPhoneImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 mb-0 text-dark text-start"> {{ post.request_phone }} </h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn fs-18 text-theme" @click="toggleDetails(index)">
                      {{ showDetails[index] ? 'See Less' : 'See More' }}
                    </button>
                    <p class="card-text fs-16" v-if="showDetails[index]">{{ post.request_details }}</p>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
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
                getBackImage(){
                return  'img/back.png';
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
    