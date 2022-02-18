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
            <input
              type="text"
              class="form-control"
              placeholder="Find your destination"
            />
            <div class="h-100 bg-white p-2">
              <!-- Route to advanced search page -->
              <router-link
                class="btn btn-danger text-white px-5 rounded-0 h-100"
                to="/searchadv"
                >SEARCH
              </router-link>
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
    };
  },
  mounted() {
    this.fetchApartments();
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
  },
};
</script>

<style>
</style>