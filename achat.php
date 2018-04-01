<?php
include('inc.php');
$header = "ACHETES ACHETES CLIC CLIC";
$css = "index";
$errors = [];
if ($_SESSION["id"] === "0")
	header("Location: signin.php");
$id = intval($_SESSION['id']);
if ($_POST['submit'] === "VALIDER")
{
	$articles = get_cart_by_user_for_achat($id, $conn);
	add_articles_to_achat($articles, $id, $conn);
	delete_cart_by_user_to_db($_SESSION['id'], $conn);
	header("Location: merci.php");
}

?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("cat_nav.php")?>
	<div id="banniere_mid">
	<form action="achat.php" method="POST">
	<input type="submit" name="submit" value="VALIDER">
	</form>	
	</div>
<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
</body>
</html>
