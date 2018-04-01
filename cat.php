<?php
include("inc.php");
$header = "FUN !";
$css = "index";
$errors = [];
$success = [];
$errors[] =  var_dump($_SESSION["panier"]);
$categories = get_all_categories($conn);

if ($_GET["id"] != "")
{
	$id = intval($_GET["id"]);
	$articles = get_articles_by_categorie($id ,$conn);
}
else
	// header loc index.php


?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("show_logs.php")?>
	<?php include("cat_nav.php")?>
	<div id="banniere_mid">
		<div id="div_article">
		<h1 id="top_ventes">Nos top ventes !</h1>
			<div id="div_article_top">
			<?php
				foreach ($articles as $art)
			{
				$infos = get_article_by_id($conn, $art['id_article']);
			?>	
				<div class="article" id="article1">
					<div class="top_article" id="top">
					<div class="img"><img id="images" src="<?=$infos["image"]?>"/></div>
						<div class="nom_prix">
							<p class="nom_article"><?=$infos["name"] ?></p>
							<p class="prix_article"><?=$infos["price"] ?> €</p>
						</div>
					</div>
					<div class="bot">
						<div class="ajout_article">
							<a href="add_panier.php?add=<?=$infos["id"] ?>">
				 			Ajout panier
							</a> 
						</div>
					</div>
				</div>
	
		<?php } ?>
</div>
</div>
	</div>
<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
</body>
</html>
