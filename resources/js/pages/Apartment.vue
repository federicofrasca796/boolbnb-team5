<template>
  <div id="apartment_main">
    <!-- Apartment gallery -->
    <section class="container_img w-100 d-flex flex-wrap col-12">
      <img
        :src="'/storage/' + apartment.thumbnail"
        class="w-100 h-100"
        :alt="apartment.slug"
      />
    </section>

    <!-- Home description and contacts section -->
    <section class="container_home d-flex flex-wrap m-auto py-5">
      <!-- About home -->
      <div class="col-12 col-md-8">
        <p>{{ apartment.address }}</p>
        <h1>{{ apartment.title }}</h1>

        <h4>About this home</h4>
        <p>
          {{ apartment.description }}
        </p>
      </div>

      <!-- Contact owner  -->
      <div
        class="col-12 col-md-4 d-flex justify-content-center align-items-center"
      >
        <div class="card container_owner w-50 m-auto rounded-pill sticky-top">
          <div class="card-body text-center text-center">
            <a
              class="text-dark text-decoration-none"
              :href="'http://127.0.0.1:8000/message/' + apartment.slug"
              >Contact the owner</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- Details section -->
    <section class="container_details m-auto">
      <hr class="col-12 col-md-8" />

      <h1 class="text-center text-md-start mt-4">All the details</h1>

      <div class="col-12 col-md-8 d-flex mt-4 flex-wrap">
        <div class="col-6 col-md-3 text-center text-md-start mb-5">
          <img src="/img/plans.png" alt="floors icon" /><span class="ms-4"
            >{{ apartment.square_metres }} m&sup2;</span
          >
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
          <img src="/img/open-door.png" alt="rooms icon" /><span class="ms-4"
            >{{ apartment.number_of_rooms }} rooms</span
          >
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
          <img src="/img/bed.png" alt="bed icon" /><span class="ms-4"
            >{{ apartment.number_of_beds }} beds</span
          >
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
          <img src="/img/shower.png" alt="shower icon" /><span class="ms-4"
            >{{ apartment.number_of_baths }} bath</span
          >
        </div>
      </div>
    </section>

    <!-- Services section-->
    <section
      class="container-extra-service mb-5 m-auto"
      v-if="this.hasServices == 1"
    >
      <h3 class="text-center text-md-start mt-4 mb-3">Extra services</h3>

      <div class="col-12 col-md-8 d-flex flex-wrap">
        <div
          v-for="service in apartment.services"
          :key="service.id"
          class="col-4 col-md-3 text-md-start mb-2"
        >
          <img :src="'../img/' + service.slug + '.png'" :alt="service.slug" />
          <span class="ms-2 me-3 mb-3">{{ service.name }}</span>
        </div>
      </div>
    </section>

    <!-- Map section -->
    <section class="map w-100" id="map"></section>

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
      apartment: [],
      loading: true,
      api_error: false,
      bottone_goUp_visible: false,
      center: [],
      map: null,
      hasServices: 0,
    };
  },
  mounted() {
    this.fetchApartment();
    //parte grafica header
    this.styleHeader();
    window.addEventListener("scroll", this.createButton);
  },
  methods: {
    //parte grafica header
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
      let h1 = document.querySelector("header>h1");
      h1.style.color = "black";
      console.log(h1);
      console.log(header);

      if (window.screen.width >= 576) {
        header.style.justifyContent = "center";
      } else {
        header.style.justifyContent = "flex-start";
      }
    },

    fetchApartment() {
      axios
        .get("/api/apartments/" + this.$route.params.slug)
        .then((r) => {
          //   console.log(r.data);
          this.apartment = r.data;
          if (this.apartment.services.length != 0) {
            this.hasServices = 1;
          }
          this.loading = false;
          this.center.push(this.apartment.longitude);
          this.center.push(this.apartment.latitude);
          this.initilizeMap();
        })
        .catch((e) => {
          //   console.error(e);
          this.api_error = true;
        });
    },

    initilizeMap() {
      /* Create The Map */
      const tt = window.tt;
      var map = window.tt.map({
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        container: "map",
        center: this.center,
        zoom: 13,
      });
      this.map = map;
      /* Map  Controls */
      this.map.addControl(new tt.FullscreenControl());
      this.map.addControl(new tt.NavigationControl());
      let marker = new tt.Marker()
        .setLngLat(this.center) /* Coordinates here */
        .addTo(this.map);
    },
  },
};
</script>



<style lang="scss">
@import "../../sass/variables";
.container_owner {
  z-index: 8;
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