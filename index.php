<?php
	session_start();
	include_once 'DB.php';
 ?>

<?php 
	include_once 'header.php';	
 ?>

	<section class = "main-container">
		<div class= "main-wrapper">
			<h2>Home</h2>



			<?php
				if(isset($_SESSION['u_id'])){
					echo "Welcome " ;
					echo $_SESSION['u_n']; 
					echo '<br><br><br>';

					echo "People you may know:";
					echo '<br>';					

					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					$l_id = $_SESSION['u_id'];
				 	$l_age = $_SESSION['u_a'];
				 	$l_loc = $_SESSION['u_loc'];
				 	$l_ins = $_SESSION['u_i'];

				 	function pass($f_f){
							
							echo '<a href="index.php?pid=".$f_f><Friend></a>';
						}

					for($i=1; $i<=$resultCheck; $i++){
						if($l_id != $i){
							$cred= 0;
    					$sql ="SELECT * FROM users WHERE u_id ='$i'";
						$result = mysqli_query($conn , $sql);
						$row = mysqli_fetch_assoc($result);
						$c_age = $row['age'];
						$c_loc = $row['loc'];
						$c_ins = $row['ins'];
						$c_f = $row['f_name'];
						$c_l = $row['l_name'];

						if($c_age == $l_age){
							$cred++;
						}
						if($c_loc == $l_loc){
							$cred++;
						}
						if($c_ins == $l_ins){
							$cred++;
						}

						

						if($cred >=2){
							 echo "<a href= profile.php?pn=",$c_f,"> $c_f</a>";
							 
							 echo '<br>';

						}
						}

					}
					
				}


				echo '<br><br><br><br>';

				if(isset($_SESSION['u_id'])){
					echo "Friends:".'<br>';
					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);



					$l= $_SESSION['u_id'];
					$sql ="SELECT * FROM friends WHERE user1 ='$l'";
					$result = mysqli_query($conn , $sql);

					while($row = mysqli_fetch_assoc($result)){
							$b = $row['user2'];
							$gg ="SELECT * FROM users WHERE u_id ='$b'";
							$re = mysqli_query($conn , $gg);
							$ro = mysqli_fetch_assoc($re);
							$n = $ro['f_name'];
							echo "<a href= profile.php?pn=",$n,"> $n</a>";
							echo '<br>';
						}
					

				}
			  ?>
		</div>
	</section>
	

<?php
	include_once 'footer.php';
  ?>