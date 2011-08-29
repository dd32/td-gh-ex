<?php
/** Chip Life Layout */
add_filter( 'body_class', 'chip_life_layout_body_class' );	
function chip_life_layout_body_class( $existing_classes ) {
	
	/** Classes Array */
	$classes = array();
	
	/** Chip Life Layout Skin Logic */
	$chip_life_layout_skin = get_chip_life_layout_skin();
	if( ! empty( $chip_life_layout_skin ) ) {
		$classes[] = $chip_life_layout_skin;
	}
	
	/** Chip Life Layout Style Logic */
	$chip_life_layout = get_chip_life_layout();
	
	switch( $chip_life_layout ) {
		
		case 'content':
		$classes[] = 'one-column';
		break;
		
		case 'sidebar-content':
		$classes[] = 'two-column';
		$classes[] = 'left-sidebar';
		break;
		
		default:
		$classes[] = 'two-column';
		$classes[] = 'right-sidebar';
		
	}
	
	return array_merge( $existing_classes, $classes );

}

/** Chip Life Layout Skin */
function get_chip_life_layout_skin() {	
	$chip_life_options = get_chip_life_options();
	return $chip_life_options['chip_life_layout_skin'];
}

/** Chip Life Layout Style  */
function get_chip_life_layout() {
	
	/** Setup Cache */
	static $chip_life_layout;	
	if ( ! empty( $chip_life_layout ) ) {
		return $chip_life_layout;
	}
	
	/** Chip Life Layout Style Logic */
	$chip_life_options = get_chip_life_options();
	$chip_life_layout = $chip_life_options['chip_life_layout_style'];
	
	/** Let override by Post/Page Layout */
	global $post;
	if( ! empty( $post ) && ( is_single() || is_page() ) ) {
		
		$chip_life_post_layout_meta = get_post_meta( $post->ID, 'chip_life_post_layout_meta', TRUE );
		if( ! empty( $chip_life_post_layout_meta ) ) {
			$chip_life_layout = $chip_life_post_layout_meta;
		}
	
	}
	
	return $chip_life_layout;	

}
?>