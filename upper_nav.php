	<div id="banniere_top">
		<header id="header">
			<a href="index.php" id="logo">SORTEZ COUVERT</a>
			<div id="relou">
			<?php if ($_SESSION['acces'] === "1")
			{	?>
		<a href="admin/index.php" id="logged-in">ADMIN AREA</a>
		<?php } ?>
			<?php
			if ($_SESSION['firstname'] != NULL) 
			{	?>
				<span id="logged-in">Bonjour <?= $_SESSION['firstname']?></span>
			<?php }
			else
			{	?>
				<a href="signin.php" id="login">Sign IN/UP</a>
			<?php } ?>
				<div id="panier"><i class="material-icons" id="panier_img">local_grocery_store</i></div>
			<?php
			if ($_SESSION['firstname'] != NULL) 
			{	?>
				<a href="logout.php"><i id="logout" class="material-icons">power_settings_new</i></a>
			<?php } ?>
			</div>
		</header>
	</div>

