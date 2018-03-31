<?PHP
include('inc.php');
$errors = [];
$success = [];
if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	$cat = get_categories_by_id($conn, $id);
	if ($cat == NULL)
		header("Location: categories.php?status=fail_edit");
}

if  ($_POST['submit'] === "OK" && $_POST["name"] != "")
{
	$cat['name'] = htmlspecialchars($_POST["name"]);
	if (!(update_categorie_to_db($cat, $conn)))
		header("Location: categories.php?status=fail_edit");
	else
		header("Location: categories.php?status=success_edit");
}
?>
<?php 
$header = "Modifier les categories";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
		<h1>Modification d'une categorie</h1>
		<p>Ne remplir que les champs a modifier </p>
		<form action="modif_categorie.php?id=<?= $cat['id'] ?>" method="POST">
		Modifier nom de la categorie :<input type="text" name="name" value="<?= $cat['name']; ?>">
		<br>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
