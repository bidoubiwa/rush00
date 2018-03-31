<?PHP
include('inc.php');
$errors = [];
if  ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['passwd'] !== "" && $_POST['lastname'] !== "" && $_POST['firstname'] != "")
	{
		$user = [];
		$user['pass'] = hash("whirlpool", $_POST['passwd']);
		$user['email'] = htmlspecialchars($_POST['mail']);
		$user['lastname'] = htmlspecialchars($_POST['lastname']);
		$user['firstname'] = htmlspecialchars($_POST['firstname']);
		$user['acces'] = intval($_POST['acces']);
		if (strlen($user['firstname']) < 2 || strlen($user['firstname']) > 30)
			$errors[] = "Prenom trop petit ou trop grand";
		if (strlen($user['lastname']) < 2 || strlen($user['lastname']) > 50)
			$errors[] = "Nom trop petit ou trop grand";
		if ($user['acces'] != 1 && $user['acces'] != 0)
			$errors[] = "GROS FDP ESSAYE PAS DE HACKER NOTRE SITE";
		if (count($errors) == 0)
		{
			if (get_user_by_mail($conn, $user['email']) == NULL)
			{
				if (!add_user_to_db($user, $conn))
					$errors[] = "Soucis avec l'ajout dans la base de donnee";
				else
					header("Location: users.php?status=ajout");
			}
			else
				$errors[] = "Cet email est deja associe a un compte !";
		}
	}
}
?>
<?php 
$header = "Ajouter Utilisateurs";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
	<h1>Ajout d'un utilisateur</h1>
	<form action="add_user.php" method="POST">
		Email :<input type="email" name="mail" value="" required>
	  <br>
		Nom:<input type="text" name="lastname" value="" required>
	  <br>
		Prenom:<input type="text" name="firstname" value="" required>
	  <br>
		Mot de passe:<input type="text" name="passwd" value="" required>
	  <br>
		Acces:
			<select name="acces">
				<option value=0>Simple User</option>
				<option value=1>Admin</option>
			</select>		
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
