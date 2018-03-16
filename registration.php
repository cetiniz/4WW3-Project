 <!DOCTYPE html>
 <html>
 <head>
 	<title>Account Registration Page</title>
 	<script src="/js/form_validation.js" type="text/javascript"></script>
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
 		<header>
 			<div class="logo">
 				<div class="left">
 					<img src="/assets/logo.svg" style="height:30px" alt="Logo of website is a beaker"/>
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
 		<!-- I reused the same classes and elements from the submission page for the registration page. However, in the registration page I used a variety of different inputs. The text input still just accepts user text however the email input shows a email specific box with a variety of checking options. The date field shows a nice date selector pop down when it is chosen. I also included the checkbox in the form of the annoying checkbox that is usually included at the end of all "registration" type of pages. -->
 		<main class="bg-grey">
 			<div class="input-form">
 				<h1>Create Account!</h1>
 				<!-- We set onsubmit to the function we create in the form_validation; event is implicitly passed as the event object for future use-->
 				<!-- Error paragraphs were added to all forms (which are hidden at first). We pass "this" as an argument when we call a function when we want to use the tag as a parameter. We pass "event" (or some other keyword) when we want to pass the event being handled to the function (ie. an onclick event) -->
 				<form name="user-form" onsubmit="formValidator(event)" novalidate>
 					<fieldset name="full-name">
 						<input type="text" placeholder="Full Name" onfocus="removeRed(this)">
 					</fieldset>
 					<p id="name-error">Name must be First and Last separated by a space!</p>
 					<fieldset>
 						<input type="email" placeholder="Email Address" onfocus="removeRed(this)"/>
 					</fieldset>
 					<p id="email-error">Must be a valid email!</p>
 					<fieldset>
 						<input type="date" name="Birthday" onfocus="removeRed(this)"/>
 					</fieldset>
 					<p id="date-error">Must enter a birthdate!</p>
 					<fieldset>
 						<input type="text" placeholder="Username" onfocus="removeRed(this)">
 					</fieldset>
 					<p id="username-error">Username must be 5 characters or greater!: </p>
 					<fieldset>
 						<input type="text" placeholder="Password" onfocus="removeRed(this)">
 					</fieldset>
 					<fieldset>
 						<input type="text" placeholder="Re type Password" onfocus="removeRed(this)">
 					</fieldset>
 					<p id="password-error">Passwords must match and be greater than 1 letter!</p>
 					<fieldset class="spam-email">
 						<p>I'd like to recieve a stream of annoying emails</p>
 						<input type="checkbox">
 					</fieldset>
 					<fieldset class="field-button">
 						<input type="submit" value="Submit">
 					</fieldset>
 				</form>
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