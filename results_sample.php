<?php 
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
   header("Location: https://cetiniz.cs4ww3.ca/");
}
	$pdo = new PDO('mysql:host=localhost; dbname=World_Data','cetiniz','$uperC00l');
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$query = "%" . $_POST["query"] . "%";
	$get_result = $pdo->prepare("SELECT equipment_long, equipment_lat, equipment_id, equipment_owner, equipment_location, equipment_name, equipment_department FROM object_equipment WHERE equipment_name LIKE ?");
	$get_result->execute([$query]);
	$results = $get_result->fetchAll();
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Results Page</title>
 	<!-- The link below is used to import the main and only external style sheet -->
 	<script type="text/javascript"> var sql_results = '<?php echo json_encode($results); ?>'; </script>
 	<script src="/js/mapinfo.js"></script>
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
 		<main>
 			<div class="main-content">
 				<div class="top-pad">
 					<!-- I reused the code from the search page in case the user wanted to search for something else but still remain on the same results page. This is what a lot of other web app sites do so I thought I would follow suit -->
 					<div class="search-bar">
 						<a class="go-back" href="../"> ← Take me back!</a>
 						<div class="search-query">
 							<form action="/results/" method="post">
 								<fieldset class="search-bar">
 									<input name="query" type="search" placeholder="ie. MassSpectrometer">
 								</fieldset>
 								<fieldset class="star-search">
 									<select name="stars">
 										<option value="0-star">Select Rating</option>
 										<option value="1-star">☆</option>
 										<option value="2-star">☆☆</option>
 										<option value="3-star">☆☆☆</option>
 										<option value="4-star">☆☆☆☆</option>
 										<option value="5-star">☆☆☆☆☆</option>
 									</select> 
 								</fieldset>
 								<fieldset class="search-icon">
 									<input type="submit" class="search-button" value="⌕">
 								</fieldset>
 							</form>
 						</div>
 					</div>
 				</div>
 				<!-- The map result just shows a static image of a map that will be swapped out with the dynamic google maps map -->
 				<div id="map-result"></div>
 				<!-- This script is what loads the google map into the document and allows me to call the methods in the auxilary javascript file!.-->
    			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2ZfxbdXbmCk2jFQ-goVc9ZUEJIumYsVo&callback=initMap"
    			async defer></script>

 				<!-- The filter will eventually display the term that the user searched for and the number of results they got in the query -->
 				
 				<div class="filter">
 					<div class="mid-content">
 						<h1>Searched for:</h1>
 						<p class="italic"> <?php echo $_POST["query"];?> </p>
 						<p>Found 3 results for the query</p>
 					</div>
 				</div>
 				<!-- As requested, the results of the query are displayed in a tabular "table" format using the table html tag -->
 				<table class="table-style">
 					<!-- the tr tag stands for table row and the th is for table header. This first row specifies the headers that explain what content is in each different column. -->
 					<tr class="table-header">
 						<th>Result #</th>
 						<th>Result Detail</th>
 						<th class="hide">Result Sample Review</th>
 						<th>Preview</th>
 					</tr>
 					<!-- The td tags are regular table tags which contain the data that will be filled in dynamically after the server is queried. I included two different variants of CSS so the table rows are alternating colors. -->

 					<!-- *****************************************************PHP CODE GOES HERE***************************************************** -->
 					<?php 
 						$sample_review = $pdo->prepare('SELECT review_text FROM object_equipment INNER JOIN object_review ON object_equipment.equipment_id=object_review.equipment_id WHERE object_equipment.equipment_id=? LIMIT 1');

 						foreach ($results as $key=>$value) {
 							if ($key % 2 == 0) {
 								echo '<tr class="table-even">';
 							}
 							else {
 								echo '<tr class="table-odd">';
 							}
 							$real_key = $key + 1;
 							$sample_review->execute([$value['equipment_id']]);
 							$sample_first = $sample_review->fetch();
 							echo '<td class="center">' . $real_key . '</td>';
 							echo '<td class="margin-20">';
 							echo '<p><b>Equipment:</b> <br>' . $value['equipment_name'] . '</p>';
 							echo '<p><b>Department:</b> <br>' . $value['equipment_department'] . '</p>';
 							echo '<p><b>Owner:</b> <br>' . $value['equipment_owner'] . '</p>';
 							echo '</td>';
 							echo '<td class="margin-20 hide">';
 							echo '<p style="font-size: 10px">' . $sample_first[0] . '</p>';
 							echo '</td>';
 							echo '<td>';
 							echo '<img src="/assets/mass_spec.jpg" style="height:100px;width:100px" alt="image of professor with mass spectrometer"/>';
 							echo '</td>';
 							echo '</tr>';
 						}
 					?>
 					<!-- *****************************************************END OF PHP GENERATION***************************************************** -->
 				</table>
 			</div>
 		</main>
 		<!-- Footer grid explained in "search.html" -->
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
