<?php
/**
 * Additional features for Ariel theme
 *
 * @package Ariel
 */
/**
 * Add inline style from customizer's custom css field
 *
 * This function is attached to 'wp_head' action hook.
 *
 * For overriding in child themes remove the action hook:
 * remove_action( 'wp_head', 'ariel_custom_css', 99 );
 *
 * @return  Returns inline style
 */
function ariel_custom_css() {
	$ariel_advanced_css = ariel_get_option( 'ariel_advanced_css' );
	if ( $ariel_advanced_css != '' ) {
		$output = '<!-- Custom CSS -->';
		$output = "<style>" . wp_strip_all_tags( $ariel_advanced_css ) . "</style>";
		$output = '<!-- /Custom CSS -->';
        wp_add_inline_style( 'ariel-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'ariel_custom_css' );

if ( ! function_exists( 'ariel_show_custom_css_field' ) ) :
/**
 * Show custom css field in customizer if WordPress version
 * is less than 4.7
 */
function ariel_show_custom_css_field() {
	if ( get_bloginfo( 'version' ) >= 4.7 ) {
		$ariel_advanced_css = ariel_get_option( 'ariel_advanced_css' );
		if ( $ariel_advanced_css == '' ) {
			return false;
		} else {
			return true;
		}
	}
	return true;
}
endif; // function_exists( 'ariel_show_custom_css_field' )


/**
 * 
 */
 
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * This function is attached to 'wp_head' action hook.
 *
 * @return  Returns pingback link
 */
function ariel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'ariel_pingback_header' );




if ( ! function_exists( 'ariel_default_nav' ) ) :
/**
 * Set and display default main nav if no menu is assigned
 *
 * @return  Returns menu markup
 */
function ariel_default_nav() {
	echo '<div class="navbar-collapse">';
	echo '<ul class="nav navbar-nav">';
	$pages = get_pages();
	$n = count( $pages );
	$i = 0;

	foreach ( $pages as $page ) {
		$menu_name = esc_html( $page->post_title );
		$menu_link = get_page_link( $page->ID );
		$menu_class = "page-item-" . $page->ID;

		if ( get_the_ID() == $page->ID ) {
			$current_class = "current_page_item current-menu-item";
		} else {
			$current_class = '';
		}

        echo "<li class='page_item ".esc_attr($menu_class)." $current_class'><a href='".esc_url($menu_link)."'>".esc_html($menu_name)."</a></li>";
	}
	echo '</ul>';
	echo '</div>';
}
endif; // function_exists( 'ariel_default_nav' )
/**
 * Add class to default page nav
 *
 * This function is attached to 'wp_page_menu' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'wp_page_menu', 'ariel_wp_page_menu_class' );
 *
 * @param  string $class HTML output of a page-based menu
 * @return string        Returns filtered page memnu markup
 */
function ariel_wp_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
}
add_filter( 'wp_page_menu', 'ariel_wp_page_menu_class' );

/**
 * Filter Archive title
 *
 * This function is attached to 'get_the_archive_title' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'get_the_archive_title', 'ariel_archive_title' );
 *
 * @param  string $title Archive title
 * @return string        Returns filtered archive title
 */
function ariel_archive_title( $title ) {
	if( is_home() && get_option( 'page_for_posts' ) ) {
		$title = get_page( get_option( 'page_for_posts' ) )->post_title;
	} elseif ( is_home() ) {
		$title = ariel_get_option( 'ariel_blog_feed_label' );
		$title = esc_html( $title );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'ariel_archive_title' );

/**
 * Filter number of words for excerpt
 *
 * This function is attached to 'excerpt_length' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'excerpt_length', 'ariel_excerpt_length', 999 );
 *
 * @param  int $length Number of words, default 55
 * @return int         Returns filtered number of words
 */
function ariel_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'ariel_excerpt_length', 999 );
/**
 * Wrap oEmbed-embedded video in <div>
 *
 * This function is attached to 'embed_oembed_html' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'embed_oembed_html', 'ariel_embed_oembed_html', 99, 4 );
 *
 * @link https://wordpress.stackexchange.com/a/50781
 *
 * @param  [type] $html    oEmbed HTML
 * @param  string $url     oEmbed URL
 * @param  array $attr     Array of attributes
 * @param  int $post_id    Post ID
 * @return string          Returns filtered oEmbed HTML
 */
function ariel_embed_oembed_html( $html, $url, $attr, $post_id ) {
  return '<div class="iframe-video">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'ariel_embed_oembed_html', 99, 4 );

if ( ! function_exists( 'ariel_site_identity_text' ) ) :
/**
 * Custom site text logo
 *
 * @return string Display custom text logo
 */
function ariel_site_identity_text() {
	$ariel_text_logo = ariel_get_option( 'ariel_text_logo' );

	if ( empty( $ariel_text_logo ) ) :
		$ariel_text_logo = get_bloginfo( 'name' );
	endif; ?>

	<?php if ( is_front_page() ) : ?>
	<h1 class="header-logo-text">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $ariel_text_logo ); ?></a>
	</h1>
	<?php else : ?>
	<div class="header-logo-text">
		<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html( $ariel_text_logo ); ?></a>
	</div>
	<?php endif;
}
endif;
if ( ! function_exists( 'ariel_get_first_embed_media' ) ) :
/**
 * Get first embedded video from post
 *
 * @param  int $post_id Post id
 * @return mix|null     Returns either <iframe> or false
 */
function ariel_get_first_embed_media( $post_id ) {
	$post    = get_post( $post_id );
	$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds  = get_media_embedded_in_content( $content );

	if ( ! empty( $embeds ) ) :
		//check what is the first embed containg video tag, youtube or vimeo
		foreach ( $embeds as $embed ) :
			if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) :
				return $embed;
			endif;
		endforeach;
	else :
		return false;
	endif;
}
endif;
if ( ! function_exists( 'ariel_get_first_post_image' ) ) :
/**
 * Get first image in post content
 *
 * Scan post content for class wp-image-ID and get ID.
 * If it exists return image markup for it.
 *
 * @return string Returns image markup or empty string
 */
function ariel_get_first_post_image() {
	/* Get the post content. */
	$post_content = get_post_field( 'post_content', get_the_ID() );

	/* Apply filters to content. */
	$post_content = apply_filters( 'get_the_image_post_content', $post_content );

	/* Check the content for `id="wp-image-%d"`. */
	preg_match( '/class=[\'"](.*?)wp-image-([\d]*)[\'"]/i', $post_content, $image_classes );

	/* Loop through any found image IDs. */
	if ( ! empty( $image_classes ) ) {
		$image_id = $image_classes[2];

		if ( (int) $image_id ) {
			return wp_get_attachment_image( $image_id, 'post-thumbnail', '', array( 'class' => 'img-responsive' ) );
		}
	}
}
endif;
/**
 * Filter tag chould args and set the same font size
 * for all tags. This function is attached to
 * 'widget_tag_cloud_args' filter hook.
 *
 * @param  array  $args Array of arguments
 * @return array        Returns array of filtered args
 */
function ariel_tag_cloud_filter( $args = array() ) {
	$args['smallest'] = 11;
	$args['largest'] = 11;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'ariel_tag_cloud_filter', 90 );

#https://jetpack.com/2013/06/10/moving-sharing-icons/
function jptweak_remove_share() {
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
add_action( 'init', 'jptweak_remove_share');
add_action( 'loop_start', 'jptweak_remove_share' );