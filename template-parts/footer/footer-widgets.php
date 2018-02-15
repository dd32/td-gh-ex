<?php
/**
 * Displays footer widgets if assigned
 */
?>

<div class="footersec">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-1');?>
	        </div>
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-2');?>
	        </div>
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-3');?>
	        </div> 
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-4');?>
	        </div>        
		</div>
	</div>
</div>