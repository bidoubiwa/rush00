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
		<th>id Utilisateur</th>
		<th>id Produit acheté</th>
	</tr>
<?PHP foreach($achats as $single)
	{ ?>
	<tr>
	<td><?=$single['id_user']?></td>
	<td><?=$single['id_article']?></td>
	</tr>
	<?PHP } ?>
	</div>	
</body>
</html>
