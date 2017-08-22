<?php
include 'connection.inc.php';
include 'navbar.html';
include 'login.html';
session_start();
if(isset($_POST['username'])&&isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($username)&&!empty($password)){
		$query = "select id FROM users WHERE username='$username' AND password='$password'";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
		if($rows==0)
		{

			?><center><?php echo "invalid username/password";?><center><?php 
		}else{
           session_start();
			$_SESSION['name']=$username;
		 header("Location:Dashboard.php");

	}
	}else{echo "<center><b>invalid username/password</b></center>";}
}else{}
?>