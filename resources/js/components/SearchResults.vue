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

            <!-- Result -->
            <div v-for="result in searchResults" :key="result.id"> 
            <div class="card-body bg-white text-center myposts p-3 mb-3 rounded-4">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <i class="fa-solid fa-circle-user fs-2" style="font-size: 28px; height: 40px; width: 40px; display: flex; justify-content: center; align-items: center; "></i>
                  </div>
                  <div class="flex-grow-1 ms-2">
                    <h2 class="fs-17 fw-bold mb-0 dark-color text-start"> {{ result.name }} </h2>
                  </div>
              </div>
              <span class="p-3 badge fs-5 d-inline-block ms-2" style="background-color: #FFF4ED;color:#EB762A; border-radius: 30%;">{{ result.blood_group }}</span>
              </div>
              
              <p class="mt-4 mb-0"> <strong class="text-theme fs-16"> Present living location: </strong> {{ result.area }}, {{ result.dis }}, {{ result.area }} </p>

              <router-link :to="{ name: 'request-donate', query: { name: result.name, blood_group: result.blood_group, area: result.area } }" class="text-decoration-none text-white bg-theme px-4 py-2 rounded-pill fs-18 shadow d-inline-block mt-3"> Request blood donate </router-link>
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
      searchResults: [],
    };
  },

  created() {
  // Parse the JSON string from the query parameter
  const results = JSON.parse(this.$route.query.results || '[]');
  console.log('Search Results:', results);
  this.searchResults = results;
},

methods:{
  getBackImage(){
      return  'img/back.png';
       },
}

};
</script>

<style scoped>
/* Add any custom styles for this component */
</style>
