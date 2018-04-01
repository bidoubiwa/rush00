<?PHP
include('inc.php');
$errors = [];
$categories = get_all_categories($conn);
if (!$categories)
	$errors[] = "il n'existe pas de categories, il faut en creer une avant de creer des articles";


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
			if(get_article_by_name($conn, $article['name']) == NULL)
			{
				if(!add_article_to_db($article, $conn))
					$errors[] = "Probleme de base de donnees";
				else
				{
					$id_article =  mysqli_insert_id($conn);
					foreach($article['cats'] as $id_cat)
					{
						if (!add_architecture_to_db($id_cat, $id_article, $conn))
						{
							$errors[] = "Soucis ajout architecture base de donnee";
							break;
						}
					}
					if (count($errors) == 0)
					{
						header("Location: articles.php?status=ajout");
					}
				}
			}	
			else
				$errors[] = "L'article existe deja";
		}
	}
}
?>
<?php 
$header = "Ajouter Article";
include("header.php"); ?>
<body>

	<?PHP include("nav.php");?>
	<div class="main">
	<?PHP include("show_errors.php");?>
		<h1>Ajout d'un article</h1>
	<form action="add_article.php" method="POST">
		Nom de l'article : <input type="text" name="name" value="">
	  <br>
	  <br>
	 	Prix de vente : <input type="number" name="price" value="">
	  <br>
	  <br>
	 	lien de l'image : <input type="text" name="img" value="">
	  <br>
	  <br>
		Categorie(s) de l'article : 
	  <br>
<ul class="checkul">

	<?PHP 
		foreach($categories as $cat)
	{?>
		<br>
		<li> <input type="checkbox" value="<?=$cat['id']?>" name="cats[]"/>  <?=$cat['name']?> </li>
		<?php 
		} ?>
</ul>
<br>	
<input type="submit" name="submit" value="OK">
	</form>

	</div>	
</body>
</html>
