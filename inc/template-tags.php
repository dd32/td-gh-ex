<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package atoz
 */

if ( ! function_exists( 'atoz_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function atoz_posted_on() {
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
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s ', 'post date', 'atoz' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'atoz' ),
		'<div class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></div>'
	);

	echo '<span class="posted-on">' . $posted_on . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'atoz_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function atoz_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'atoz' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'atoz' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'atoz' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'atoz' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'atoz' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'atoz' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'atoz_featured_slider' ) ) :
/**
 * Featured image slider, displayed on front page
 */
function atoz_featured_slider() {
	$firstClass = 'active'; 
	$count = get_theme_mod( 'atoz_slide_number' );
	$slidecat =get_option( 'atoz_slide_categories' );
	$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) ); 
	if ( is_front_page() ) :
	if ($query->have_posts()) :
	  while ($query->have_posts()) : $query->the_post();
    ?>
		<div class="item <?php echo $firstClass; ?>">  
			<?php
			if  ( get_the_post_thumbnail()!='')
			{
			 the_post_thumbnail('atoz_slider'); 
			}?>
			<div class="carousel-caption animated fadeInRight" >
				<div class=" col-md-12 heading">
				<h1><?php the_title();?></h1>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="btn btn-outline-primary"><?php esc_html_e( 'Take a look', 'atoz' ); ?></a> </div>
			</div>
		</div>    
    <?php
        $firstClass = "";
		endwhile;    
		endif;
		wp_reset_postdata();
    endif;
}
endif;