<?PHP
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
$header = "Modifier les articles";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
		<h1>modification d'un article</h1>
		<p>Ne remplir que les champs a modifier </p>
	<form action="modif_article.php" method="POST">
		Nom de l'article :<input type="text" name="oldname" value="">
	  <br>
		Nouveau nom de l'article :<input type="text" name="newname" value="">
	  <br>
	 	Nouveau prix de vente :<input type="text" name="price" value="">
	  <br>
	 	Nouveau lien de l'image :<input type="text" name="img" value="">
	  <br>
	 	Nouvelle(s) categorie(s) de l'article :<input type="text" name="catrgorie" value="">
		<br>
		Supprimer cet article ?:
			<select name="delete">
				<option value=0>Non</option>
				<option value=1>Oui</option>
			</select>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
