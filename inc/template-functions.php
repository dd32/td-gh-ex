<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package fmi
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fmi_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'fmi_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function fmi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'fmi_pingback_header' );

/**
 * Register jquery scripts
 */
function fmi_scripts_styles_method() {
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery_cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );
	/**
	 * Enqueue Slider setup js file.
	 */	
	if( get_theme_mod( 'activate_slider', '0' ) == '1' ) { 
		if ( is_home() || is_front_page() ) {
			wp_enqueue_script( 'fmi_slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery_cycle' ), false, true );

		}
	}
}
add_action( 'wp_enqueue_scripts', 'fmi_scripts_styles_method' );

/**
 * Fucntion to select the sidebar
 */
function fmi_sidebar_select() {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_fmi_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_theme_mod( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_fmi_layout', true ); 
	}
	
	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$fmi_default_layout = get_theme_mod( 'default_layout', 'right_sidebar' );

	$fmi_default_page_layout = get_theme_mod( 'pages_default_layout', 'right_sidebar' );
	$fmi_default_post_layout = get_theme_mod( 'single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $fmi_default_page_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $fmi_default_page_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( is_single() ) {
			if( $fmi_default_post_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $fmi_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( $fmi_default_layout == 'right_sidebar' ) { get_sidebar(); }
		elseif ( $fmi_default_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
	}
	elseif( $layout_meta == 'right_sidebar' ) { get_sidebar(); }
	elseif( $layout_meta == 'left_sidebar' ) { get_sidebar( 'left' ); }
}

/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function fmi_body_class( $fmi_classes ) {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_fmi_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_theme_mod( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_fmi_layout', true ); 
	}

	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$fmi_default_layout = get_theme_mod( 'default_layout', 'right_sidebar' );

	$fmi_default_page_layout = get_theme_mod( 'pages_default_layout', 'right_sidebar' );
	$fmi_default_post_layout = get_theme_mod( 'single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $fmi_default_page_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
			elseif( $fmi_default_page_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
			elseif( $fmi_default_page_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( is_single() ) {
			if( $fmi_default_post_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
			elseif( $fmi_default_post_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
			elseif( $fmi_default_post_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( $fmi_default_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
		elseif( $fmi_default_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
		elseif( $fmi_default_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

	}
	elseif( $layout_meta == 'right_sidebar' ) { $fmi_classes[] = ''; }
	elseif( $layout_meta == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
	elseif( $layout_meta == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

	if( get_theme_mod( 'site_layout', 'wide' ) == 'wide' ) {
		$fmi_classes[] = 'wide';
	}
	
	return $fmi_classes;
}
add_filter( 'body_class', 'fmi_body_class' );

function fmi_slider() { ?>
	<div class="slider-wrap">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$fmi_slider_title = get_theme_mod( 'slider_title'.$i , '' );
				$fmi_slider_text = get_theme_mod( 'slider_text'.$i , '' );
				$fmi_slider_image = get_theme_mod( 'slider_image'.$i , '' );
				$fmi_slider_link = get_theme_mod( 'slider_link'.$i , '#' );
				if( !empty( $fmi_slider_image ) ) {
					if ( $i == 1 ) { $fmi_classes = "slides displayblock"; } else { $fmi_classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $fmi_classes; ?>">
						<div class="slider-image-wrap">
							<img alt="<?php echo esc_attr( $fmi_slider_title ); ?>" src="<?php echo esc_url( $fmi_slider_image ); ?>">
					    </div>
					    <?php if( !empty( $fmi_slider_title ) || !empty( $fmi_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $fmi_slider_title )  ) { ?>
							     			<span id="slider-title" class="clearfix"><a title="<?php echo esc_attr( $fmi_slider_title ); ?>" href="<?php echo esc_url( $fmi_slider_link ); ?>"><?php echo esc_html( $fmi_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $fmi_slider_text )  ) { ?>
							     			<span id="slider-content"><?php echo esc_html( $fmi_slider_text ); ?></span>
							     		<?php } ?>
							     	</div>
							    </div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers -->
	</div><!-- .slider-cycle -->
<?php
}