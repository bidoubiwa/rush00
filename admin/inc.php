<?php
session_start();
if ($_SESSION["acces"] != 1)
	header("Location: ../index.php");
$conn = mysqli_connect("localhost", "root", "arobion", "db_kit");
include('functions.php');
?>
