<?PHP
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

function mail_doesnt_exist($mail, $tab)
{
	foreach($tab as $key => $value)
	{
		if ($value['email'] === $mail)
			return (FALSE);
	}
	return true;
}

function get_all_categories($conn)
{
	if (!($res = mysqli_query($conn, "SELECT id, name FROM categories")))
		return false; 
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;
}
?>
