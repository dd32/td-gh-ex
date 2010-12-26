<?php
/*
|--------------------------
| Begin POST Loop
|--------------------------
*/

if (have_posts()):
while (have_posts()) : the_post();

/*
|--------------------------
| POST Manipulation
|--------------------------
*/

$postcat = get_the_category();

$post_class_array = get_post_class();
$post_class = '';
foreach( $post_class_array as $val ) {
	$post_class .= $val . " ";
}

/*
|--------------------------
| Post Thumbnail Logic
| Plugin: Chip Get Image vs Post Thumbnail
|--------------------------
*/

if( function_exists( "chip_get_image" ) ) {
	
	$chip_image = chip_get_image();
	/* chip_get_print( $chip_image ); */

} else {

	$args = array(
			'post_id'	=>	$post->ID,
			'size'		=>	'thumbnail',
			);
	$chip_image = get_post_thumbnail( $args );
	/* chip_get_print( $chip_image ); */
		
}

/*
|--------------------------
| POST Panel
|--------------------------
*/

if( !empty( $chip_image['imageurl'] ) ) {	
		
	require(COMMON_FSROOT . 'post-thumb.php');	

} else {
	
	require(COMMON_FSROOT . 'post-simple.php');

}

/*
|--------------------------
| End POST Loop
|--------------------------
*/
	
endwhile;
endif;
?>