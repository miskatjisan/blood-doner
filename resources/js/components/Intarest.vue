<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
    <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
      <div class="app-body">
        <div class="scroll-body">
          <div class="container">
            <!-- Top Nav Bar -->
            <nav class="navbar d-flex justify-content-between mt-3">
              <router-link :to="{ name: 'home' }" class="link-light rounded">
                ⬅️
                <!-- <img class="h-25p w-25p" :src="getBackImage()" alt="back image" /> -->
              </router-link>
              <h3 class="text-center dark-color">Interested</h3>
              <i class="fa-solid fa-circle-user fs-2"></i>
            </nav>
            <!-- End Top Nav Bar -->

            <!-- Navbar -->
            <nav class="navbar header mt-3 mb-4">
              <div class="w-100 d-flex justify-content-between align-items-center">
                <form class="w-100">
                  <div class="input-group position-relative">
                    <button id="button-addon2" type="submit" class="btn btn-link text-theme position-absolute fs-18 top-50pr left-7 z-index-9">
                      <i class="fa fa-search"></i>
                    </button>
                    <input type="search" id="blood_group" placeholder="Search" aria-describedby="button-addon2" class="py-3 ps-5 pe-3 form-control w-100 rounded-pill inset-shadow bg-theme-light input-focus" />
                  </div>
                </form>
                <button type="button" class="btn btn-filter rounded-circle h-50p w-50p d-flex justify-content-center align-items-center theme-hover ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                  <i class="fa-solid fa-sliders fs-20"></i>
                </button>
              </div>
            </nav>
            <!-- End Navbar -->

            <!-- User Details -->
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
                </div>
              </div>
            </div>
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
                </div>
              </div>
            </div>
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
                </div>
              </div>
            </div>
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
                </div>
              </div>
            </div>
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
                </div>
              </div>
            </div>
            <div class="bg-white rounded-4 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fs-20 dark-color">Mizanur Rahman</h2>
                <button class="border-0 bg-theme rounded py-1 px-3 fs-14 text-white shadow-h">
                  Interested
                </button>
              </div>

              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center fs-14 mb-2">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> 01700-000000 </span>
                  </div>
                  <div class="d-flex align-items-center fs-14">
                    <div class="h-25p w-25p rounded bg-theme-light text-theme fs-12 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span class="dark-color ml-2 fs-14 d-inline-block ms-2"> Dhanmondi, Dhaka, 1205 </span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 text-end">
                  <img class="w-50p h-50p" :src="getManImage()" alt="User Image">
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
