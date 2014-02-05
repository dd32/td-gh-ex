<?php
/*
 * The sidebar for displaying widgets in footer.
 */
?>

<div id="sidebar">

	<?php if ( is_active_sidebar( 'footer-right' ) || is_active_sidebar( 'footer-left' ) ) : ?>
		<div class="widgetarea-border"></div>
	<?php endif;?>

	<div class="footer-right"> 

		<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-right' ); ?>

		<?php else : ?> 
			
		<?php endif; ?> 
	</div>

	<div class="footer-left"> 

		<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-left' ); ?>

		<?php else : ?> 
			
		<?php endif; ?> 
	</div>
</div>