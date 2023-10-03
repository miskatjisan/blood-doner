<template>
    <div class="container">
             <!-- top nav bar -->
<nav class="navbar top-header mt-3">
  <router-link :to="{name:'home'}" class="link-light rounded"><i class="fa-solid fa-arrow-left-long"></i></router-link><h3 class="text-center">My Blood Post</h3><i class="fa-solid fa-circle-user fs-2"></i> 
</nav> 
  <!-- top nav bar -->


<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card-body shadow p-3">
          <router-link :to="{name:'blood-request'}" class="link-light rounded">
            <div class="success text-center p-5 mt-5">
              <i class="fa-solid fa-circle-check fs-1" style="color: #EB762A;"></i>
              <h5 style="color: #EB762A;">Done</h5>
            <p class="text-success">Your blood is successfully done. Thankyou for using our platform.</p>
            </div>
            </router-link>
      </div>
      

    </div>
    </div>
  </div>
</div>
<!-- modal -->


<h5 class="mt-5">Please provide all correct Information</h5>

<div class="card-body mt-5">

  <form @submit.prevent="createRequestDonate">
<input type="hidden" v-model="newRequest.name"><input type="hidden" v-model="newRequest.blood_group">
<div class="post-item p-3">
<input type="text" class="p-3 bg-light shadow mb-4 form-control rounded rounded-pill border-0 fs-5" v-model="newRequest.request_name" id="div" placeholder="Your name">



<input type="tel" class="p-3 bg-light shadow mb-4 form-control rounded rounded-pill border-0 fs-5" v-model="newRequest.request_phone" id="dis"  placeholder="Your contact number">
</div>

<div class="mt-5">
    <textarea class="p-3 shadow mb-4 form-control   border-0 fs-5 post-item" v-model="newRequest.request_details" id="" cols="5" rows="5" placeholder="Other Information  ( your place, when will you need it which date & time, specified everything )"></textarea>
</div>


<button type="submit" class="btn text-light p-3 mt-5 rounded rounded-pill shadow mb-4 post-item text-center" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="background-color: #EB762A; margin-left:40%; width: 20%" :disabled="processing" >
{{ processing ? "Please wait" : "Request" }}
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
      newRequest: {
        name: '',
        blood_group: '',
        request_name: '',
        request_phone: '',
        request_details: '',
      },
    
      processing:false
    };
   
  },
  created() {
  const { name, blood_group } = this.$route.query;

  // Pre-fill the input fields
  this.newRequest.name = name || '';
  this.newRequest.blood_group = blood_group || '';
},

  methods: {

/* Create New Post */

    createRequestDonate() {
      this.processing = true
      axios.post('/api/requestdonates/create', this.newRequest)
        .then(() => {
          this.newRequest = '';
          // Show the success modal
      $('#exampleModal').modal('show');
        })
        .catch((error) => {
          console.error(error);
        })
        .finally(()=>{
                this.processing = false
            });
    },





  },
};
</script>