 <?php
 $posted = False;
 $list_of_errors = array();
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 	$posted = True;
 	if (!empty($_POST)){
 		if (isset($_POST["full_name"])){
 			if (!preg_match('/^\w+\s\w+$/', $_POST["full_name"])) {
 				$error_message = "The name was not valid!";
 				array_push($list_of_errors, $error_message);
 			}
 		}
 		if (isset($_POST["email"])){
 			if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST["email"])) {
 				$error_message = "The email was not valid!";
 				array_push($list_of_errors, $error_message);

 			}
 		}
 		if (isset($_POST["password"]) && isset($_POST["re_password"])){
 			if ($_POST["password"] !== $_POST["re_password"] || empty($_POST["password"]) || empty($_POST["re_password"])) {
 				$error_message = "The passwords did not match or were blank!";
 				array_push($list_of_errors, $error_message);
 			}
 		}
 		// ****************CHECK IF USERNAME ALREADY EXISTS****************////////////////
 		if (isset($_POST["username"])) {
 			$username_check = $pdo->prepare("SELECT person_username FROM object_person WHERE object_person.person_username=?");
 			$username_check->execute([$_POST["username"]]);
 			$usernames = $username_check->fetch();
 			if (!empty($usernames)) {
 				$error_message = "The username already exists!";
 				array_push($list_of_errors, $error_message);
 			}
 		}
 		else {
 			$error_message = "A username must be entered!";
 			array_push($list_of_errors, $error_message);
 		}
 	}
 	else {
 		$error_message = "The form was not filled out at all!";
 		array_push($list_of_errors, $error_message);
 	}
 	if(empty($list_of_errors)) {
 		$salt = bin2hex(random_bytes(20));
 		$password = hash('sha256', CONCAT($_POST['password'],$salt));
 		$pdo = new PDO('mysql:host=localhost; dbname=World_Data','cetiniz','$uperC00l');
		$post_registration = $pdo->prepare("INSERT INTO object_person (person_name,person_email,person_birthdate,person_username, person_password) 
			VALUES(5,?,?,?,?,?)");
		$post_registration->execute([$_POST['full_name'],$_POST['email'],$_POST['date'],$_POST['username'],$_POST['full_name'],$password]);
 	}
 }
 ?>
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
 				<?php
 				if ($posted){
 					if (!empty($list_of_errors)){
 						echo '<h1 style="color:red; font-size: 18px">Errors Were Detected on Submission Errors displayed below:</h1>';
 						foreach($list_of_errors as $value){
 							echo '<p style="display:block; font-size: 14px">' . $value . "</p>";
 						}
 					}
 					else {
 						echo '<h1 style="color:green; margin_bottom: 10px">Data was Submitted Correctly!</h1>';
 					}
 				}
 				?>
 				<h1>Create Account!</h1>
 				<!-- We set onsubmit to the function we create in the form_validation; event is implicitly passed as the event object for future use-->
 				<!-- Error paragraphs were added to all forms (which are hidden at first). We pass "this" as an argument when we call a function when we want to use the tag as a parameter. We pass "event" (or some other keyword) when we want to pass the event being handled to the function (ie. an onclick event) -->
 				<?php
 					$name = $email = $date = $password = $re_password = $username = '';
 					if ($posted) {

 						$name = $_POST["full_name"];
 						$email = $_POST["email"];
 						$date = $_POST["date"];
 						$username = $_POST["username"];
 						$password = $_POST["password"];
 						$re_password = $_POST["re_password"];
 					}
 					echo '<form name="user-form" onsubmit="formValidator(event)" novalidate action="/registration" method="post">';
 					echo '<fieldset name="full-name">';
 					echo '<input name="full_name" type="text" placeholder="Full Name" onfocus="removeRed(this)" value="' . $name . '">';
 					echo '</fieldset>';
 					echo '<p id="name-error">Name must be First and Last separated by a space!</p>';
 					echo '<fieldset>';
 					echo '<input name="email" type="email" placeholder="Email Address" onfocus="removeRed(this)" value="' . $email . '"/>';
 					echo '</fieldset>';
 					echo '<p id="email-error">Must be a valid email!</p>';
 					echo '<fieldset>';
 					echo '<input name="date" type="date" name="Birthday" onfocus="removeRed(this)" value="' . $date . '"/>';
 					echo '</fieldset>';
 					echo '<p id="date-error">Must enter a birthdate!</p>';
 					echo '<fieldset>';
 					echo '<input name="username" type="text" placeholder="Username" onfocus="removeRed(this)" value="' . $username . '">';
 					echo '</fieldset>';
 					echo '<p id="username-error">Username must be 5 characters or greater!: </p>';
 					echo '<fieldset>';
 					echo '<input name="password" type="text" placeholder="Password" onfocus="removeRed(this)" value="' . $password . '">';
 					echo '</fieldset>';
 					echo '<fieldset>';
 					echo '<input name="re_password" type="text" placeholder="Re type Password" onfocus="removeRed(this)" value="' . $re_password . '">';
 					echo '</fieldset>';
 					echo '<p id="password-error">Passwords must match and be greater than 1 letter!</p>';
 					echo '<fieldset class="spam-email">';
 					echo '<p>I\'d like to recieve a stream of annoying emails</p>';
 					echo '<input type="checkbox">';
 					echo '</fieldset>';
 					echo '<fieldset class="field-button">';
 					echo '<input type="submit" value="Submit">';
 					echo '</fieldset>';
 					echo '</form>';
 				?>
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
