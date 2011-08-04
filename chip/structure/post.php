<?php
/**
 * Chip Life Post Formats
 */
add_action( 'chip_life_post_wrap_before', 'chip_life_post_formats_init' );
function chip_life_post_formats_init() {
	
		$post_format = get_post_format();
		$post_format = ( is_singular() )? '' : $post_format ;
		
		switch( $post_format ) {
			
			case 'aside';
			case 'link':
			case 'status':			
			do_action( 'chip_life_post_format_reset' );
			do_action( 'chip_life_post_format_aside' );
			break;
			
			case 'gallery';			
			do_action( 'chip_life_post_format_reset' );
			do_action( 'chip_life_post_format_gallery' );
			break;
			
			case 'image';
			do_action( 'chip_life_post_format_reset' );
			do_action( 'chip_life_post_format_image' );
			break;
			
			default:
			do_action( 'chip_life_post_format_reset' );
			
		}
}

/** Chip Life Post Format Reset */
add_action( 'chip_life_post_format_reset', 'chip_life_post_format_reset_init' );	
function chip_life_post_format_reset_init() {
	
	/** Remove All Hooks Except Standard Hooks */
	remove_action( 'chip_life_post_content_after', 'chip_life_post_info_init' );
	remove_action( 'chip_life_post_content_after', 'chip_life_post_meta_init' );
	
	/** Load Standard Format */
	do_action( 'chip_life_post_format_standard' );			
	
}

/** Chip Life Post Format: Standard */
add_action( 'chip_life_post_format_standard', 'chip_life_post_format_standard_init' );	
function chip_life_post_format_standard_init() {
	
	/** Standard Format */
	add_action( 'chip_life_post_title_before', 'chip_life_post_format_indicator_init' );	
	add_action( 'chip_life_post_title', 'chip_life_post_title_init' );	
	add_action( 'chip_life_post_title_after', 'chip_life_post_info_init' );
	add_action( 'chip_life_post_title_after', 'chip_life_sponsor_sidebar2_single_init' );
	
	add_action( 'chip_life_post_content', 'chip_life_post_image_init' );
	add_action( 'chip_life_post_content', 'chip_life_post_content_standard_init' );
	add_action( 'chip_life_post_content_after', 'chip_life_post_pages_init' );
	add_action( 'chip_life_post_content_after', 'chip_life_post_meta_init' );	
	
	add_action( 'chip_life_post_wrap_after', 'chip_life_post_related_single_init' );	
	add_action( 'chip_life_post_wrap_after', 'chip_life_post_author_box_single_init' );
	add_action( 'chip_life_post_wrap_after', 'chip_life_comments_template_single_init' );	
	
	add_action( 'chip_life_while_after', 'chip_life_posts_navigation_init' );
	add_action( 'chip_life_have_posts_else_before', 'chip_life_post_not_found_init' );		
	
}

/** Chip Life Post Format: Aside */
add_action( 'chip_life_post_format_aside', 'chip_life_post_format_aside_init' );	
function chip_life_post_format_aside_init() {
	
	/** Remove Other Hooks */				
	remove_action( 'chip_life_post_title', 'chip_life_post_title_init' );
	remove_action( 'chip_life_post_title_after', 'chip_life_post_info_init' );
	remove_action( 'chip_life_post_content', 'chip_life_post_image_init' );
	remove_action( 'chip_life_post_content_after', 'chip_life_post_meta_init' );
	
	/** Aside Hooks */
	add_action( 'chip_life_post_content_after', 'chip_life_post_info_init' );			
	
}

/** Chip Life Post Format: Gallery */
add_action( 'chip_life_post_format_gallery', 'chip_life_post_format_gallery_init' );	
function chip_life_post_format_gallery_init() {
	
	/** Remove Other Hooks */				
	remove_action( 'chip_life_post_content', 'chip_life_post_image_init' );	
	
}

/** Chip Life Post Format: Image */
add_action( 'chip_life_post_format_image', 'chip_life_post_format_image_init' );	
function chip_life_post_format_image_init() {
	
	/** Remove Other Hooks */				
	remove_action( 'chip_life_post_title_after', 'chip_life_post_info_init' );
	remove_action( 'chip_life_post_content_after', 'chip_life_post_meta_init' );	
	remove_action( 'chip_life_post_content', 'chip_life_post_image_init' );
	
	/** Image Hooks */
	add_action( 'chip_life_post_content_after', 'chip_life_post_info_init' );
	add_action( 'chip_life_post_content_after', 'chip_life_post_meta_init' );		
	
}

/**
 * Chip Life Post Functions
 */
 

/** Chip Life Post Format Indicator */
function chip_life_post_format_indicator_init() {

	/** Do nothing if post formats aren't supported */
	if ( ! current_theme_supports( 'post-formats' ) || is_singular() ) {
		return;
	}
	
	/** Get post format */
	$post_format = get_post_format();
	
	if( ! empty( $post_format ) ) {
		echo '<span class="entry-format">'. ucfirst ( $post_format ).'</span>';
	}

}

/** Chip Life Post Title */
function chip_life_post_title_init() {
	
	$title = get_the_title();
	
	if ( empty( $title ) ) {
	return;
	}
	
	if ( is_singular() ) {		
		$title = sprintf( '<h1 class="entry-title">%s</h1>', apply_filters( 'chip_life_post_title_text', $title ) );
	} else {
		$title = sprintf( '<h1 class="entry-title"><a href="%s" title="%s" rel="bookmark">%s</a></h1>', get_permalink(), the_title_attribute( 'echo=0' ), apply_filters( 'chip_life_post_title_text', $title ) );
	}
	
	echo apply_filters( 'chip_life_post_title_output', $title );		
}

/** Chip Life Post Image */
function chip_life_post_image_init() {
	
	$chip_life_options = get_chip_life_options();
	if ( ! is_singular() && $chip_life_options['chip_life_featured_image'] != 'none' ) {
		$img = chip_life_get_image( array( 'format' => 'html', 'size' => $chip_life_options['chip_life_featured_image'], 'attr' => array( 'class' => 'post-image' ) ) );
		printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
	}			

}

/** Chip Life Post Content: Standard */
function chip_life_post_content_standard_init() {
	
	$chip_life_options = get_chip_life_options();
	$post_format = get_post_format();
	
	if ( is_singular() || post_password_required() || $post_format == 'aside' || $post_format == 'image' || $post_format == 'link' || $post_format == 'quote' ) {			
		
		the_content();		
	
	}
	
	else if( $post_format == 'gallery' ) {
		
		do_action( 'chip_life_post_format_gallery_cb' );
		
	}
	
	else if( $post_format == 'status' ) {
		
		do_action( 'chip_life_post_format_status_cb' );
		
	}
	
	else if ( $chip_life_options['chip_life_post_style'] == 'excerpt' ) {
		
		the_excerpt();		
	
	}		
	
	else {
		
		the_content();		
	
	}

}

/** Chip Life Post Format Gallery Callback */
add_action( 'chip_life_post_format_gallery_cb', 'chip_life_post_format_gallery_cb_init' );
function chip_life_post_format_gallery_cb_init() {
	
	global $post;
	
	$img = chip_life_get_image( array( 'format' => 'html', 'size' => 'thumbnail', 'attr' => array( 'class' => 'post-image' ) ) );
	printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
	
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	$total_images = 0;
	if( ! empty( $images ) ) {
		$total_images = count( $images );
	}
	
	$string = 'This gallery contains ' . $total_images . ' photos.';	
	echo $title = sprintf( '<p><a href="%s" title="%s" rel="bookmark">%s</a></p>', get_permalink(), the_title_attribute( 'echo=0' ), $string );
	the_excerpt();
		
}

/** Chip Life Post Format Status Callback */
add_action( 'chip_life_post_format_status_cb', 'chip_life_post_format_status_cb_init' );
function chip_life_post_format_status_cb_init() {
	
	global $post;
	
	echo '<div class="entry-avatar">' . get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'chip_life_status_avatar', '65' ) ) . '</div>';
	the_content();
		
}

/** Chip Life Post Pages */
function chip_life_post_pages_init() {	
	wp_link_pages( array( 'before' => '<p class="pages">', 'after' => '</p>' ) );				
}

/** Chip Life Post Not Found */
function chip_life_post_not_found_init() {	
	chip_life_post_not_found();
}

/** Chip Life Post Not */
function chip_life_post_not_found() {
?>
<div class="post">  
  <h1 class="entry-title">Not Found</h1>
  <div class="entry-content">	  
      <?php if( is_search() ): ?>
      <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
      <?php else: ?>
      <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
      <?php endif; ?>
      <p><?php get_search_form(); ?></p>
  <div class="clear"></div>
  </div><!-- end .entry-content -->  
</div>
<?php
}

/** Chip Life Post Info */
add_filter( 'chip_life_post_info', 'do_shortcode', 20 );
function chip_life_post_info_init() {
	
	/** No need of post-info on pages */
	if ( 'post' != get_post_type() ) {		
		
		$chip_life_post_info = '[chip_life_post_edit]';
		printf( '<div class="post-info">%s</div>', apply_filters( 'chip_life_post_info', $chip_life_post_info ) );
	
	} else {

		$chip_life_post_info = '[chip_life_post_date] [chip_life_post_author_posts_link] [chip_life_post_comments] [chip_life_post_edit]';
		printf( '<div class="post-info">%s</div>', apply_filters( 'chip_life_post_info', $chip_life_post_info ) );
	
	}
				
}

/** Chip Life Post Meta */
add_filter( 'chip_life_post_meta', 'do_shortcode', 20 );
function chip_life_post_meta_init() {
	
	/** No need of post-info on pages */
	if ( 'post' != get_post_type() ) {
		return;
	}
	
	$chip_life_post_meta = '[chip_life_post_categories] [chip_life_post_tags]';
	printf( '<div class="post-meta">%s</div>', apply_filters( 'chip_life_post_meta', $chip_life_post_meta ) );
				
}

/** Chip Life Post Author Box Single */
function chip_life_post_author_box_single_init() {
	
	$chip_life_options = get_chip_life_options();	
	
	if ( ( is_single() || is_page() ) && $chip_life_options['chip_life_authorbox'] == 1 ) {
		chip_life_author_box( 'single' );
	}	
				
}

/** Chip Life Author box */
function chip_life_author_box( $context = '' ) {

	global $authordata;
	$authordata = is_object( $authordata ) ? $authordata : get_userdata( get_query_var( 'author' ) );

	$gravatar_size = apply_filters( 'chip_life_author_box_gravatar_size', '70', $context );
	$gravatar = get_avatar( get_the_author_meta('email'), $gravatar_size );
	$title = apply_filters( 'chip_life_author_box_title', sprintf( '<strong>%s %s</strong>', 'About', get_the_author() ), $context );
	$description = wpautop( get_the_author_meta( 'description' ) );

	/** The author box markup, contextual. */
	$pattern = $context == 'single' ? '<div class="author-box"><div>%s %s<br />%s</div><div class="clear"></div></div><!-- end .author-box-->' : '<div class="author-box">%s<h1>%s</h1><div>%s</div><div class="clear"></div></div><!-- end .author-box-->';
	echo apply_filters( 'chip_life_author_box_output', sprintf( $pattern, $gravatar, $title, $description ), $context, $pattern, $gravatar, $title, $description );

}

/** Chip Life Posts Navigation */
function chip_life_posts_navigation_init() {	
	
	global $wp_query;
	
	if ( $wp_query->max_num_pages > 1 ) :
	
		if ( function_exists( 'wp_pagenavi' ) ):
			chip_life_wp_pagenavi_navigation();
		else:
			chip_life_prev_next_posts_navigation();
		endif;
	
	endif;
				
}

/** Chip Life Wp-Pagenavi Plugin Support */
function chip_life_wp_pagenavi_navigation() {

	ob_start();
	wp_pagenavi();
	$pagination = ob_get_clean();

	$nav = '<div class="pages navigation-wp-pagenavi">' . $pagination . '<div class="clear"></div></div><!-- end .navigation -->';
	echo $nav;
}

/** Chip Life Prev Next Posts Navigation */
function chip_life_prev_next_posts_navigation() {

	$prev_link = get_previous_posts_link( apply_filters( 'chip_life_prev_link_text', '&laquo; Previous Page' ) );
	$next_link = get_next_posts_link( apply_filters( 'chip_life_next_link_text', 'Next Page &raquo;' ) );

	$prev = $prev_link ? '<div class="alignleft">' . $prev_link . '</div>' : '';
	$next = $next_link ? '<div class="alignright">' . $next_link . '</div>' : '';

	$nav = '<div class="navigation">' . $prev . $next . '<div class="clear"></div></div><!-- end .navigation -->';

	if ( !empty( $prev ) || !empty( $next ) ) {
		echo $nav;
	}
}

/** Chip Life Sponsor Sidebar2 Single */
function chip_life_sponsor_sidebar2_single_init() {
	
	if ( ! is_single() || ! is_active_sidebar( 'sponsor-sidebar2' ) ) {
		return;
	}
	chip_life_sponsor_sidebar2_init();
				
}
?>