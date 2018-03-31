<?PHP
include('inc.php');
$errors = [];
if  ($_POST['submit'] === "OK" && $_POST['name'] !== "")
{
	$cat['name'] = htmlspecialchars($_POST['name']);
	if (strlen($cat['name']) < 2 || strlen($cat['name']) > 50)
			$errors[] = "Nom de la categorie est trop petit ou trop grande";
	if (count($errors) == 0)
	{
		if (get_cat_by_name($conn,$cat['name']) == NULL)
		{
			if (!add_cat_to_db($cat, $conn))
				$errors[] = "Probleme base de donnees";
			else
			{
				$name = $cat['name'];
				header("Location: categories.php?status=ajout&name=$name");
			}
		}
		else
			$errors[] = "Nom de cette categorie est deja prise";
	}

	
}
?>
<?php 
$header = "Modifier les categories";
include("header.php"); ?>

<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
		<h1>Ajout d'une categorie</h1>
	<form action="add_categorie.php" method="POST">
		Nom de la categorie :<input type="text" name="name" value="" required>
	  <br>
	  <br>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
