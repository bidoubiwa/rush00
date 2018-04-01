<?php
include("inc.php");
$previous =  $_SERVER['HTTP_REFERER'];
if ($_GET["add"] != "")
{
	$id = intval($_GET["add"]);
	if ($_SESSION["id"] != 0)
	{
		add_panier_to_db($_SESSION["id"], $id, $conn);
		header("Location: $previous");
	}	
	else
	{
		$exist = false;
		foreach ($_SESSION["panier"] as $key => $panier)
		{
			if ($panier["id"] == $id)
			{
				$exist = true;
				$_SESSION["panier"][$key]["quant"]++;
			}
		}

		if (!$exist)
		{
			$_SESSION["panier"][] = ["id" => $id, "quant" => 1]; 
		}
		header("Location: $previous");
	}
}
else
	header("Location: $previous");
?>
