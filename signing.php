<?php 
	include_once 'header.php';	
 ?>
 
<?php
	
	if(isset($_POST['submit'])){
		include_once 'DB.php';



		$first = mysqli_real_escape_string($conn, $_POST['first']);
		$last = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);
		$ins = mysqli_real_escape_string($conn, $_POST['ins']);
		$loc = mysqli_real_escape_string($conn, $_POST['loc']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);


		if(empty($first) || empty($last) || empty($email) || empty($u_name) || empty($pass) || empty($ins) ||  empty($loc) || empty($age)){
			header("Location: signup.php?signup=empty");
			exit();
		} else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: signup.php?signup=email");
				exit();	
			} else {
				$sql ="SELECT * FROM users WHERE u_name ='$u_name'";
				$result = mysqli_query($conn , $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck >0){
					header("Location: signup.php?signup=usertaken");
					exit();
				} else {
					$hashedpass = password_hash($pass, PASSWORD_DEFAULT);
					$sql = "INSERT INTO users (f_name , l_name, email, u_name, pass, ins, loc, age) VALUES('$first' , '$last', '$email', '$u_name', '$hashedpass', '$ins', '$loc', '$age');";
					mysqli_query($conn, $sql);
					$sql = "CREATE TABLE "
					header("Location: signup.php?signup=success");
					exit();
				}
			}
		}

	}else{
		header("Location: signup.php");
		exit;
	}

  ?>