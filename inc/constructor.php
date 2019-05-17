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
 * 'what_to_display' should be a function ( theme slug will be added programatically ) i.e., aamla_what_to_display()
 * 'where_to_display' should be a theme action hook ( theme slug will be added programatically ) i.e., aamla_where_to_display
 *
 * Above function will register an action hook as follows,
 * add_action( 'aamla_where_to_display', 'aamla_what_to_display', priority (optional), args (optional) )
 */

// Display site header items.
aamla_add_markup_for( 'skip_link', 'inside_header', 0 );
aamla_add_markup_for( 'header_items', 'inside_header' );
aamla_add_markup_for( 'contact_information', 'inside_header' );
aamla_add_markup_for( 'main_navigation', 'inside_header' );
aamla_add_markup_for( 'page_entry_header', 'after_header' );

// Display primary site content.
aamla_add_markup_for( 'breadcrumb', 'inside_main_content' );
aamla_add_markup_for( 'page_header', 'inside_main_content' );
aamla_add_markup_for( 'main_loop', 'inside_main_content' );
aamla_add_markup_for( 'entry_featured_content', 'inside_entry' );
aamla_add_markup_for( 'entry_main_content', 'inside_entry' );

// Display secondary site content.
aamla_add_markup_for( 'post_author', 'inside_entry' );
aamla_add_markup_for( 'image_navigation', 'inside_entry' );
aamla_add_markup_for( 'post_navigation', 'inside_main_content' );
aamla_add_markup_for( 'post_pagination', 'after_main_content' );
aamla_add_markup_for( 'sidebar_widgets', 'inside_sidebar' );

// Display site footer items.
aamla_add_markup_for( 'footer_widgets', 'inside_footer' );
aamla_add_markup_for( 'footer_items', 'inside_footer' );
aamla_add_markup_for( 'scroll_to_top', 'inside_footer' );

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
 * Conditionally display skip link.
 *
 * @since 1.0.2
 */
function aamla_skip_link() {
	// Return if there is no content to skip to.
	if ( is_page_template( 'page-templates/header-blank-footer.php' ) ) {
		return;
	}

	printf(
		'<a class="skip-link screen-reader-text" href="#content">%s</a>',
		esc_html__( 'Skip to content', 'aamla' )
	);
}

/**
 * Header items wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_header_items() {
	aamla_markup(
		'header-items',
		[
			'aamla_site_branding',
			'aamla_user_action_items',
		]
	);
}

/**
 * Contact Infromation wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_contact_information() {
	$telephone   = aamla_get_mod( 'aamla_tel_number', 'none' );
	$email       = aamla_get_mod( 'aamla_email_id', 'none' );
	$hide_social = aamla_get_mod( 'aamla_hide_social_icons_on_contact_bar', 'none' );

	if ( ! ( $email || $telephone || ( has_nav_menu( 'social' ) && ! $hide_social ) ) ) {
		return;
	}
	aamla_markup(
		'contact-information',
		[ [ 'aamla_get_template_partial', 'template-parts/header', 'contact-info' ] ]
	);
}

/**
 * Site branding wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_site_branding() {
	aamla_markup(
		'site-branding',
		[
			'aamla_site_logo',
			'aamla_branding_text',
		]
	);
}

/**
 * User actionable items wrapper.
 *
 * @since 1.0.0
 */
function aamla_user_action_items() {
	if ( is_active_sidebar( 'header' ) ) {
		aamla_markup( 'header-widgets', [ 'aamla_header_widgets' ] );
	}
	if ( aamla_get_mod( 'aamla_header_search', 'none' ) ) {
		get_search_form();
	}
}

/**
 * User actionable items wrapper.
 *
 * @since 1.0.0
 */
function aamla_header_widgets() {
	printf(
		'<button aria-expanded="false" class="action-toggle"><span class="bar"><span class="screen-reader-text">%1$s</span></span></button>',
		esc_html__( 'Show possible user actions', 'aamla' )
	);
	echo '<div id="header-widget-area" class="header-widget-area">';
	if ( is_active_sidebar( 'sidebar' ) ) {
		aamla_widgets(
			'header-widget-wrapper',
			'header-widget-wrapper',
			esc_html__( 'Header Widget Wrapper', 'aamla' ),
			'header'
		);
	} else {
		echo '<div id="header-widget-wrapper" class="header-widget-wrapper">';
		echo '<div class="widget">';
		get_search_form();
		echo '</div></div>';
	}
	echo '</div>';
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
function aamla_branding_text() {
	$title_area = [];
	if ( aamla_get_mod( 'aamla_display_site_title', 'none' ) ) {
		array_push( $title_area, [ 'aamla_get_template_partial', 'template-parts/header', 'site-title' ] );
	}
	if ( aamla_get_mod( 'aamla_display_site_desc', 'none' ) ) {
		array_push( $title_area, [ 'aamla_get_template_partial', 'template-parts/header', 'site-desc' ] );
	}
	if ( ! empty( $title_area ) ) {
		aamla_markup( 'title-area', $title_area );
	}
}

/**
 * Main navigation markup.
 *
 * @since 1.0.0
 */
function aamla_main_navigation() {
	if ( ! aamla_get_mod( 'aamla_primary_nav', 'none' ) ) {
		return;
	}
	aamla_nav_menu(
		'site-navigation',
		esc_html__( 'Site Navigation', 'aamla' ),
		[
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'nav-menu nav-menu--primary',
			'container'       => 'div',
			'container_id'    => 'menu-container',
			'container_class' => 'menu-container wrapper',
			'theme_location'  => 'primary',
		]
	);
}

/**
 * Page Entry header wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_page_entry_header() {
	if ( is_singular( 'page' ) && has_post_thumbnail() ) {
		aamla_markup(
			'page-entry-header',
			[
				'aamla_page_entry_header_items',
				[ 'aamla_get_template_partial', 'template-parts/post', 'entry-thumbnail' ],
			]
		);
	}
}

/**
 * Call available breadcrumb display function.
 *
 * @since 1.0.0
 */
function aamla_breadcrumb() {

	// Let's not display breadcrumbs on the front page.
	if ( is_front_page() ) {
		return;
	}

	// First use 'Breadcrumb NavXT' function (if available).
	if ( function_exists( 'bcn_display' ) ) {
		printf( '<p id="breadcrumbs" class="breadcrumbs">%s</p>', bcn_display( true ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return;
	}

	// Next use 'Breadcrumb Trail' Plugin's function (if available).
	if ( function_exists( 'breadcrumb_trail' ) ) {
		breadcrumb_trail();
		return;
	}

	// Lastly use 'Yoast Breadcrumb' function (if available).
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">', '</p>' );
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
 * Entry main content wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_main_content() {
	aamla_markup(
		'entry-main-content',
		[
			'aamla_entry_header_wrapper',
			'aamla_entry_content_wrapper',
			'aamla_entry_footer_wrapper',
		]
	);
}

/**
 * Entry header wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_header_wrapper() {
	if ( is_single() ) {
		// Display title-area on single posts.
		$entry_header = [ 'aamla_entry_title_area' ];

		// Check if post thumbnails to be displayed on single posts.
		if ( aamla_get_mod( 'aamla_thumbnail_on_single', 'none' ) ) {
			$entry_header[] = [ 'aamla_get_template_partial', 'template-parts/post', 'entry-thumbnail' ];
		}
	} else {
		// If singular page having a thumbnail, its title display will be handled separately.
		if ( is_singular( 'page' ) && has_post_thumbnail() ) {
			return;
		}
		// Display entry title on index and single ('page' & 'attachment' post-types) pages.
		$entry_header = [ [ 'aamla_get_template_partial', 'template-parts/post', 'entry-title' ] ];
	}

	aamla_markup( 'entry-header', $entry_header );
}

/**
 * Page Entry header items markup.
 *
 * @since 1.0.0
 */
function aamla_page_entry_header_items() {
	aamla_markup(
		'page-entry-header-items',
		[
			[ 'aamla_get_template_partial', 'template-parts/post', 'entry-title' ],
			'aamla_page_excerpt',
		]
	);
}

/**
 * Page excerpt display function.
 *
 * @since 1.0.0
 */
function aamla_page_excerpt() {
	// Remove 'script' and 'style' tag and their contents.
	$excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', get_the_excerpt() );

	// Remove html tags except 'p' and 'a' tags.
	$excerpt = strip_tags( $excerpt, '<p><a>' );

	if ( $excerpt ) {
		/*
		 * In the rare case that DOMDocument is not available we cannot reliably escape URL so we will use wp_kses_post.
		 */
		if ( ! class_exists( 'DOMDocument' ) ) {
			$excerpt = wp_kses_post( $excerpt );
		} else {
			$doc = new DOMDocument();
			$doc->loadHTML(
				sprintf(
					'<!DOCTYPE html><html><head><meta charset="%s"></head><body>%s</body></html>',
					esc_attr( get_bloginfo( 'charset' ) ),
					$excerpt
				)
			);

			$body = $doc->getElementsByTagName( 'body' )->item( 0 );

			// Get all links within 'a' tag in page excerpt.
			$links = $body->getElementsByTagName( 'a' );

			// Iterate over the extracted links and escape their URLs.
			foreach ( $links as $link ) {
				$url = $link->getAttribute( 'href' );
				if ( $url ) {
					$link->removeAttribute( 'href' );
					$link->setAttribute( 'href', esc_url( $url ) );
				}
			}
			// Remove <body> and </body> tags from the string.
			$excerpt = str_replace( [ '<body>', '</body>' ], '', $doc->saveHTML( $body ) );
		}

		printf( '<div class="page-excerpt">%s</div>', $excerpt ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * Entry header title area wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_title_area() {
	aamla_markup(
		'entry-header-title-area',
		[
			[ 'aamla_get_template_partial', 'template-parts/post', 'entry-title' ],
			'aamla_entry_meta_wrapper',
		]
	);
}

/**
 * Conditionally display entry meta wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_entry_meta_wrapper() {
	// Do not display entry-meta before post content on index pages.
	if ( ! is_singular() ) {
		return;
	}

	if ( 'post' === get_post_type() ) {
		aamla_markup( 'entry-meta', [ 'aamla_entry_meta' ] );
	}
}

/**
 * Conditionally display entry post extra items.
 *
 * @since 1.0.0
 */
function aamla_entry_extra() {
	// Do not display entry-extra items on index pages.
	if ( ! is_singular() ) {
		return;
	}

	if ( in_array( get_post_type(), [ 'page', 'attachment' ], true ) ) {
		return;
	}

	global $post;

	?>
	<ul class="entry-extra">
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<li class="entry-extra-item">
			<a href="<?php comments_link(); ?>"><?php aamla_icon( [ 'icon' => 'comment' ] ); ?><span class="screen-reader-text"><?php esc_html_e( 'Comment on post', 'aamla' ); ?></span></a>
		</li>
		<?php endif; ?>
		<?php if ( aamla_get_mod( 'aamla_print_post_icon', 'none' ) ) : ?>
		<li class="entry-extra-item">
			<a href="javascript:window.print()"><?php aamla_icon( [ 'icon' => 'print' ] ); ?><span class="screen-reader-text"><?php esc_html_e( 'Print Post', 'aamla' ); ?></span></a>
		</li>
		<?php endif; ?>
	</ul>
	<?php
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
 * Create featured content markup on index pages.
 *
 * @since 1.0.0
 */
function aamla_entry_featured_content() {
	if ( ! is_singular() && ( aamla_get_mod( 'aamla_thumbnail_placeholder', 'none' ) || has_post_thumbnail() ) ) {
		aamla_markup(
			'entry-featured-content',
			[
				[ 'aamla_get_template_partial', 'template-parts/post', 'entry-thumbnail' ],
				[ 'aamla_get_template_partial', 'template-parts/meta', 'meta-date' ],
				[ 'aamla_get_template_partial', 'template-parts/meta', 'meta-permalink' ],
				[ 'aamla_sticky_post_icon' ],
			]
		);
	}
}

/**
 * Sticky Post Icon.
 *
 * @since 1.0.0
 */
function aamla_sticky_post_icon() {
	if ( is_sticky() ) {
		aamla_icon( [ 'icon' => 'sticky' ] );
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

	aamla_markup( 'entry-content', [ 'aamla_entry_content' ] );
}

/**
 * Include entry content display template.
 *
 * @since 1.0.0
 */
function aamla_entry_content() {
	if ( is_singular() ) {
		aamla_get_template_partial( 'template-parts/post', 'entry-content' );
	} else {
		the_excerpt();
		aamla_get_template_partial( 'template-parts/meta', 'meta-author' );
	}
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
		aamla_markup( 'entry-footer', [ 'aamla_footer_meta' ] );
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

	// No need to display author box on image attachment pages.
	if ( is_attachment() && wp_attachment_is_image() ) {
		return;
	}

	// Display author box on single posts, if author description is available.
	if ( ! is_single() || '' === get_the_author_meta( 'description', $post->post_author ) ) {
		return;
	}

	aamla_get_template_partial( 'template-parts/post', 'entry-author' );
}

/**
 * Display post pagination on home, archive and search pages.
 *
 * @since 1.0.0
 */
function aamla_post_pagination() {
	if ( is_singular() ) {
		return;
	}

	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'aamla' ) . '</span>' . aamla_get_icon( array( 'icon' => 'angle-left' ) ) . '<span class="post-pagi">' . esc_html__( 'Previous', 'aamla' ) . '</span>',
			'next_text'          => '<span class="screen-reader-text show-on-mobile">' . esc_html__( 'Next', 'aamla' ) . '</span><span class="post-pagi">' . esc_html__( 'Next', 'aamla' ) . '</span>' . aamla_get_icon( array( 'icon' => 'angle-right' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'aamla' ) . ' </span>',
		)
	);
}

/**
 * Display post navigation on single posts.
 *
 * @since 1.0.0
 */
function aamla_post_navigation() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	the_post_navigation(
		array(
			'next_text' => '<span class="meta-nav">' . esc_html__( 'Next Post ', 'aamla' ) . '</span><span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav">' . esc_html__( ' Previous Post', 'aamla' ) . '</span><span class="post-title">%title</span>',
		)
	);
}

/**
 * Display image navigation on image attachment pages.
 *
 * @since 1.0.0
 */
function aamla_image_navigation() {
	if ( ! ( is_attachment() && wp_attachment_is_image() ) ) {
		return;
	}
	?>
	<nav id="image-navigation" class="navigation image-navigation">
		<div class="nav-links">
			<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'aamla' ) ); ?></div>
			<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'aamla' ) ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .image-navigation -->
	<?php
}

/**
 * Display primary sidebar.
 *
 * @since 1.0.0
 */
function aamla_sidebar_widgets() {
	if ( ( is_home() || is_archive() ) && 'no-sidebar' === aamla_get_mod( 'aamla_archive_sidebar_layout', 'none' ) ) {
		return;
	}

	aamla_widgets(
		'secondary',
		'sidebar-widget-area',
		esc_html__( 'Sidebar Widget Area', 'aamla' ),
		'sidebar'
	);
}

/**
 * Display footer widgets.
 *
 * @since 1.0.0
 */
function aamla_footer_widgets() {
	aamla_widgets(
		'footer-widget-area',
		'footer-widget-area wrapper',
		esc_html__( 'Footer Widget Area', 'aamla' ),
		'footer'
	);
}

/**
 * Site footer items wrapper markup.
 *
 * @since 1.0.0
 */
function aamla_footer_items() {
	aamla_markup( 'footer-items', [ 'aamla_footer_text' ] );
}

/**
 * Scroll to top button markup.
 *
 * @since 1.0.0
 */
function aamla_scroll_to_top() {
	printf(
		'<button class="scrl-to-top">%1$s<span class="screen-reader-text">%2$s</span></button>',
		aamla_get_icon( [ 'icon' => 'circle-up' ] ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html__( 'Scroll to top of the page', 'aamla' )
	);
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
	$footer_text = aamla_get_mod( 'aamla_footer_text', 'html' );
	if ( '' === $footer_text ) {
		return;
	}

	$output = str_replace( '[current_year]', esc_html( date_i18n( __( 'Y', 'aamla' ) ) ), $footer_text );
	$output = str_replace( '[site_title]', get_bloginfo( 'name', 'display' ), $output );
	$output = str_replace( '[copy_symbol]', '&copy;', $output );

	printf( '<div class="footer-text">%1$s</div>', $output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Add SVG definitions to the site footer.
 *
 * @since 1.0.0
 */
function aamla_svg_icons() {
	if ( has_nav_menu( 'social' ) ) {
		include_once get_parent_theme_file_path( 'assets/images/icons-with-social.svg' );
	} else {
		include_once get_parent_theme_file_path( 'assets/images/icons.svg' );
	}
}
