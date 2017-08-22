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
    echo '<h4><b style="color:#00004d">Title :'.$row[1]."</b><br>".'<b style="color:#00004d">Categories :'.$row[3].'</b><br></a>'.$row[2].'</h4>';
 
   $location = 'uploads/'.$name.'/';
      $path = $location.$row[4];
      $file = new SplFileInfo($path);
    $ext  = $file->getExtension();
    if($ext=='jpg'||$ext=='gif'){
   echo '<img src="'. $location. '/'. $row[4]. '" width=20% height=30%/>'."<br><br>";
}else{
	echo "<br>".'<a href="'.$path.'" target="_blank"><button>Download</a></button>'."<br><br>";
}
 ?> 

<?php
}

?>
<head>
	<style type="text/css">
		img{
			margin-left: 400px;
		}
		body{
			background-image: url("dash.jpeg");
			color:#330026;
		}
		a:hover{
			text-decoration: none;
		}
		a{
			color: black;
		}
	</style>
	
</head>