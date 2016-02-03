<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bellini
 */

/**
 * Prints HTML with meta information for the categories
 */
function bellini_category() {

	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( '  |   ', 'bellini' ) );
		if ( $categories_list && bellini_categorized_blog() ) {
			printf( '<span class="post-meta__category category" rel="tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
}

/**
 * Prints HTML with meta information for the Tags
 */
function bellini_post_tag() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'bellini' ) );
		if ( $tags_list ) {
			printf( '<span class="post-meta__tag__item" rel="category tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}


function bellini_published_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string =
		'<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>
		<time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'bellini' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="post-meta__time">' . $posted_on . '</span>';
}

function bellini_comment_count(){
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'bellini' ), esc_html__( '1 Comment', 'bellini' ), esc_html__( '% Comments', 'bellini' ) );
			echo '</span>';
		}
}




/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bellini_post_author() {

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'bellini' ),
		'<span class="fn n post-meta__author " itemprop="name">
			<a class="post-meta__author__link" itemprop="url" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>
		</span>'
	);

	echo '<p class="vcard author post-meta__author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"> ' . $byline . '</p>';
}


if ( ! function_exists( 'bellini_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bellini_edit_content() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'bellini' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;






/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bellini_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bellini_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bellini_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bellini_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bellini_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bellini_categorized_blog.
 */
function bellini_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bellini_categories' );
}
add_action( 'edit_category', 'bellini_category_transient_flusher' );
add_action( 'save_post',     'bellini_category_transient_flusher' );


function bellini_post_thumbnail(){
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('bellini-thumb', array('class' => 'img-respponsive blog__post__image', 'itemprop' => 'image'));
		}else{?>
			<img itemprop="image" src="<?php if (get_theme_mod( 'bellini_post_featured_image' )) : echo get_theme_mod( 'bellini_post_featured_image'); else: echo get_template_directory_uri() . '/images/featured-image.jpg'; endif; ?>" class="img-responsive blog__post__image" alt="<?php the_title(); ?>" />
		<?php }
}


// Numbered Pagination
if ( ! function_exists( 'bellini_pagination' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function bellini_pagination() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'bellini' ),
		'next_text' => __( 'Next &rarr;', 'bellini' ),
		'type'      => 'list',
	) );

	if ( $links ) :?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'bellini' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

?>
