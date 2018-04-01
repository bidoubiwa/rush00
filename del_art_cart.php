<?php
include("inc.php");
if ($_GET["id_user"] != "" && $_GET["id_article"] != "")
{
	$id_user = intval($_GET["id_user"]);
	$id_article = intval($_GET["id_article"]);
	delete_cart_by_article_and_user($id_article,$id_user, $conn);
}
header("Location: panier.php");

?>
