<?PHP
if  ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['passwd'] !== "" && $_POST['lastname'] && $_POST['firstname'])
	{
		$pass = hash("whirlpool", $_POST['passwd']);
		/*verifier la validite des donnes ( unicite du mail) */
		if ($_POST['mail'] !== "")
		{
			$a = 1;
			/* ajouter dans la base de donnees avec les 5 valeurs post ( ne pas oublier acces */
			//			echo "Utilisateur ajoute avec succes\n";
		}
		else
		{
			$b = 2;
			//			echo "Erreur\nmail deja enregistre dans notre base de donnees\n";
		}
	}
	else
		$c = 3;
	//		echo "ERREUR.\nVeuillez remplir tout les champs\n";
}
?>
<?php 
$header = "Modifier les utilisateurs";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
		<h1>modification d'un utilisateur</h1>
	<p> Ne remplir que les champs a modifier </p>
	<form action="modif_user.php" method="POST">
		Email :<input type="text" name="oldmail" value="">
	  <br/>
		Nouvel email :<input type="text" name="newmail" value="">
	  <br/>
		Nouveau nom:<input type="text" name="lastname" value="">
	  <br/>
		Nouveau prenom:<input type="text" name="firstname" value="">
	  <br/>
		Nouveau mot de passe:<input type="text" name="passwd" value="">
	  <br/>
		Nouvel acces:
			<select name="acces">
				<option value=0>Simple User</option>
				<option value=1>Admin</option>
			</select>		
		<br/>
		Supprimer cet utilisateur ?:
			<select name="delete">
				<option value=0>Non</option>
				<option value=1>Oui</option>
			</select>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
