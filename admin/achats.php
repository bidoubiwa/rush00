<?PHP
include('inc.php');
$achats = get_achats_from_db($conn);
?>
<?php 
$header = "Historique des achats";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
	<h1>historique des achats</h1>
	<table>
	<tr>
		<th>Produit acheté</th>
		<th>Nom</th>
		<th>Prenom </th>
	</tr>
<?PHP foreach($achats as $single)
	{ 
		$article = get_article_by_id($conn, $single['id_article']);
		$user = get_user_by_id($conn, $single['id_user'])
?>
	<tr>
	<td><?=$article['name']?></td>
	<td><?=$user['lastname']?></td>
	<td><?=$user['name']?></td>
	</tr>
	<?PHP } ?>
	</div>	
</body>
</html>
