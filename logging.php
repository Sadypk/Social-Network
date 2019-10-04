<?php
	session_start();
	if(isset($_POST['submit'])){

		include_once 'DB.php';

		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


		if(empty($uid) || empty($pwd)){
			header("Location: index.php?login=empty");
			exit();
		} else{
			$sql = "SELECT * FROM users WHERE u_name= '$uid'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				header("Location: index.php?login=noUser");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					$hashedPwdCheck = password_verify($pwd , $row['pass']);
					if ($hashedPwdCheck == false) {
						header("Location: index.php?login=PWerror");
						exit();
					} elseif ($hashedPwdCheck == true) {
						$_SESSION['u_id'] = $row['u_id'];
						$_SESSION['u_f'] = $row['f_name'];
						$_SESSION['u_l'] = $row['l_name'];
						$_SESSION['u_e'] = $row['email'];
						$_SESSION['u_n'] = $row['u_name'];
						$_SESSION['u_p'] = $row['pass'];
						$_SESSION['u_i'] = $row['ins'];
						$_SESSION['u_loc'] = $row['loc'];
						$_SESSION['u_a'] = $row['age'];
						$id = $_SESSION['u_id'];


						
						header("Location: index.php?login=success");
						exit();	

					}
				}
			}
			
		}
	}
  ?>