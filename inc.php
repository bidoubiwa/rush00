<?php
$conn = mysqli_connect("localhost","root","arobion","db_kit");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

include("admin/functions.php");
session_start();
if ($_SESSION["firstname"] == "")
{
	$_SESSION["firstname"] = "";
	$_SESSION["acces"] = 0;
	$_SESSION['id'] = 0;
}
if ($_SESSION["panier"] === [])
{
	$_SESSION["panier"] = []; 
}
?>
