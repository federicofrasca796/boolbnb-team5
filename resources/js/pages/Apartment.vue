<template>
  <div id="apartment_main">
    <!-- Apartment gallery -->
    <section class="container_img w-100 px-3 d-flex flex-wrap">
      <div class="col-12 h-100 p-2">
        <img
          :src="'/storage/' + apartment.thumbnail"
          class="w-100 h-100"
          :alt="apartment.slug"
        />
      </div>
    </section>

    <!-- Home description and contacts section -->
    <section class="container_home d-flex flex-wrap m-auto py-5">
      <!-- About home -->
      <div class="col-12 col-md-8">
        <p>{{ apartment.address }}</p>
        <h1>{{ apartment.title }}</h1>

        <h4>About this home</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati,
          optio praesentium libero quis ratione facilis molestias quod odit
          reiciendis hic sed magnam deserunt. Facere, fugit dolorem. Quidem nisi
          totam voluptates. Consectetur eligendi corrupti, ratione illum
          delectus vitae veritatis cupiditate? Recusandae beatae blanditiis
          aliquid, repellat illum impedit inventore, odio ipsa repellendus
          cumque amet incidunt! Fugiat, doloremque optio. Porro libero sit
          vitae. Quaerat deleniti laborum tempore aperiam nostrum eum cumque,
          fugit earum. Voluptatum cupiditate consequuntur inventore rem, dolor,
          ut cumque magnam magni atque quisquam similique esse? Voluptatum nemo
          consectetur numquam beatae praesentium. Nostrum iste accusamus iure
          assumenda laudantium quasi odit consequatur veritatis! Necessitatibus
          aspernatur molestiae error voluptatibus molestias incidunt saepe a
          corrupti nesciunt. Non, maxime. Nesciunt minus sed sunt. Error, amet
          cupiditate? Minus explicabo alias ullam distinctio illo iusto, iste
          voluptatibus nesciunt modi eos veritatis voluptatem asperiores
          blanditiis et optio magni excepturi dolor ex ea dolorem nostrum
          quisquam eum quas? Veniam, magnam. Dolore dolorem repellat quo quam
          possimus, tempora neque quod delectus esse alias et aspernatur
          reprehenderit ex fuga similique est ut. Velit mollitia illum minus
          laborum porro ex sunt atque praesentium.
        </p>
      </div>

      <!-- Contact owner  -->
      <div
        class="col-12 col-md-4 d-flex justify-content-center align-items-center"
      >
        <div class="card w-50 m-auto rounded-pill sticky-top">
          <div class="card-body text-center">
            <p class="card-text">Contact the owner</p>
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
    <section class="container-extra-service mb-5 m-auto">
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
    <section class="map">
      <img class="w-100" src="../img/map.png" alt="" />
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apartment: Object,
      loading: true,
      api_error: false,
    };
  },
  mounted() {
    this.fetchApartment();
  },
  methods: {
    fetchApartment() {
      axios
        .get("/api/apartments/" + this.$route.params.slug)
        .then((r) => {
          //   console.log(r.data);
          this.apartment = r.data;
          this.loading = false;
        })
        .catch((e) => {
          //   console.error(e);
          this.api_error = true;
        });
    },
  },
};
</script>

<style>
</style>