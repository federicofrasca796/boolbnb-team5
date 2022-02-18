<template>
  <div id="apartment_main">
    <!-- APARTMENT PAGE -->
    {{ apartment.title }}
    <div class="container_img w-100 px-3 d-flex flex-wrap">
      <div class="col-12 h-100 p-2">
        <img
          :src="'storage/' + apartment.thumbnail"
          class="w-100 h-100"
          :alt="apartment.slug"
        />
      </div>
    </div>
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
    console.log("/api/apartments/" + this.$route.params.slug);
    this.fetchApartment();
  },
  methods: {
    fetchApartment() {
      axios
        .get("/api/apartments/" + this.$route.params.slug)
        .then((r) => {
          console.log(r.data);
          this.apartment = r.data;
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