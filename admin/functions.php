<?PHP
function get_user_by_mail($conn, $mail)
{
	$sql = "SELECT * FROM users WHERE email = '$mail'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	return $row;
}

function get_all_mails($conn)
{
	$res = mysqli_query($conn, "SELECT email FROM users");
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;
}

function add_user_to_db($user, $conn)
{
	 $sql = "INSERT INTO users (name, lastname, password, acces, email) VALUES ('" . $user['firstname'] . "', '" . $user['lastname'] . "', '" . $user['pass'] . "', '" . $user['acces'] . "', '" . $user['email'] . "')";	
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function add_cat_to_db($cat, $conn)
{
	$sql = "INSERT INTO categories (name) VALUES ('" . $cat['name'] .  "')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function mail_doesnt_exist($mail, $tab)
{
	foreach($tab as $key => $value)
	{
		if ($value['email'] === $mail)
			return (FALSE);
	}
	return true;
}
function cat_doesnt_exist($cat, $tab)
{
	foreach($tab as $key => $value)
	{
		if ($value['name'] === $cat)
			return (FALSE);
	}
	return (TRUE);
}

function get_all_categories($conn)
{
	if (!($res = mysqli_query($conn, "SELECT id, name FROM categories")))
		return []; 
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;
}

function get_all_articles($conn)
{
	if (!($res = mysqli_query($conn, "SELECT * FROM articles")))
		return false;
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;
}

function get_cat_by_name($conn, $name)
{
	$sql = "SELECT * FROM categories WHERE name = '$name'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return ($row);
}

function get_article_by_name($conn, $name)
{
	$sql = "SELECT * FROM articles WHERE name = '$name'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return ($row);
}

function get_article_by_id($conn, $id)
{
	$sql = "SELECT * FROM articles WHERE id = '$id'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return ($row);
}

function get_categories_by_id($conn, $id)
{
	$sql = "SELECT * FROM categories WHERE id = '$id'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return ($row);
}

function get_categories_by_article($conn, $id)
{
	$cat = [];
	$sql = "SELECT * FROM architecture WHERE id_article = '$id'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	foreach ($row as $arch)
	{
		$sql = "SELECT * FROM categories WHERE id = " . $arch['id_categorie'];
		$cat_quer = mysqli_query($conn, $sql);
		$cat[] = mysqli_fetch_assoc($cat_quer);
	}
	return $cat;
}

function add_article_to_db($cat, $conn)
{
	$sql = "INSERT INTO articles (name, price, image) VALUES ('" . $cat['name'] .  "', '" . $cat['price'] .  "', '" . $cat['img'] .  "')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function add_architecture_to_db($id_cat, $id_article,  $conn)
{
	$sql = "INSERT INTO architecture (id_article, id_categorie) VALUES ('" . $id_article .  "', '" . $id_cat .  "')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function update_article_to_db($article, $conn)
{
	$sql = "UPDATE articles SET name = '" . $article['name'] . "', price = '" . $article['price'] . "', image = '" . $article['img'] ."' WHERE id = '" . $article['id'] . "'";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function update_categorie_to_db($cat, $conn)
{
	$sql= "UPDATE categories SET name = '" . $cat['name'] . "' WHERE id = " . $cat['id'];
	if (!($update = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function update_architecture_to_db($id_cats, $id_article,  $conn)
{
	$sql = "DELETE FROM architecture WHERE id_article = $id_article";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	foreach($id_cats as $id_cat)
	{
		if (!(add_architecture_to_db($id_cat["id"], $id_article, $conn)))
			return false;
	}
	return true;
}

function delete_article_to_db($id, $conn)
{
	$sql = "DELETE FROM articles WHERE id = '" . $id . "'";
	if (!($delete = mysqli_query($conn, $sql)))
		return false;
	return true;
}

function delete_categorie_to_db($id, $conn)
{
	$sql = "DELETE FROM categories WHERE id = '" . $id . "'";
	if (!($delete = mysqli_query($conn, $sql)))
		return false;
	return true;
}

function delete_architecture_by_categorie_to_db($id_cat, $conn)
{
	$sql = "DELETE FROM architecture WHERE id_categorie = '" . $id_cat . "'";
	if (!($delete = mysqli_query($conn, $sql)))
		return false;
	return true;
}


function delete_architecture_by_article_to_db($id_article, $conn)
{
	$sql = "DELETE FROM architecture WHERE id_article = '" . $id_article . "'";
	if (!($delete = mysqli_query($conn, $sql)))
		return false;
	return true;
}

?>
