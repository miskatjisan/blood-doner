<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
    <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
      <div class="app-body">
        <div class="scroll-body">
          <div class="container">
            <!-- top nav bar -->
            <nav class="navbar d-flex justify-content-between mt-3">
              <router-link :to="{ name: 'home' }" class="link-light rounded">
                <img class="h-25p w-25p" :src="getBackImage()" alt="back image" /> 
              </router-link>
              <h3 class="text-center dark-color"> Blood Bank </h3>
              <i class="fa-solid fa-circle-user fs-2"></i>
            </nav>

            <!-- navbar -->
            <nav class="navbar header mt-3 mb-4">
              <div class="w-100 d-flex justify-content-between align-items-center">
                  <form class="w-100">
                      <div class="input-group position-relative">
                        <button id="button-addon2" type="submit" class="btn btn-link text-theme position-absolute fs-18 top-50pr left-7 z-index-9">
                          <i class="fa fa-search"></i>
                        </button>

                      <input type="search" id="blood_group" placeholder="Search"
                          aria-describedby="button-addon2" class="py-3 ps-5 pe-3 form-control w-100 rounded-pill inset-shadow bg-theme-light input-focus" />
                      </div>
                  </form>

                  <button type="button" class="btn btn btn-filter rounded-circle h-50p w-50p d-flex justify-content-center align-items-center theme-hover ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    <i class="fa-solid fa-sliders fs-20"></i>
                  </button>
              </div>
            </nav>

            <p class="fs-16 fw-bold text-center"> Please provide all correct information </p>

            <form @submit.prevent="createRequestDonate" class="post-form">
              <div class="w-100 mb-3 post-item position-relative">
                <input type="hidden" v-model="newRequest.name"><input type="hidden" v-model="newRequest.blood_group"><input type="hidden" v-model="newRequest.area">
                  <input type="text" v-model="newRequest.request_name" class="fs-5 mb-3 w-100 form-control rounded-pill bg-white input-focus py-2 px-3 fs-14" placeholder="Your Name" required>
              </div>

              <div class="w-100 mb-3 post-item position-relative">
                  <input type="tel" v-model="newRequest.request_phone" class="fs-5 mb-3 w-100 form-control rounded-pill bg-white input-focus py-2 px-3 fs-14" placeholder="Your Conact Number" required>
              </div>

              <div class="w-100 mb-3 post-item position-relative">
                  <textarea v-model="newRequest.request_details" rows="4" id="details" class="w-100 fs-5 mb-3 w-100 form-control rounded-4 bg-white input-focus fs-14" placeholder="Other Information ( your place, when will you need it which date & time, specified everything )">
                  </textarea>
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" class="border-0 text-white bg-theme px-5 py-2 rounded-pill fs-18 shadow d-inline-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> {{ processing ? "Please wait" : "Request" }} </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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
</template>

<script>
export default {
  data() {
    return {
      /* For Post Data */
      newRequest: {
        name: '',
        blood_group: '',
        area: '',
        request_name: '',
        request_phone: '',
        request_details: '',
      },
    
      processing:false
    };
   
  },
  created() {
  const { name, blood_group, area } = this.$route.query;

  // Pre-fill the input fields
  this.newRequest.name = name || '';
  this.newRequest.blood_group = blood_group || '';
  this.newRequest.area = area || '';
},

  methods: {
    getBackImage(){
                return  'img/back.png';
            },
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