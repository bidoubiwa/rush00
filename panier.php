<?php
include("inc.php");
$header = "FUN !";
$css = "index";
if ($_SESSION["id"] != 0)
{
	$id = intval($_SESSION["id"]);
	$articles = get_cart_by_user($id, $conn);
}
else
{
	$articles = [];
	foreach ($_SESSION["panier"] as $art)
	{
		$tmp = get_article_by_id($conn, $art["id"]);
		$tmp2["name"] = $tmp["name"];
		$tmp2["quant"] = $art["quant"];
		$tmp2["price"] = $tmp["price"];
		$tmp2["id_article"] = $art["id"];
		$articles[] = $tmp2;
	}
}

?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("cat_nav.php")?>
	<div id="banniere_mid">
	<div id="div_article">
	<table class="panier">
	<tr>
		<th>Name</th>
		<th>Quantity</th>
		<th>Price</th>

	</tr>
<?php foreach($articles as $elem)
{ ?>
		<tr>
			<td><?=$elem['name']?></td>
			<td><?=$elem['quant']?></td>
			<td><?=$elem['price']?> €</td>
			<td><a href="del_art_cart.php?id_article=<?php echo $elem["id_article"] . '&id_user=' .  $id ;?>">Supprimer</a></td>

		</tr>

<?php }?>
		<tr>
		<td></td>
		<td></td>
		<td></td>
		</table>
<?php 
	if ($_SESSION["id"] != 0) 
	{ ?>
		<a class ="sign_button" href="achat.php?id=<?=$id?>">Acheter</a>
	<?php
	}
	else
	{
?>
	<td><a class="custom_button" href="signin.php">Connectez vous pour valider votre achat</a></td>
<?php }?>

	</div>
	</div>
<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
</body>
</html>
