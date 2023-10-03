<template>

<div class="container">
    <!-- top nav bar -->
<nav class="navbar top-header mt-3">
    <h3 class="home-h">Blood Bank</h3>
        <i class="fa-solid fa-circle-user fs-1"></i> 
</nav> 
  <!-- top nav bar -->
  <!-- navbar -->
<nav class="navbar header mt-3">
  
        <div class="p-3 rounded rounded-pill shadow mb-4 search-bar">
          <form  @submit.prevent="search">
            <div class="input-group">
              
                <div class="input-group-prepend">
                    <button id="button-addon2" type="submit" class="btn btn-link text-warning"><i class="fa fa-search fs-3"></i></button>
                </div>
                    <input type="search" id="blood_group" v-model="newSearch.blood_group"  placeholder="Search" aria-describedby="button-addon2" class="p-3 form-control border-0">
                 
            </div>
          </form>
        </div>
     
    <button type="button" class="btn btn btn-filter" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-sliders fs-1"></i></button>


<!-- modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
 
      <div class="modal-body">
        <div class="card-body shadow p-3">

          <form @submit.prevent="searchInModal">

          <div class="p-1 rounded rounded-pill shadow mb-4 post-item">
        <input type="text" class="form-control border-0 fs-5 m-3" id="div" v-model="newSearch.div" placeholder="Division">
        </div>

        <div class="p-1 rounded rounded-pill shadow mb-4 post-item">
        <input type="text" class="form-control border-0 fs-5 m-3" id="dis" v-model="newSearch.dis" placeholder="District">
        </div>

        <div class="p-1 rounded rounded-pill shadow mb-4 post-item">
        <input type="text" class="form-control border-0 fs-5 m-3" id="area" v-model="newSearch.area" placeholder="Area">
        </div>
         
            <div class="p-1 rounded rounded-pill shadow mb-4 post-item">
        <select class="form-control border-0 fs-5 m-3" id="blood_group" v-model="newSearch.blood_group">
            <option value="">Select Your Blood Group</option>
            <option  value="O+">O+</option>
            <option  value="O-">O-</option>
            <option  value="B+">B+</option>
            <option  value="A+">A+</option>
            <option  value="A-">A-</option>
            <option  value="AB+">AB+</option>
            <option  value="AB-">AB-</option>
        </select> 
          </div>

          
          <button type="submit" class="btn text-light p-3 rounded rounded-pill shadow mb-4 w-50 fs-4 post-item text-center" style="background-color: #EB762A; margin-left:25%" :disabled="processing" >
          {{ processing ? "Please wait" : "search" }}
      </button>
        </form>
      </div>


    </div>
    </div>
  </div>
</div>
<!-- modal -->

</nav>
<!-- navbar -->
<!-- last update  -->
<h2 class="mt-3">Last Update</h2>

<div class="last-update row mt-5">
    <div class="col-6 mt-3">
        <div class="card-body bg-light rounded rounded-pill shadow mb-4">
        <div class="row">
            <div class="col-4">
               <img :src="getClockImage()" alt="blood">
            </div>
            <div class="col-8">
              <div class="mt-5">
                <h2>{{ formatDate(latestPostTimestamp).day }}</h2>
                <h4>{{ formatDate(latestPostTimestamp).date }}, {{ formatTime(latestPostTimestamp) }}</h4>
              </div>
            </div>
        </div>
        </div>
    </div>

    <div class="col-6 mt-3">
        <div class="card-body bg-light rounded rounded-pill shadow mb-4">
        <div class="row">
            <div class="col-4">
               <img :src="getClockImage()" alt="Clock">
            </div>
            <div class="col-8">
              <div class="mt-5">
                <h2>{{ formatDate(latestRequestTimestamp).day }}</h2>
                <h4>{{ formatDate(latestRequestTimestamp).date }}, {{ formatTime(latestRequestTimestamp) }}</h4>
              </div>
            </div>
        </div>
            
        </div>
    </div>

    <div class="col-6 mt-3">
        <div class="card-body bg-light rounded rounded-pill shadow mb-4">
        <div class="row">
            <div class="col-4">
               <img :src="getClockImage()" alt="blood">
            </div>

            <div class="col-8">
              <router-link :to="{name:'mypost'}" class="link-light rounded text-dark"><h2 class="mt-5">My Post</h2></router-link>
            </div>
        </div>
            
        </div>
    </div>

    <div class="col-6 mt-3">
        <div class="card-body bg-light rounded rounded-pill shadow mb-4">
        <div class="row">
            <div class="col-4">
               <img :src="getClockImage()" alt="blood">
            </div>

            <div class="col-8">
              <router-link :to="{name:'blood-request'}" class="link-light rounded text-dark"><h2 class="mt-5">Blood Request</h2></router-link>
            </div>
        </div>
            
        </div>
    </div>


</div>

    <!-- last update  -->
 
    <h2 class="mt-3">Post a Request</h2>
    <div class="card-body p-4 bg-light shadow mb-4 text-justify">
        <form @submit.prevent="createPost" class="post-form">
    
          <div class="p-3 rounded rounded-pill shadow mb-4 post-item">
            <img :src="getBloodImage()" alt="blood">
        <select class="border-0 fs-4 m-3" id="blood_group" v-model="newPost.blood_group">
            <option value="">Select Your Blood Group</option>
            <option  value="O+">O+</option>
            <option  value="O-">O-</option>
            <option  value="B+">B+</option>
            <option  value="A+">A+</option>
            <option  value="A-">A-</option>
            <option  value="AB+">AB+</option>
            <option  value="AB-">AB-</option>
        </select> 
        </div>

        <div class="p-3 rounded rounded-pill shadow mb-4 post-item">
          <img :src="getUserImage()" alt="User">
        <input type="text" class="border-0 fs-5 m-3" id="name" v-model="newPost.name" placeholder="Your Name" required>
  </div>

        <div class="p-3 rounded rounded-pill shadow mb-4 post-item">
          <img :src="getLocationImage()" alt="Location">
        <input type="text" class="border-0 fs-5 m-3" id="location" v-model="newPost.location" placeholder="Location" required>
</div>


        <div class="p-3 rounded rounded-pill shadow mb-4 post-item">
          <img :src="getPhoneImage()" alt="Phone">
          <input type="tel" class="border-0 fs-5 m-3" id="phone" v-model="newPost.phone" placeholder="Phone Number" required>
        </div>
        
        <div class="p-3 rounded rounded-pill shadow mb-4 post-item">
        <textarea v-model="newPost.details" class="w-100 border-0 fs-5 m-3" id="details" placeholder="Add details(why & how many bags?)"></textarea>
      </div>

   
        <button type="submit" class="btn  rounded-pill shadow fs-4" :disabled="processing" >
          {{ processing ? "Please wait" : "Post" }}
        </button>
    </form>
    </div>

</div>
   


</template>

<script>
export default {
  data() {
    return {
      /* For Post Data */
      newPost: {
        blood_group: '',
        name: '',
        location: '',
        phone: '',
        details: '',
      },

      posts: [ ],
      requestdonates: [ ],


      newSearch: {
        div: '',
        dis: '',
        area: '',
        blood_group: '',
      },

    formAction: 'search',
      processing:false
    };
   
  },

  computed: {
    latestPostTimestamp() {
    const latestPost = this.posts[0];
    if (latestPost) {
      console.log('Latest Post Timestamp:', latestPost.created_at);
      return latestPost.created_at;
    }
    return null;
  },
  latestRequestTimestamp() {
    const latestRequest = this.requestdonates[0];
    if (latestRequest) {
      console.log('Latest Request Timestamp:', latestRequest.created_at);
      return latestRequest.created_at;
    }
    return null;
  },
},

  methods: {
    // date format
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

    // time format
    formatTime(dateString) {
      const options = { hour: 'numeric', minute: 'numeric', hour12: true };
      const date = new Date(dateString);
      return date.toLocaleTimeString('en-US', options);
    },
// Image
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

            getClockImage(){
                return  'img/clock.png';
            },

/* Create a search */

searchInModal() {
   
    this.processing = true;  
    axios.get('/api/doners/search', { params: this.newSearch })
      .then((response) => {
        this.$router.push({ name: 'SearchResults', query: { results: JSON.stringify(response.data) } });
      })
      .catch((error) => {
        console.error(error);
      })
      .finally(() => {
        this.processing = false;
      });
  },
 
  /* Create a post */
  createPost() {
    // Handle post creation logic for the main form
    this.processing = true;
    axios.post('/api/posts/create', this.newPost)
      .then(() => {
        this.$router.push('/mypost');
      })
      .catch((error) => {
        console.error(error);
      })
      .finally(() => {
        this.processing = false;
      });
  },




  },
};
</script>