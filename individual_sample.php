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
 		<header>
 			<div class="logo">
 				<div class="left">
 					<img src="/assets/logo.svg" alt="sites logo: shows a cartoon beaker" style="height:30px"/>
 				</div>
 				<div class="right">
 					<h1>Equip Me</h1>
 				</div>
 			</div>
 			<nav class="menu-nav">
 				<button class="menu-bttn">Menu</button>
 				<ul>
 					<li>
 						<a href="/">Home</a>
 					</li>
 					<li>
 						<a href="/registration/">Sign Up</a>
 					</li>
 					<li>
 						<a href="/">Login</a>
 					</li>
 					<li>
 						<a href="/submission/">Submit</a>
 					</li>
 				</ul>
 			</nav>
 		</header>
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
 								<p itemprop="name"> <b>Title:</b> Mass Spectrophotometer</p>
 								<p> <b>Owner:</b> Dr. Tohid Didar </p>
 								<p> <b>Location:</b> 221 BSB 1280 Main Street West Hamilton </p>
 								<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
 									<p> <b>Average Rating:</b> <span itemprop="ratingValue"> 👍👍👍 </span> </p>
 									<p> <b>Keywords:</b> 'mass-determination', 'analyte-detector'</p>
 								</div>
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
 					<div itemprop="review" itemscope itemtype="http://schema.org/Review">
 						<div class="review">
 							<div class="left-content">
 								<h2> Profile </h2>
 								<div class="user">
 									<img src="/assets/face.jpg" alt="Displays face of individual that gave a review" style="height:60px;width:60px">
 									<h1>👍 👎</h1>
 									<p>Helpful?</p>
 									<p>+13</p>
 								</div>
 								<div class="user-info">
 									<p> <b>Reviewer:</b>  <span itemprop="author"> Zach </span> </p>
 									<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
 										<p> <b>Rating:</b> <span itemprop="ratingValue"> 👍👍👍👍 </span> </p>
 									</div>
 									<p> <b>Availability:</b> Low </p>
 								</div>
 							</div>
 							<div class="right-content">
 								<h2> Review </h2>
 								<p> <span itemprop="description">The mass specrophotometer is a legendary machine that helps users learn more about their compound and uncover the secrets within. I will always run a mass spec prior to any other test, regardless of the cost! This machine was simply amazing. It can run mutiple samples and I even broke it a few times but the technician came to repair it. I couldn't even believe it: the service was of the utmost quality. The spectra that I got from the machine was clean, easy to read and very pretty. I ended up just purifing a bunch of methane but thats ok I have so much funding it doesn't really matter. I wonder if thats why all my friends think I'm so smelly... I hope not..</span>  </p>
 							</div>
 						</div>
 					</div>
 					<!-- The second review can be found here with a different face rating and values -->
 					<div class="review">
 						<div class="left-content">
 							<h2> Profile </h2>
 							<div class="user">
 								<img src="/assets/face2.jpg" alt="Displays face of individual that gave a review" style="height:60px;width:60px">
 								<h1>👍 👎</h1>
 								<p>Helpful?</p>
 								<p>-5</p>
 							</div>
 							<div class="user-info">
 								<p> <b>Reviewer:</b> Marta </p>
 								<p> <b>Rating:</b>👍👍</p>
 								<p> <b>Availability:</b> Low </p>
 							</div>
 						</div>
 						<div class="right-content">
 							<h2> Review </h2>
 							<p> This has got to be the worst machine I have ever used in my whole life. It was super sticky, produced the most unreadable spectra I have ever seen in my life. Dr. Harrison once told me that when life gives you lemons run them through a mass spectra. Well I did and I ended up paying just over a thousand dollars to fix the machine! What a rip-off. Apperently it had been broken a few times before from a previous user so now I had to fork up the pretty penny to fix it. Well after it fixed at least I got a decent spectra. I'm still very upset that I had to pay such an egregious fee to fix the machine even though it wasn't me who broke it in the first place.  </p>
 						</div>
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