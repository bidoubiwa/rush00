
<div class"logs">
<?php
if (count($errors) != 0)
{	?>		
		<div class="errors"><?php
		foreach ($errors as $error)
			echo " -  $error <br/>"; ?>
		</div>
<?php
}
if (count($success) != 0)
{ ?>
	<div class="success"><?php
			foreach ($succes as $suc)
				echo " -  $suc <br/>"; ?>
	</div>
<?php
}
?>
</div>
