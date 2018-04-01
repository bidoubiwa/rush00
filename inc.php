<?php
$con = mysqli_connect("localhost","root","95Ead98b8b","db_kit");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 else
 	echo "On est connecté"; 

$sql = "SELECT * FROM users WHERE sexe = 0";

if (!$result = $con->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}
foreach ($result as $res) {
	echo "<br>";
	print_r($res["pseudo"]);
	echo "<br>";
}


?>