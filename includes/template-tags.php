<?php

if ( ! function_exists( 'promax_post_image' ) ) :
/**
 * Displays the featured image on archive posts.
 *
 * @param string $size Post thumbnail size.
 * @param array  $attr Post thumbnail attributes.
 */
function promax_post_image( $size = 'defaultthumb', $attr = array() ) {

	// Display Post Thumbnail.
	if ( has_post_thumbnail() ) : ?>
<div class="thumbnail">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_post_thumbnail( $size, $attr ); ?>
		</a>
</div>
	<?php endif;

} // promax_post_image()
endif;
		
if ( ! function_exists( 'promax_meta_author' ) ) :
/**
 * Displays the post author
 */
function promax_meta_author() {

	$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( esc_html__( 'View all posts by %s', 'promax' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);

	return '<span class="meta-author"> ' . $author_string . '</span>';

}  // promax_meta_author()
endif;		
		
if ( ! function_exists( 'promax_meta_date' ) ) :
/**
 * Displays the post date
 */
function promax_meta_date() {

	$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	return '<span class="meta-date">' . $time_string . '</span>';

}  // promax_meta_date()
endif;

function promax_post_meta_data() {
	printf( __( '%2$s  %4$s', 'promax' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<time class="timestamp published updated">%3$s</time>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'promax' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}



if ( ! function_exists( 'promax_post_navigation' ) ) :
/**
 * Displays Single Post Navigation
 */
function promax_post_navigation() {
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html_x( 'Previous Post:', 'post navigation', 'promax' ) . '</span>%title',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Post:', 'post navigation', 'promax' ) . '</span>%title',
		) );
}
endif;


if ( ! function_exists( 'promax_site_logo' ) ) :
/**
 * Displays the site logo in the header area
 */
function promax_site_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {

		the_custom_logo();

	}

}
endif;


if ( ! function_exists( 'promax_site_title' ) ) :
/**
 * Displays the site title in the header area
 */
function promax_site_title() {


	if ( is_front_page() && is_home() ) : ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	<?php else : ?>

		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

	<?php endif;

}
endif;

if ( ! function_exists( 'promax_site_description' ) ) :
/**
 * Displays the site description in the header area
 */
function promax_site_description() {


	$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

	if ( $description || is_customize_preview() ) : ?>

		<p class="site-description"><?php echo $description; ?></p>

	<?php
	endif;

}
endif;

if ( ! function_exists( 'promax_entry_tags' ) ) :
/**
 * Displays the post tags on single post view
 */
function promax_entry_tags() {

if(get_the_tag_list()) {
	// Get tags.
	$tag_list = get_the_tag_list( '', '' );

 ?>

		<div class="entry-tags clearfix">
			<span class="tags">
				<?php echo $tag_list; ?>
			</span>
		</div><!-- .entry-tags -->

	<?php
}

} // promax_entry_tags()
endif;
/*
* Seach Form
*/

function promax_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:','promax' ) . '</label>
	<input type="text" placeholder="'. esc_attr__( 'Search..','promax' ) .'" value="' . get_search_query() . '" name="s" id="s" />
	<button type="submit" id="searchsubmit" class="input-group-button button"><i class="fa fa-search"></i></button>
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'promax_search_form' );


if ( ! function_exists( 'promax_excerpt_org' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own promax_excerpt_org() function to override in a child theme.
	 *
	 * @since Promax 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function promax_excerpt_org( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;