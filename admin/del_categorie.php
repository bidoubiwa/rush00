<?php
include('inc.php');
if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	if (!delete_categorie_to_db($id, $conn))
		header("Location: categories.php?status=fail_del");
	if (!delete_architecture_by_article_to_db($id, $conn))
		header("Location: categories.php?status=fail_del");
	header("Location: categories.php?status=success_del");
}
?>
