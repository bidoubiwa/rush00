<?php
include("inc.php");
$header = "Sortez couvert !";
$css = "index";
$articles = get_all_articles($conn);
//var_dump($articles);
$articles =  array_slice($articles,0,6); 
?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("cat_nav.php")?>
	<div id="banniere_mid">
		<div id="div_article">
			<h1 id="top_ventes">Nos top ventes !</h1>
			<div id="div_article_top">
			<?php
				foreach ($articles as $infos)
			{
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
