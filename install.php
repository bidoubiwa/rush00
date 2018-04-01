<?php

echo "test";
if (!$conn = mysqli_connect("localhost","root","arobion"))
	echo "AAA";
else
	echo "Connecte <br>";

if (mysqli_query($conn, "CREATE DATABASE `db_kit` CHARACTER SET 'utf8'"))
	echo "BDD creee";
else
	echo "toujours pas  BDD<br>";

mysqli_query($conn, "USE db_kit");
$sql = "CREATE TABLE architecture (id_article INT NOT NULL, id_categorie INT NOT NULL )";
if (mysqli_query($conn, $sql)) 
	echo "Table architecture created successfully<br>";
else
	echo "pas reussi";

$sql = "CREATE TABLE articles (id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(50) NOT NULL, price int(11) NOT NULL, image text NOT NULL, stock INT NOT NULL DEFAULT '10')";
if (mysqli_query($conn, $sql)) 
	echo "Table articles created successfully<br>";

$sql = "CREATE TABLE categories (id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(50) NOT NULL, image text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($conn, $sql)) 
	echo "Table categories created successfully<br>";

$sql = "CREATE TABLE panier (id_user int(11) NOT NULL,id_article int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($conn, $sql)) 
	echo "Table panier created successfully<br>";

$sql = "CREATE TABLE achat (id_user int(11) NOT NULL,id_article int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($conn, $sql)) 
	echo "Table achat created successfully<br>";

$sql = "CREATE TABLE users (id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(30) NOT NULL, email varchar(150) NOT NULL, lastname varchar(50) NOT NULL, password text NOT NULL, acces int(11) NOT NULL DEFAULT '0' COMMENT '0: simple user. 1: admin' ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($conn, $sql)) 
	echo "users created successfully<br>";

$users = [];
$admin = hash("whirlpool", "123");
$user = hash("whirlpool", "123");
$users[] = "INSERT INTO users (name, lastname,email, password, acces) VALUES ('admin','Monsieur', 'admin@admin.fr', '" . $admin . "' , 1)";
$users[] = "INSERT INTO users (name, lastname,email, password, acces) VALUES ('user','Monsieur', 'user@user.fr' , '" .  $user . "' , 0)";
foreach ($users as $user)
{
	if (mysqli_query($conn, $user)) 
		echo "users created successfully<br>";
	else
		echo "User not added<br>";
}
$cat = "INSERT INTO categories (name, image) VALUES ('Alcool', ''), ('Nouriture', ''),  ('Fun', ''),  ('Pack', '');";
if (mysqli_query($conn, $cat)) 
	echo "Categories created successfully<br>";

$articles = [];
$articles[] = "INSERT INTO articles (id, name, price, image, stock) VALUES (NULL, 'Vodka', '15', 'ressources/images/crystal.jpeg', '10')";
$articles[] = "INSERT INTO articles (id, name, price, image, stock) VALUES (NULL, 'Biere', '5', 'ressources/images/biere.jpeg', '10')";
$articles[] = "INSERT INTO articles (id, name, price, image, stock) VALUES (NULL, 'Burger', '15', 'ressources/images/burger.jpeg', '10'), (NULL, 'Confetti', '3', 'ressources/images/confettis.jpeg', '10')";
$articles[] = "INSERT INTO articles (id, name, price, image, stock) VALUES (NULL, '6 Pack de Biere', '10', 'ressources/images/sixpack.jpeg', '10'), (NULL, 'Tequila', '12', 'ressources/images/tequila.jpeg', '10') ,(NULL, 'Capote', '9', 'ressources/images/capotes.jpeg', '5'), (NULL, 'Chips', '2', 'ressources/images/chips.jpeg', '10')";
foreach ($articles as $art)
{
	if (mysqli_query($conn, $art)) 
		echo "Article created successfully<br>";
}

$cat = [];
$cat[] = "INSERT INTO architecture (id_article, id_categorie) VALUES ('1', '1'), ('2', '1'), ('3', '1'), ('5','1'), ('6', '1')";
$cat[] = "INSERT INTO architecture (id_article, id_categorie) VALUES ('3', '2'), ('8', '2')";
$cat[] = "INSERT INTO architecture (id_article, id_categorie) VALUES ('7', '3'), ('4', '3'), ('5', '4'), ('7', '4')";
foreach ($cat as $c)
{
	if (mysqli_query($conn, $c)) 
		echo "Links between Articles and Categories successfully<br>";
}
mysqli_close($conn);
?>
