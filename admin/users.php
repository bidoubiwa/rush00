<?PHP
$succes = [];
if ($_GET["status"] == 'ajout')
{
	$succes[] = "L'utilisateur a bien ete enregistre dans la base de donnee"; 
}
?>
<?php 
$header = "Gestion des utilisateurs";
include("header.php"); 
?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
<?php
if (count($succes))
{	?>		
		<div class="success"><?php
			foreach ($succes as $suc)
				echo "$suc <br/>"; ?>
		</div>
<?php 
}	?>
		<h1>Gestion des utilisateurs</h1>
		<a class="btn"href="add_user.php">Ajouter utilisateur</a>
		<br/>
		<br/>
		<br/>
		<a class="btn"href="modif_user.php">Modifier / Supprimer un utilisateur</a>	
		
	</div>	
</body>
</html>
