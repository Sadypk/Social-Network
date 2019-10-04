<?php 
	include_once 'header.php';	
 ?>

 <?php
	session_start();
 ?>


<section class= "main-container">
	<div class= "main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="signing.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="Email">
			<input type="text" name="u_name" placeholder="Username">
			<input type="text" name="pass" placeholder="Password">
			<input type="text" name="ins" placeholder="School/College">
			<input type="text" name="loc" placeholder="Location">
			<input type="text" name="age" placeholder="Age">
			<button type="submit" name="submit">Sign up</button>

			
		</form>
	</div>
	
</section>


<?php
	include_once 'footer.php';
  ?>