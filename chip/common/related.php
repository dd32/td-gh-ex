<?php
/*
|--------------------------
| Related POSTs based on tags
|--------------------------
*/

$tags = wp_get_post_tags($post->ID);

if( !empty($tags) ):

/*
|--------------------------
| Tags Array
|--------------------------
*/

$tag_ids = array();
foreach($tags as $individual_tag) {
	$tag_ids[] = $individual_tag->term_id;
}

/*
|--------------------------
| Related Posts Query
|--------------------------
*/

$showposts = get_option( $theme_options['c53']['id'] );
$showposts = ($showposts != "")? $showposts : 5;

$args=array(
	'tag__in'			=>	$tag_ids,
	'post__not_in'		=>	array($post->ID),
	'showposts'			=>	$showposts,
	'caller_get_posts'	=>	1,
);

$temp = new WP_Query($args);

if ($temp->have_posts()):
?>

<div class="chipboxm1 chipstyle3 margin10b">
  <div class="chipboxm1data">  
    <h2 class="blue margin0">Related Posts</h2>    
  </div>
</div>

<?php
/*
|--------------------------
| Begin POST Loop
|--------------------------
*/

while ($temp->have_posts()) : $temp->the_post();

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

/*
|--------------------------
| Reset POST Query
|--------------------------
*/

wp_reset_query();
endif;
?>