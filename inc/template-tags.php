<?php
/**
 * Template tags
 *
 * @package Ariel
 */
if ( ! function_exists( 'ariel_entry_date' ) ) :
/**
 * Entry Date
 * @return string Prints date for current post, returns null if page
 */
function ariel_entry_date() {
	$current_post = get_post(get_the_ID());
	if ( $current_post->post_type == 'page' ) return;

	$ariel_blog_feed_date_show = ariel_get_option( 'ariel_blog_feed_date_show' );
	$ariel_posts_date_show     = ariel_get_option( 'ariel_posts_date_show' );
	/**
	 * Check for date visibility
	 * @var bool
	 */
	$show = ariel_toggle_entry_meta( $ariel_blog_feed_date_show, $ariel_posts_date_show );

	if ( $show ) :
		echo '<span class="entry-meta-date">' . get_the_date() . '</span>';
	endif;
}
endif;
if ( ! function_exists( 'ariel_entry_author' ) ) :
/**
 * Entry Author
 * @return string Prints author for current post
 */
function ariel_entry_author() {

	$ariel_blog_feed_author_show   = ariel_get_option( 'ariel_blog_feed_author_show' );
	$ariel_posts_author_show       = ariel_get_option( 'ariel_posts_author_show' );
	/**
	 * Check for author visibility
	 * @var bool
	 */
	$show = ariel_toggle_entry_meta( $ariel_blog_feed_author_show, $ariel_posts_author_show );

	if ( $show ) :
		echo '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) . '" class="entry-meta-author">';
		printf( esc_html__( 'By %s', 'ariel' ), get_the_author() );
		echo '</a>';
	endif;
}
endif;

if ( ! function_exists( 'ariel_entry_separator' ) ) :
/**
 * Entry Meta Separator
 * @return string Prints separator dash between meta elements
 */
function ariel_entry_separator($check) {

	$ariel_blog_feed_author_show = ariel_get_option( 'ariel_blog_feed_author_show' );
	$ariel_posts_author_show     = ariel_get_option( 'ariel_posts_author_show' );

	$ariel_blog_feed_date_show = ariel_get_option( 'ariel_blog_feed_date_show' );
	$ariel_posts_date_show     = ariel_get_option( 'ariel_posts_date_show' );

	$ariel_blog_feed_comments_show = ariel_get_option( 'ariel_blog_feed_comments_show' );
	$ariel_posts_comments_show     = ariel_get_option( 'ariel_posts_comments_show' );

	$separator = '<span class="entry-meta-separator">&nbsp;&#8211;&nbsp;</span>';

	/**
	 * Check for item visibility
	 * @var bool
	 */
	$show_author = ariel_toggle_entry_meta( $ariel_blog_feed_author_show, $ariel_posts_author_show );
	$show_date = ariel_toggle_entry_meta( $ariel_blog_feed_date_show, $ariel_posts_date_show );
	$show_comments = ariel_toggle_entry_meta( $ariel_blog_feed_comments_show, $ariel_posts_comments_show );
	if ( $check == 'author_date' && $show_author && $show_date ) :
		echo $separator;
	elseif ($check == 'date_comments' && $show_date && $show_comments ) :
		echo $separator;
	elseif ($check == 'author_comments' && $show_author && $show_comments && !$show_date) :
		echo $separator;
	endif;
}
endif;

if ( ! function_exists( 'ariel_entry_categories' ) ) :
/**
 * Entry Categories
 * @return string Prints categories for current post
 */
function ariel_entry_categories() {
	$ariel_blog_feed_category_show = ariel_get_option( 'ariel_blog_feed_category_show' );
	$ariel_posts_category_show     = ariel_get_option( 'ariel_posts_category_show' );
	/**
	 * Check for category visibility
	 * @var bool
	 */
	$show = ariel_toggle_entry_meta( $ariel_blog_feed_category_show, $ariel_posts_category_show );

	if ( $show ) : ?>
		<p class="entry-category"><?php the_category( ', ' ); ?></p><?php
	endif;
}
endif;

if ( ! function_exists( 'ariel_entry_excerpt' ) ) :
/**
 * Entry Excerpt
 * @return string Prints excerpt for current post
 */
function ariel_entry_excerpt() { ?>
	<div class="entry-summary"><?php the_excerpt(); ?></div><?php
}
endif;

if ( ! function_exists( 'ariel_entry_title' ) ) :
/**
 * Entry Title
 * @return string Prints current post title, inside link for archives and without link for singles
 */
function ariel_entry_title() {
	if ( is_single() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
	}
}
endif;

if ( ! function_exists( 'ariel_entry_comments_link' ) ) :
/**
 * Comments link
 * @return string Prints comments number inside comments link for curent post
 */
function ariel_entry_comments_link() {
    $separator = '';
    
	$ariel_blog_feed_comments_show = ariel_get_option( 'ariel_blog_feed_comments_show' );
	$ariel_posts_comments_show     = ariel_get_option( 'ariel_posts_comments_show' );

	if ( ! post_password_required() && comments_open() ) :
		/**
		 * Check for comments visibility
		 * @var bool
		 */
		$show = ariel_toggle_entry_meta( $ariel_blog_feed_comments_show, $ariel_posts_comments_show );

		if ( $show ) :
			$label = sprintf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'ariel' ),
				number_format_i18n( get_comments_number()
			) );
			//$separator = esc_html__( '&nbsp;&#8211;&nbsp;', 'ariel' );

			echo $separator . '<a class="entry-meta-comment" href="' . esc_url( get_comments_link() ). '">' . $label . '</a>';
		endif;
	endif;
}
endif;

if ( ! function_exists( 'ariel_entry_thumbnail' ) ) :
/**
 * Entry Thumbnail
 * @param  string $size Image size
 * @return string       Print featured image for current post
 */
function ariel_entry_thumbnail( $size = 'thumbnail' ) {
	$ariel_example_content = ariel_get_option( 'ariel_example_content' ); ?>
	<?php if( has_post_thumbnail() || $ariel_example_content == 1 ) : ?>
	<div class="entry-thumb">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( $size, array( 'alt' => get_the_title(), 'class' => 'img-responsive' ) ); ?>
			<?php elseif ( $ariel_example_content == 1 ) : ?>
				<img src="<?php echo esc_url( ariel_get_sample( $size ) ); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
			<?php endif; ?>
		</a>
	</div><!-- entry-thumb --><?php
	endif;
}
endif;

if ( ! function_exists( 'ariel_fontawesome_icon' ) ) :
/**
 * Font Awesome Icon
 * @param  string  $icon Name of icon
 * @param  boolean $echo Echo or return
 * @return string        Markup for Font Awesome icon
 */
function ariel_fontawesome_icon( $icon = '', $echo = true ) {
	if ( $icon ) {
		if ( $echo ) {
			echo '<i class="fa fa-' . $icon . '"></i>';
		} else {
			return '<i class="fa fa-' . $icon . '"></i>';
		}
	}
}
endif;

if ( ! function_exists( 'ariel_posts_pagination' ) ) :
/**
 * Posts pagination
 *
 * Used for blog feed on frontpage and archive pages.
 *
 * @param  obj $query    WP_Query object
 * @return string        Returns pagination markup
 */
function ariel_posts_pagination( $query = '' ) {
	global $wp_query;
	if ( $query ) {
		$query = $query;
	} else {
		$query = $wp_query;
	}
	$navigation = '';

	// Don't print empty markup if there's only one page.
	if ( $query->max_num_pages > 1 ) {
		$args = array(
			'prev_text'          => __( 'Older Posts', 'ariel' ),
			'next_text'          => __( 'Newer Posts', 'ariel' ),
			'screen_reader_text' => __( 'Posts navigation', 'ariel' ),
		);
		$next_link = get_previous_posts_link( $args['next_text'], $query->max_num_pages );
		$prev_link = get_next_posts_link( $args['prev_text'], $query->max_num_pages );

		$navigation .= '<div class="pagination-blog-feed">';

		if ( $prev_link ) {
			$navigation .= '<div class="previous_posts">' . $prev_link . '</div>';
		}

		if ( $prev_link && $next_link ) {
			$navigation .= '<div class="separator"></div>';
		}

		if ( $next_link ) {
			$navigation .= '<div class="next_posts">' . $next_link . '</div>';
		}

		$navigation .= '</div>';
	}

	return $navigation;
}
endif;