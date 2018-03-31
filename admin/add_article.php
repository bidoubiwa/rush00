<?PHP
include('inc.php');
$errors = [];
$categories = get_all_categories($conn);
if (!$categories)
	$errors[] = "il n'existe pas de categories, il faut en creer une avant de creer des articles";


if  ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['passwd'] !== "" && $_POST['lastname'] && $_POST['firstname'])
	{
		$pass = hash("whirlpool", $_POST['passwd']);
		/* ajouter dans la base de donnees avec les 5 valeurs post ( ne pas oublier acces */
		
	}
}
?>
<?php 
$header = "Ajouter Article";
include("header.php"); ?>
<body>

	<?PHP include("nav.php");?>
	<div class="main">
	<?php
	if (count($errors))
	{	?>		
			<div class="errors"><?php
				foreach ($errors as $error)
					echo "$error <br/>"; ?>
			</div>
<?php 
}	?>

		<h1>Ajout d'un article</h1>
	<form action="add_article.php" method="POST">
		Nom de l'article :<input type="text" name="name" value="">
	  <br>
	 	Prix de vente :<input type="text" name="price" value="">
	  <br>
	 	lien de l'image :<input type="text" name="img" value="">
	  <br>
	 	Categorie(s) de l'article : 
		<select name="categories">
<?PHP 
foreach($categories as $cat)
{?>
	<option value="<?= $cat['id']?>"><?=$cat['name']?></option>
<?php 
} ?>
		</select>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
