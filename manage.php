<center>
<?php
include 'connection.inc.php';
include 'navbar1.html';
session_start();
$name = $_SESSION['name'];
$query = "SELECT * FROM $name";
$result  = mysql_query($query);
if($result === FALSE) { 
    die(mysql_error()); 
}
$rows = mysql_num_rows($result);
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	?>
	<form method="POST" action="manage.php">
    <h2><input type="radio" name="check_list" value="<?php echo $row[1]; ?>">Title :<?php echo $row[1];?></b><br></a></h2>
    <?php } ?>
    <input type="submit" name="submit" value="Delete" id="button"> 
  </form>

<head>
	<style type="text/css">
		body{
			background-image: url("dash.jpeg");
		}
	</style>
	
</head>
<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
$delete1 = $_POST['check_list'];
 $sql ="DELETE FROM $name WHERE Title LIKE '$delete1'";
 $sql2 = "SELECT filename FROM $name WHERE Title LIKE '$delete1'";
 $result1 = mysql_query($sql2);
 $row = mysql_fetch_array($result1, MYSQL_NUM);
 $retval = mysql_query($sql);
 if(! $retval ) {
      die('Could not delete data: ' . mysql_error());
   }
   echo "Deleted data successfully\n";
   header("Refresh:0");
 $location =  'uploads/'.$name.'/'.$row[0];
   unlink($location);
   
}
}?>
</center>
<style type="text/css">
   #button{
   background-color: dimgray;
    border: none;
    color: whitesmoke;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 2px 2px;
    cursor: pointer;
  }
</style>