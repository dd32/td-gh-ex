<?php
/*
|------------------------
| Get Left Chip
|------------------------
*/

function get_left_chip($str=""){
	$str = ( empty($str) ) ? "left.php" : "left-".$str.".php" ;
	return $str;
}

/*
|------------------------
| Primary Menu Callback
|------------------------
*/

function primary_menu(){
	 
	 wp_page_menu( array(                 
            'menu_class'		=> 'primary-container',                
     	)
     );

}

/*
|------------------------
| Secondary Menu Callback
|------------------------
*/

function secondary_menu(){
	
	echo '
	<div class="secondary-container">
	  <ul>
	    <li>
		  <a href="#" title="Secondary Menu">Space for Secondary Menu</a>
		</li>
	  </ul>
	</div>';
	
	/*wp_page_menu( array(                 
            'menu_class'		=> 'secondary-container',                
     	)
     );*/
	
}

/*
|------------------------
| Avoid "Undefined Index"
| PHP Error Reporting
| Must be passed by reference
|------------------------
*/

function undefined_index_fix( &$var ) {

	if ( isset( $var ) ) {
		return $var;
	}
	
	return '';
}

/*
|-------------------------
| Plugin: CHIP Get Image - (Subset)
| URl: http://www.tutorialchip.com/chip-get-image/
|-------------------------
*/

function get_post_thumbnail( $args = array() ) {

	/*
	|-------------------------
	| Check for Post Image ID
	|-------------------------
	*/
	
	$post_thumbnail_id = get_post_thumbnail_id( $args['post_id'] );
	if ( empty( $post_thumbnail_id ) ) {
		
		/*
		|-------------------------
		| Image Not Found
		|-------------------------
		*/
		
		return FALSE;
	}

	
	/*
	|-------------------------
	| Image Found
	|-------------------------
	*/
	
	/*
	|-------------------------
	| Apply Filters
	|-------------------------
	*/
	
	$size = apply_filters( 'post_thumbnail_size', $args['size'] );

	/*
	|-------------------------
	| Get Attachment Image
	| return array()
	|-------------------------
	*/
	
	$image = wp_get_attachment_image_src( $post_thumbnail_id, $size );
	
	/*
	|-------------------------
	| Post Excerpt
	|-------------------------
	*/

	$alt = trim( strip_tags( get_post_field( 'post_excerpt', $post_thumbnail_id ) ) );
	
	/*
	|-------------------------
	| Post URl
	|-------------------------
	*/
	
	$posturl = get_permalink( $args['post_id'] );
	
	/*
	|-------------------------
	| Process Output
	|-------------------------
	*/
	
	$output = array(
		"posturl"			=>	$posturl,
		"args"				=>	$args,
		"imageurl"			=>	$image[0],
		'post_thumbnail_id'	=>	$post_thumbnail_id,
		'alt'				=>	$alt,
	);
	
	return $output;
}

?>