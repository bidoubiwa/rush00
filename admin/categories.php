<?PHP
include('inc.php');
$success = [];
$errors = [];
if ($_GET["status"] != "")
{
	if ($_GET["status"] == 'ajout')
		$succes[] = "La categorie a bien ete enregistre dans la base de donnee"; 
	if ($_GET["status"] == 'success_edit')
		$succes[] = "La categorie a bien ete edite"; 
	else if ($_GET["status"] == 'fail_edit')
		$errors[] = "La categorie n'est pas repertorie"; 
	else if ($_GET["status"] == 'fail_del')
		$errors[] = "La categorie n'a pas pu etre correctement supprime"; 
	if ($_GET["status"] == 'success_del')
		$succes[] = "La categorie a bien ete supprime"; 
}
$categories = get_all_categories($conn);
?>
<?php 
$header = "Gestion des categories";
include("header.php"); ?>

<body>
	<?php include("nav.php");?>
	<div class="main">
	<?php include("show_success.php");?>
	<?php include("show_errors.php");?>
		<h1>Gestion des Categories</h1>
		<a class="btn"href="add_categorie.php">Ajouter une Categorie</a>	
		<br/>
		<br/>
		<br/>
		<table>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th></th>
			<th></th>
		</tr>
		<?PHP foreach($categories as $single)
		{?>
		<tr>
			<td><?= $single['id']?></td>
			<td><?= $single['name']?></td>
			<td> <a class="btn_mod" href="modif_categorie.php?id=<?=$single['id']?>">Editer</a></td>
			<td><a class="btn_del" href="del_categorie.php?id=<?=$single['id']?>">Supprimer</a></td>
		</tr>
		<?php } ?>
	</table>

	</div>	
</body>
</html>
