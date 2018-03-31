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
		<h1>Modification d'une categorie</h1>
		<p>Ne remplir que les champs a modifier </p>
	<form action="modif_categorie.php" method="POST">
		Nom de la categorie :<input type="text" name="oldname" value="">
		<br>
		Nouveau nom de la categorie :<input type="text" name="newname" value="">
		<br>
	 	Nouvelle image de presentation :<input type="text" name="img" value="">
		<br>
		Supprimer cette categorie ?:
			<select name="delete">
				<option value=0>Non</option>
				<option value=1>Oui</option>
			</select>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
