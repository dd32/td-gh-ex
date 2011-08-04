<?php
/** Chip Life Post Related */
function chip_life_post_related_single_init() {
	
	$chip_life_options = get_chip_life_options();	
	if ( ! is_single() || $chip_life_options['chip_life_related_post'] == 0 ) {
		return;
	}
	
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	
	if( empty( $tags ) ) {
		return;
	}
	
	/** Tags Array */
	$tag_ids = array();
	foreach( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}
	
	/** Build Custom Query */
	$showposts = $chip_life_options['chip_life_related_post_number'];	
	$showposts = ( ! empty ( $showposts ) )? $showposts : 3;

	$args = array(
		'tag__in' => $tag_ids,
		'post__not_in' => array( $post->ID ),
		'showposts' => $showposts,
		'orderby' => 'rand',
		'ignore_sticky_posts' => 1,
	);
	
	/** Chip Life Post Related Loop */
	chip_life_post_related_loop_init( $args );
	
}

/** Chip Life Post Related Loop */
function chip_life_post_related_loop_init( $args ) {
	
	$custom_query = new WP_Query( $args );	
	
	if ( $custom_query->have_posts() ):	
	?>
    
    <div id="post-related">
      
	  <?php echo apply_filters( 'chip_life_title_related_posts_text', '<h2 id="post-related-title">Related Posts</h2>' ); ?>
    
    <?php
	while ( $custom_query->have_posts() ) : $custom_query->the_post();	
	?>
    
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="post-related-image">            
            <?php
            $img = chip_life_get_image( array( 'format' => 'html', 'size' => 'thumbnail', 'attr' => array( 'class' => 'post-image' ) ) );
			if( empty( $img ) ){
				echo '<img src="'.PARENT_URL.'/images/chip-life-default-image.png" width="150" height="150" class="post-image" />';
			}
			printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
			?>            
        </div> <!-- end .post-related-image -->
        
		<div class="post-related-title">
        	<?php
            $title = substr( get_the_title(), 0, 25 ) . '...';
			printf( '<h3 class="entry-title"><a href="%s" title="%s" rel="bookmark">%s</a></h3>', get_permalink(), the_title_attribute( 'echo=0' ), $title );
			?>
        </div> <!-- end .post-related-title -->
            
      </div> <!-- end .postclass -->    

<?php	
	endwhile;	
	/** restore original query **/
	wp_reset_query();
?>
    
      <div class="clear"></div>
    </div> <!-- end #post-related -->
    
<?php    	
	endif;	
}
?>