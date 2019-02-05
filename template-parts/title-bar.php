<?php
/**
 * The template file to display the title bar
 *
 * @package agncy
 */

// Get the post meta values.
$disable_title = get_post_meta( get_the_ID(), 'disable_the_title', true );

// Disable the while block if disabled option is set.
if ( empty( $disable_title ) || '1' !== $disable_title ) :
	/*
	 * Generate the archive title based on conditionals
	 *
	 * @see https://developer.wordpress.org/reference/functions/the_archive_title/
	 * @see https://codex.wordpress.org/Conditional_Tags
	 */

	$page_title = get_the_archive_title();

	// The wrapper classes.
	$classes = array( 'page_title_wrapper', 'has-primary-background-color' );


	// What title on the search archive.
	if ( is_search() ) {

		$search_term = get_search_query();

		if ( $search_term ) {
			// translators: The search term.
			$page_title = sprintf( __( 'Results for "%s"', 'agncy' ), $search_term );
		} else {
			$page_title = __( 'Search results', 'agncy' );
		}
	}

	// What title to show on the home page, when no page on front is set.
	if ( is_home() && is_front_page() ) {

		// On the site front page.
		$page_title = get_bloginfo( 'description' );

	} elseif ( is_home() && ! is_front_page() ) {

		// On the page assigned to display the blog posts index.
		$page_title = get_the_title( get_option( 'page_for_posts' ) );
	} elseif ( is_singular() ) {

		$page_title = get_the_title();

	}

	/*
	 * Use this filters to apply your own business logic for the archive title, either in a plugin or a child theme
	 */
	$page_title = apply_filters( 'agncy_archive_title', $page_title );
	$classes    = apply_filters( 'agncy_archive_title_classes', $classes );

	/*
	 * Only show this whole ordeal, if we actually have a $page_title
	 */
	if ( $page_title ) :
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<div class="container">
				<div class="row the_page_title_row">
					<div class="col-xs-12 col-md-12">
						<h1 class="the_page_title entry-title"><?php echo wp_kses_post( $page_title ); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<?php
	endif; // /$page_title check

endif; // /Disable Title Check
