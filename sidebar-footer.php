<?php
/* 	COLORFUL Theme's Footer Sidebar Area
	Copyright: 2012, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since COLORFUL 1.0
*/
	
	if (   ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4' )
	)
		return;
		
	// If we get this far, we have widgets. Let do this.
?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
	<?php endif; ?>


