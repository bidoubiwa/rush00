<?php
include("inc.php");
$header = "FUN !";
$css = "index";
	$id = intval($_SESSION["id"]);
$articles = get_cart_by_user($id, $conn);
truncate_cart($articles);
echo "<pre>";
print_R($articles);

?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("cat_nav.php")?>
	<div id="banniere_mid">
		<table>
			

		</table>
	</div>
<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
</body>
</html>
