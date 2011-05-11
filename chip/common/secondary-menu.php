<!-- Begin Secondary Menu -->
<?php
/*
|------------------------
| Secondary Menu Logic
|------------------------
*/

$secondary_menu = NULL;

if ( function_exists( 'wp_nav_menu' ) ) {

$secondary_menu = wp_nav_menu( array ( 
						
					'container'       	=> 'div', 
					'container_class' 	=> 'secondary-container', 
					'theme_location'	=> 'secondary-menu',
					'menu_class'		=> 'sf-menu2',
					'depth'				=> 0,
					'echo'            	=> false,
					'fallback_cb'		=> 'secondary_menu',
					
					)
				);
		
}

if( !empty( $secondary_menu ) ):
?>
<div class="secondarymenubox">
  <div class="secondarymenuboxdata">            
    <?php echo $secondary_menu; ?>
	<br class="clear" />
  </div>
</div>
<?php
endif;
?>
<!-- End Secondary Menu -->