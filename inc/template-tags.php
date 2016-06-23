<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package beka
 */

if ( ! function_exists( 'beka_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function beka_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'beka' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( ' %s', 'post author', 'beka' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on"><span class="byline"><span class="ti-user"></span> ' . $byline . '</span><span class="post-date"><span class="ti-calendar"></span>' . $posted_on . '</span></span>'; // WPCS: XSS OK.
    
    echo '<span class="comments-link">';
	echo '<span class="icon-comments"><span class="ti-comment"></span></span>';
	comments_popup_link( esc_html__( 'No Comments', 'beka' ), esc_html__( '1', 'beka' ), esc_html__( '%', 'beka' ) );
	echo '</span>';

}
endif;

if ( ! function_exists( 'beka_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function beka_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'beka' ) );
		if ( $categories_list && beka_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'beka' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'beka' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'beka' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'beka' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'beka' ),
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
function beka_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'beka_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'beka_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so beka_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so beka_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in beka_categorized_blog.
 */
function beka_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'beka_categories' );
}
add_action( 'edit_category', 'beka_category_transient_flusher' );
add_action( 'save_post',     'beka_category_transient_flusher' );

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kubeblog
 */

if ( ! function_exists( 'beka_related_posts' ) ) :
/**
 * Display related posts below posts.
 *
 */
function beka_related_posts() {
    global $kubeblog_options;
    global $post;
    $empty_taxonomy = false;
    $categories = get_the_category($post->ID); 
    if (empty($categories)) { 
        $empty_taxonomy = true;
    } else {
        $category_ids = array(); 
        foreach($categories as $individual_category) 
            $category_ids[] = $individual_category->term_id; 
        $args = array( 'category__in' => $category_ids, 
            'post__not_in' => array($post->ID), 
            'posts_per_page' => 2,  
            'ignore_sticky_posts' => 1,
        );
    }
    
    if (!$empty_taxonomy) {
    $my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
        echo '<div class="related-posts">';
        echo '<h4>'.__('Related Posts','beka').'</h4>';
        echo '<ul>';
        while( $my_query->have_posts() ) { $my_query->the_post(); ?>
        <li>
            <div class="related-content">
                <div class="excerpt">
                    <header>
                        <h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php the_title(); ?></a></h2>
                    </header>
                    <?php
                        $categories_list = get_the_category_list( __( ', ', 'beka' ) );
                        if ( $categories_list && beka_categorized_blog() ) {
                            printf( '<span class="cat-links">' . __( 'In "%1$s"', 'beka' ) . '</span>', $categories_list );
                        }
                    ?>
                </div>
            </div>
        </li>
        <?php } echo '</ul></div>'; }} wp_reset_query(); ?>
	<?php
}
endif;