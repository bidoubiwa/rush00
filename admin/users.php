<?PHP
include('inc.php');
$succes = [];
$errors = [];
if ($_GET["status"] != "")
{
	if ($_GET["status"] == 'ajout')
		$succes[] = "L'utilisateur a bien ete enregistre dans la base de donnee"; 
	if ($_GET["status"] == 'success_edit')
		$succes[] = "L'utilisateur a bien ete edite"; 
	else if ($_GET["status"] == 'fail_edit')
		$errors[] = "L'utilisateur n'est pas repertorie"; 
	else if ($_GET["status"] == 'fail_del')
		$errors[] = "L'utilisateur n'a pas pu etre correctement supprime"; 
	if ($_GET["status"] == 'success_del')
		$succes[] = "L'utilisateur a bien ete supprime"; 
}
$users = get_all_users($conn);
?>
<?php 
$header = "Gestion des utilisateurs";
include("header.php"); 
?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_success.php");?>
	<?php include("show_errors.php");?>
		<h1>Gestion des utilisateurs</h1>
		<a class="btn"href="add_user.php">Ajouter utilisateur</a>
		<br/>
		<br/>
		<br/>
		<table>
		<tr>
			<th>Id</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>acces</th>
			<th>email</th>
		</tr>
	<?PHP foreach($users as $single)
	{?>
	<tr>
		<td><?= $single['id']?></td>
		<td><?= $single['name']?></td>
		<td><?= $single['lastname']?></td>
		<td><?PHP 
	if ($single['acces'] == 1)
		echo "Admin";
	else
		echo "Simple consommateur";
?></td>
		<td><?= $single['email']?></td>
		<td> <a class="btn_mod" href="modif_user.php?id=<?=$single['id']?>">Editer</a></td>
		<td> <a class="btn_del" href="del_user.php?id=<?=$single['id']?>">Supprimer</a></td>
	</tr>
	<?PHP }?>
	</table>
	</div>	
</body>
</html>
