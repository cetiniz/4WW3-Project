 <?php
	session_start();
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Account Registration Page</title>
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
 		include '/header.php';
 		?>
 		<!-- I reused the same classes and elements from the submission page for the registration page. However, in the registration page I used a variety of different inputs. The text input still just accepts user text however the email input shows a email specific box with a variety of checking options. The date field shows a nice date selector pop down when it is chosen. I also included the checkbox in the form of the annoying checkbox that is usually included at the end of all "registration" type of pages. -->
 		<main class="bg-grey">
 			<?php
 			if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == False) {
	 			echo '<div class="input-form">';
	 			echo '<h1>Log in to your account!</h1>';
	 			// We set onsubmit to the function we create in the form_validation; event is implicitly passed as the event object for future use-->
	 			// Error paragraphs were added to all forms (which are hidden at first). We pass "this" as an argument when we call a function when we want to use the tag as a parameter. We pass "event" (or some other keyword) when we want to pass the event being handled to the function (ie. an onclick event) 
	 			echo '<form name="user-form" onsubmit="formValidator(event)" novalidate action="/">';
	 			echo '<fieldset name="Username">';
	 			echo '<input type="text" placeholder="Username" onfocus="removeRed(this)">';
	 			echo '</fieldset>';
	 			echo '<p id="name-error">Name must be First and Last separated by a space!</p>';
	 			echo '<fieldset>';
	 			echo '<input type="Password" placeholder="Password Goes Here..." onfocus="removeRed(this)"/>';
	 			echo '</fieldset>';
	 			echo '<fieldset class="field-button">';
	 			echo '<input type="submit" value="Login">';
	 			echo '</fieldset>';
	 			echo '</form>';
	 			echo '</div>';
 			}
 			else {
 				echo '<h1>You are logged in!</h1>';
 			}
 			?>
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