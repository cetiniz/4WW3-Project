// Global map variable here
console.log("hello");
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
map = new google.maps.Map(document.getElementById('map-object-result'), {
   center: {lat: 43.260879, lng: -79.91922540000002},
   zoom: 17,
   styles: styles
});
// This is where I will dynamically add markers when the server sided coding comes into play!
let results = JSON.parse(sql_results);
let markers = [];

let bounds = new google.maps.LatLngBounds();
let infowindow = new google.maps.InfoWindow();
   let longit = parseInt(results.equipment_long);
   let latit = parseInt(results.equipment_lat);
   
   let marker = new google.maps.Marker({
      position: {lat: latit, lng: longit},
      map: map
   });
   bounds.extend(marker.getPosition())
   let numberResult =  1;
   let resultName = results[5];
   let contentString = 
   `<div class="info-container">
   <h1 class="mini-heading">Result #: ` + numberResult + " " +
   resultName + `</h1>
   <div id="bodyContent">
   </div>
   </div>`

   // The addLisenter function is an event handler that opens up the infowindow when the marker is clicked on the amp
   marker.addListener('click', function() {
      infowindow.setContent(contentString);
      infowindow.open(map, marker);
   });

map.fitBounds(bounds);
}
