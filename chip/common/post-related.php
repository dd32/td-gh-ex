<?php
/*
|--------------------------
| Related POSTs based on tags
|--------------------------
*/

global $post, $chip_life_global;

$tags = wp_get_post_tags( $post->ID );

if( ! empty( $tags ) ):

/*
|--------------------------
| Tags Array
|--------------------------
*/

$tag_ids = array();
foreach( $tags as $individual_tag ) {
	$tag_ids[] = $individual_tag->term_id;
}

/*
|--------------------------
| Related Posts Query
|--------------------------
*/

$showposts = $chip_life_global['theme_options']['chip_life_related_post_number'];
$showposts = ( ! empty ( $showposts ) )? $showposts : 5;

$args=array(
	'tag__in'				=>	$tag_ids,
	'post__not_in'			=>	array($post->ID),
	'showposts'				=>	$showposts,
	'ignore_sticky_posts'	=>	1,
);

$temp = new WP_Query( $args );

if ( $temp->have_posts() ):
?>

<div class="chipboxm1 chipstyle3 margin10b">
  <div class="chipboxm1data">  
    <h2 class="blue margin0">Related Posts</h2>    
  </div>
</div>

<div class="chipboxm1 chipstyle1 margin10b">
  <div class="chipboxm1data">
    <div class="chiprelatedpostswrap">

<?php

/*
|--------------------------
| Begin POST Loop
|--------------------------
*/

while ( $temp->have_posts() ) : $temp->the_post();
	
	/*
	|--------------------------
	| POST Thumbnail Decision
	|--------------------------
	*/
	
	$post_thumbnail = false;
	
	if ( function_exists( 'chip_get_image' ) ) :
		
		$chip_image = chip_get_image();
		
		if ( ! empty( $chip_image['imageurl'] ) ) :			
			
			$post_thumbnail = true;
			$chip_life_global['chip_image'] = $chip_image;			
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-thumbnail-plugin-related.php' ), true, false );
		
		endif;
		
	elseif ( has_post_thumbnail() ) :
	
		$post_thumbnail = true;
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-thumbnail-default-related.php' ), true, false );	
	
	endif;
	
	/*
	|--------------------------
	| POST Without Thumbnail
	|--------------------------
	*/
	
	if ( $post_thumbnail == false ) :	
	
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-simple-related.php' ), true, false );
	
	endif;

endwhile;

?>
    <br class="clear" />
    </div>
  </div>
</div>
<?php
wp_reset_query();
endif; // if ( $temp->have_posts() ):
endif; // if( ! empty( $tags ) ):
?>