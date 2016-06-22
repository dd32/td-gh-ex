<?php
/**
 *
 * WARNING: Please do not edit this file.
 * @see http://codex.wordpress.org/Child_Themes
 *
 */

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * This function outputs a list of selected social networks based on options. Can be called throughout the theme and is used in the Social Media Widget.
 */
if ( ! function_exists( 'sds_social_media' ) ) {
	function sds_social_media() {
		global $sds_theme_options;

		if ( ! empty( $sds_theme_options['social_media'] ) ) {
			// Map the correct values for social icon display (FontAwesome webfont, i.e. 'fa-rss' = RSS icon)
			$social_font_map = array(
				'facebook_url' => array(
					'icon' => 'fa fa-facebook',
					'label' => __( 'Facebook', 'baton' )
				),
				'twitter_url' => array(
					'icon' => 'fa fa-twitter',
					'label' => __( 'Twitter', 'baton' )
				),
				'linkedin_url' => array(
					'icon' => 'fa fa-linkedin',
					'label' => __( 'LinkedIn', 'baton' )
				),
				'google_plus_url' => array(
					'icon' => 'fa fa-google-plus',
					'label' => __( 'Google+', 'baton' )
				),
				'youtube_url' => array(
					'icon' => 'fa fa-youtube',
					'label' => __( 'YouTube', 'baton' )
				),
				'vimeo_url' => array(
					'icon' => 'fa fa-vimeo-square',
					'label' => __( 'Vimeo', 'baton' )
				),
				'pinterest_url' => array(
					'icon' => 'fa fa-pinterest',
					'label' => __( 'Pinterest', 'baton' )
				),
				'instagram_url' => array(
					'icon' => 'fa fa-instagram',
					'label' => __( 'Instagram', 'baton' )
				),
				'flickr_url' => array(
					'icon' => 'fa fa-flickr',
					'label' => __( 'Flickr', 'baton' )
				),
				'foursquare_url' => array(
					'icon' => 'fa fa-foursquare',
					'label' => __( 'Foursquare', 'baton' )
				),
				'rss_url' => array(
					'icon' => 'fa fa-rss',
					'label' => __( 'RSS', 'baton' )
				),
			);

			$social_font_map = apply_filters( 'sds_social_icon_map', $social_font_map );
			?>

			<div class="social-media-icons baton-flex baton-flex-5-columns baton-flex-social-media">
				<?php
					foreach( $sds_theme_options['social_media'] as $key => $url ) :
						// RSS (use site RSS feed, $url is Boolean this case)
						if ( $key === 'rss_url_use_site_feed' && $url ) :
					?>
							<a href="<?php esc_attr( bloginfo( 'rss2_url' ) ); ?>" class="rss-url baton-col baton-col-social-media" target="_blank">
								<span class="social-media-icon <?php echo esc_attr( $social_font_map['rss_url']['icon'] ); ?>"></span>
								<br />
								<span class="social-media-label rss-url-label"><?php echo $social_font_map['rss_url']['label']; ?></span>
							</a>
					<?php
						// RSS (use custom RSS feed)
						elseif ( $key === 'rss_url' && ! $sds_theme_options['social_media']['rss_url_use_site_feed'] && ! empty( $url ) ) :
					?>
							<a href="<?php echo esc_attr( $url ); ?>" class="rss-url baton-col baton-col-social-media" target="_blank">
								<span class="social-media-icon <?php echo esc_attr( $social_font_map['rss_url']['icon'] ); ?>"></span>
								<br />
								<span class="social-media-label rss-url-label"><?php echo $social_font_map['rss_url']['label']; ?></span>
							</a>
					<?php
						// All other networks
						elseif ( $key !== 'rss_url_use_site_feed' && $key !== 'rss_url' && ! empty( $url ) ) :
							$css_class = str_replace( '_', '-', $key ); // Replace _ with -
					?>
							<a href="<?php echo esc_attr( $url ); ?>" class="<?php echo esc_attr( $css_class ); ?> baton-col baton-col-social-media" target="_blank">
								<span class="social-media-icon <?php echo esc_attr( $social_font_map[$key]['icon'] ); ?>"></span>
								<br />
								<span class="social-media-label <?php echo esc_attr( $css_class ); ?>-label"><?php echo $social_font_map[$key]['label']; ?></span>
							</a>
					<?php
						endif;
					endforeach;
				?>
			</div>
		<?php
		}
	}
}

/**
 * This function displays meta for the current post (including categories and tags).
 */
if ( ! function_exists( 'sds_post_meta' ) ) {
	function sds_post_meta( $archive = false ) {
	?>
			<span class="article-date <?php echo ( $archive ) ? 'baton-col baton-col-article-date' : false; ?>">
				<?php
					// Archives without titles
					if ( $archive && strlen( get_the_title() ) === 0 ) :
				?>
					<a href="<?php the_permalink(); ?>">
						<span class="fa fa-calendar-o"></span>
						<?php echo get_the_time( get_option( 'date_format' ) ); ?>
					</a>
				<?php
					// Everything else
					else:
				?>
						<span class="fa fa-calendar-o"></span>
				<?php
						echo get_the_time( get_option( 'date_format' ) );
					endif;
				?>
			</span>
		<?php
			if ( $archive ) :
		?>
			<span class="article-author-link <?php echo ( $archive ) ? 'baton-col baton-col-author-link' : false; ?>">
				<a class="author-view-more-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<span class="fa fa-user"></span>
					<?php echo get_the_author_meta( 'display_name' ); ?>
				</a>
			</span>
		<?php
			endif;
		?>
			<span class="article-comments-link <?php echo ( $archive ) ? 'baton-col baton-col-comments-link' : false; ?>">
				<a href="<?php echo esc_url( get_comments_link() ); ?>">
					<span class="fa fa-comment-o"></span>
					<?php echo get_comments_number(); ?>
				</a>
			</span>
	<?php
	}
}

/**
 * This function outputs next/prev navigation on single posts.
 */
if ( ! function_exists( 'sds_single_post_navigation' ) ) {
	function sds_single_post_navigation() {
		$next_post_link = get_next_post_link( '%link', '%title' );
		$previous_post_link = get_previous_post_link( '%link', '%title' );
	?>
		<!-- Single Post Navigation -->
		<div class="article-post-navigation single-post-navigation post-navigation baton-flex baton-flex-2-columns baton-flex-post-navigation <?php echo esc_attr( ( $next_post_link || $previous_post_link ) ? 'has-links': 'no-links' ); ?>">
			<div class="previous-posts baton-col baton-col-previous-posts">
				<?php if ( $next_post_link ) : ?>
					<span class="article-post-navigation-label"><?php _e( 'Previous Post', 'baton' ); ?></span>
					<?php echo $next_post_link; ?>
				<?php endif; ?>
			</div>
			<div class="next-posts baton-col baton-col-next-posts">
				<?php if ( $previous_post_link ) : ?>
					<span class="article-post-navigation-label"><?php _e( 'Next Post', 'baton' ); ?></span>
					<?php echo $previous_post_link; ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- End Single Post Navigation -->
	<?php
	}
}

/**
 * This function outputs next/prev navigation on single image attachments.
 */
if ( ! function_exists( 'sds_single_image_navigation' ) ) {
	function sds_single_image_navigation() {
	?>
		<!-- Single Image Navigation -->
		<div class="article-post-navigation single-post-navigation post-navigation single-image-navigation image-navigation baton-flex baton-flex-2-columns baton-flex-post-navigation">
			<div class="previous-posts baton-col baton-col-previous-posts">
				<?php previous_image_link( false, 'Previous Image' ); ?>
			</div>
			<div class="next-posts baton-col baton-col-next-posts">
				<?php next_image_link( false, 'Next Image' ); ?>
			</div>
		</div>
		<!-- End Single Image Navigation -->
	<?php
	}
}

/**
 * This function registers all content layouts available in this theme.
 */
if ( ! function_exists( 'sds_content_layouts' ) ) {
	function sds_content_layouts() {
		$content_layouts = array(
			'default' => array( // Name used in saved option
				'label' => __( 'Default', 'baton' ), // Label on options panel (required)
				'preview' => '<div class="cols cols-1 cols-default"><div class="col col-content" title="%1$s"><span class="label">%1$s</span></div></div>', // Preview on options panel (required; %1$s is replaced with values below on options panel if specified)
				'preview_values' => array( __( 'Default', 'baton' ) ),
				'default' => true
			),
			'cols-1' => array( // Full Width
				'label' => __( 'Full Width', 'baton' ),
				'preview' => '<div class="cols cols-1"><div class="col col-content"></div></div>',
			),
			'cols-2' => array( // Content Left, Primary Sidebar Right
				'label' => __( 'Content Left', 'baton' ),
				'preview' => '<div class="cols cols-2"><div class="col col-content"></div><div class="col col-sidebar"></div></div>'
			),
			'cols-2-r' => array( // Content Right, Primary Sidebar Left
				'label' => __( 'Content Right', 'baton' ),
				'preview' => '<div class="cols cols-2 cols-2-r"><div class="col col-sidebar"></div><div class="col col-content"></div></div>'
			)
		);

		return apply_filters( 'sds_theme_options_content_layouts', $content_layouts );
	}
}

/**
 * This function registers all color schemes available in this theme.
 */
if ( ! function_exists( 'sds_color_schemes' ) ) {
	function sds_color_schemes() {
		$color_schemes = array(
			// Default (any additional color schemes should contain all of these properties as well as a 'deps' property)
			'default' => array( // Name used in saved option
				'label' => __( 'Default', 'baton' ), // Label on options panel (required)
				'stylesheet' => false, // Stylesheet URL, relative to theme directory (required)
				'preview' => '#7cb2c2', // Preview color on options panel (required)
				'default' => true,
				// Customizer
				'background_color' => '#f1f5f9', // Default background color
			),
			// Blue
			'blue' => array(
				'label' => __( 'Blue', 'baton' ),
				'stylesheet' => '/css/blue.css',
				'preview' => '#3f70d4',
				'deps' => 'baton',
				// Customizer
				'background_color' => '#ffffff', // Default background color
			),
			// Green
			'green' => array(
				'label' => __( 'Green', 'baton' ),
				'stylesheet' => '/css/green.css',
				'preview' => '#66bc7d',
				'deps' => 'baton',
				// Customizer
				'background_color' => '#f1f5f9', // Default background color
			),
			// Red
			'red' => array(
				'label' => __( 'Red', 'baton' ),
				'stylesheet' => '/css/red.css',
				'preview' => '#ff5b5d',
				'deps' => 'baton',
				// Customizer
				'background_color' => '#ffffff', // Default background color
			)
		);

		return apply_filters( 'sds_theme_options_color_schemes', $color_schemes );
	}
}

/**
 * This function sets a default featured image size for use in this theme.
 */
if ( ! function_exists( 'sds_theme_options_default_featured_image_size' ) ) {
	add_filter( 'sds_theme_options_default_featured_image_size', 'sds_theme_options_default_featured_image_size' );

	function sds_theme_options_default_featured_image_size( $default ) {
		return 'baton-1200x9999';
	}
}

if ( ! function_exists( 'sds_copyright_branding' ) ) {
	add_filter( 'sds_copyright_branding', 'sds_copyright_branding', 10, 2 );

	function sds_copyright_branding( $text, $theme_name ) {
		return '<a href="http://slocumthemes.com/wordpress-themes/baton/?utm_source=' . esc_url( home_url() ) . '&amp;utm_medium=footer-plugs&amp;utm_campaign=WordPressThemes" target="_blank">' . $theme_name . ' by Slocum Studio</a>';
	}
}

/**
 * This function modifies the global $content_width value based on content layout or page template settings.
 */
if ( ! function_exists( 'baton_body_class' ) ) {
	add_filter( 'body_class', 'baton_body_class', 20 );

	function baton_body_class( $classes ) {
		global $sds_theme_options, $content_width;

		// Content layout was specified by user in Theme Options
		if ( isset( $sds_theme_options['body_class'] ) && ! empty( $sds_theme_options['body_class'] ) )
			// 1 Column
			if ( $sds_theme_options['body_class'] === 'cols-1' )
				$content_width = 1272;

		// Page Template was specified by the user for this page
		if ( ! empty( $sds_theme_options['page_template'] ) && $sds_theme_options['page_template'] !== 'default' )
			// Full Width or Landing Page
			if ( in_array( $sds_theme_options['page_template'], array( 'page-full-width.php', 'page-landing-page.php' ) ) )
				$content_width = 1272;

		// Customizer
		if ( is_customize_preview() )
			$classes['baton-customizer'] = 'customizer';

		// Front Page
		if ( is_front_page() ) {
			// If the Front Page Sidebar is active
			if ( baton_has_static_front_page() && sds_is_front_page_sidebar_active() )
				$classes['baton-front-page-sidebar-active'] = 'front-page-sidebar-active';

			// If Baton Conductor is enabled
			if ( baton_has_blog_front_page() && have_posts() && baton_is_baton_conductor_enabled() ) {
				$classes['baton-baton-conductor'] = 'baton-baton-conductor';

				// Enhanced Display
				if ( baton_is_baton_conductor_display_enhanced() )
					$classes['baton-baton-conductor-enhanced-display'] = 'baton-baton-conductor-enhanced-display';
			}

			// If Conductor is active on the Front Page
			if ( class_exists( 'Conductor' ) && Conductor::is_conductor() ) {
				// Remove the CSS classes
				if ( isset( $classes['baton-front-page-sidebar-active'] ) )
					unset( $classes['baton-front-page-sidebar-active'] );

				if ( isset( $classes['baton-baton-conductor-enhanced-display'] ) )
					unset( $classes['baton-baton-conductor-enhanced-display'] );

				if ( isset( $classes['baton-baton-conductor'] ) )
					unset( $classes['baton-baton-conductor'] );
			}
		}

		return $classes;
	}
}

/**
 * This function returns the more link label for Baton.
 */
function baton_more_link_label( $return_default_only = false ) {
	// Return default
	if ( $return_default_only )
		return __( 'Continue Reading', 'baton' );

	// Get theme mod
	$label = get_theme_mod( 'baton_more_link_label' );

	return ( ! empty( $label ) ) ? $label : __( 'Continue Reading', 'baton' );
}

/**
 * This function returns the Boolean value of the parameter passed.
 */
if ( ! function_exists( 'baton_boolval' ) ) {
	function baton_boolval( $var, $wp_customize_setting = false ) {
		return ( bool ) $var;
	}
}

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @param object $comment Comment to display.
 * @param array $args Optional args.
 * @param int $depth Depth of comment.
 */
if ( ! function_exists( 'baton_comment' ) ) {
	function baton_comment( $comment, $args, $depth ) {
		// Set the global comment variable to this comment
		$GLOBALS['comment'] = $comment;

		// Switch based on comment type
		switch ( $comment->comment_type ) :
			// Pingbacks and Trackbacks
			case 'pingback':
			case 'trackback':
			?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'pingback' ); ?>>
					<p><?php _e( 'Pingback:', 'baton' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '<span class="ping-meta"><span class="edit-link">', '</span></span>' ); ?></p>
				</li>
			<?php
			break;
			// All other types of comments
			default:
			?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
					<article id="comment-<?php comment_ID(); ?>-wrap">
						<div class="comment-author vcard">
							<header class="comment-author-details baton-flex">
								<div class="author-avatar baton-col baton-col-comment-author-avatar">
									<?php echo get_avatar( $comment, 60 ); ?>
								</div>

								<div class="author-meta baton-col baton-col-comment-author-meta">
									<div class="author-link"><?php comment_author_link(); ?></div>
									<div class="comment-meta">
										<cite>
											<?php
												printf( __( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', 'baton' ),
													esc_url( get_comment_link( $comment->comment_ID ) ),
													get_comment_time( 'c' ),
													sprintf( __( '%1$s at %2$s', 'baton' ), get_comment_date(), get_comment_time() )
												);
											?>

											<?php edit_comment_link( __( 'Edit', 'baton' ), '<span class="edit-link">', '<span>' ); ?>
										</cite>
									</div>
								</div>
							</header>
						</div>

						<div class="comment-content-wrap">
							<?php if ( $comment->comment_approved === '0' ) : ?>
								<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'baton' ); ?></p>
							<?php endif; ?>

							<div class="comment-content">
								<?php comment_text(); ?>
							</div>
						</div>

						<div class="clear"></div>

						<div class="comment-reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'baton' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div>
					</article>
				</li>
			<?php
			break;
		endswitch;
	}
}

/**
 * This function returns a variant (shade) of a hex color, altering by "steps" in RGB. Negative
 * step values decrease the "shade" of the color and positive step values increase the "shade"
 * of the color.
 */
if ( ! function_exists( 'baton_get_color_variant' ) ) {
	function baton_get_color_variant( $color, $steps = 20 ) {
		// Make sure the steps are between -255 and 255
		$steps = max( -255, min( 255, $steps ) );

		// Remove the hash (if passed)
		$color = ltrim( $color, '#' );

		// If we have a shorthand color, normalize it
		if ( strlen( $color ) === 3 )
			// Repeat the RGB values
			$color = str_repeat( $color[0] , 2 ) . str_repeat( $color[1] , 2 ) . str_repeat( $color[2] , 2 );

		// Bail if the color length isn't 6
		if ( strlen( $color ) !== 6 )
			return $color;

		// Setup the return data
		$r = '#';

		// Split the color string into the three primary colors (RGB)
		$primary_colors = str_split( $color, 2 );

		// Loop through primary colors
		foreach ( $primary_colors as $primary_color ) {
			// Convert the color to a decimal first
			$primary_color = hexdec( $primary_color );

			// Adjust the color by the number of steps
			$primary_color = ( int ) max( 0, min( 255, $primary_color + ( $primary_color * ( $steps / 255 ) ) ) ); // max( 0, min( 255, $primary_color + $steps ) )

			// Convert the color back to a hex value
			$primary_color = dechex( $primary_color );

			// Add the color to the return data (making sure there are 2 hex characters; padding with a 0 if there are not)
			$r .= ( strlen( $primary_color ) < 2 ) ? str_pad( $primary_color, 2, '0', STR_PAD_LEFT ) : $primary_color;
		}

		return $r;
	}
}

/**
 * This function outputs a fallback menu and is used when the Primary Menu
 * is inactive.
 */
if ( ! function_exists( 'sds_primary_menu_fallback' ) ) {
	function sds_primary_menu_fallback() {
		wp_page_menu( array(
			'menu_class'  => 'primary-nav menu',
			'echo'        => true,
			'show_home'   => true,
			'link_before' => '<span>',
			'link_after' => '</span>'
		) );
	}
}

/**
 * This function outputs a fallback menu for mobile devices and is used when the Primary Menu
 * is inactive.
 */
if ( ! function_exists( 'baton_mobile_primary_menu_fallback' ) ) {
	function baton_mobile_primary_menu_fallback() {
		wp_page_menu( array(
			'menu_class'  => 'primary-nav primary-nav-mobile menu',
			'echo'        => true,
			'show_home'   => true,
			'link_before' => '<span>',
			'link_after' => '</span>'
		) );
	}
}

/**
 * This function checks to see if Yoast Breadcrumbs are active.
 */
function baton_is_yoast_breadcrumbs_active() {
	return ( function_exists( 'yoast_breadcrumb' ) && ( ( $wpseo_internallinks = get_option( 'wpseo_internallinks' ) ) && isset( $wpseo_internallinks['breadcrumbs-enable'] ) && $wpseo_internallinks['breadcrumbs-enable'] ) );
}

/**
 * This determines if Baton Conductor enhanced display is enabled.
 */
function baton_is_baton_conductor_display_enhanced() {
	// Grab the Baton_Conductor instance
	$baton_conductor = Baton_Conductor_Instance();

	return $baton_conductor->is_baton_conductor_enhanced_display_enabled();
}

/**
 * This determines if Baton Conductor is enabled.
 */
function baton_is_baton_conductor_enabled() {
	// Grab the Baton_Conductor instance
	$baton_conductor = Baton_Conductor_Instance();

	return $baton_conductor->is_baton_conductor_enabled();
}

/**
 * This determines if a static front page is selected.
 */
function baton_has_static_front_page() {
	return ( get_option( 'show_on_front' ) === 'page' && get_option( 'page_on_front' ) );
}

/**
 * This determines if a blog front page is selected.
 */
function baton_has_blog_front_page() {
	return ( ! baton_has_static_front_page() );
}

/**
 * This is used as the active_callback for Baton Conductor customizer components.
 */
function baton_conductor_customizer_active_callback() {
	return ( baton_is_baton_conductor_enabled() && baton_has_blog_front_page() );
}

/**
 * This function outputs categories and tags.
 */
if ( ! function_exists( 'baton_categories_tags' ) ) {
	function baton_categories_tags( $force_display = false ) {
		// Grab categories and tags
		$categories = get_the_category();
		$tags = get_the_tags();

		// CSS Classes
		$css_classes = array(
			( $categories ) ? 'has-categories' : 'no-categories',
			( $tags ) ? 'has-tags' : 'no-tags'
		);
	?>
		<div class="article-categories-wrap <?php echo esc_attr( implode( ' ', $css_classes ) ); ?>">
			<?php
				// Categories
				if ( $categories && ( is_singular( 'post' ) || $force_display ) ) :
			?>
				<span class="categories">
					<span class="fa fa-filter"></span>
					<?php the_category( ', ' ); ?>
				</span>
			<?php
				endif;
			?>

			<?php
				// Tags
				if ( $tags && ( is_singular( 'post' ) || $force_display ) ) :
			?>
				<span class="tags">
					<span class="fa <?php echo esc_attr( ( count( $tags ) > 1 ) ? 'fa-tags' : 'fa-tag' ); ?>"></span>
					<?php the_tags( '', ', ' ); ?>
				</span>
			<?php
				endif;
			?>
		</div>
	<?php
	}
}

/*
 * SDS Core
 */
if ( ! function_exists( 'sds_theme_options_ads' ) ) {
	add_action( 'sds_theme_options_ads', 'sds_theme_options_ads' );

	function sds_theme_options_ads() {
	?>
		<div class="sds-theme-options-ad">
			<a href="<?php echo esc_url( sds_get_pro_link( 'theme-options-ad' ) ); ?>" target="_blank" class="sds-theme-options-upgrade-ad">
				<h3><?php _e( 'Upgrade to Baton Pro!', 'baton' ); ?></h3>
				<ul>
					<li><?php _e( 'Priority Ticketing Support', 'baton' ); ?></li>
					<li><?php _e( 'More Color Schemes', 'baton' ); ?></li>
					<li><?php _e( 'More Web Fonts', 'baton' ); ?></li>
					<li><?php _e( 'Adjust Featured Image Sizes', 'baton' ); ?></li>
					<li><?php _e( 'Easily Add Custom Scripts/Styles', 'baton' ); ?></li>
					<li><?php _e( 'and More!', 'baton' ); ?></li>
				</ul>

				<span class="sds-theme-options-btn-green"><?php _e( 'Upgrade Now!', 'baton' ); ?></span>
			</a>
		</div>

		<div class="sds-theme-options-ad">
			<a href="<?php echo esc_url( 'http://conductorplugin.com/slocum-themes/' ); ?>" target="_blank" class="sds-theme-options-upgrade-ad sds-theme-options-upgrade-ad-dark-gray">
				<h3><?php _e( 'Introducing Conductor Plugin', 'baton' ); ?></h3>
				<ul>
					<li><?php _e( 'Custom Layouts', 'baton' ); ?></li>
					<li><?php _e( 'Custom Content Displays', 'baton' ); ?></li>
					<li><?php _e( 'No Code Required!', 'baton' ); ?></li>
				</ul>

				<span class="sds-theme-options-btn-yellow"><?php _e( 'Get Conductor!', 'baton' ); ?></span>
			</a>
		</div>

		<div class="sds-theme-options-ad">
			<?php printf( __( 'Please rate <strong>Baton</strong> <a href="%1$s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%1$s" target="_blank">WordPress.org</a>.', 'baton' ), 'https://wordpress.org/support/view/theme-reviews/baton?filter=5' ); ?>
		</div>
	<?php
	}
}

function sds_get_pro_link( $content ) {
	return esc_url( 'https://slocumthemes.com/wordpress-themes/baton-pro/?utm_source=baton&utm_medium=link&utm_content=' . urlencode( sanitize_title_with_dashes( $content ) ) . '&utm_campaign=pro#purchase-theme' );
}

if ( ! function_exists( 'sds_copyright_branding' ) ) {
	add_filter( 'sds_copyright_branding', 'sds_copyright_branding', 10, 2 );

	function sds_copyright_branding( $text, $theme_name ) {
		return sprintf( __( '<a href="%1$s">%2$s by Slocum Studio</a>', 'baton' ), esc_url( 'https://slocumthemes.com/wordpress-themes/baton/' ), $theme_name );
	}
}

if ( ! function_exists( 'sds_about_page_pro_color_schemes_count' ) ) {
	add_filter( 'sds_about_page_pro_color_schemes_count', 'sds_about_page_pro_color_schemes_count' );

	function sds_about_page_pro_color_schemes_count( $count ) {
		return 4;
	}
}

if ( ! function_exists( 'sds_about_page_pro_content_layouts_count' ) ) {
	add_filter( 'sds_about_page_pro_content_layouts_count', 'sds_about_page_pro_content_layouts_count' );

	function sds_about_page_pro_content_layouts_count( $count ) {
		return 3;
	}
}

if ( ! function_exists( 'sds_about_page_free_vs_pro_table' ) ) {
	add_filter( 'sds_about_page_free_vs_pro_table', 'sds_about_page_free_vs_pro_table' );

	function sds_about_page_free_vs_pro_table() {
		/*
		 * Individual Colors
		 */
	?>
		<tr>
			<td class="sds-about-page-free-vs-pro-component">
				<h4><?php _e( 'Individual Color Customization', 'baton' ); ?></h4>
				<p><?php _e( 'Customize various individual colors to fine-tune your design.', 'baton' ); ?></p>
			</td>
			<td class="sds-about-page-free-vs-pro-free-component">
				<span class="fa fa-times"></span>
			</td>
			<td class="sds-about-page-free-vs-pro-pro-component">
				<span class="fa fa-check"></span>
			</td>
		</tr>
	<?php
		/*
		 * Font Family and Size
		 */
	?>
		<tr>
			<td class="sds-about-page-free-vs-pro-component">
				<h4><?php _e( 'Font Families and Sizes', 'baton' ); ?></h4>
				<p><?php _e( 'Choose the perfect font families and sizes.', 'baton' ); ?></p>
			</td>
			<td class="sds-about-page-free-vs-pro-free-component">
				<span class="fa fa-times"></span>
			</td>
			<td class="sds-about-page-free-vs-pro-pro-component">
				<span class="fa fa-check"></span>
			</td>
		</tr>
	<?php
		/*
		 * Header Alignment
		 */
	?>
		<tr>
			<td class="sds-about-page-free-vs-pro-component">
				<h4><?php _e( 'Header Alignment', 'baton' ); ?></h4>
				<p><?php _e( 'Choose the perfect alignment for the header areas in Baton Pro.', 'baton' ); ?></p>
			</td>
			<td class="sds-about-page-free-vs-pro-free-component">
				<span class="fa fa-times"></span>
			</td>
			<td class="sds-about-page-free-vs-pro-pro-component">
				<span class="fa fa-check"></span>
			</td>
		</tr>
	<?php
	}
}


/**
 * Load the theme function files (options panel, theme functions, widgets, etc...).
 */
include_once get_template_directory() . '/includes/class-tgm-plugin-activation.php'; // TGM Activation

include_once get_template_directory() . '/includes/theme-options.php'; // SDS Theme Options
include_once get_template_directory() . '/includes/theme-functions.php'; // SDS Theme Options Functions
include_once get_template_directory() . '/includes/widget-social-media.php'; // SDS Social Media Widget

include_once get_template_directory() . '/theme/class-baton.php'; // Baton Class (main functionality, actions/filters)
include_once get_template_directory() . '/theme/class-baton-customizer.php'; // Baton Customizer Class (specific to the customizer)

include_once get_template_directory() . '/theme/class-baton-conductor.php'; // Baton Conductor Class
include_once get_template_directory() . '/theme/class-baton-conductor-customizer.php'; // Baton Conductor Customizer Class (specific to the customizer)