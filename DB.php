<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', "AD");


$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

/*class DB_con
{	
	public $conn;
	
	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());
	}
	
	public function insert($id,$name,$email,$password,$type)
	{	
		$sql = "INSERT into user(id,name,email,password,type) VALUES('$id','$name','$email','$password','$type')";
		if(mysqli_query($this->conn, $sql)){
			return true;
		} else{
			return false;
		}
	}
	
	public function select()
	{	
		$sql = "SELECT count(*) FROM user WHERE id ";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
	public function selectUsingId($id)
	{	
		$sql = "SELECT count(*) FROM user WHERE user_id=".$id;
		$res = mysqli_query($this->conn, $sql);
		// $result = mysqli_fetch_array($res);
		return $res;
	}
	
	
	public function deleteUsingId($id)
	{
		$sql = "DELETE FROM users WHERE user_id=".$id;
		if(mysqli_query($this->conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
	
	public function update($id,$password,$cpassword,$name,$email,$user)
	{	
		$sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email' WHERE user_id=".$id;
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
}

?>*/