<!DOCTYPE html>
<html>
<head>
	<title>
		Welcome
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class= "main-wrapper">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
				<div class= "nav-login">
					<?php
						if(isset($_SESSION['u_id'])){
							echo '<form action="logout.php" method="POST">
					  	<button type="submit" name="submit">Logout</button>
					  </form>';	
						}else {
							echo '<form action="logging.php" method="POST">
						<input type="text" name="uid"  placeholder="Username">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php">Sign up</a>';		
						}
					  ?>
					  
					
				</div>
			</div>
		</nav>
	</header>