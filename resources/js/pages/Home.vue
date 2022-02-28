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

    <!-- Sponsored Apartments -->
    <section>
      <div class="sponsor_title my-5 text-center">
        <h1 v-show="visible">Apartments in evidence</h1>
      </div>

      <!-- Apartments cards -->
      <div class="container-apartments row m-auto row-cols-1 row-cols-md-4 g-4">
        <template v-if="api_error">Apartments can't be reached</template>

        <!-- While loading API.. -->
        <template v-else-if="loading"
          ><div class="loader loader--style6" title="5">
            <svg
              version="1.1"
              id="Layer_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px"
              y="0px"
              width="24px"
              height="30px"
              viewBox="0 0 24 30"
              style="enable-background: new 0 0 50 50"
              xml:space="preserve"
            >
              <rect x="0" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
              <rect x="10" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0.15s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0.15s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
              <rect x="20" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0.3s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0.3s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
            </svg></div
        ></template>

        <!-- API loaded -->
        <template v-else>
          <div
            class="col"
            v-for="apartment in apartments_sponsored"
            :key="apartment.id"
          >
            <div class="card position-relative">
              <img
                class="position-absolute sponsor-image"
                src="../../../public/img/sposor.png"
                alt=""
              />
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

    <section>
      <div class="sponsor_title my-5 text-center">
        <h1>Explore our best apartments</h1>
      </div>

      <!-- Apartments cards -->
      <div class="container-apartments row m-auto row-cols-1 row-cols-md-4 g-4">
        <template v-if="api_error">Apartments can't be reached</template>

        <!-- While loading API.. -->
        <template v-else-if="loading"
          ><div class="loader loader--style6" title="5">
            <svg
              version="1.1"
              id="Layer_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px"
              y="0px"
              width="24px"
              height="30px"
              viewBox="0 0 24 30"
              style="enable-background: new 0 0 50 50"
              xml:space="preserve"
            >
              <rect x="0" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
              <rect x="10" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0.15s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0.15s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
              <rect x="20" y="13" width="4" height="5" fill="#333">
                <animate
                  attributeName="height"
                  attributeType="XML"
                  values="5;21;5"
                  begin="0.3s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
                <animate
                  attributeName="y"
                  attributeType="XML"
                  values="13; 5; 13"
                  begin="0.3s"
                  dur="0.6s"
                  repeatCount="indefinite"
                />
              </rect>
            </svg></div
        ></template>

        <!-- API loaded -->
        <template v-else>
          <div class="col" v-for="apartment in apartments" :key="apartment.id">
            <div class="card">
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

    <footer-component></footer-component>
  </div>
</template>

<script>
import FooterComponent from "../components/FooterComponent.vue";
export default {
  components: { FooterComponent },
  data() {
    return {
      apartments: Array,
      loading: true,
      api_error: false,
      mySearchResult: [],
      apartments_sponsored: Array,
      visible: false,
      inputValue: null,
      bottone_goUp_visible: false,
    };
  },
  mounted() {
    this.fetchApartments();
    this.getSponsored();

    /* Search Options */
    var options = {
      searchOptions: {
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        language: "it-IT",
        limit: 5,
        countrySet: "IT",
      },
    };

    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    this.printSearchbar(searchBoxHTML);

    /* Results Log on select */
    ttSearchBox.on("tomtom.searchbox.resultselected", (data) => {
      this.mySearchResult = data.data.result;
      this.changeBtn();
      setTimeout(() => {
        let value;
        value = ttSearchBox.getValue();
        this.inputValue = value;
      }, 50);
    });

    this.styleHeader();
    window.addEventListener("scroll", this.createButton);
  },
  methods: {
    createButton() {
      if (window.scrollY > 75) {
        this.bottone_goUp_visible = true;
      } else {
        this.bottone_goUp_visible = false;
      }
    },
    styleHeader() {
      let header = document.querySelector("header");
      let h1 = document.querySelector("header>h1");
      h1.style.color = "white";

      if (window.screen.width >= 576) {
        header.style.justifyContent = "center";
      } else {
        header.style.justifyContent = "flex-start";
      }
    },

    fetchApartments() {
      axios
        .get("/api/apartments/")
        .then((r) => {
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

    getSponsored() {
      axios
        .get("/api/sponsored")
        .then((r) => {
          if (r.data.data == "") {
            this.visible = false;
          } else {
            this.apartments_sponsored = r.data.data;
            this.loading = false;
            this.visible = true;
          }
        })
        .catch((e) => {
          console.error(e);
          this.api_error = true;
        });
    },
    emitSearchData() {
      this.$router.push({
        path: "/searchadv/" + this.inputValue,
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
.sponsor-image {
  width: 100px;
  left: -20px;
  top: -15px;
}
.container-apartments {
  img {
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
  }
}
.loader {
  margin: 0 0 2em;
  height: 100px;
  width: 20%;
  text-align: center;
  padding: 1em;
  margin: 0 auto 1em;
  display: inline-block;
  vertical-align: top;
}
svg path,
svg rect {
  fill: $raspberry;
}

</style>
