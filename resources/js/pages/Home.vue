<template>
  <div id="home_main" class="position-absolute top-0">
    <!-- Jumbo -->
    <section
      id="jumbo"
      class="w-100 d-flex justify-content-center align-items-center"
    >
      <!-- BG image -->
      <img src="img/jumbo-2.jpg" alt="bg image" />

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
            <div class="container_search h-100 bg-white p-2">
              <div id="link_router" class="d-none">
                <button
                  @click="emitSearchData()"
                  class="btn btn-raspberry text-white px-1 px-md-5 h-100"
                >
                  SEARCH
                </button>
              </div>
              <button
                id="link_fake"
                class="btn btn-secondary text-white px-1 px-md-5 h-100"
              >
                SEARCH
              </button>
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
          <div class="col" v-for="apartment in apartments" :key="apartment.id">
            <div class="card overflow-hidden">
              <router-link :to="'/apartments/' + apartment.slug">
                <img
                  :src="'storage/' + apartment.thumbnail"
                  class="w-100"
                  :alt="apartment.slug"
                />
                <div class="card-body">
                  <h5 class="card-title">{{ apartment.title }}</h5>
                </div>
              </router-link>
            </div>
          </div>
        </template>
      </div>
    </section>

    <div class="bottone_goUp" v-if="bottone_goUp_visible">
      <a href="#app">
        <i class="fa-solid fa-chevron-up"></i>
      </a>
    </div>
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
      inputValue: null,
      bottone_goUp_visible: false,
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
      var self = this;
      self.mySearchResult = data;
      this.changeBtn();
      setTimeout(() => {
        let value;
        value = ttSearchBox.getValue();
        this.inputValue = value;
      }, 100);
    });

    /* funzioni per parte grafica Chandra */
    this.styleHeader();
    window.addEventListener("scroll", this.createButton);
  },
  methods: {
    /* funzioni per parte grafica Chandra */
    createButton() {
      if (window.scrollY > 75) {
        //console.log("string");
        this.bottone_goUp_visible = true;
      } else {
        this.bottone_goUp_visible = false;
      }
    },
    styleHeader() {
      let header = document.querySelector("header");
      console.log(header);

      if (window.screen.width >= 576) {
        header.style.justifyContent = "center";
      } else {
        header.style.justifyContent = "flex-start";
      }
    },

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

    emitSearchData() {
      this.$router.push({
        name: "Search",
        params: {
          data: this.mySearchResult,
          value: this.inputValue,
          apartments: this.apartments,
        },
      });
    },
  },
};
</script>

<style lang="scss">
@import "../../sass/variables";
#home_main {
  z-index: -99;
}
#jumbo {
  height: 75vh;
  background-size: cover;
  background-position: center;

  & > img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    filter: brightness(0.7);
  }

  .search-destination {
    width: 75%;
    .input-group {
      height: 70px;
      .container-button-search {
        padding: 0.5rem;
        button {
          padding: 0px 3rem;
        }
      }
    }
  }
  #mySearchbar {
    .tt-search-box-input-container {
      border: none;
      height: 100%;
    }
    svg {
      display: none;
    }
  }
  .container_search {
    border-top-right-radius: 0.9rem;
    border-bottom-right-radius: 0.9rem;
    #link_router {
      border-top-right-radius: 0.9rem;
      border-bottom-right-radius: 0.9rem;
      height: 100%;
    }
    button {
      border-top-right-radius: 0.9rem;
      border-bottom-right-radius: 0.9rem;
    }
    .btn-raspberry {
      background: $raspberry;
    }
  }
}
.bottone_goUp {
  width: 50px;
  height: 40px;
  background-color: $raspberry;
  position: fixed;
  bottom: 0;
  right: 45px;
  text-align: center;
  line-height: 40px;
  i {
    font-size: 20px;
    color: white;
  }
}
</style>