<?PHP


if  ($_POST['submit'] === "OK")
{
	if ($_POST['login'] !== "" && $_POST['passwd'] !== "")	
	{
		$pass = hash("whirlpool", $_POST['passwd']);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin zone de Sortez Couvert</title>
	<link rel="stylesheet" type="text/css" href="ressources/style/admin.css">
</head>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
		<h1>Ajout d'un utilisateur</h1>
	<form action="add_user.php" method="POST">
		Email :<input type="text" name="mail" value="">
	  <br>
	 	Nom:<input type="text" name="lastname" value="">
	  <br>
	 	Prenom:<input type="text" name="firstname" value="">
	  <br>
	 	Mot de passe:<input type="text" name="passwd" value="">
	  <br>
		Acces:
			<select name="acces">
				<option value=1>Admin</option>
				<option value=0>Simple User</option>
			</select>		
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
