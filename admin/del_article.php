<?php
include('inc.php');
$errors = [];

if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	if (!delete_article_to_db($id, $conn))
		header("Location: articles.php?status=fail_del");
	if (!delete_architecture_by_article_to_db($id, $conn))
		header("Location: articles.php?status=fail_del");
	if (!delete_cart_by_article_to_db($id, $conn))
		header("Location: articles.php?status=fail_del");
	header("Location: articles.php?status=success_del");
}

?>
