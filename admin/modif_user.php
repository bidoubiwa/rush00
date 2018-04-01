<?PHP
include('inc.php');
$errors = [];
if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	$user = get_user_by_id($conn, $id);
	if ($user == NULL)
		header("Location: users.php?status=fail_edit");
}
if ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['lastname'] !== "" && $_POST['firstname'] !== "" && $_POST['acces'] !== "")
	{
		$user['email'] = htmlspecialchars($_POST['mail']);
		$user['lastname'] = htmlspecialchars($_POST['lastname']);
		$user['firstname'] = htmlspecialchars($_POST['firstname']);
		$user['acces'] = intval($_POST['acces']);
		if ($_POST['passwd'] !== "")
			$user['password'] = hash("whirlpool", $_POST['passwd']);
		else
			$user['password'] = NULL;
		if (strlen($user['firstname']) < 2 || strlen($user['firstname']) > 30)
			$errors[] = "Prenom trop petit ou trop grand";
		if (strlen($user['lastname']) < 2 || strlen($user['lastname']) > 50)
			$errors[] = "Nom trop petit ou trop grand";
		if ($user['acces'] != 1 && $user['acces'] != 0)
			$errors[] = "GROS FDP ESSAYE PAS DE HACKER NOTRE SITE";

		if (count($errors) == 0)
		{
			if ($user['password'] == NULL)
			{
				if (!update_user_without_password_to_db($user, $conn))
					$errors[] = "Soucis de l'ajout de l'utilisateur dans la base de donnee";
			}	
			else
			{
				if (!update_user_to_db($user, $conn))
					$errors[] = "Soucis de l'ajout de l'utilisateur dans la base de donnee";
			}
			if (count($errors) == 0)
				header("Location: users.php?status=success_edit");
		}
	}

}
?>
<?php 
$header = "Modifier les utilisateurs";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
		<?PHP include("show_errors.php");?>
		<h1>modification d'un utilisateur</h1>
	<p> Ne remplir que les champs a modifier </p>
	<form action="modif_user.php?id=<?=$id?>" method="POST">
	Email :<input type="text" name="mail" value="<?=$user['email']?>"required>
	  <br/>
	  Nom:<input type="text" name="lastname" value="<?=$user['lastname']?>"required>
	  <br/>
	  Prenom:<input type="text" name="firstname" value="<?=$user['name']?>"required >
	  <br/>
	  Mot de passe:<input type="text" name="passwd" value="">
	  <br/>
		Acces:
			<select name="acces">
				<option value=0>Simple User</option>
				<option value=1 <?PHP
			if ($user['acces'] == 1)
				echo "selected";				
?>>Admin</option>
			</select>		
		<br/>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
