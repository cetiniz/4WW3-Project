<?php
	session_start();
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Object submission Page</title>
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
 	<!-- Header code explained in "search.html" -->
 	<div id="wrapper">
 		<?php
 		include 'header.php';
 		?>
 		<!-- The code below contains the user form that will be used to submit new pieces of machinery to the map, making their presence known -->
 		<main class="bg-grey">
 			<div class="right-content">
 				<div class="input-form">
 					<h1>Add New Piece of Equipment</h1>
 					<!-- The code below is a large form. Each fieldset contains a different type of input. Inputs of type text are just for the user to input text into a text box. The button input will be used to browse through their computers to upload an image of the object. The submit button submits the form to the server -->
 					<form name="submission-form" action="/submission/" method="post">
 						<!-- The required keyword is the html version of form validation and it goes through a custom HTML form validator -->
 						<fieldset>
 							<input type="text" placeholder="Equipment Name" required>
 						</fieldset>
 						<fieldset>
 							<input type="text" required placeholder="Department"/>
 						</fieldset>
 						<fieldset>
 							<input type="text" required placeholder="Owner"/>
 						</fieldset>
 						<fieldset>
 							<input type="text" required placeholder="Location Name"/>
 						</fieldset>
 						<fieldset>
 							<!-- I added my own regex pattern to the coordinates to specify the appropriate input for both coordinates using the pattern attribute -->
 							<input class="coordinate" type="text" placeholder="X Coordinate" required pattern="^-?\d{2}[.]\d+">
 							<input class="coordinate" type="text" placeholder="Y Coordinate" required pattern="^-?\d{2}[.]\d+">
 						</fieldset>
 						<!-- The script below is a small snippet used to automatically fill in the coordinates with the users current geolocation -->
 						<script type="text/javascript">
 							let form = document.forms[0];
 							let button = document.getElementById("coordinate-button");
							function getLocation() {
								if (navigator.geolocation) {
									navigator.geolocation.getCurrentPosition(fillCoordinates);
								}
								else {
									alert("Geolocation was not enabled!");
								}
							}
							function fillCoordinates(pos) {
								let coordinates = pos.coords;
								form[9].value = coordinates.latitude;
								form[10].value = coordinates.longitude;
							}
 						</script>
 						<!-- The button below automatically fills out the coordinates text boxes with the users current geolocation -->
 						<input id="coordinate-button" type="button" onclick="getLocation()" value="Get Coordinates by Current Location">
 						<fieldset>
 							<div class="object-submit">
 								<input style="width: 180px" class="upload-text" type="text" disabled placeholder="Image Name...">
 								<input class="input-file" type="file" placeholder="Uploaded Image" id="file">
 								<label for="file">Upload an Image</label>
 							</div>
 						</fieldset>
 						<fieldset>
 							<input type="Submit" value="Submit">
 						</fieldset>
 					</form>
 				</div>
 			</div>
 		</main>
 		<!-- Footer code explained in "search.html" -->
 		<footer>
 			<div class="footer-grid">
 				<ul>
 					<li>
 						<a>Legal</a>
 					</li>
 					<li>
 						<a>Disclaimer</a>
 					</li>
 					<li>
 						<a>Author</a>
 					</li>
 				</ul>
 			</div>
 		</footer>
 	</div>
 </body>
 </html> 
