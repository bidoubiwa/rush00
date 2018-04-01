<?php
include("inc.php");
$header = "Inscrit toi !";
$css = "signup";
$errors = [];
if  ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['passwd'] !== "" && $_POST['lastname'] !== "" && $_POST['firstname'] != "")
	{
		$user = [];
		$user['pass'] = hash("whirlpool", $_POST['password']);
		$user['email'] = htmlspecialchars($_POST['email']);
		$user['lastname'] = htmlspecialchars($_POST['lastname']);
		$user['firstname'] = htmlspecialchars($_POST['firstname']);
		$user['acces'] = 0;
		if (strlen($user['firstname']) < 2 || strlen($user['firstname']) > 30)
			$errors[] = "Prenom trop petit ou trop grand";
		if (strlen($user['lastname']) < 2 || strlen($user['lastname']) > 50)
			$errors[] = "Nom trop petit ou trop grand";
		if (strlen($user['pass']) < 6)
			$errors[] = "Mot de passe doit faire au moins 6 caracteres";
		if (count($errors) == 0)
		{
			if (get_user_by_mail($conn, $user['email']) == NULL)
			{
				if (!add_user_to_db($user, $conn))
					$errors[] = "Soucis avec l'ajout dans la base de donnee";
				else
				{
					$_SESSION["firstname"] = $user['firstname'];
					$_SESSION["acces"] = 0;
					$_SESSION["id"] = mysqli_insert_id($conn);
				   	add_session_cart_to_db($_SESSION["panier"], $_SESSION["id"], $conn);
					header("Location: index.php?status=ajout");
				}
			}
			else
				$errors[] = "Cet email est deja associe a un compte !";
		}
	}
}
?>

<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
	<?php include("show_logs.php")?>
	<div id="banniere_menu">
		<div id="menu">
			<a href="signin.php" class="button_menu" id="PACK">SIGN IN</a>
			<div class="button_menu" id="ALCOOL">SIGN UP</div>
		</div>
	</div>
	<div id="banniere_mid">
		<div id="div_article">
			<form method="POST" action="signup.php">
				<p class="text_form">Prenom :</p>
				<input class="input" type="text" name="firstname" value="<?=$_POST["firstname"]?>">
				<p class="text_form">Nom :</p>
				<input class="input" type="text" name="lastname" value="<?=$_POST["lastname"]?>">
				<p class="text_form">Mail :</p>
				<input class="input" type="mail" name="email" value="<?=$_POST["email"]?>">
				<p class="text_form">Mot de passe :</p>
				<input class="input" type="password" name="password">
				<button type="submit" name="submit" value="OK" id="sign_button">SIGN IN</button>
			</form>
		</div>
	</div>
	<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
     <script type="text/javascript" src="/ressources/js/fonctions.js"></script>
</body>
</html>
