<?php
/**
 * Display site contents
 *
 * Call appropriate functions to display various site contents.
 *
 * @package Aamla
 * @since 1.0.0
 */

/*
 * Register hooks for displaying site items.
 *
 * 'aamla_add_markup_for()' is a wrapper function for WordPress core 'add_action()' to make
 * it slightly more redable. Following is an example,
 * aamla_add_markup_for( 'what_to_display', 'where_to_display', priority (optional), args (optional) )
 *
 * 'what_to_display' should be a function ( with theme slug ) i.e., aamla_what_to_display()
 * 'where_to_display' should be a theme action hook ( with theme slug ) i.e., aamla_where_to_display
 *
 * Above function will register an action hook as follows,
 * add_action( 'aamla_where_to_display', 'aamla_what_to_display', priority (optional), args (optional) )
 */

// Display site header items.
aamla_add_markup_for( 'header_items', 'inside_header' );
aamla_add_markup_for( 'site_branding', 'inside_header_items' );
aamla_add_markup_for( 'site_logo', 'inside_site_branding' );
aamla_add_markup_for( 'header_text', 'inside_site_branding' );
aamla_add_markup_for( 'user_actions', 'inside_header_items' );
aamla_add_markup_for( 'main_navigation', 'inside_header' );

// Display primary site content.
aamla_add_markup_for( 'page_header', 'inside_main_content' );
aamla_add_markup_for( 'main_loop', 'inside_main_content' );
aamla_add_markup_for( 'entry_featured_media', 'inside_entry' );
aamla_add_markup_for( 'entry_main_content', 'inside_entry' );
aamla_add_markup_for( 'entry_header_wrapper', 'inside_entry_main_content' );
aamla_add_markup_for( 'entry_title', 'inside_entry_header' );
aamla_add_markup_for( 'entry_meta_wrapper', 'inside_entry_header' );
aamla_add_markup_for( 'entry_featured_media', 'inside_entry_main_content' );
aamla_add_markup_for( 'entry_content_wrapper', 'inside_entry_main_content' );
aamla_add_markup_for( 'entry_content', 'inside_entry_content' );
aamla_add_markup_for( 'entry_meta_wrapper', 'inside_entry_main_content' );
aamla_add_markup_for( 'entry_meta', 'inside_entry_meta' );
aamla_add_markup_for( 'entry_footer_wrapper', 'inside_entry_main_content' );
aamla_add_markup_for( 'footer_meta', 'inside_entry_footer' );
aamla_add_markup_for( 'post_author', 'inside_entry_footer' );

// Display secondary site content.
aamla_add_markup_for( 'image_navigation', 'inside_entry' );
aamla_add_markup_for( 'post_pagination', 'after_main_content' );
aamla_add_markup_for( 'post_navigation', 'after_main_content' );
aamla_add_markup_for( 'sidebar_widgets', 'inside_sidebar' );

// Display site footer items.
aamla_add_markup_for( 'footer_items', 'inside_footer' );
aamla_add_markup_for( 'footer_text', 'inside_footer_items' );

// Include svg file at the bottom of '<body>' tag.
add_action( 'wp_footer', 'aamla_svg_icons', 9999 );

/*
 * Wrapper functions for displaying site items.
 *
 * WordPress core 'add_action()' does not allow to
 * 1. Pass variables to the called function (Predefined variables in do_action()
 * can only be passed).
 * 2. No provision for conditional check before calling a function.
 *
 * Therefore, we have to create wrapper functions. Also, these wrapper functions
 * make code more redable.
 */

/**
 * Header items wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_header_items() {
	aamla_markup( 'header-items' );
}

/**
 * Site branding wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_site_branding() {
	aamla_markup( 'site-branding' );
}

/**
 * Display user actionable items inside site header.
 *
 * @since 1.0.0
 */
function aamla_user_actions() {
	get_search_form();
}

/**
 * Site logo display function.
 *
 * @since 1.0.0
 */
function aamla_site_logo() {
	the_custom_logo();
}

/**
 * Include header text display template.
 *
 * @since 1.0.0
 */
function aamla_header_text() {
	aamla_get_template_partial( 'template-parts/header', 'branding-text' );
}

/**
 * Main navigation markup.
 *
 * @since 1.0.0
 */
function aamla_main_navigation() {
	if ( has_nav_menu( 'primary' ) ) {
		aamla_nav_menu(
			'site-navigation',
			'primary-menu',
			esc_html__( 'Site Navigation', 'aamla' ),
			'primary',
			false,
			array(
				'container'       => 'div',
				'container_id'    => 'menu-container',
				'container_class' => 'menu-container wrapper',
			)
		);
	}
}

/**
 * Include page header display template.
 *
 * @since 1.0.0
 */
function aamla_page_header() {
	aamla_get_template_partial( 'template-parts/page', 'page-header' );
}

/**
 * Include main loop execution template.
 *
 * @since 1.0.0
 */
function aamla_main_loop() {
	aamla_get_template_partial( 'template-parts/loop', 'main-loop' );
}

/**
 * Entry header wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_header_wrapper() {
	aamla_markup( 'entry-header' );
}

/**
 * Include entry title display template.
 *
 * @since 1.0.0
 */
function aamla_entry_title() {
	if ( ! is_singular() ) {
		$aamla_categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'aamla' ) );

		if ( $aamla_categories_list ) :
		?>
			<span<?php aamla_attr( 'meta-categories' ); ?>>
				<?php
				echo $aamla_categories_list; // WPCS xss ok.
				?>
			</span><!-- .meta-categories -->
		<?php
		endif;
	}
	aamla_get_template_partial( 'template-parts/post', 'entry-title' );
}

/**
 * Conditionally display entry meta wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_meta_wrapper( $calledby ) {
	// Do not display featured media 'below post header' on 'index' page.
	if ( ( is_home() || is_archive() || is_search() ) && 'inside_entry_header' === $calledby ) {
		return;
	}

	// Do not display featured media 'above post header' on 'single' page.
	if ( is_singular() && 'inside_entry_main_content' === $calledby ) {
		return;
	}

	if ( 'post' === get_post_type() ) {
		aamla_markup( 'entry-meta' );
	}
}

/**
 * Include entry meta display template(s).
 *
 * @since 1.0.0
 */
function aamla_entry_meta() {
	aamla_get_template_partial( 'template-parts/meta', 'meta-author' );
	aamla_get_template_partial( 'template-parts/meta', 'meta-date' );
}

/**
 * Entry main content wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_main_content() {
	aamla_markup( 'entry-main-content' );
}

/**
 * Include entry media display template on home or archive pages.
 *
 * @param str $calledby Identifier of the hook which called this function.
 * @since 1.0.0
 */
function aamla_entry_featured_media( $calledby ) {
	// Do not display featured media 'below post header' on 'index' page.
	if ( ( is_home() || is_archive() || is_search() ) && 'inside_entry_main_content' === $calledby ) {
		return;
	}

	// Do not display featured media 'above post header' on 'single' page.
	if ( is_singular() && 'inside_entry' === $calledby ) {
		return;
	}

	if ( has_post_thumbnail() ) {
		aamla_get_template_partial( 'template-parts/post', 'entry-thumbnail' );
	}
}

/**
 * Entry content wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_content_wrapper() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		aamla_get_template_partial( 'template-parts/post', 'entry-attachment' );
		return;
	}

	aamla_markup( 'entry-content' );
}

/**
 * Include entry content display template.
 *
 * @since 1.0.0
 */
function aamla_entry_content() {
	aamla_get_template_partial( 'template-parts/post', 'entry-content' );
}

/**
 * Entry footer wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_footer_wrapper() {
	if ( ! is_singular() ) {
		return;
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ), true ) ) {
		aamla_markup( 'entry-footer' );
	}
}

/**
 * Include entry footer display template(s).
 *
 * @since 1.0.0
 */
function aamla_footer_meta() {
	if ( 'post' === get_post_type() ) {
		aamla_get_template_partial( 'template-parts/meta', 'meta-categories' );
		aamla_get_template_partial( 'template-parts/meta', 'meta-tags' );
	} else {
		aamla_get_template_partial( 'template-parts/meta', 'meta-attachment' );
	}
}

/**
 * Conditionally include post author display template.
 *
 * @since 1.0.0
 */
function aamla_post_author() {
	global $post;
	if ( is_single() && '' !== get_the_author_meta( 'description', $post->post_author ) ) {
		aamla_get_template_partial( 'template-parts/post', 'entry-author' );
	}
}

/**
 * Display post pagination on home, archive and search pages.
 *
 * @since 1.0.0
 */
function aamla_post_pagination() {
	if ( ! is_singular() ) {
		the_posts_pagination( array(
			'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'aamla' ) . '</span>' . aamla_get_icon( array( 'icon' => 'angle-left' ) ),
			'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next', 'aamla' ) . '</span>' . aamla_get_icon( array( 'icon' => 'angle-right' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'aamla' ) . ' </span>',
		) );
	}
}

/**
 * Display post navigation on single posts.
 *
 * @since 1.0.0
 */
function aamla_post_navigation() {
	if ( is_singular( 'post' ) ) {
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav">' . esc_html__( 'Next Post ', 'aamla' ) . '</span>
				<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav">' . esc_html__( ' Previous Post', 'aamla' ) . '</span>
				<span class="post-title">%title</span>',
		) );
	}
}

/**
 * Display image navigation on image attachment pages.
 *
 * @since 1.0.0
 */
function aamla_image_navigation() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		?>
		<nav id="image-navigation" class="navigation image-navigation">
			<div class="nav-links">
				<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'aamla' ) ); ?></div>
				<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'aamla' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- .image-navigation -->
		<?php
	}
}

/**
 * Display primary sidebar.
 *
 * @since 1.0.0
 */
function aamla_sidebar_widgets() {
	if ( is_active_sidebar( 'sidebar' ) ) {
		aamla_widgets(
			'secondary',
			'sidebar-widget-area',
			esc_html( 'Sidebar Widget Area', 'aamla' ),
			array( 'sidebar' )
		);
	}
}

/**
 * Site footer items wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_footer_items() {
	aamla_markup( 'footer-items' );
}

/**
 * Display footer text.
 *
 * Escape footer text and replace year, title and symbol placeholders with
 * proper markup.
 *
 * @since 1.0.0
 * @return void
 */
function aamla_footer_text() {
	// Note: Footer text is escaped via `aamla_escape()`.
	$footer_text = aamla_get_mod( 'aamla_footer_text' );
	if ( '' === $footer_text ) {
		return;
	}

	$author_credit = sprintf(
		/* translators: 1: Theme link */
		esc_html__( 'Theme by %1$s', 'aamla' ),
		// Note: URI is escaped via `WP_Theme::markup_header()`.
		'<a href="' . wp_get_theme( get_template() )->display( 'ThemeURI' ) . '" rel="nofollow">' . wp_get_theme( get_template() )->display( 'Author' ) . '</a>'
	);

	$output = str_replace( '[current_year]', date_i18n( __( 'Y', 'aamla' ) ), $footer_text );
	$output = str_replace( '[site_title]', get_bloginfo( 'name', 'display' ), $output );
	$output = str_replace( '[copy_symbol]', '&copy;', $output );
	$output = str_replace( '[author_credit]', $author_credit, $output );

	printf( '<div class="footer-text">%1$s</div>', $output ); // WPCS xss ok.
}

/**
 * Add SVG definitions to the site footer.
 *
 * @since 1.0.0
 */
function aamla_svg_icons() {
	include_once get_parent_theme_file_path( 'assets/images/icons.svg' );
}
