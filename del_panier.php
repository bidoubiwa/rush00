<?php
include("inc.php");
if ($_SESSION["id"] != 0)
{
	delete_cart_by_user_to_db($_SESSION['id'], $conn);
}	
else
{
	$_SESSION["panier"] = [];
}
 header("Location: panier.php");

?>
