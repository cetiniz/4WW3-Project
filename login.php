<?php
	session_start();
	$failed = False;
	if (!empty($_POST)){
		if (isset($_POST['log_out'])){
			$_SESSION['logged_in'] = False;
			$_SESSION['username'] = "";
			$_SESSION['id'] = "";	
		}
		else {
		$failed = True;
		if (!empty($_POST['username']) && !empty($_POST['password'])){
			$pdo = new PDO('mysql:host=localhost; dbname=World_Data','cetiniz','$uperC00l');
			$confirm_pass = $pdo->prepare("SELECT person_id, person_username, person_password, person_salt FROM object_person WHERE object_person.person_username=?");
			$confirm_pass->execute([$_POST['username']]);
			$password_data = $confirm_pass->fetch();
			// Find encrypted pass
			//echo $password_data['person_salt'];
			$encrypted_post = hash('sha256', $_POST["password"] . $password_data['person_salt']);
			//echo $password_data['person_password'];
			if ($encrypted_post == $password_data['person_password']) {
				$_SESSION['logged_in'] = True;
				$_SESSION['username'] = $_POST["username"];
				$_SESSION['id'] = $_POST["person_id"];
				$failed = False;
			}
		}
		}
	}
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
 		include 'header.php';
 		?>
 		<!-- I reused the same classes and elements from the submission page for the registration page. However, in the registration page I used a variety of different inputs. The text input still just accepts user text however the email input shows a email specific box with a variety of checking options. The date field shows a nice date selector pop down when it is chosen. I also included the checkbox in the form of the annoying checkbox that is usually included at the end of all "registration" type of pages. -->
 			<?php
 			if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == False) {
 				echo '<main class="bg-grey">';
	 			echo '<div class="input-form">';
	 			if ($failed) {
	 				echo '<h1 style="color:red;">Wrong Credentials!</h1>';
	 			}
	 			echo '<h1>Log in to your account!</h1>';
	 			// We set onsubmit to the function we create in the form_validation; event is implicitly passed as the event object for future use-->
	 			// Error paragraphs were added to all forms (which are hidden at first). We pass "this" as an argument when we call a function when we want to use the tag as a parameter. We pass "event" (or some other keyword) when we want to pass the event being handled to the function (ie. an onclick event) 
	 			echo '<form name="user-form" action="/login/" method="post">';
	 			echo '<fieldset name="username">';
	 			echo '<input type="text" placeholder="Username" name="username">';
	 			echo '</fieldset>';
	 			echo '<p id="name-error">Name must be First and Last separated by a space!</p>';
	 			echo '<fieldset>';
	 			echo '<input name="password" type="Password" placeholder="Password Goes Here..."/>';
	 			echo '</fieldset>';
	 			echo '<fieldset class="field-button">';
	 			echo '<input type="submit" value="Login">';
	 			echo '</fieldset>';
	 			echo '</form>';
	 			echo '</div>';
				echo '</main>';
 			}
 			else {
				echo '<main style="min-height: 700px;
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    grid-template-rows: 1fr 1fr 1fr;">';
				echo '<div style="    grid-column: 2;
    grid-row: 2;
    display: flex;
    flex-flow: column;
    outline: 1px solid gainsboro;
    box-shadow: 3px 3px 3px gainsboro;
    ">';
 				echo '<h1 style="grid-column: 2;
    color: black;
    grid-row: 2;
    text-align: center;
    ">You are logged in!</h1>';
				echo ' <form style="    margin: 0 auto;" action="/login/" method="post" > ';
				echo ' <input type="hidden" value="log_out" name="log_out">';
				echo ' <input style="height: 70px;
    width: 250px;" type="submit" value="Log Out!">';
				echo ' </form>';
				echo '</div>';
				echo ' </main>';
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
