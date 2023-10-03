<template>
  <div class="container">

    <nav class="navbar top-header mt-3">
      <router-link :to="{name:'home'}" class="link-light"><i class="fa-solid fa-arrow-left-long"></i></router-link><h3>Blood Bank</h3>
        <i class="fa-solid fa-circle-user fs-2"></i> 
</nav> 


    <h2>Results</h2>
  
      <div v-for="result in searchResults" :key="result.id">
        <div class="card-body shadow mt-5">
          <div class="p-5" style="position: absolute;">
            <i class="fa-solid fa-circle-user fs-1 "></i><span class="fs-1 ml-5" style="margin-left:50px">{{ result.name }}</span>
          </div>

          <div class="p-5" style="position: relative; left: 90%;">
            <h2 style="color:#EB762A">{{ result.blood_group }}</h2>
          </div>
          <div class="p-5">
            <span style="color:#EB762A" class="fs-3">Present Living Location :</span><span class="fs-3">{{ result.area }}, {{ result.dis }}, {{ result.dis }}</span>
          </div>
          <div style="text-align: center;">
            <router-link :to="{ name: 'request-donate', query: { name: result.name, blood_group: result.blood_group } }" class="link-light"><button class="btn p-3 rounded-pill shadow mb-4 text-light fs-4" style="background-color: #EB762A; ">Request Blood Donate</button></router-link>
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

};
</script>

<style scoped>
/* Add any custom styles for this component */
</style>
