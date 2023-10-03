<template>
<div class="container">
      <!-- top nav bar -->
<nav class="navbar top-header mt-3">
  <router-link :to="{name:'home'}" class="link-light rounded"><i class="fa-solid fa-arrow-left-long"></i></router-link><h3 class="text-center">My Blood Post</h3><i class="fa-solid fa-circle-user fs-2"></i> 
</nav> 
  <!-- top nav bar -->
  <!-- main -->

  <tr v-for="post in posts" :key="post.id">
<div class="card-body shadow text-center myposts p-2 mt-5">
  <div class="row">
    <div class="col-6">
      <h3>
    {{ formatDate(post.created_at).day }}
    <span v-if="formatDate(post.created_at).justNow"> (just now)</span>
  </h3>
      <h5>{{ formatDate(post.created_at).date }}, {{ formatTime(post.created_at) }}</h5>
    </div>
    <div class="col-6">
      <router-link :to="{name:'intarest'}" class="link-light rounded"> <button class="p-3 btn border-0 rounded rounded-pill fs-3" style="background-color: #fff4ed;">Intarest</button></router-link> <span class="p-3 badge fs-5" style="background-color: #EB762A;color:#fff; border-radius: 30%;">0</span>
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
          <h2>{{ post.phone }}</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="see_more p-2 mt-5">
        <button class="btn fs-4" @click="toggleDetails(index)">
          {{ showDetails[index] ? 'See Less' : 'See More' }}
        </button>
        <p class="card-text fs-4" v-if="showDetails[index]">{{ post.details }}</p>
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
