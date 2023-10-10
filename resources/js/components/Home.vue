<template>
  <div class="app" :style="{ backgroundImage: 'url(\'/body-bg.jpg\')' }">
      <div class="blurry-bg d-flex justify-content-center align-items-center h-100 w-100">
        <div class="app-body">
          <div class="scroll-body">
            <div class="container">
              <!-- Top nav bar -->
              <nav class="navbar top-header mt-3">
                  <h3 class="home-h mb-0 dark-color">Blood Bank</h3>
                  <i class="fa-solid fa-circle-user fs-1"></i>
              </nav>

              <!-- navbar -->
              <nav class="navbar header mt-3 mb-3">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                      <form class="w-100">
                          <div class="input-group position-relative">
                            <button id="button-addon2" type="submit" class="btn btn-link text-theme position-absolute fs-18 top-50pr left-7 z-index-9">
                              <i class="fa fa-search"></i>
                            </button>

                          <input type="text" id="blood_group"  placeholder="Search"
                              aria-describedby="button-addon2" class="py-3 ps-5 pe-3 form-control w-100 rounded-pill inset-shadow bg-theme-light input-focus" />
                          </div>
                      </form>

                      <button type="button" class="btn btn btn-filter rounded-circle h-50p w-50p d-flex justify-content-center align-items-center theme-hover ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                        <i class="fa-solid fa-sliders fs-20"></i>
                      </button>
                    </div>
              </nav>

              <!-- Last Update  -->
              <h2 class="mb-3 fs-24 fw-bold"> Last Update </h2>
              <div class="last-update row g-3 mb-4">
                <div class="col-6 mb-1">
                  <div class="card-body bg-white rounded rounded-4 p-3">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getClockImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 fw-bold mb-0 text-dark"> {{ formatDate(latestPostTimestamp).day }} </h2>
                        <h4 class="fs-14 w-100 mt-2 mb-0">{{ formatDate(latestPostTimestamp).date }}, {{ formatTime(latestPostTimestamp) }}</h4>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 mb-1">
                  <div class="card-body bg-white rounded rounded-4 p-3">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="h-50p w-50p" :src="getClockImage()" alt="blood">
                      </div>
                      <div class="flex-grow-1 ms-2">
                        <h2 class="fs-17 fw-bold mb-0 text-dark"> {{ formatDate(latestRequestTimestamp).day }} </h2>
                        <h4 class="fs-14 w-100 mt-2 mb-0"> {{ formatDate(latestRequestTimestamp).date }}, {{ formatTime(latestRequestTimestamp) }} </h4>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-6 mb-1">
                  <router-link :to="{name:'mypost'}" class="text-decoration-none">
                    <div class="card-body bg-white rounded rounded-4 shadow-h p-3">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <img class="h-50p w-50p" :src="getClockImage()" alt="blood">
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <h2 class="fs-17 fw-bold mb-0 text-dark"> My Post </h2>
                          </div>
                        </div>
                    </div>
                  </router-link>
                </div>

                <div class="col-6 mb-1">
                    <router-link :to="{name:'blood-request'}" class="text-decoration-none">
                      <div class="card-body bg-white rounded rounded-4 shadow-h p-3">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img class="h-50p w-50p" :src="getClockImage()" alt="blood">
                            </div>
                            <div class="flex-grow-1 ms-2">
                              <h2 class="fs-17 fw-bold mb-0 text-dark"> Blood Request </h2>
                            </div>
                          </div>
                      </div>
                    </router-link>
                </div>
              </div>

              <!-- Post a Request  -->
              <h2 class="mb-3 fs-24 fw-bold">Post a Request</h2>
              <div class="card-body p-4 bg-white rounded-4 mb-4 text-justify">
                  <form @submit.prevent="createPost" class="post-form">
                      <div class="w-100 mb-3 post-item position-relative">
                          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getBloodImage()" alt="blood">
                          <select class="fs-5 mb-3 inset-shadow w-100 form-select rounded-pill bg-theme-light input-focus py-2 pl-50" id="blood_group" v-model="newPost.blood_group">
                              <option value="">Select Your Blood Group</option>
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                              <option value="B+">B+</option>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>
                          </select>
                      </div>

                      <div class="w-100 mb-3 post-item position-relative">
                          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getUserImage()" alt="User">
                          <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="name" v-model="newPost.name"
                              placeholder="Your Name" required>
                      </div>

                      <div class="w-100 mb-3 post-item position-relative">
                          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getLocationImage()" alt="Location">
                          <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="location" v-model="newPost.location"
                              placeholder="Location" required>
                      </div>


                      <div class="w-100 mb-3 post-item position-relative">
                          <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getPhoneImage()" alt="Phone">
                          <input type="tel" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="phone" v-model="newPost.phone"
                              placeholder="Phone Number" required>
                      </div>

                      <div class="w-100 mb-3 post-item position-relative">
                          <textarea
                            rows="4" id="details" v-model="newPost.details" class="w-100 fs-5 mb-3 inset-shadow w-100 form-control rounded-4 bg-theme-light input-focus"
                            placeholder="Add details(why & how many bags?)">
                          </textarea>
                      </div>

                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn rounded-pill fs-18 px-5 py-2 bg-theme text-white shadow-h" :disabled="processing">
                          {{ processing ? "Please wait" : "Post" }}
                        </button>
                      </div>
                  </form>
              </div>
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

                      <form @submit.prevent="searchInModal">

                          <div class="w-100 mb-3 post-item position-relative">
                              <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getLocationImage()" alt="Location">
                              <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="div" v-model="newSearch.div"
                                  placeholder="Division">
                          </div>

                          <div class="w-100 mb-3 post-item position-relative">
                              <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getLocationImage()" alt="Location">
                              <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="dis" v-model="newSearch.dis"
                                  placeholder="District">
                          </div>

                          <div class="w-100 mb-3 post-item position-relative">
                              <img class="position-absolute h-25p w-25h top-50pr left-17" :src="getLocationImage()" alt="Location">
                              <input type="text" class="fs-5 mb-3 inset-shadow w-100 form-control rounded-pill bg-theme-light input-focus py-2 pl-50" id="area"  v-model="newSearch.area"
                                  placeholder="Area">
                          </div>

                          <div class="w-100 mb-3 post-item position-relative">
                              <select class="fs-5 mb-3 inset-shadow w-100 form-select rounded-pill bg-theme-light input-focus py-2 pl-50" id="blood_group"
                                  v-model="newSearch.blood_group">
                                  <option value="">Select Your Blood Group</option>
                                  <option value="O+">O+</option>
                                  <option value="O-">O-</option>
                                  <option value="B+">B+</option>
                                  <option value="A+">A+</option>
                                  <option value="A-">A-</option>
                                  <option value="AB+">AB+</option>
                                  <option value="AB-">AB-</option>
                              </select>
                          </div>

                        <div class="d-flex justify-content-center">
                          <button type="submit"
                              class="btn rounded-pill fs-18 px-5 py-2 bg-theme text-white shadow-h" :disabled="processing">
                              {{ processing ? "Please wait" : "search" }}
                          </button>
                        </div>
                      </form>
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
                    blood_group: '',
                    name: '',
                    location: '',
                    phone: '',
                    details: '',
                },

                posts: [],
                requestdonates: [],


                newSearch: {
                    div: '',
                    dis: '',
                    area: '',
                    blood_group: '',
                },

                processing: false
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
                        day: postDate.toLocaleDateString('en-US', {
                            weekday: 'long'
                        }),
                        date: postDate.toLocaleDateString('en-US', {
                            month: 'numeric',
                            day: 'numeric',
                            year: 'numeric',
                        }),
                        justNow: true,
                    };
                }

                return {
                    day: postDate.toLocaleDateString('en-US', {
                        weekday: 'long'
                    }),
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
                const options = {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                };
                const date = new Date(dateString);
                return date.toLocaleTimeString('en-US', options);
            },
            // Image
            getBloodImage() {
                return 'img/blood.png';
            },
            getUserImage() {
                return 'img/user.png';
            },
            getLocationImage() {
                return 'img/location.png';
            },
            getPhoneImage() {
                return 'img/tel.png';
            },

            getClockImage() {
                return 'img/clock.png';
            },

            /* Create a search */

            searchInModal() {

                this.processing = true;
                axios.get('/api/doners/search', {
                        params: this.newSearch
                    })
                    .then((response) => {
                        this.$router.push({
                            name: 'SearchResults',
                            query: {
                                results: JSON.stringify(response.data)
                            }
                        });
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
