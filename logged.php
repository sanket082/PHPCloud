<?php
include 'connection.inc.php';
include 'navbar1.html';
include 'logged_html.html';
session_start();
$username=  $_SESSION['name'];
if(isset($_POST['Title'])&&isset($_POST['Content'])&&isset($_POST['Categories'])){
	$Title = $_POST['Title'];
	$name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$Content = $_POST['Content'];
	$Categories = $_POST['Categories'];
	if(!empty($Title)&&!empty($Content)&&!empty($Categories)){
		$location = 'uploads/'.$username.'/';
		move_uploaded_file($tmp_name, $location.$name); 
		$sql = "INSERT INTO $username SET Title='$Title',Content='$Content',Categories='$Categories',filename='$name' ";
		if(mysql_query($sql)){}else{ echo "enter all fields";}
	}
}
?>

