<template>
  <div class="container-fluid d-flex position-relative" id="mainDiv">
    <div
      class="
        container_results_appartment
        d-flex
        flex-wrap flex-md-nowrap
        px-4
        py-3
        w-50
      "
    >
      <div class="col-12 col-md-6 w-100">
        <div id="searchBox"></div>
        <div class="services d-flex flex-wrap">
          <div
            class="advanced-search px-1 py-1"
            v-for="service in services"
            :key="service.id"
          >
            <input type="button" class="rounded-pill" :value="service.name" />
          </div>
        </div>
        <div v-for="apartment in getApartments" :key="apartment.id">
          <div class="single-apartment d-flex flex-wrap py-3">
            <div class="image-single h-100 overflow-hidden col-12 col-md-4">
              <a href="#" class="w-100">
                <img
                  :src="'storage/' + apartment.thumbnail"
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="map" ref="mapRef" class="w-50"></div>
  </div>
</template>

<script>
export default {
  name: "Map",
  data() {
    return {
      apartments: null,
      results: [],
      loading: true,
      searching: null,
      startCoords: [12.49427, 41.89056],
      services: [],
    };
  },

  mounted() {
    const tt = window.tt;
    let layers = [];
    let layer = 0;
    let center = 0;
    let apartments;
    let startCoords = this.startCoords;
    let markers = [];
    let searching = this.searching;

    /* Create The Map */
    var map = tt.map({
      key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
      container: "map",
      center: startCoords,
      zoom: 4,
    });

    /* Search Options */
    var options = {
      searchOptions: {
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        language: "en-GB",
        limit: 5,
        countrySet: "IT",
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

    /* Check if there is data inherited from home component*/
    searching = this.searching;
    if (searching != null) {
      center = [
        searching.data.result.position.lat,
        searching.data.result.position.lng,
      ];
      ttSearchBox.setValue(this.value);
      apartments = this.apartments;
      this.results = this.apartments;
      map.on("load", () => {
        var result = this.searching.data.result;
        if (result.type === "category" || result.type === "brand") {
          return;
        }
        if (layer != 0) {
          hideLayer(layer);
        }
        if (markers.length != 0) {
          for (let i = 0; i < markers.length; i++) {
            markers[i].remove();
          }
          markers = [];
        }
        map.setMaxZoom(8.5);
        fitToViewport(result);

        setTimeout(() => {
          map.setMaxZoom(22);
        }, 500);
        this.results = [];
        center = [
          this.searching.data.result.position.lat,
          this.searching.data.result.position.lng,
        ];
        for (let k = 0; k < apartments.length; k++) {
          let dist = calcCrow(
            center[0],
            center[1],
            apartments[k]["latitude"],
            apartments[k]["longitude"]
          );
          if (dist < 20) {
            createMarker(apartments[k]);
            this.results.push(apartments[k]);
          }
        }
        if (layers.length == 0) {
          createLayer(this.searching.data.result);
        } else {
          for (let j = 0; j < layers.length; j++) {
            if (layers[j] == this.searching.data.result.id) {
              showLayer(layers[j]);
              break;
            } else {
              createLayer(this.searching.data.result);
            }
          }
        }
      });
    } else {
      axios.get("api/apartments").then((response) => {
        this.apartments = response.data.data;
        apartments = response.data.data;
        this.results = this.apartments;
        drawAll(apartments);
      });
    }

    /* Search Event Functions */
    ttSearchBox.on("tomtom.searchbox.resultsfound", (event) => {
      var results = event.data.results.fuzzySearch.results;

      if (results.length === 0) {
        searchMarkersManager.clear();
      }
    });

    /* Actions to do when selecting a result */
    ttSearchBox.on("tomtom.searchbox.resultselected", (data) => {
      var result = data.data.result;
      if (result.type === "category" || result.type === "brand") {
        return;
      }
      if (layer != 0) {
        hideLayer(layer);
      }
      if (markers.length != 0) {
        for (let i = 0; i < markers.length; i++) {
          markers[i].remove();
        }
        markers = [];
      }
      map.setMaxZoom(8.5);
      fitToViewport(result);

      setTimeout(() => {
        map.setMaxZoom(22);
      }, 500);

      this.results = [];
      center = [data.data.result.position.lat, data.data.result.position.lng];
      for (let k = 0; k < apartments.length; k++) {
        let dist = calcCrow(
          center[0],
          center[1],
          apartments[k]["latitude"],
          apartments[k]["longitude"]
        );
        if (dist < 20) {
          createMarker(apartments[k]);
          this.results.push(apartments[k]);
        }
      }
      if (layers.length == 0) {
        createLayer(data.data.result);
      } else {
        for (let j = 0; j < layers.length; j++) {
          if (layers[j] == data.data.result.id) {
            showLayer(layers[j]);
            break;
          } else {
            createLayer(data.data.result);
          }
        }
      }
    });

    /* Actions to do while results are cleared */
    ttSearchBox.on("tomtom.searchbox.resultscleared", () => {
      if (layer != 0) {
        hideLayer(layer);
      }
      map.flyTo({
        center: startCoords,
        zoom: 4,
      });
      if (markers.length != 0) {
        for (let i = 0; i < markers.length; i++) {
          markers[i].remove();
        }
        markers = [];
      }
      drawAll(apartments);
      this.results = apartments;
    });

    /* Tomtom viewport Handling */
    function fitToViewport(markerData) {
      if (!markerData || (markerData instanceof Array && !markerData.length)) {
        return;
      }
      var bounds = new tt.LngLatBounds();
      if (markerData instanceof Array) {
        markerData.forEach(function (marker) {
          bounds.extend(getBounds(marker));
        });
      } else {
        bounds.extend(getBounds(markerData));
      }
      map.fitBounds(bounds, {
        padding: { left: 300 },
      });
    }

    function getBounds(data) {
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
    }

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

    /* Add Remove Markers From Map */
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

    /* Create Marker with Popup */
    function createMarker(object) {
      /* create the popup for the marker*/
      var popup = new tt.Popup().setHTML(
        "<h4>This is</h4><h1>" +
          object.title +
          "</h1><p>This i an Apartment Popup</p>"
      );

      /* Create the Marker */
      var marker = new tt.Marker()
        .setLngLat([object.longitude, object.latitude]) /* Coordinates here */
        .setPopup(popup)
        .addTo(map);
      markers.push(marker);
    }

    /* Distance Calculator */
    function calcCrow(lat1, lon1, lat2, lon2) {
      var R = 6371; // km
      var dLat = toRad(lat2 - lat1);
      var dLon = toRad(lon2 - lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);
      var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.sin(dLon / 2) *
          Math.sin(dLon / 2) *
          Math.cos(lat1) *
          Math.cos(lat2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      var d = R * c;
      return d;
    }

    // Converts numeric degrees to radians
    function toRad(Value) {
      return (Value * Math.PI) / 180;
    }

    /* hide layer on map */
    function hideLayer(layerId) {
      map.setLayoutProperty(layerId, "visibility", "none");
    }

    /* Show layer on map */
    function showLayer(layerId) {
      map.setLayoutProperty(layerId, "visibility", "visible");
      layer = layerId;
    }

    /* Create layer on map */
    function createLayer(result) {
      let exists = 0;
      for (let i = 0; i < layers.length; i++) {
        if (layers[i] == result.id) {
          exists = 1;
        }
      }
      if (exists == 0) {
        map.addLayer({
          id: result.id,
          type: "fill",
          source: {
            type: "geojson",
            data: turf.circle(
              [result.position.lng, result.position.lat],
              20000,
              { units: "metres", properties: { key: result.id } }
            ),
          },
          paint: {
            "fill-color": "blue",
            "fill-opacity": 0.3,
          },
        });
        layers.push(result.id);
        layer = result.id;
      }
    }

    /* Draw markers on map */
    function drawAll(data) {
      for (let k = 0; k < data.length; k++) {
        createMarker(data[k]);
      }
    }

    this.styleHeader();
  },

  methods: {
    styleHeader() {
      let header = document.querySelector("header");
      console.log(header);

      header.style.justifyContent = "flex-start";
    },

    /* This is a test interacting with computed properties */
    addTest() {
      this.x += 1;
    },

    /* Services Api */
    getServices() {
      axios.get("api/services").then((response) => {
        this.services = response.data.data;
      });
    },

    /* Shuffles an Array */
    shuffle(array) {
      let currentIndex = array.length,
        randomIndex;

      // While there remain elements to shuffle...
      while (currentIndex != 0) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex],
          array[currentIndex],
        ];
      }

      return array;
    },
  },

  computed: {
    /* Compute the apartments */
    getApartments() {
      this.results = this.shuffle(this.results);
      return this.results;
    },
  },

  /* Manage data from home component */
  created() {
    this.searching = this.$route.params.data;
    this.value = this.$route.params.value;
    this.apartments = this.$route.params.apartments;
  },
};
</script>

<style lang="scss">
#mainDiv {
  padding-top: 75px;
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

  .single-apartment {
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

#map {
  height: calc(100vh - 75px);
  width: 100%;
  position: sticky;
  top: 75px;
  right: 0;
}

.tt-search-marker > div {
  background: none !important;
  border: none !important;
  height: 50px !important;
  width: 50px !important;
}
</style>