<?php
/*
|--------------------------
| POST Validation
|--------------------------
*/

if ( ! have_posts() ):
	
	locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-notfound.php' ), true, false );

else:

	/*
	|--------------------------
	| POST Style Decision
	|--------------------------
	*/
	
	global $chip_life_global;
	
	if( $chip_life_global['theme_options']['chip_life_post_style'] == "excerpt" ):
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-excerpt.php' ), true, false );
	else:
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-content.php' ), true, false );
	endif;

endif;




?>