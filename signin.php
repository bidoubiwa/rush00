<?php
include('inc.php');
$header = "Connectes toi !";
$css = "signin";
$errors = [];
var_dump($_SESSION["panier"]);
if ($_POST['submit'] === "OK")
{
	if ($_POST['mail'] !== "" && $_POST['password'] !== "")
	{
		$hashed = hash("whirlpool", $_POST['password']);
		if (!($user = get_user_by_mail($conn, $_POST['mail'])))
		{
			header("Location: signin.php?status=wrong");
		}
		if ($hashed !== $user['password'])
			header("Location: signin.php?status=wrong");
		else
		{
			$_SESSION["firstname"] = $user['name'];
			$_SESSION["acces"] = $user['acces'];
			$_SESSION["id"] = $user['id'];
			add_session_cart_to_db($_SESSION["panier"], $_SESSION["id"], $conn);
			header("Location: index.php");
		}
	}
}
?>
<?php include("header.php")?>
<body>
	<?php include("upper_nav.php")?>
		<div id="banniere_menu">
		<div id="menu">
			<div class="button_menu" id="PACK">SIGN IN</div>
			<a href="signup.php" class="button_menu" id="ALCOOL">SIGN UP</a>
		</div>
	</div>
	<div id="banniere_mid">
		<div id="div_article">
			<form method="POST" action="signin.php">
				<p class="text_form">Mail :</p>
				<input class="input" type="text" name="mail">
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
