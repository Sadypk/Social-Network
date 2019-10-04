<?php
	session_start();
	include_once 'header.php';	
	include_once 'DB.php';
  ?>

<?php
	$p_n = $_GET['pn'];
	$u = $_SESSION['u_id'];
	$isfriend = 0;
	$sql ="SELECT * FROM users WHERE f_name ='$p_n'";
	$result = mysqli_query($conn , $sql);
	$row = mysqli_fetch_assoc($result);
	$p_id = $row['u_id'];
	echo $p_id;


	

	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if(isset($_POST['submit'])){
		$sql= "INSERT INTO friends(user1, user2) VALUES('$u', '$p_id')";
		mysqli_query($conn, $sql );
		$sql= "INSERT INTO friends(user1, user2) VALUES('$p_id', '$u')";
		mysqli_query($conn, $sql );


	}




	

	$sql ="SELECT * FROM users WHERE f_name = '$p_n'";
	$result = mysqli_query($conn , $sql);
	$row = mysqli_fetch_assoc($result);
	$p_age = $row['age'];
	$p_loc = $row['loc'];
	$p_ins = $row['ins'];
	$p_f = $row['f_name'];
	$p_l = $row['l_name'];
?>


<section class="main-container">
	<div class="main-wrapper">
		<h2>Profile</h2>
		<?php
			echo ("Name: ".$p_f." ".$p_l);
			echo '<br>';
			echo ("Age: ".$p_age);
			echo '<br>';
			echo ("Location: ".$p_loc);
			echo '<br>';
			echo ("Institution: ".$p_ins);
			echo '<br><br>';


			
			$sql ="SELECT * FROM friends WHERE user1 ='$u'";
			$result = mysqli_query($conn , $sql);

			while($row = mysqli_fetch_assoc($result)){
					$c = $row['user2'];
					$g ="SELECT * FROM users WHERE u_id ='$c'";
					$re = mysqli_query($conn , $g);
					$ro = mysqli_fetch_assoc($re);
					$n = $ro['f_name'];
					if($p_n == $n){
						$isfriend= 1;
					}
				}

			if($isfriend!= 1){
				echo '<form method="POST">
    			<input type="submit" name="submit" value="Add as friend" />
				</form>';
			}


			

			
		  ?>
	</div>
</section>





 <?php
 	include_once 'footer.php';
   ?>

