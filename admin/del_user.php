<?php
include('inc.php');
$errors = [];

if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	if (!delete_user_to_db($id, $conn))
		header("Location: users.php?status=fail_del");
	 if (!delete_cart_by_user_to_db($id, $conn))
	 	header("Location: users.php?status=fail_del");
	header("Location: users.php?status=success_del");
}

?>
