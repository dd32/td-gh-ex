<?php


if ( ! function_exists( 'aemi_body_classes' ) )
{
	function aemi_body_classes( $classes )
	{

		if ( ! is_singular() )
		{
			$classes[] = 'split';
		}
		else
		{
			$classes[] = 'singular';
		}

		return $classes;
	}
}



function aemi_html_tag_schema()
{
	$schema 	= 'http://schema.org/';
	$type 		= 'WebPage';

	if ( is_singular( 'post' ) )
	{
		$type 	= 'Article';
	}

	else if ( is_author() )
	{
		$type 	= 'ProfilePage';
	}

	else if ( is_search() )
	{
		$type 	= 'SearchResultsPage';
	}

	echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}



function aemi_category_transient_flusher()
{
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	{
		return;
	}
	delete_transient( 'aemi_categories' );
}
add_action( 'edit_category', 'aemi_category_transient_flusher' );
add_action( 'save_post',     'aemi_category_transient_flusher' );



function aemi_remove_script_version( $src )
{
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'aemi_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'aemi_remove_script_version', 15, 1 );



function aemi_optimize_scripts( $tag, $handle )
{
	$scripts_to_optimize = array(
		'act'
	);
	foreach( $scripts_to_optimize as $aemi_script )
	{
		if ( $aemi_script === $handle )
		{
			return str_replace( 'src', 'defer src', $tag );
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'aemi_optimize_scripts', 10, 2);



function aemi_escape_code_fragments( $source )
{
	$encoded = preg_replace_callback( '/<code(.*?)>(.*?)<\/code>/ims', create_function (
		'$matches',
		'$matches[2] = preg_replace( array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "", $matches[2] ); return "<code" . $matches[1] . ">" . esc_html( $matches[2] ) . "</code>";' ), $source );

		if ( $encoded )
		{
			return $encoded;
		}
		else
		{
			return $source;
		}
	}
	add_filter( 'the_content', 'aemi_escape_code_fragments' );
	add_filter( 'pre_comment_content', 'aemi_escape_code_fragments' );



	if ( ! function_exists( 'aemi_remove_emojis' ) )
	{
		function aemi_remove_emojis()
		{
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_action( 'embed_head', 'print_emoji_detection_script' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
		}

	}



	if ( ! function_exists( 'aemi_remove_oembed' ) )
	{
		function aemi_remove_oembed()
		{
			remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
			remove_action( 'rest_api_init', 'wp_oembed_register_route' );
			remove_filter( 'the_content_feed', '_oembed_filter_feed_content' );
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
			remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		}
	}



	if ( ! function_exists( 'aemi_remove_wp_head_tasks' ) )
	{
		function aemi_remove_wp_head_tasks()
		{
			remove_action( 'wp_head', 'rsd_link' );
			remove_action( 'wp_head', 'wlwmanifest_link' );
			remove_action( 'wp_head', 'wp_generator' );
			remove_action( 'wp_head', 'wp_resource_hints', 2 );
		}
	}


	if ( ! function_exists( 'aemi_custom_archive_title' ) )
	{
		function aemi_custom_archive_title( $title )
		{
			if ( is_category() ) {
				$title = '<h1 class="post-title">' . single_cat_title( '', false ) . '</h1><div class="archive-type cat">' . __( 'Category', 'aemi' ) . '</div>';
			} elseif ( is_tag() ) {
				$title = '<h1 class="post-title">' . single_tag_title( '', false ) . '</h1><div class="archive-type tag">' . __( 'Tag', 'aemi' ) . '</div>';
			} elseif ( is_author() ) {
				$title = '<h1 class="post-title">' . get_the_author() . '</h1><div class="archive-type cat">' . __( 'Author', 'aemi' ) . '</div>';
			} elseif ( is_year() ) {
				$title = '<h1 class="post-title">' . get_the_date( 'Y' ) . '</h1><div class="archive-type year">' . __( 'Yearly Archives', 'aemi' ) . '</div>';
			} elseif ( is_month() ) {
				$title = '<h1 class="post-title">' . get_the_date( 'F Y' ) . '</h1><div class="archive-type month">' . __( 'Monthly Archives', 'aemi' ) . '</div>';
			} elseif ( is_day() ) {
				$title = '<h1 class="post-title">' . get_the_date( 'j F Y' ) . '</h1><div class="archive-type day">' . __( 'Daily Archives', 'aemi' ) . '</div>';
			} elseif ( is_tax( 'post_format' ) ) {
				if ( is_tax( 'post_format', 'post-format-aside' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Asides', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Galleries', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Images', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Videos', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Quotes', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Links', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Status', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Audio', 'post format archive title', 'aemi' ) . '</h1>';
				} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
					$title = '<h1 class="post-title">' . _x( 'Chats', 'post format archive title', 'aemi' ) . '</h1>';
				}
			} elseif ( is_post_type_archive() ) {
				$title = '<h1 class="post-title">' . post_type_archive_title( '', false ) . '</h1>';
			} elseif ( is_tax() ) {
				$tax = get_taxonomy( get_queried_object()->taxonomy );
				$title = '<h1 class="post-title">' . single_term_title( '', false ) . '</h1><div class="archive-type' . $tax->labels->singular_name . '">' . $tax->labels->singular_name . '</div>';
			} else {
				$title = '<h1 class="post-title">' . _x( 'Archives', 'generic archive title', 'aemi' ) . '</h1>';
			}
			return $title;
		}
	}
	add_filter( 'get_the_archive_title', 'aemi_custom_archive_title' );
