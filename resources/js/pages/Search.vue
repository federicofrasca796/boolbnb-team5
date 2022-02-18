<template>
  <div>
    <div id="map" ref="mapRef"></div>
    <div id="geofencing"></div>
    <p>{{ testComputed }}</p>
    <button @click="addTest()">Add</button>
  </div>
</template>

<script>
export default {
  name: "Map",
  data() {
    return {
      apartments: null,
      x: 0,
    };
  },
  mounted() {
    const tt = window.tt;
    var map = tt.map({
      key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
      container: "map",
      center: [12.49427, 41.89056],
      zoom: 5,
    });

    var options = {
      searchOptions: {
        key: "jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj",
        language: "en-GB",
        limit: 5,
      },
    };

    map.addControl(new tt.FullscreenControl());
    map.addControl(new tt.NavigationControl());

    /* Search Events Handler */
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    var searchMarkersManager = new SearchMarkersManager(map);
    ttSearchBox.on("tomtom.searchbox.resultsfound", handleResultsFound);
    ttSearchBox.on("tomtom.searchbox.resultselected", handleResultSelection);
    ttSearchBox.on("tomtom.searchbox.resultfocused", handleResultSelection);
    ttSearchBox.on("tomtom.searchbox.resultscleared", handleResultClearing);
    document.body.appendChild(searchBoxHTML);

    /* Search Event Functions */
    function handleResultsFound(event) {
      var results = event.data.results.fuzzySearch.results;

      if (results.length === 0) {
        searchMarkersManager.clear();
      }
      /* searchMarkersManager.draw(results); */
      fitToViewport(results);
    }

    function handleResultSelection(event) {
      var result = event.data.result;
      if (result.type === "category" || result.type === "brand") {
        return;
      }
      /* searchMarkersManager.draw([result]); */
      fitToViewport(result);
    }

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
      map.fitBounds(bounds, { padding: 100, linear: true });
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

    function handleResultClearing() {
      /* searchMarkersManager.clear(); */
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

    /* Results Log */
    ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {
      console.log(data.data.result.position);
    });

    let apartments = "";
    axios
      .get("/api/apartments")
      .then((r) => {
        // console.log(r);
        this.apartments = r.data.data;
        this.loading = false;
        apartments = this.apartments;
        initializeCreate();
        calculateDistance();
      })
      .catch((e) => {
        console.error(e);
        this.api_error = true;
      });

    function initializeCreate() {
      for (let i = 0; i < apartments.length; i++) {
        createMarker(apartments[i]);
      }
    }

    function createMarker(object) {
      /* create the popup for the marker*/
      var popup = new tt.Popup().setHTML("<p>" + object.title + "</p>");

      /* Create the Marker */
      var marker = new tt.Marker()
        .setLngLat([object.longitude, object.latitude]) /* Coordinates here */
        .setPopup(popup)
        .addTo(map);
    }

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
      console.log(d);
    }

    // Converts numeric degrees to radians
    function toRad(Value) {
      return (Value * Math.PI) / 180;
    }
    function calculateDistance() {
      let lat1 = apartments[3]["latitude"];
      let lon1 = apartments[3]["longitude"];
      let lat2 = apartments[4]["latitude"];
      let lon2 = apartments[4]["longitude"];
      calcCrow(lat1, lon1, lat2, lon2);
    }

    var config = {
      name: "Bool",
      type: "Feature",
      geometry: {
        radius: 50,
        type: "Point",
        shapeType: "Circle",
        coordinates: [-67.137343, 45.137451],
      },
    };
  },

  methods: {
    addTest() {
      this.x += 1;
    },
  },

  computed: {
    testComputed() {
      return this.x;
    },
  },
};
</script>

<style>
#map {
  height: 500px;
  width: 100%;
}

.tt-search-marker {
  background-image: url(../../img/logo.png) !important;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}
.tt-search-marker > div {
  background: none !important;
  border: none !important;
  height: 50px !important;
  width: 50px !important;
}
</style>