<?PHP
include('inc.php');
$errors = [];
if ($_GET['id'] != "")
{
	$id = intval($_GET['id']);
	$article = get_article_by_id($conn, $id);
	if ($article == NULL)
		header("Location: articles.php?status=fail_edit");
	$categories = get_all_categories($conn);
	$arch = get_categories_by_article($conn, $id);
}
if  ($_POST['submit'] === "OK")
{
	if ($_POST['name'] !== "" && $_POST['price'] !== "" && $_POST['img'] != "")
	{
		$article['name'] = htmlspecialchars($_POST['name']);
		$article['price'] = intval($_POST['price']);
		$article['img'] = htmlspecialchars($_POST['img']);
		$article['cats'] = $_POST['cats'];
		if(strlen($article['name']) <  2 || strlen($user['name']) > 50)
			$errors[] = "Nom de l'article trop grand";
		if($article['price'] >= 20000)
			$errors[] = "Un peu chere pour une soiree";
		if(strlen($article['img']) < 2 || strlen($article['img']) > 1000)
			$errors[] = "Essaie une 'image' dont le nom est un peu moins long peut etre";
		
		if (count($errors) == 0)
		{
			if(!update_article_to_db($article, $conn))
				$errors[] = "Probleme de base de donnees";
			else
			{
				if (!update_architecture_to_db($article['cats'] , $id, $conn))
					$errors[] = "Soucis ajout architecture base de donnee";
				if (count($errors) == 0)
					header("Location: articles.php?status=success_edit");
			}
		}	
	}
}


?>
<?php 
$header = "Modifier les articles";
include("header.php"); ?>
<body>
	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
		<h1>modification d'un article</h1>
		<p>Ne remplir que les champs a modifier </p>
		<form action="modif_article.php?id=<?=$id?>" method="POST">
      Modifier le nom de l'article : <input type="text" name="name" value="<?=$article['name']?>" required>
	  <br>
	  Modifier prix de vente : <input type="text" name="price" value="<?=$article['price']?>" required>
	  <br>
	  Modifier lien de l'image : <input type="text" name="img" value="<?=$article['image']?>" required>
	  <br>
<ul class="checkul">

	<?PHP 
	foreach($categories as $cat)
	{?>
		<br>
		<li> <input type="checkbox" value="<?=$cat['id']?>" name="cats[]" 
		<?php 
			foreach ($arch as $cat_from_article)
			{
				if ($cat_from_article["id"] == $cat["id"])
					echo "checked";
			}
		?> />  <?=$cat['name']?> </li>
	<?php 
	} ?>
</ul>
<br>
	<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
