<header>
	<div class="logo">
		<div class="left">
			<img src="/assets/logo.svg" alt="sites logo: shows a cartoon beaker" style="height:30px"/>
		</div>
		<div class="right">
			<h1>Equip Me</h1>
		</div>
	</div>
	<!-- Navigation menu was created using an encompassing nav element and an unordered list -->
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
				<?php
					if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
						echo '<a href="/login">' . 'Logged in as: ' . $_SESSION['username'] . '</a>';
					}
					else {
						echo '<a href="/login">Login</a>';
					}
				?>
			</li>
			<li>
				<a href="/submission">Submit</a>
			</li>
		</ul>
	</nav>
</header>