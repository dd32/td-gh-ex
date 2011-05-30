<?php
/*
|--------------------------
| Begin POST Loop
|--------------------------
*/

while ( have_posts() ) : the_post();
	
	/*
	|--------------------------
	| POST Thumbnail Decision
	|--------------------------
	*/
	
	$post_thumbnail = false;
	
	if ( function_exists( 'chip_get_image' ) ) :
		
		$chip_image = chip_get_image();
		
		if ( ! empty( $chip_image['imageurl'] ) ) :			
			
			global $chip_life_global;
			$post_thumbnail = true;
			$chip_life_global['chip_image'] = $chip_image;			
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-thumbnail-plugin.php' ), true, false );
		
		endif;
		
	elseif ( has_post_thumbnail() ) :
	
		$post_thumbnail = true;
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-thumbnail-default.php' ), true, false );	
	
	endif;
	
	/*
	|--------------------------
	| POST Without Thumbnail
	|--------------------------
	*/
	
	if ( $post_thumbnail == false ) :	
	
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-simple.php' ), true, false );
	
	endif;

endwhile;
?>