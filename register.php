<?php
include 'connection.inc.php';
include  'navbar.html';
include 'register.html';
$conn = mysqli_connect('localhost', 'root','root', 'curiosity1');
if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['age'])&&isset($_POST['confirm_password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$conf = $_POST['confirm_password'];
	$age = $_POST['age'];
	if (!empty($username)&&!empty($password)&&!empty($conf)&&!empty($age)) {
		if($password==$conf){
			$query1 = "SELECT * FROM users WHERE username='$username'";
			$result= mysql_query($query1);
			$rows = mysql_num_rows($result);
			if($rows==0){
            $query = "INSERT INTO users SET username='$username',password='$password',age='$age'";
            if(mysql_query($query)){
            	
            	$sql = "CREATE TABLE $username(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,Title VARCHAR(40),Content LONGTEXT,Categories VARCHAR(40),filename VARCHAR(30))";
   			if (mysqli_query($conn, $sql)) {
   				mkdir("D:/xampp/htdocs/Curiosity1/uploads/$username", 0700);
   				echo "<script>alert('You have Registered successfully')</script>";
   				header("Location:login.php");
   
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
            }
            
        }else{echo "<center>username already in use</center>";}
		}else{echo "<center>password do not match</center>";}
	}else{
		echo "enter all values";
	}
}else{

}
?>
