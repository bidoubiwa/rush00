<!DOCTYPE html>
<html>
<head>
	<title>Sortez couvert !</title>
	<link rel="stylesheet" type="text/css" href="ressources/style/signup.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
	<div id="banniere_top">
		<header id="header">
			<a href="index.php" id="logo">SORTEZ COUVERT</a>
			<div id="relou">
				<a href="signin.php" id="login">Sign IN/UP</a>
				<div id="panier"><i class="material-icons" id="panier_img">local_grocery_store</i></div>
			</div>
		</header>
	</div>
	<div id="banniere_menu">
		<div id="menu">
			<a href="signin.php" class="button_menu" id="PACK">SIGN IN</a>
			<div class="button_menu" id="ALCOOL">SIGN UP</div>
		</div>
	</div>
	<div id="banniere_mid">
		<div id="div_article">
			<form>
				<p class="text_form">Prenom :</p>
				<input class="input" type="text" name="firstname">
				<p class="text_form">Nom :</p>
				<input class="input" type="text" name="name">
				<p class="text_form">Mail :</p>
				<input class="input" type="mail" name="mail">
				<p class="text_form">Mot de passe :</p>
				<input class="input" type="password" name="password">
				<button id="sign_button">SIGN IN</button>
			</form>
		</div>
	</div>
	<img id="background_img" src="https://mcetv.fr/wp-content/uploads/2016/10/Bon-plan-sortie-La-soir%C3%A9e-G-House-Party-fait-son-grand-retour-grande.jpg">
     <script type="text/javascript" src="/ressources/js/fonctions.js"></script>
</body>
</html>