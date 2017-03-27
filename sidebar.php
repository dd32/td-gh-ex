<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage beetech
 */
?>
    <aside id="secondary" class="right-sidebar widget-area" role="complementary">
    	<?php 
    		if ( ! is_active_sidebar( 'beetech_right_sidebar' ) ) { return; }
    			dynamic_sidebar( 'beetech_right_sidebar' ); 
    	?>
    </aside><!-- #secondary -->