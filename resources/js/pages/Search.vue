<template>
  <div class="container-fluid d-flex position-relative flex-wrap" id="mainDiv">
    <div id="searchBox" class="col-12"></div>
    <div
      class="
        services
        d-flex
        flex-wrap
        w-100
        justify-content-start justify-content-md-center
        align-items-baseline
      "
    >
      <div class="range-filter rounded-pill d-flex align-items-center">
        <label class="me-2" for="volume">Distance</label>
        <input type="range" name="range" id="range" min="1" max="5" value="2" />

        <span id="range_output"></span>
      </div>
      <div
        class="advanced-search px-1 py-1"
        v-for="service in services"
        :key="service.id"
      >
        <input
          type="button"
          class="rounded-pill serviceButton"
          :value="service.name"
          @click="executeServiceFilter(service.slug , service.id)"
        />
      </div>
    </div>
    <div
      class="
        container_results_appartment
        d-flex
        flex-wrap flex-md-nowrap
        px-4
        py-3
        col-12 col-md-6
      "
    >
      <div class="col-12 col-md-6 w-100">
        <div v-for="premium in getPremium" :key="premium.name">
          <router-link
            :to="'/apartments/' + premium.slug"
            class="single-apartment d-flex flex-wrap my-3 premium position-relative"
          >
            <div class="icon position-absolute star">
              <i class="far fa-star fa-2x"></i>
            </div>
            <div class="image-single h-100 overflow-hidden col-12 col-md-4">
              <a href="#" class="w-100">
                <img
                  :src="'/storage/' + premium.thumbnail"
                  class="w-100"
                  alt="..."
                />
              </a>
            </div>
            <div
              class="
                info_apartment
                col-12 col-md-8
                ps-4
                d-flex
                align-items-center
              "
            >
              <div>
                <p>{{ premium.address }}</p>
                <h5>{{ premium.title }}</h5>
                <hr />
                <p class="m-0">
                  <span>{{ premium.square_metres }} m&sup2;-</span>
                  <span> {{ premium.number_of_rooms }} rooms - </span>
                  <span> {{ premium.number_of_beds }} beds - </span>
                  <span> {{ premium.number_of_baths }} baths </span>
                </p>
                <div v-if="premium.distance >= 0" class="d-flex align-items-center">
                  <h4>Distance</h4>
                  <span class="mx-2">{{ premium.distance }} Km</span>
                </div>
              </div>
            </div>
          </router-link>
        </div>
        <div v-for="apartment in getApartments" :key="apartment.id">
          <router-link
            :to="'/apartments/' + apartment.slug"
            class="single-apartment d-flex flex-wrap my-3"
          >
            <div class="image-single h-100 overflow-hidden col-12 col-md-4">
              <a href="#" class="w-100">
                <img
                  :src="'/storage/' + apartment.thumbnail"
                  class="w-100"
                  alt="..."
                />
              </a>
            </div>
            <div
              class="
                info_apartment
                col-12 col-md-8
                ps-4
                d-flex
                align-items-center
              "
            >
              <div>
                <p>{{ apartment.address }}</p>
                <h5>{{ apartment.title }}</h5>
                <hr />
                <p class="m-0">
                  <span>{{ apartment.square_metres }} m&sup2;-</span>
                  <span> {{ apartment.number_of_rooms }} rooms - </span>
                  <span> {{ apartment.number_of_beds }} beds - </span>
                  <span> {{ apartment.number_of_baths }} baths </span>
                </p>
                <div v-if="apartment.distance >= 0" class="d-flex align-items-center">
                  <h4>Distance</h4>
                  <span class="mx-2">{{ apartment.distance }} Km</span>
                </div>
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </div>
    <div class="container_map w-50 px-4 py-3 d-none d-md-block">
      <div id="map" ref="mapRef" class="col-12 col-md-6 w-100"></div>
    </div>

    <footer-component></footer-component>
  </div>
</template>

<script>
import FooterComponent from "../components/FooterComponent.vue";
export default {
  components: { FooterComponent },
  name: "Map",
  data() {
    return {
      apartments: null,
      results: [],
      loading: true,
      searching: null,
      searchPosition: [],
      startCoords: [12.49427, 41.89056],
      services: [],
      range: 20,
      map: "",
      markers: [],
      layers: [],
      layer: "",
      firstSearch: [],
      counter : 1,
      searchServices: [],
      premiumApartments: [],
    };
  },

  mounted() {
    const tt = window.tt;

    /* Create The Map */
    var map = window.tt.map({
      key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
      container: "map",
      center: this.startCoords,
      zoom: 4,
    });
    this.map = map;
    /* Search Options */
    var options = {
      searchOptions: {
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        language: "it-IT",
        limit: 5,
        countrySet: "IT",
        entityTypeSet: "Municipality",
      },
    };

    /* Map  Controls */
    map.addControl(new tt.FullscreenControl());
    map.addControl(new tt.NavigationControl());

    /* Search Events Handler */
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    var searchMarkersManager = new SearchMarkersManager(map);
    /* Services Api call */
    this.getServices();

    /* Append the searchbox on the map */
    document.getElementById("searchBox").appendChild(searchBoxHTML);

    let slider = document.getElementById("range");
    document.getElementById("range_output").innerHTML =
      slider.value * 10 + " Km";
    slider.oninput = () => {
      this.sliderControl();
    };

    /* Check if there is data inherited from home component*/
    ttSearchBox.setValue(this.value);
    tt.services
      .fuzzySearch({
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        query: this.value,
      })
      .then((result) => {
        axios.get("/api/apartments").then((response) => {
          this.apartments = response.data.data;
          this.results = this.apartments;
          result = result.results[0];
          this.firstSearch = result;
          this.mainExecute(result);
          searchMarkersManager.draw([result]);
        });
      });

    /* Actions to do when selecting a result */
    ttSearchBox.on("tomtom.searchbox.resultselected", (data) => {
      this.searching = data;
      this.execute(data);
      var result = data.data.result;
      searchMarkersManager.draw([result]);
      this.counter = 1;
    });

    /* Actions to do while results are cleared */
    ttSearchBox.on("tomtom.searchbox.resultscleared", () => {
      this.clear();
      searchMarkersManager.clear();
    });

    /* Search Markers Engine */
    function SearchMarkersManager(map, options) {
      this.map = map;
      this._options = options || {};
      this._poiList = undefined;
      this.markers = {};
    }

    SearchMarkersManager.prototype.draw = function (poiList) {
      this._poiList = poiList;
      this.clear();
      this._poiList.forEach(function (poi) {
        var markerId = poi.id;
        var poiOpts = {
          name: poi.poi ? poi.poi.name : undefined,
          address: poi.address ? poi.address.freeformAddress : "",
          distance: poi.dist,
          classification: poi.poi ? poi.poi.classifications[0].code : undefined,
          position: poi.position,
          entryPoints: poi.entryPoints,
        };
        var marker = new SearchMarker(poiOpts, this._options);
        marker.addTo(this.map);
        this.markers[markerId] = marker;
      }, this);
    };

    SearchMarkersManager.prototype.clear = function () {
      for (var markerId in this.markers) {
        var marker = this.markers[markerId];
        marker.remove();
      }
      this.markers = {};
      this._lastClickedMarker = null;
    };

    function SearchMarker(poiData, options) {
      this.poiData = poiData;
      this.options = options || {};
      this.marker = new tt.Marker({
        element: this.createMarker(),
        anchor: "bottom",
      });
      var lon = this.poiData.position.lng || this.poiData.position.lon;
      this.marker.setLngLat([lon, this.poiData.position.lat]);
    }

    SearchMarker.prototype.addTo = function (map) {
      this.marker.addTo(map);
      this._map = map;
      return this;
    };

    SearchMarker.prototype.createMarker = function () {
      var elem = document.createElement("div");
      elem.className = "tt-icon-marker-black tt-search-marker";
      if (this.options.markerClassName) {
        elem.className += " " + this.options.markerClassName;
      }
      var innerElem = document.createElement("div");
      innerElem.setAttribute(
        "style",
        "background: white; width: 10px; height: 10px; border-radius: 50%; border: 3px solid black;"
      );

      elem.appendChild(innerElem);
      return elem;
    };

    SearchMarker.prototype.remove = function () {
      this.marker.remove();
      this._map = null;
    };
    this.styleHeader();
  },

  methods: {
    /* Header style method */
    styleHeader() {
      let header = document.querySelector("header");
      let h1 = document.querySelector("header>h1");
      h1.style.color = "black";
      header.style.justifyContent = "flex-start";
      let search = document.getElementById("searchBox");
      if (window.screen.width >= 576) {
        search.style.position = "absolute";
        search.style.width = "50%";
        search.style.top = "-59px";
        search.style.left = "27%";
      } else {
        search.style.position = "relative";
        search.style.width = "100%";
        search.style.marginBottom = "20px";
      }
    },

    /* Services Api */
    getServices() {
      axios.get("/api/services").then((response) => {
        this.services = response.data.data;
      });
    },

    /* Draw markers on map */
    drawAll(data) {
      for (let k = 0; k < data.length; k++) {
        this.createMarker(data[k]);
      }
    },

    /* Create Marker with Popup */
    createMarker(object) {
      let tt = window.tt;
      let map = this.map;
      /* create the popup for the marker*/
      let popup = new tt.Popup().setHTML(
        "<img src='/storage/" +
          object.thumbnail +
          "' class='w-100' alt='...'><hr><h4>" +
          object.title +
          "</h4>"
      );
      /* Create the Marker */
      let marker = new tt.Marker()
        .setLngLat([object.longitude, object.latitude]) /* Coordinates here */
        .setPopup(popup)
        .addTo(map);
      this.markers.push(marker);
    },

    /* Create layer on map */
    createLayer(result, radius) {
      let name = result.id + "-" + radius;
      let exists = 0;
      let layers = this.layers;
      let tt = window.tt;
      let map = this.map;
      radius = radius * 1000;
      for (let i = 0; i < layers.length; i++) {
        if (layers[i] == name) {
          exists = 1;
        }
      }
      if (exists == 0) {
        map.addLayer({
          id: name,
          type: "fill",
          source: {
            type: "geojson",
            data: turf.circle(
              [result.position.lng, result.position.lat],
              radius,
              { units: "metres", properties: { key: name } }
            ),
          },
          paint: {
            "fill-color": "blue",
            "fill-opacity": 0.3,
          },
        });
        this.layers.push(name);
        this.layer = name;
      }
    },

    /* Show layer on map */
    showLayer(layerId) {
      let map = this.map;
      map.setLayoutProperty(layerId, "visibility", "visible");
      this.layer = layerId;
    },

    /* hide layer on map */
    hideLayer(layerId) {
      let map = this.map;
      map.setLayoutProperty(layerId, "visibility", "none");
    },

    /* Get Tomtom Bounds */
    getBounds(data) {
      var btmRight;
      var topLeft;
      if (data.viewport) {
        btmRight = [
          data.viewport.btmRightPoint.lng,
          data.viewport.btmRightPoint.lat,
        ];
        topLeft = [
          data.viewport.topLeftPoint.lng,
          data.viewport.topLeftPoint.lat,
        ];
      }
      return [btmRight, topLeft];
    },

    /* Tomtom viewport Handling */
    fitToViewport(markerData) {
      let tt = window.tt;
      let map = this.map;
      if (!markerData || (markerData instanceof Array && !markerData.length)) {
        return;
      }
      var bounds = new tt.LngLatBounds();
      if (markerData instanceof Array) {
        markerData.forEach(function (marker) {
          bounds.extend(this.getBounds(marker));
        });
      } else {
        bounds.extend(this.getBounds(markerData));
      }
      map.fitBounds(bounds, {
        padding: { left: 450 },
      });
    },

    /* Search System main Execution */
    execute(searching) {
      var result = searching.data.result;
      this.mainExecute(result);
    },

    /* Execute the search script*/
    mainExecute(result){
      let mapCenter = [
        result.position.lng,
        result.position.lat,
      ]
      this.map.setCenter(mapCenter);
      if (this.layer != 0) {
        this.hideLayer(this.layer);
      }
      if (this.markers.length != 0) {
        for (let i = 0; i < this.markers.length; i++) {
        this.markers[i].remove();
        }
        this.markers = [];
      }
      this.fitToViewport(result);
      this.results = [];
      let center = [
        result.position.lat,
        result.position.lng,
      ];
      //Send coordinates and municipality to api. Get filtered results by distance from searched point
      if(this.searchServices.length > 0){
        axios
          .get(
            `/api/apartments/address/${this.$route.params.address}/coords/${center.join("+")}/services/${this.searchServices}`
          )
          .then((r) => {
            this.apiExecute(r , result)
          });
      }
      else{
        axios.get(
          "/api/apartments/address/" +
          result.address.freeformAddress +
          "/coords/" +
          center.join("+")
        )
        .then((r) => {
          this.apiExecute(r , result)
        });
      }			
    },

    /* Actions on searchbox Clearing */
    clear() {
      let map = this.map;
      if (this.layer != 0) {
        this.hideLayer(this.layer);
      }
      map.flyTo({
        center: this.startCoords,
        zoom: 4,
      });
      if (this.markers.length != 0) {
        for (let i = 0; i < this.markers.length; i++) {
          this.markers[i].remove();
        }
        this.markers = [];
      }
	    axios.get("/api/apartments/")
	  		.then((r)=>{
		 	  this.apartments = r.data.data;
		  	this.drawAll(this.apartments);
        this.results = this.apartments;
        this.counter = 0 ;
      })      
    },

    /* Range Slider Controller */
    sliderControl() {
      let map = this.map;
      let slider = document.getElementById("range");
      let counter = 0;
      document.getElementById("range_output").innerHTML =
        slider.value * 10 + " Km";
      if (slider.value > 2 && counter == 0) {
        map.setMaxZoom(8.5);
        counter++;
      } else {
        if (counter == 1) {
          map.setMaxZoom(9);
          counter--;
        }
      }
      this.range = slider.value * 10;
      if(this.counter == 1){
          if (this.searching != null) {
            this.execute(this.searching);
        } else {
            this.mainExecute(this.firstSearch);
        }
      }
    },

    /* Api data Execution */
    apiExecute(r , result){
      this.apartments = r.data;
			let sortion = [];
      this.premiumApartments = [];
			for (let k = 0; k < this.apartments.length; k++) {
				let dist = this.apartments[k].distance;
				if (dist < this.range) {
					this.createMarker(this.apartments[k]);
					dist = Math.floor(dist * 10) / 10;
					this.apartments[k]["distance"] = dist;
					this.results.push(this.apartments[k]);
					sortion.push(dist);
				}
			}
			if (sortion.length > 0) {
				sortion.sort(function (a, b) {return a - b;});
				let sorting = [];
				for (let h = 0; h < sortion.length; h++) {
					for (let index = 0; index < sortion.length; index++) {
						if (sortion[h] == this.results[index]["distance"]) {
							sorting.push(this.results[index]);
						}
					}
				}
				this.results = sorting;
			}
      let current = [];
      for(let i = 0; i<this.results.length;i++){
        if(this.results[i].sponsors.length){
          this.premiumApartments.push(this.results[i])
        }
        else{
          current.push(this.results[i])
        }
      }
      this.results = current;
			if (this.layers.length == 0) {
				this.createLayer(result, this.range);
			} else {
				for (let j = 0; j < this.layers.length; j++) {
					let name = result.id + "-" + this.range;
					if (this.layers[j] == name) {
						this.showLayer(this.layers[j]);
						break;
					} else {
						this.createLayer(result, this.range);
					}
				}
			}
			this.map.setMaxZoom(22);
    },

    /* Service filter Api */
    executeServiceFilter(slug,serviceId){
      let buttons = document.getElementsByClassName('serviceButton')
      buttons[serviceId - 1].classList.add('text-white');
      buttons[serviceId - 1].classList.add('bg-dark');
      let count = 0;
      for(let i = 0;i<this.searchServices.length;i++){
        if(slug == this.searchServices[i]){
          this.searchServices = this.searchServices.filter(function(item) {
              buttons[serviceId - 1].classList.remove('bg-dark');
              buttons[serviceId - 1].classList.remove('text-white');
              return item !==slug
          })
          count = 1;
        }
      }
      if(count == 0){
        this.searchServices.push(slug)
      }
      if(this.searching != null){
        this.execute(this.searching)
      }
      else{
        this.mainExecute(this.firstSearch)
      }
    },
  },

  computed: {
    /* Compute the apartments */
    getApartments() {
      return this.results;
    },

    /* Compute the Premium Apartments */
    getPremium() {
      return this.premiumApartments;
    }
  },

  /* Manage data from home component */
  created() {
    this.value = this.$route.params.address;
  },
};
</script>


<style lang="scss">
@import "../../sass/variables";
#mainDiv {
  padding-top: 10px;
  height: calc(100vh - 75px);
  .container_results_appartment {
    overflow-y: scroll;
    height: calc(100% - 150px);
    .single-apartment {
      text-decoration: none;
      color: black;
      .image-single {
        img {
          border-radius: 1.9rem;
          height: 165px;
        }
      }
      .info_apartment {
        hr {
          width: 50px;
        }
      }
    }
  }
  .range-filter {
    font-family: "Josefin Sans", sans-serif;
    padding: 8px 16px;
    border: 1px solid lightgrey;
    background-color: transparent;
    height: 39.31px;

    &:hover {
      border: 1px solid black;
    }
  }
  .advanced-search {
    input[type="button"] {
      font-family: "Josefin Sans", sans-serif;
      padding: 8px 16px;
      border: 1px solid lightgrey;
      background-color: transparent;
      &:hover {
        border: 1px solid black;
      }
    }
  }

  #searchBox {
    .tt-search-box {
      margin-top: 0px;
    }
    .tt-search-box-input-container {
      border-radius: 0.9rem;
    }
  }
}
.container_map {
  height: calc(100% - 150px);
  #map {
    height: 100%;
    width: 100%;
    position: sticky;
    top: 75px;
    right: 0;
  }
}

.premium{
  background-color: rgba($color: #c56914, $alpha: 0.3);
  border-top-left-radius: 1.9rem;
  border-bottom-left-radius: 1.9rem;
}

.star{
  right: 1rem;
  top: 0.5rem;
  color: white;
}

</style>