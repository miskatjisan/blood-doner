<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
    <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
      <div class="app-body">
        <div class="scroll-body">
          <div class="container">
            <!-- top nav bar -->
            <nav class="navbar d-flex justify-content-between mt-3">
              <router-link :to="{name:'home'}" class="link-light rounded">
                <img class="h-25p w-25p" :src="getBackImage()" alt="back image" />
              </router-link>
              <h3 class="text-center dark-color"> My Blood Post </h3>
              <i class="fa-solid fa-circle-user fs-2"></i> 
            </nav>

            <!-- main -->
            <div v-for="post in posts" :key="post.id">
              <div class="card-body bg-white text-center myposts p-3 mt-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="text-start"> 
                    <h3 class="dark-color fs-20"> {{ formatDate(post.created_at).day }}
                      <span v-if="formatDate(post.created_at).justNow"> (just now) </span>
                    </h3>
                    <h5 class="dark-color fs-16">{{ formatDate(post.created_at).date }}, {{ formatTime(post.created_at) }}</h5>
                  </div>
                  <div class="d-flex align-items-center">
                    <router-link :to="{name:'intarest'}" class="rounded-4 bg-theme-light text-decoration-none fs-20 dark-color d-inline-block px-4 py-2"> Intarest </router-link>
                    <span class="p-3 badge fs-5 d-inline-block ms-2" style="background-color: #EB762A;color:#fff; border-radius: 30%;">0</span>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getBloodImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.blood_group }} </h2>
                          <h2 class="fs-16 mb-0 dark-color"> Blood </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getUserImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.name }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getLocationImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.location }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getPhoneImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.phone }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Show More -->
                <div class="mt-3">
                <div class="d-flex justify-content-end">
                  <button class="mb-0 fs-18 text-theme border-0 bg-transparent" @click="toggleDetails(index)">
                    {{ showDetails[index] ? 'See Less' : 'See More' }} <i class="fa-solid fa-arrow-right ps-1"></i>
                  </button>
                </div>
                  <p class="mb-0 fs-16 theme-color" v-if="showDetails[index]">{{ post.details }}</p>
                </div>
              </div>
              <div class="card-body bg-white text-center myposts p-3 mt-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="text-start"> 
                    <h3 class="dark-color fs-20"> {{ formatDate(post.created_at).day }}
                      <span v-if="formatDate(post.created_at).justNow"> (just now) </span>
                    </h3>
                    <h5 class="dark-color fs-16">{{ formatDate(post.created_at).date }}, {{ formatTime(post.created_at) }}</h5>
                  </div>
                  <div class="d-flex align-items-center">
                    <router-link :to="{name:'intarest'}" class="rounded-4 bg-theme-light text-decoration-none fs-20 dark-color d-inline-block px-4 py-2"> Intarest </router-link>
                    <span class="p-3 badge fs-5 d-inline-block ms-2" style="background-color: #EB762A;color:#fff; border-radius: 30%;">0</span>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getBloodImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.blood_group }} </h2>
                          <h2 class="fs-16 mb-0 dark-color"> Blood </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getUserImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.name }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getLocationImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.location }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getPhoneImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.phone }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Show More -->
                <div class="mt-3">
                <div class="d-flex justify-content-end">
                  <button class="mb-0 fs-18 text-theme border-0 bg-transparent" @click="toggleDetails(index)">
                    {{ showDetails[index] ? 'See Less' : 'See More' }} <i class="fa-solid fa-arrow-right ps-1"></i>
                  </button>
                </div>
                  <p class="mb-0 fs-16 theme-color" v-if="showDetails[index]">{{ post.details }}</p>
                </div>
              </div>
              <div class="card-body bg-white text-center myposts p-3 mt-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="text-start"> 
                    <h3 class="dark-color fs-20"> {{ formatDate(post.created_at).day }}
                      <span v-if="formatDate(post.created_at).justNow"> (just now) </span>
                    </h3>
                    <h5 class="dark-color fs-16">{{ formatDate(post.created_at).date }}, {{ formatTime(post.created_at) }}</h5>
                  </div>
                  <div class="d-flex align-items-center">
                    <router-link :to="{name:'intarest'}" class="rounded-4 bg-theme-light text-decoration-none fs-20 dark-color d-inline-block px-4 py-2"> Intarest </router-link>
                    <span class="p-3 badge fs-5 d-inline-block ms-2" style="background-color: #EB762A;color:#fff; border-radius: 30%;">0</span>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getBloodImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.blood_group }} </h2>
                          <h2 class="fs-16 mb-0 dark-color"> Blood </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getUserImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.name }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getLocationImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.location }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-1">
                    <div class="card-body bg-theme-light rounded rounded-4 p-3">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img class="h-50p w-50p" :src="getPhoneImage()" alt="blood">
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                          <h2 class="fs-16 dark-color"> {{ post.phone }} </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Show More -->
                <div class="mt-3">
                <div class="d-flex justify-content-end">
                  <button class="mb-0 fs-18 text-theme border-0 bg-transparent" @click="toggleDetails(index)">
                    {{ showDetails[index] ? 'See Less' : 'See More' }} <i class="fa-solid fa-arrow-right ps-1"></i>
                  </button>
                </div>
                  <p class="mb-0 fs-16 theme-color" v-if="showDetails[index]">{{ post.details }}</p>
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

      posts: [ ],

      showDetails: Array(3).fill(false),

    };
   
  },
  created() {
    this.fetchPosts();

  },

    methods:{

      toggleDetails(index) {
                this.showDetails[index] = !this.showDetails[index];
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

  // date formate
  formatDate(dateString) {
  const postDate = new Date(dateString);
  const now = new Date();
  const diffInMilliseconds = now - postDate;

  // If the post was created within the last minute
  if (diffInMilliseconds < 60000) {
    return {
      day: postDate.toLocaleDateString('en-US', { weekday: 'long' }),
      date: postDate.toLocaleDateString('en-US', {
        month: 'numeric',
        day: 'numeric',
        year: 'numeric',
      }),
      justNow: true,
    };
  }

  return {
    day: postDate.toLocaleDateString('en-US', { weekday: 'long' }),
    date: postDate.toLocaleDateString('en-US', {
      month: 'numeric',
      day: 'numeric',
      year: 'numeric',
    }),
    justNow: false,
  };
},
  // date formate

    formatTime(dateString) {
      const options = { hour: 'numeric', minute: 'numeric' };
      const date = new Date(dateString);
      return date.toLocaleTimeString(undefined, options);
    },

    

          /* Get/Fetch All Post */

            fetchPosts() {
              axios.get('/api/posts')
                .then((response) => {
                  this.posts = response.data;

                  this.posts = response.data.sort((a, b) => {
                  return new Date(b.created_at) - new Date(a.created_at);

                  });
                })
                .catch((error) => {
                  console.error(error);
                });
            },
              
              

          }
      }
  </script>
