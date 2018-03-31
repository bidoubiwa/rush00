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
$header = "Modifier les categories";
include("header.php"); ?>

<body>
	<?PHP include("nav.php");?>
	<div class="main">
		<h1>Ajout d'une categorie</h1>
	<form action="add_categorie.php" method="POST">
		Nom de la categorie :<input type="text" name="name" value="">
	  <br>
	 	image de presentation :<input type="text" name="img" value="">
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
