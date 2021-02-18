<?php
/**
 * Facilitate HTML markup
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Outputs a HTML element.
 *
 * @since  1.0.0
 *
 * @param string   $context   Markup context.
 * @param callable $callbacks Callback functions to echo content inside the wrapper.
 * @param string   $open      Markup wrapper opening div.
 * @param string   $close     Markup wrapper closing div.
 * @return void
 */
function aamla_markup( $context = '', $callbacks = [], $open = '<div%s>', $close = '</div>' ) {
	if ( ! $context ) {
		return;
	}

	$hook = str_replace( '-', '_', $context );

	/**
	 * Filter array of all supplied callable functions for this context.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 */
	$callbacks = apply_filters( "aamla_markup_{$hook}", $callbacks );

	printf( $open, aamla_get_attr( $context ) ); // WPCS xss ok. Contains HTML, other values escaped.

	foreach ( $callbacks as $callback ) {
		$callback = (array) $callback;
		$function = array_shift( $callback );
		if ( is_callable( $function ) ) {
			call_user_func_array( $function, $callback );
		}
	}

	echo $close; // WPCS xss ok. Contains HTML.
}

/**
 * Outputs an HTML element's attributes.
 *
 * The purposes of this is to provide a way to hook into the attributes for specific
 * HTML elements and create new or modify existing attributes, without modifying actual
 * markup templates.
 *
 * @since  1.0.0
 *
 * @param  str   $slug The slug/ID of the element (e.g., 'sidebar').
 * @param  array $attr Array of attributes to pass in (overwrites filters).
 */
function aamla_attr( $slug, $attr = [] ) {
	echo aamla_get_attr( $slug, $attr ); // WPCS xss ok. Values escaped by called function.
}

/**
 * Gets an HTML element's attributes.
 *
 * This code is inspired (but totally modified) from Stargazer WordPress Theme,
 * Copyright 2013 – 2018 Justin Tadlock. Stargazer is distributed
 * under the terms of the GNU GPL.
 *
 * @since  1.0.0
 *
 * @param  str   $slug The slug/ID of the element (e.g., 'sidebar').
 * @param  array $attr Array of attributes to pass in (overwrites filters).
 * @return string
 */
function aamla_get_attr( $slug, $attr = [] ) {
	if ( ! $slug ) {
		return '';
	}

	$out = '';

	if ( false !== $attr ) {
		if ( isset( $attr['class'] ) ) {
			$attr['class'] .= ' ' . $slug;
		} else {
			$attr['class'] = $slug;
		}
	}

	$hook = str_replace( '-', '_', $slug );

	/**
	 * Filter element's attributes.
	 *
	 * @since 1.0.0
	 */
	$attr = apply_filters( "aamla_get_attr_{$hook}", $attr, $slug );

	if ( $attr ) {
		foreach ( $attr as $name => $value ) {
			$out .= sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) );
		}
	}

	return $out;
}

/**
 * Output a font icon.
 *
 * @since 1.0.0
 *
 * @param array $args Parameters needed to display a font icon.
 */
function aamla_icon( $args = [] ) {
	$icon_markup = aamla_get_icon( $args );
	if ( $icon_markup ) {
		echo $icon_markup; // WPCS xss ok. Contains HTML, Other values escaped.
	}
}

/**
 * Return font icon SVG markup.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string Font icon SVG markup.
 */
function aamla_get_icon( $args = [] ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', 'aamla' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return esc_html__( 'Please define an SVG icon filename.', 'aamla' );
	}

	// Set defaults.
	$defaults = [
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
	];

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Aamla doesn't use the SVG title or description attributes; non-decorative icons are
	 * described with .screen-reader-text. However, child themes can use the title and description
	 * to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo aamla_get_svg( [ 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ] ); ?>
	 *
	 * Example 2 with title and description: <?php echo aamla_get_svg( [ 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ] ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img" focusable="false">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_attr( $args['icon'] ) . '" xlink:href="#icon-' . esc_attr( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Get navigation menu markup.
 *
 * Create navigation menu markup based on arguments provided.
 *
 * @since 1.0.0
 *
 * @param string $nav_id Menu container ID.
 * @param string $label  Menu label.
 * @param array  $args   Additional wp_nav_menu args.
 */
function aamla_nav_menu( $nav_id, $label, $args = [] ) {

	$menu  = sprintf( '<h2 class="screen-reader-text">%s</h2>', esc_html( $label ) );
	$menu .= wp_nav_menu( array_merge( $args, [ 'echo' => false ] ) );

	printf(
		'<nav id="%1$s" class="%2$s" aria-label="%3$s">%4$s</nav>',
		esc_attr( $nav_id ),
		esc_attr( $nav_id ),
		esc_attr( $label ),
		$menu
	); // WPCS xss ok. $menu contains HTML, variable values escaped properly.
}

/**
 * Get widget markup.
 *
 * Create widget markup based on arguments provided.
 *
 * @since 1.0.0
 *
 * @param string $id     Widget ID.
 * @param string $class  Widget HTML class.
 * @param string $label  Widget label.
 * @param string $widget Registered sidebar to be displayed.
 * @param bool   $aside  Aside or Article.
 */
function aamla_widgets( $id, $class, $label, $widget = 'sidebar', $aside = true ) {

	// Return if no ID.
	if ( ! $id ) {
		return;
	}

	// Short circuit filter.
	$check = apply_filters( "aamla_widgets_{$id}", false, $widget );
	if ( false !== $check ) {
		return;
	}

	// Return if sidebar is not in use.
	if ( ! is_active_sidebar( $widget ) ) {
		return;
	}
	?>

	<?php if ( $aside ) : ?>
		<aside id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<h2 class="screen-reader-text"><?php echo esc_html( $label ); ?></h2>
			<?php dynamic_sidebar( $widget ); ?>
		</aside>
	<?php else : ?>
		<article id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php dynamic_sidebar( $widget ); ?>
		</article>
	<?php endif; ?>

	<?php
}

/**
 * Get a theme template part.
 *
 * This is a wrapper function on WordPress built-in function "get_template_part()"
 * to provide additional filter to change required template.
 *
 * @since 1.0.0
 *
 * @param string $path      Template file path.
 * @param string $file_name Template file name.
 * @param string $arg       Additional arguments for identification.
 * @return void
 */
function aamla_get_template_partial( $path, $file_name, $arg = '' ) {
	$file = $path . '/' . $file_name;

	$file_name = str_replace( '-', '_', $file_name );
	$file      = apply_filters( "aamla_template_{$file_name}", $file, $arg );

	// Load the template file.
	if ( $file ) {
		get_template_part( $file );
	}
}

/**
 * Get link to blog posts page.
 *
 * @since  1.0.0
 *
 * @return url Link to blog posts page.
 */
function aamla_get_blog_posts_link() {
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	} else {
		return home_url();
	}
}

/**
 * Wrapper for 'add_action()' for theme specific hooks.
 *
 * This is a wrapper function on WordPress built-in function "add_action()"
 * to make it slightly clean and redable.
 *
 * @since 1.0.0
 *
 * @param string $func_name     Name of the functions to be hooked.
 * @param string $hook Template Name of the hook.
 * @param int    $priority      Priority of execution.
 * @param int    $args          Number of arguments passed to the function.
 * @return void
 */
function aamla_add_markup_for( $func_name, $hook, $priority = 10, $args = 1 ) {
	add_action( "aamla_{$hook}", "aamla_{$func_name}", $priority, $args );
}

/**
 * Wrapper for 'remove_action()' for theme specific hooks.
 *
 * This is a wrapper function on WordPress built-in function "remove_action()"
 * to make it slightly clean and redable.
 *
 * @since 1.0.0
 *
 * @param string $func_name     Name of the functions to be unhooked.
 * @param string $hook Template Name of the hook.
 * @param int    $priority      Priority of execution.
 * @param int    $args          Number of arguments passed to the function.
 * @return void
 */
function aamla_remove_markup_for( $func_name, $hook, $priority = 10, $args = 1 ) {
	remove_action( "aamla_{$hook}", "aamla_{$func_name}", $priority, $args );
}

/**
 * Set default values for theme customization options.
 *
 * @since 1.0.0
 *
 * @param str $option Control option for which default value is required.
 * @return mixed Returns integer, string or array option values.
 */
function aamla_get_default_value( $option ) {

	/**
	 * Filter default values for customizer options.
	 *
	 * @since 1.0.0
	 */
	$defaults = apply_filters( 'aamla_theme_defaults', [] );
	return isset( $defaults[ $option ] ) ? $defaults[ $option ] : '';
}

/**
 * Prepare inline css strings to be enqueued.
 *
 * Strip HTML tags including script/style and remove left over line breaks and white space chars.
 * Also, bit of css minification.
 *
 * @since 1.0.1
 *
 * @param string $styles css string to be prepared.
 * @return string
 */
function aamla_prepare_css( $styles ) {
	/*
	 * Properly strip all HTML tags including script/style and
	 * remove left over line breaks and white space chars.
	 */
	$styles = wp_strip_all_tags( $styles, true );

	// Bit of css minification.
	$to_be_replaced = [ ': ', '; ', ' {', ', ', ';}', ' + ' ];
	$replace_with   = [ ':', ';', '{', ',', '}', '+' ];
	$styles         = str_replace( $to_be_replaced, $replace_with, $styles );

	return $styles;
}
