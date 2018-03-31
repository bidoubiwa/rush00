<?php
	if (count($errors))
	{	?>		
			<div class="errors"><?php
				foreach ($errors as $error)
					echo "$error <br/>"; ?>
			</div>
<?php 
}	?>

