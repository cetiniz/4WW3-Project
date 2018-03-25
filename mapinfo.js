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
// This creates a new instance of a Google Map, currently centered on an arbitrary location
map = new google.maps.Map(document.getElementById('map-result'), {
   center: {lat: 43.260879, lng: -79.91922540000002},
   zoom: 17,
   styles: styles
});
// This is where I will dynamically add markers when the server sided coding comes into play!
let results = JSON.parse(sql_results);
let markers = [];

let infowindow = new google.maps.InfoWindow();
let bounds = new google.maps.LatLngBounds();

for (let index in results) {
   (function(i) {
	let longit = parseInt(results[i].equipment_long);
	let latit = parseInt(results[i].equipment_lat);
	
   let marker = new google.maps.Marker({
      position: {lat: latit, lng: longit},
      map: map
   });

   bounds.extend(marker.getPosition())
   let numberResult= i + 1;
   let contentString = 
   `<div class="info-container">
   <h1 class="mini-heading">Result #: ` + numberResult + " " +
   results[i].equipment_name + `</h1>
   <div id="bodyContent">
   <p>Sample Review:
   Click below to see the full number of reviews...</p>
   <div class="redirect-button">
   <form>
   <input type="hidden" value="` + results[i].equipment_name + `" name="equipment_name">
   <input type="submit" action="/results/sample/" value="See all Reviews!">
   </form>
   </div>
   </div>
   </div>`

   infowindow.setContent(contentString);
   // The addLisenter function is an event handler that opens up the infowindow when the marker is clicked on the amp
   marker.addListener('click', function() {
      infowindow.open(map, marker);
   });
})(index);
}
map.fitBounds(bounds);
}
