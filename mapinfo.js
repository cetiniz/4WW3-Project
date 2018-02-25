// Global map variable here
var map; 
function initMap() {
// Styles for the map will go here
let styles = [
{
   "featureType": "poi.business",
   "stylers": [
   {
      "visibility": "off"
   }
   ]
},
{
   "featureType": "poi.park",
   "elementType": "labels.text",
   "stylers": [
   {
      "visibility": "off"
   }
   ]
}
]
map = new google.maps.Map(document.getElementById('map-result'), {
   center: {lat: 43.260879, lng: -79.91922540000002},
   zoom: 17,
   styles: styles
});
// This is where I will dynamically add markers
let markers = [];
markers.push(new google.maps.Marker({
   position: {lat: 43.26118425368222, lng: -79.92022854617159},
   map: map
}));
markers.push(new google.maps.Marker({
   position: {lat: 43.26118230039779, lng: -79.91990892740608},
   map: map
}));
// Create info windows per marker
for(let marker of markers) {
   let contentString = 
   `<div class="info-container">
   <div id="siteNotice"></div>
   <h1 id="firstHeading" class="firstHeading">Uluru</h1>
   <div id="bodyContent">
   <p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large
   sandstone rock formation in the southern part of the 
   Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) 
   south west of the nearest large town, Alice Springs; 450&#160;km 
   (280&#160;mi) by road. Kata Tjuta and Uluru are the two major 
   features of the Uluru - Kata Tjuta National Park. Uluru is 
   sacred to the Pitjantjatjara and Yankunytjatjara, the 
   Aboriginal people of the area. It has many springs, waterholes, 
   rock caves and ancient paintings. Uluru is listed as a World 
   Heritage Site.</p>
   <p>Attribution: Uluru, <a href="individual_sample.html">
   https://en.wikipedia.org/w/index.php?title=Uluru</a> 
   (last visited June 22, 2009).</p>
   </div>
   </div>`
   let infowindow = new google.maps.InfoWindow({
      content: contentString
   });

   marker.addListener('click', function() {
      infowindow.open(map, marker);
   });
}
}