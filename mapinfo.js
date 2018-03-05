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
let markers = [];
markers.push(new google.maps.Marker({
   position: {lat: 43.26118425368222, lng: -79.92022854617159},
   map: map
}));
markers.push(new google.maps.Marker({
   position: {lat: 43.26118230039779, lng: -79.91990892740608},
   map: map
}));
// Create info window to show the markers info; this will also be useful later on with the dynamic part.
let infowindow = new google.maps.InfoWindow();
for(let marker of markers) {
   // The content string is what is displayed when the marker is clicked.
   let contentString = 
   `<div class="info-container">
   <h1 class="mini-heading">Result #: 1 
   Mass Spectrophotometer</h1>
   <div id="bodyContent">
   <p>Sample Review:
   : Terrible machine don't even think of wasting your money here. 
   I can't believe how much they are charging for renting this piece 
   of equipment. I could feed myself subway for a whole week, on 
   the expensive sub menu as well, for the price they tried to get me 
   to pay. After finally haggling them down...</p>
   <div class="redirect-button">
      <a href="sample/">See all Reviews!</a> 
   </div>
   </div>
   </div>`
   infowindow.setContent(contentString);
   // The addLisenter function is an event handler that opens up the infowindow when the marker is clicked on the amp
   marker.addListener('click', function() {
      infowindow.open(map, marker);
   });
}
}