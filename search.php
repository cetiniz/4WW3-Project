<?php
	session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Search Page</title>
 	<!-- The link below is used to import the main and only external style sheet -->
 	<link href="/css/MyStyleSheet.css" type="text/css" rel="stylesheet"/>
 	<!-- The link below is used to import google fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/> 
 	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet"/> 
 	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"/> 
 	<meta charset="UTF-8"> 
 	<!-- The link below is used to show my icon in the tab window -->
 	<link rel="icon" sizes="192x192" href="/assets/logo.svg">
 	<!-- The link below is used to allow web app to be responsive to different applications depending on their screen size -->
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<!-- Site is wrapped in a unique divider to provide the centered approach to responsive design -->
 	<div id="wrapper">
 		<!-- Header element also contains the navigation menu -->
 		<?php
 		include 'header.php';
 		?>
 		<!-- Main area contains all the pages content between the header and footer -->
 		<main>
 			<!-- Div element used to create area where search bar will be placed -->
 			<div class="search-area">
 				<div class="search-query">
 					<div>
 						<h1>Search for your favourite lab equipment!</h1>
 					</div>
 					<!-- The form element contains a text box for user input, a star select (to select and/or filter by rating) and contains a submit form button with a pseudo search icon that acts as a good signifier to let the user know that it is supposed to be a query -->
 					<form action="results/" method="post" id="search-form">
 						<fieldset class="search-bar">
 							<input type="search" placeholder="ie. MassSpectrometer" name="query">
 						</fieldset>
 						<fieldset class="location-button">
 							<input id="current-loc" type="button" onclick="getLocation()" value="Search by 
Current Location" style="font-size:12px">
							<input type="hidden" name="lng" value="" id='lng'>
							<input type="hidden" name="lat" value="" id='lat'>
						<script>
							var lng = document.getElementById('lng');
							var lat = document.getElementById('lat');
							// This is the bare essentials needed for getting a users location through the Geolocation API. This will be used later with dynamic PHP forms
							function getLocation() {
								if (navigator.geolocation) {
									navigator.geolocation.getCurrentPosition(addToQuery);
								}
							}
							function addToQuery(position) {
								lat.value = position.coords.latitude;
								lng.value = position.coords.longitude;
							}
						</script>
 						</fieldset>
 						<fieldset class="star-search">
 							<!-- Select provides a drop down menu where users can select several objects available to them (in this case different star values will appear) -->
 							<select name="stars" form="search-form">
 								<option value="0">Select Rating</option>
 								<option value="1">☆</option>
 								<option value="2">☆☆</option>
 								<option value="3">☆☆☆</option>
 								<option value="4">☆☆☆☆</option>
 								<option value="5">☆☆☆☆☆</option>
 							</select> 
 						</fieldset>
 						<!-- The submit type allows users to submit the form to the server for processing which will be useful later when we code with PHP -->
 						<fieldset class="search-icon">
 							<input type="submit" class="search-button" value="⌕">
 						</fieldset>
 					</form>
 				</div>
 			</div>
 		</main>
 		<!-- The footer grid contains copyright information as well as author information that will be updated as the course goes along. It is organized using an unordered list -->
 		<?php
 		include 'footer.php';
 		?>
 	</div>
 </body>
 </html> 
