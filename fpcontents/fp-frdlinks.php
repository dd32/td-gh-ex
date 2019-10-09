<?php 
/* 	AssociationX's Front Page Featured Link
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$flinksv = esc_html(associationx_get_option('srflinks', '')); if(!$flinksv) return;
$flinksfrommenu = esc_html(associationx_get_option('flinksfrommenu', ''));

if ( $flinksfrommenu && has_nav_menu( 'flink-menu' ) ): ?>
	<div id="flinks-item">
		<?php  wp_nav_menu( array( 'theme_location' => 'flink-menu', 'menu_id' => 'flinkitemsul', 'menu_class' => 'flinkitems', 'container_class' => 'box90 fpflmenu', 'depth' => 1 )); ?>
		<div class="lsep"></div>
	</div><?php 
endif;