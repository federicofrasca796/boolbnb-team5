<template>
  <div class="container">
	<div class="loading results" v-if="loading">
		<p>Loading</p>
	</div>
	<div class="all results" v-else-if="results.length == 0">
		<div class="col" v-for="apartment in apartments" :key="apartment.id">
			<p>{{apartment.title}}</p>
		</div>
	</div>
	<div class="search results" v-else>
		<div class="col" v-for="apartment in results" :key="apartment.title">
			<p>{{apartment.title}}</p>
		</div>
	</div>
    <div id="map" ref="mapRef"></div>
	<!-- <p>{{testComputed}}</p>
	<button @click="addTest()">Add</button> -->
  </div>
</template>

<script>

    export default { 
      	name: 'Map', 
		data(){
			return{
				apartments: null,
				x: 0,
				results: [],
				loading : true,
			}
		},
      	mounted() {      
			const tt = window.tt; 
			let layers = [];
			let layer;
			let center;
			let markers = [];
			var map = tt.map({ 
				key: 'jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj', 
				container: 'map', 
				center: [12.49427, 41.89056],
    			zoom: 5
			}); 

			var options = {
				searchOptions: {
					key: 'jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj',
					language: 'en-GB',
					limit: 5,
				},
			};

            map.addControl(new tt.FullscreenControl()); 
            map.addControl(new tt.NavigationControl());  

			/* Search Events Handler */
			var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
			var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
			var searchMarkersManager = new SearchMarkersManager(map);
			ttSearchBox.on('tomtom.searchbox.resultsfound', handleResultsFound);
			ttSearchBox.on('tomtom.searchbox.resultselected', handleResultSelection);
			ttSearchBox.on('tomtom.searchbox.resultfocused', handleResultSelection);
			ttSearchBox.on('tomtom.searchbox.resultscleared', handleResultClearing);
			document.body.appendChild(searchBoxHTML)

			/* Search Event Functions */
			function handleResultsFound(event) {
				var results = event.data.results.fuzzySearch.results;

				if (results.length === 0) {
					searchMarkersManager.clear();
				}
				/* searchMarkersManager.draw(results); */
				

			}

			function handleResultSelection(event) {
				var result = event.data.result;
				if (result.type === 'category' || result.type === 'brand') {
					return;
				}
				/* searchMarkersManager.draw([result]); */
				if(layer != null){
					hideLayer(layer)
				}
				if(markers.length != 0){
					for(let i = 0;i<markers.length;i++){
						markers[i].remove();
					}
					markers = [];
				}
				fitToViewport(result);
			}

			function fitToViewport(markerData) {
				if (!markerData || markerData instanceof Array && !markerData.length) {
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
					padding: { left: 300},
				});
			}

			function getBounds(data) {
				var btmRight;
				var topLeft;
				if (data.viewport) {
					btmRight = [data.viewport.btmRightPoint.lng, data.viewport.btmRightPoint.lat];
					topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat];
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
						address: poi.address ? poi.address.freeformAddress : '',
						distance: poi.dist,
						classification: poi.poi ? poi.poi.classifications[0].code : undefined,
						position: poi.position,
						entryPoints: poi.entryPoints
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
					anchor: 'bottom'
				});
				var lon = this.poiData.position.lng || this.poiData.position.lon;
				this.marker.setLngLat([
					lon,
					this.poiData.position.lat
				]);
			}

			SearchMarker.prototype.addTo = function (map) {
				this.marker.addTo(map);
				this._map = map;
				return this;
			};

			SearchMarker.prototype.createMarker = function () {
				var elem = document.createElement('div');
				elem.className = 'tt-icon-marker-black tt-search-marker';
				if (this.options.markerClassName) {
					elem.className += ' ' + this.options.markerClassName;
				}
				var innerElem = document.createElement('div');
				innerElem.setAttribute('style', 'background: white; width: 10px; height: 10px; border-radius: 50%; border: 3px solid black;');

				elem.appendChild(innerElem);
				return elem;
			};

			SearchMarker.prototype.remove = function () {
				this.marker.remove();
				this._map = null;
			};
			/* Results Log */
			ttSearchBox.on('tomtom.searchbox.resultselected', (data) => {
				console.log(data.data.result);
				center = [data.data.result.position.lat , data.data.result.position.lng];
				this.results = [];
				
				for(let k = 0;k<apartments.length;k++){
					let dist = calcCrow(center[0] , center[1] , apartments[k]['latitude'] , apartments[k]['longitude'])
					if(dist < 20){
						createMarker(apartments[k]);
						this.results.push(apartments[k])
						console.log(apartments[k]['title'] , '_' , dist , ' KM');
					}
				}
				if(layers.length == 0){
					createLayer(data.data.result) 
				}
				else{
					for(let j = 0;j<layers.length;j++){
						if(layers[j] == data.data.result.id){
							showLayer(layers[j])
							break;
						}
						else{
							createLayer(data.data.result) 
						}
					}
				}
			});
			let apartments = '';
			axios.get('api/apartments').then(
				(response) => {
					this.apartments = response.data.data; 
					apartments = response.data.data;
					this.loading = false;
				},
			)
			

			function createMarker(object){   
				/* create the popup for the marker*/
				var popup = new tt.Popup()
					.setHTML("<p>"+object.title+"</p>")
				
				/* Create the Marker */
				var marker = new tt.Marker()
				.setLngLat([object.longitude , object.latitude]) /* Coordinates here */
				.setPopup(popup)
				.addTo(map);
				markers.push(marker)
				console.log(markers)
			}

			function calcCrow(lat1, lon1, lat2, lon2) 
			{
			var R = 6371; // km
			var dLat = toRad(lat2-lat1);
			var dLon = toRad(lon2-lon1);
			var lat1 = toRad(lat1);
			var lat2 = toRad(lat2);

			var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
				Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
			var d = R * c;
			return d;
			}

			// Converts numeric degrees to radians
			function toRad(Value) 
			{
				return Value * Math.PI / 180;
			}
			function calculateDistance(){
				let lat1 = apartments[3]['latitude'];
				let lon1 = apartments[3]['longitude'];
				let lat2 = apartments[4]['latitude'];
				let lon2 = apartments[4]['longitude'];
				calcCrow(lat1, lon1, lat2, lon2)
			}

			function hideLayer(layerId) {
            	map.setLayoutProperty(layerId, 'visibility', 'none');
        	}

			function showLayer(layerId){
				map.setLayoutProperty(layerId, 'visibility' , 'visible')
			}

			function createLayer(result){
				map.addLayer({
					'id': result.id,
					'type': 'fill',
					'source' : { 
						'type' : 'geojson',
						'data' : turf.circle([result.position.lng , result.position.lat] , 20000 , {units: 'metres' , properties : {key : result.id}})
					},
					'paint' : {
						'fill-color' : 'blue',
						'fill-opacity' : 0.3
					}
				});
				layers.push(result.id);
				layer = result.id;
			}
			
    	}  ,
		
		methods: {
			addTest(){
				this.x += 1;
			}	
		},

		computed:{
			testComputed(){
				return this.x;
			},

			getApartments(){
				return this.apartments;
			}
		}

		
    } 
</script>

<style>

.container{
	display: flex;
}
#map {
  height: 100vh;
  width: 40%;
}
.tt-search-marker>div{
	background: none !important;
	border: none !important;
	height: 50px !important;
	width: 50px !important;
}
</style>