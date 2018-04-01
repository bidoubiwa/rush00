<?php 

	$menu_cat = get_all_categories($conn);
?>
	<div id="banniere_menu">
		<div id="menu">
	<?php 
		foreach ($menu_cat as $cat)
		{ ?>
		<a href="cat.php?id=<?= $cat["id"]?>" class="button_menu" 
			id="<?= strtoupper($cat["name"]) ?>"><?= strtoupper($cat["name"]) ?></a>
		<?php } ?>	
		</div>
	</div>

