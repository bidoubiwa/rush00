<?PHP
include('inc.php');
$success = [];
$errors = [];
if ($_GET["status"] != "")
{
	if ($_GET["status"] == 'ajout')
		$succes[] = "L'article a bien ete enregistre dans la base de donnee"; 
	if ($_GET["status"] == 'success_edit')
		$succes[] = "L'article a bien ete edite"; 
	else if ($_GET["status"] == 'fail_edit')
		$errors[] = "L'article n'est pas repertorie"; 
	else if ($_GET["status"] == 'fail_del')
		$errors[] = "L'article n'a pas pu etre correctement supprime"; 
	if ($_GET["status"] == 'success_del')
		$succes[] = "L'article a bien ete supprime"; 

}
$articles = get_all_articles($conn);
?>
<?php 
$header = "Gestion Articles";
include("header.php"); ?>
<body>
	<?php include("nav.php");?>
	<div class="main">
	<?php include("show_success.php");?>
	<?php include("show_errors.php");?>
		<h1>Gestion des Articles</h1>
		<a class="btn"href="add_article.php">Ajouter un Article</a>	
		<br/>
		<br/>
		<br/>
		<table>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Prix</th>
			<th>Lien Img</th>
			<th></th>
			<th></th>
		</tr>
		<?PHP foreach($articles as $single)
		{?>
		<tr>
			<td><?= $single['id']?></td>
			<td><?= $single['name']?></td>
			<td><?= $single['price']?></td>
			<td><?= $single['image']?></td>
			<td> <a class="btn_mod" href="modif_article.php?id=<?=$single['id']?>">Editer</a></td>
			<td><a class="btn_del" href="del_article.php?id=<?=$single['id']?>">Supprimer</a></td>
		</tr>	
		<?php } ?>
	</table>
	</div>	
</body>
</html>
