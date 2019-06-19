<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage astral
 * @version 0.1
 */
?>
<div class="event-right1">
	<div id="sidebar-primary" class="sidebar">
		<?php if ( is_active_sidebar( 'primary' ) ) : 
		
			dynamic_sidebar( 'primary' ); 
			
		endif; ?>
	</div>
</div>
