<?php
if ( ! is_active_sidebar( 'default_sidebar' ) ) {
	return;
}
?>

<aside id="sidebar" class="alignright col-md-3">
  <?php dynamic_sidebar( 'default_sidebar' ); ?>          
                
</aside>