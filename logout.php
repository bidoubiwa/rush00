<?php
include('inc.php');
$header = "Connectes toi !";
$css = "signin";
session_destroy();
header("Location: index.php");
?>

