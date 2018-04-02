<!-- *************************************************************ACCESS DOC FROM MYSQL************************************************************* -->
<?php 
	session_start();
	$pdo = new PDO('mysql:host=localhost; dbname=World_Data','cetiniz','$uperC00l');
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$query = $_POST["equipment_name"];
	// STATEMENT TO GET OBJECT INFORMATION 
	$get_result = $pdo->prepare("SELECT equipment_long, equipment_lat, equipment_id, equipment_owner, equipment_location, equipment_name, equipment_department FROM object_equipment WHERE equipment_name=?");
	$get_result->execute([$query]);
	$object_data = $get_result->fetch();

	// STATEMENT WHERE WE GET ALL REVIEWS SHOULD GO HERE!
	$review_query = $pdo->prepare("SELECT review_text, review_rating, review_availability, person_id FROM object_review INNER JOIN object_equipment ON object_equipment.equipment_id=object_review.equipment_id AND object_equipment.equipment_name=?");
	$review_query->execute([$query]);
	$total_reviews = $review_query->fetchAll();
	// STATEMENT TO GET PERSON INFO
	$person_query = $pdo->prepare("SELECT person_name FROM object_person INNER JOIN object_review ON object_review.person_id=? AND object_review.person_id=object_person.person_id");
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Single Result Page</title>
 	<!-- The link below is used to import the main and only external style sheet -->
 	<link href="/css/MyStyleSheet.css" type="text/css" rel="stylesheet"/>
 	<!-- The link below is used to import google fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/> 
 	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet"/> 
 	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"/> 
 	<meta charset="UTF-8">
 	<!-- FACEBOOK OPEN GRAPH META DATA FOR PROPER DISPLAY DOWN BELOW -->
 	<meta property="og:title" content="Mass Spectrometer"/>
 	<meta property="og:type" content="Analytical Machine"/>
 	<meta property="og:url" content="submission_object.html"/>
 	<meta property="og:image" content="mass_spec.jpg"/>
 	<meta property="og:site_name" content="Equip Me"/>
 	<meta property="og:description" content="Reviews for the mass spectrometer owned by Dr. Tohid Didar"/>
 	<!-- TWITTER CARD META DATA FOR PROPER DISPLAY DOWN BELOW -->
 	<meta name="twitter:card" content="Review"/>
 	<meta name="twitter:site" content="@equipme"/>
 	<meta name="twitter:creator" content="@zacharycetinic"/>
 	<meta property="og:url" content="www.equipme.ca"/>
 	<meta property="og:title" content="Mass Spectrophotometer Reviews"/>
 	<meta property="og:description" content="Reviews for the mass spectrometer owned by Dr. Tohid Didar."/>
 	<!-- DISPLAY FOR SAVED APP IN IOS DEVICE -->
 	<link rel="apple-touch-icon-precomposed" href="/assets/logo.svg"/>
 	<meta name="apple-mobile-web-app-capable" content="yes"/> <!-- Removes the tool bars and menus -->
 	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> <!-- Sets the top bar as transparent -->
 	<meta name="viewport" content = "width = device-width, user-scalable = no" /> <!-- Sets dimensions for app and disables zooming in -->
 	<!-- DISPLAY FOR SAVED APP IN ANDROID DEVICE -->
 	<meta name="mobile-web-app-capable" content="yes"> <!-- tag so chrome recognizes content -->
 	<meta name="viewport" content="width=device-width">
 	<link rel="icon" sizes="192x192" href="/assets/logo.svg">
 </head>
 <body>
 	<!-- Wrapper and header information explained in "search.html" -->
 	<div id="wrapper">
 		<?php
 		include 'header.php';
 		?>
 		<main>
 			<!-- itemscope/itemtype is part of the microdata specifications: in this case I am indicating that the data being presented is a product (I wasn't too sure what other category it would fall under) -->
 			<div itemscope itemtype="http://schema.org/Product">
 				<div class="map-space">
 					<div class="equipment-container">
 						<!-- The following three lines are used to display a go back anchor tag that looks like a button -->
 						<div class="search-bar">
 							<a class="go-back" href="../"> ← Take me back!</a>
 						</div>
 						<!-- The following lines of code explain the particular object the user has clicked on from the previous query they did. It is a mass spectrophotometer. More microdata tags are provided such as
 							the name tag, image, and rating -->
 						<div class="equipment-detail">
 							<h2>Equipment Detail</h2>
 							<div class="object-detail">	
 								<?php
 								echo '<p itemprop="name"> <b>Title:</b> ' . $object_data['equipment_name'] . '</p>';
 								echo '<p> <b>Owner:</b> ' . $object_data['equipment_owner'] . '</p>';
 								echo '<p> <b>Location:</b> ' . $object_data['equipment_location'] . '</p>';
 								echo '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';
 								echo '<p> <b>Average Rating:</b> <span itemprop="ratingValue"> 3/5 </span> </p>';
 								echo '<p> <b>Keywords:</b> \'Science\', \'Detector\'</p>';
 								echo '</div>';
 								?>
 							</div>
 							<img itemprop="image" src="/assets/mass_spec.jpg" alt="image of professor with mass spectrometer" style="height:150px;width:150px;margin: 0px 70px;"/>
 						</div>
 						<!-- There is a divider here to create a section for what will be the google maps dynamic map but in this case is just a static image of a map -->
 						<div class="map">
 							<!-- More microdata is located here: here the itemprop is a geolocation and the latitude and longitude are indicated. For this particular instance, I gave a random latitude and longitude but these will be filled out dynamically when we start coding PHP -->
 							<div itemscope itemtype="http://schema.org/Place">
 								<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
 									<h2>Google Map Result</h2>
 									<div id="map-object-result"></div>
 									<!-- Here we import both the custom Javascript file as well as the framework for the google maps API -->
 									<script src="/js/mapobjectinfo.js"></script>
    								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2ZfxbdXbmCk2jFQ-goVc9ZUEJIumYsVo&callback=initMap"
    								async defer></script>
 									<meta itemprop="latitude" content="74.32" />
 									<meta itemprop="longitude" content="25.98"/>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<!-- This divider is the main container for all of the reviews to come. I wrapped them all in a divider since in the future, the content will be dynamic and therefore will need to be organized into some sort of ordering and styling -->
 				<div class="reviews-container">
 					<!-- More microdata is located here: this microdata is in the form of a review. I gave it data such as the author, rating, and description in the lines 107 ~ 127 -->
 					<?php 
 					foreach($total_reviews as $value){
 						$person_query->execute([$value['person_id']]);
 						$person_info = $person_query->fetch();
 						$review_txt = addslashes($value['review_text']);
 						echo '<div itemprop="review" itemscope itemtype="http://schema.org/Review">';
 						echo '<div class="review">';
 						echo '<div class="left-content">';
 						echo '<h2> Profile </h2>';
 						echo '<div class="user">';
 						echo '<img src="/assets/face.jpg" alt="Displays face of individual that gave a review" style="height:60px;width:60px">';
 						echo '<h1>👍 👎</h1>';
 						echo '<p>Helpful?</p>';
 						echo '<p>+13</p>';
 						echo '</div>';
 						echo '<div class="user-info">';
 						echo '<p> <b>Reviewer:</b>  <span itemprop="author">' . $person_info['person_name'] . '</span> </p>';
 						echo '<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">';
 						echo '<p> <b>Rating:</b> <span itemprop="ratingValue">' . $value['review_rating'] . '/5</span> </p>';
 						echo '</div>';
 						echo '<p> <b>Availability:</b>' . $value['review_availability'] . '</p>';
 						echo '</div>';
 						echo '</div>';
 						echo '<div class="right-content">';
 						echo '<h2> Review </h2>';
 						echo '<p> <span itemprop="description">' . $review_txt . '</span> </p>';
 						echo '</div>';
 						echo '</div>';
 						echo '</div>';
 					}
 					?>
 					<!-- The second review can be found here with a different face rating and values -->
 				</div>
 					<div class="add-review" style="
    margin: 10px 20px;
    border: 1px solid gainsboro;
    box-shadow: gainsboro 2px 2px 2px;
">
 						<h1 style="
    color: black;
    margin-left: 25px;
"> Add a Review! </h1>
						<div style="
    /* display:  grid; */
    margin: 10px 20px;
">
						<form style="
    display: grid;
    grid-template-columns: 3fr 1fr;
">
							<div style="grid-column-start:  1;">
							<input type="text" style="
    width: 700px;
    height: 400px;
    border: 1px solid gainsboro;
">
</div>
<div style="
    grid-column-start:  2;
    display:  flex;
    flex-direction: column;
">
							<select name="rating" style="
    height: 50px;
    background: white;
    padding: 5px;
    border:  1px solid gainsboro;
">
								<option value="Add rating">Add rating</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<select name="availability" style="
    height: 50px;
    background: white;
    border:  1px solid gainsboro;
    padding: 5px;
">
								<option value="Rate Availability">Rate Availability</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<input type="submit" style="
    /* width: 50px; */
    height: 40px;
">
</div>
						</form>
					</div>
					</div>
 			</div>
 		</main>
 		<!-- Refer to "search.html" for more information regarding the footer -->
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
