<?php
    global  $avata_post_meta;

	$sidebar = (isset($avata_post_meta['left_sidebar']) && $avata_post_meta['left_sidebar']!="")?$avata_post_meta['left_sidebar']:'';
	 if ( $sidebar && is_active_sidebar( $sidebar ) ){
	 dynamic_sidebar( $sidebar );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }