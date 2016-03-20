<?php
/**
 * Custom template tags for Aguafuerte
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.01
 */

if ( ! function_exists( 'aguafuerte_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Aguafuerte 1.0.1
 */
function aguafuerte_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'aguafuerte' ) . '</span>';
	}

	// Set up and print post meta information.
	print(__('By ', 'aguafuerte'));
	printf( '<span class="byline"><a href="%1$s" rel="author">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
	printf( '<span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);	
}
endif;


if ( ! function_exists( 'aguafuerte_related_posts' ) ) :
/**
 * Retrieves the related posts to an individual posts by tag.
 *
 * @since Aguafuerte 1.0.1
 */
function aguafuerte_related_posts($post) {
	$orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    //echo '<pre>';print_r($tags);echo '</pre>'; echo '<br>';
     
    if ($tags):
    	$tag_ids = array();
    	foreach ($tags as $tag):
    		$tag_ids[] = $tag->term_id;
    	endforeach;

	    $args = array(
	    	'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page' => 4, // Number of related posts to display.
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
				array(
					'taxonomy' =>  'post_format',
					'field' => 'slug',
					'terms' => array(
						'post-format-quote',
						'post-format-aside',
						'post-format-status',
						'post-format-chat',
						'post-format-link',
						),
					'operator' => 'NOT IN',
					),),);

	    $query = new wp_query( $args );
	    if($query->have_posts()):?>
			<section class="related-posts">
				<h3><?php printf(__('Related articles', 'aguafuerte')); ?></h3>
				<div class="related-thumbs flex-container">
	    <?php
	    	while( $query->have_posts() ):
				$query->the_post();
				if (has_post_thumbnail()):
					printf('<div class="related-thumb"><a href="%1$s">%2$s %3$s</a></div>',
						esc_url( get_permalink() ), get_the_post_thumbnail(), get_the_title() );
				else: echo 'the query tiene posts sin foto.'; the_title(); // Aca hay que hacer un generic thumbnail que se llene con el titulo.
	    		endif;
	    	endwhile;?>

	    	</div><!-- .related-thumbs .flex-container -->
			</section><!-- .related-posts -->
<?php 	endif; 
    			
	endif; //$tags
    	$post = $orig_post;
    	wp_reset_postdata();
}
endif;

if ( ! function_exists( 'aguafuerte_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Aguafuerte 1.0
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function aguafuerte_excerpt_more( $more ) {
	if ( ! is_single() || is_dynamic_sidebar()){
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'More %s <span class="meta-nav">&rarr;</span>', 'aguafuerte' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
	}
}
add_filter( 'excerpt_more', 'aguafuerte_excerpt_more' );
endif;


/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function aguafuerte_excerpt_length( $length ) {
   return 20;
}

add_filter( 'excerpt_length', 'aguafuerte_excerpt_length', 999 );

