<template>
  <div id="main_wrap">
    <!-- Jumbo -->
    <section
      id="jumbo"
      class="w-100 d-flex justify-content-center align-items-center"
    >
      <!-- BG image -->
      <img src="img/jumbo-2.jpg" alt="" />

      <!-- Searchbar -->
      <div class="search-destination w-75">
        <form action="#">
          <div class="input-group w-100">
            <!-- Icon -->
            <span class="input-group-text px-4" id="basic-addon1">
              <i class="fa-solid fa-location-dot"></i>
            </span>
            <!-- Input text -->
            <div id="mySearchbar" class="form-control"></div>

            <!-- Route to advanced search page -->
            <div class="h-100 bg-white p-2">
              <div id="link_router" class="d-none">
                <router-link
                  class="btn btn-danger text-white px-5 rounded-0 h-100"
                  :to="{ name: 'Search', params: mySearchResult }"
                  >SEARCH
                </router-link>
              </div>
              <div
                id="link_fake"
                class="btn btn-secondary text-white px-5 rounded-0 h-100"
              >
                SEARCH
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <section>
      <div class="sponsor_title my-5 text-center">
        <h1>Explore our best apartments</h1>
      </div>

      <!-- Apartments cards -->
      <div class="container-apartments row m-auto row-cols-1 row-cols-md-4 g-4">
        <template v-if="api_error">Apartments can't be reached</template>

        <!-- While loading API.. -->
        <template v-else-if="loading"> ⏳ Loading.. </template>

        <!-- API loaded -->
        <template v-else>
          <div class="col" v-for="apartment in apartments" :key="apartments.id">
            <div class="card overflow-hidden">
              <!-- <a href="{{ route('guest.show', $apartment->slug) }}"> -->
              <img
                :src="'storage/' + apartment.thumbnail"
                class="w-100"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">{{ apartment.title }}</h5>
              </div>
              <!-- </a> -->
            </div>
          </div>
        </template>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apartments: Array,
      loading: true,
      api_error: false,
      mySearchResult: Object,
    };
  },
  mounted() {
    this.fetchApartments();

    //Searchbar
    var options = {
      searchOptions: {
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        language: "en-GB",
        limit: 5,
      },
    };

    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    this.printSearchbar(searchBoxHTML);

    /* Results Log on select */
    ttSearchBox.on("tomtom.searchbox.resultselected", (data) => {
      this.mySearchResult = data.data.result;
      this.changeBtn();
      //   console.log(this.mySearchResult);
    });
  },
  methods: {
    fetchApartments() {
      axios
        .get("/api/apartments")
        .then((r) => {
          // console.log(r);
          this.apartments = r.data.data;
          this.loading = false;
        })
        .catch((e) => {
          console.error(e);
          this.api_error = true;
        });
    },

    printSearchbar(searchbar) {
      let input = document.getElementById("mySearchbar");
      input.appendChild(searchbar);
    },

    changeBtn() {
      let fake = document.getElementById("link_fake");
      fake.classList.add("d-none");
      let real = document.getElementById("link_router");
      real.classList.remove("d-none");
    },
  },
};
</script>

<style>
</style>