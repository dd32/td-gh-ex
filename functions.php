<?php
require_once( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/theme-init/init.php' );
if ( is_admin() ):
	require_once( get_template_directory() . '/admin/admin-pages.php' );
endif;

add_action( 'after_setup_theme', 'atlast_agency_setup' );
function atlast_agency_setup() {
	load_theme_textdomain( 'atlast-agency', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_editor_style( get_template_directory_uri() . '/assets/css/main-styles.css' );

	add_theme_support( 'custom-header', array(
		'flex-width'  => true,
		'flex-height' => true,
		'height'      => 1080,
		'width'       => 1920,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 260,
		'flex-height' => true,
		'flex-width'  => true
	) );
	add_theme_support( 'automatic-feed-links' );
	add_image_size( 'atlast-agency-about-2-image', 690, 500, true );

	/*= Portfolio Style 1 =*/
	add_image_size('atlast-agency-portfolio-style-1-big-image',600,450,true);
	add_image_size('atlast-agency-portfolio-style-1-small-image',400,301,true);

	/*= Portfolio Style 2 =*/
    add_image_size('atlast-agency-portfolio-style-2-big-image',800,695,true);
    add_image_size('atlast-agency-portfolio-style-2-small-image',400,350,true);

    /*= Portfolio Style 3 =*/
    add_image_size('atlast-agency-portfolio-style-3-image',300,400,true);

    /*= Team member =*/
    add_image_size( 'atlast-agency-team-member-front', 300, 440, true );

    /*= Blog item image - front =*/
	add_image_size( 'atlast-agency-blog-list-image', 350, 220, true );

	/*= Testimonial Images front =*/
	add_image_size( 'atlast-agency-testimonial-image-front', 75, 75, true );


	add_image_size( 'atlast-agency-blog-single-image', 880, 530, true );
	add_image_size( 'atlast-agency-home-blog-image', 350, 220, true );

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 850;
	}

	$atlast_agency_bg_defaults = array(
		'default-color'    => 'ffffff',
		'default-image'    => '',
		'wp-head-callback' => 'atlast_agency_background_callback',
	);
	add_theme_support( 'custom-background', $atlast_agency_bg_defaults );

	register_nav_menus(
		array(
			'main-menu'      => __( 'Main Menu', 'atlast-agency' ),
			'copyright-menu' => __( 'Copyright Menu', 'atlast-agency' )
		)
	);
}

if ( ! function_exists( 'atlast_agency_background_callback' ) ):

	function atlast_agency_background_callback() {
		$background = set_url_scheme( get_background_image() );
		$color      = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

		if ( ! $background && ! $color ) {
			return;
		}

		$style = $color ? "background-color: #$color;" : '';

		if ( $background ) {
			$image = " background-image: url('$background');";

			$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
			if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
				$repeat = 'repeat';
			}
			$repeat = " background-repeat: $repeat;";

			$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
			if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
				$position = 'left';
			}
			$position = " background-position: top $position;";

			$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
			if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
				$attachment = 'scroll';
			}
			$attachment = " background-attachment: $attachment;";

			$style .= $image . $repeat . $position . $attachment;
		}
		?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo trim( $style ); ?>
            }
        </style>
		<?php
	}
endif;

add_action( 'wp_enqueue_scripts', 'atlast_agency_load_scripts' );
function atlast_agency_load_scripts() {

	wp_register_style( 'spectre', get_template_directory_uri() . '/assets/css/spectre-custom.css', '', '', 'all' );
	wp_register_style( 'sidr', get_template_directory_uri() . '/assets/css/sidr/stylesheets/jquery.sidr.light.css', '', '', 'all' );
	wp_register_style( 'fontAwesome5', get_template_directory_uri() . '/assets/css/fonts/fontAwesome/css/fontawesome-all.min.css', '', '1.0.0', 'all' );
	wp_register_style( 'atlast-agency-fonts', get_template_directory_uri() . '/assets/css/fonts/font-styles-dist.css', '', '1.0.1', 'all' );
	wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick/slick-dist.css', '', '1.9.0', 'all' );
	wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick/slick-theme-dist.css', '', '1.9.0', 'all' );

	wp_register_style( 'atlast-agency-portfolio-styles', get_template_directory_uri() . '/assets/css/portfolio-hovers.css', rand( 8, 888 ), '', 'all' );
	wp_register_style( 'atlast-agency-main-styles', get_template_directory_uri() . '/assets/css/main-styles.css', rand( 8, 888 ), '', 'all' );
	wp_register_style( 'atlast-agency-style', get_stylesheet_uri(), '', 'all' );

	wp_enqueue_style( 'spectre' );
	wp_enqueue_style( 'sidr' );
	wp_enqueue_style( 'fontAwesome5' );
	wp_enqueue_style( 'atlast-agency-fonts' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'atlast-agency-portfolio-styles' );
	wp_enqueue_style( 'atlast-agency-main-styles' );
	wp_enqueue_style( 'atlast-agency-style' );


	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'atlast-agency-mainjs', get_template_directory_uri() . '/assets/js/ms-dist.js', array( 'jquery' ), '', true );
	wp_localize_script( 'atlast-agency-mainjs', 'atlast_agency_vars', array(
			'ajax_url'          => admin_url( 'admin-ajax.php' ),
		)
	);
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function atlast_agency_admin_scripts( $hook_suffix ) {

	global $pagenow;

	if ( 'themes.php' === $pagenow || 'appearance_page_atlast-agency-hello' == $hook_suffix ) {
		wp_enqueue_style( 'atlast-agency-about-page-css', get_template_directory_uri() . '/admin/assets/css/admin-page.css','','1.1.5' );
	}

	// enqueue js files
	if ( 'appearance_page_atlast-agency-hello' == $hook_suffix ) {
		wp_enqueue_script( 'atlast-agency-about-page-js', ( get_template_directory_uri() . '/admin/assets/js/admin-page.js' ), array( 'jquery' ), '', 'true' );
	}
}
add_action('admin_enqueue_scripts','atlast_agency_admin_scripts');

if (!function_exists('atlast_agency_customizer_scripts')):
	function atlast_agency_customizer_scripts()
	{
		wp_enqueue_style('atlast-agency-customize-controls-styles', get_template_directory_uri() . '/admin/assets/css/customizer-controls.css', '', '', 'all');
		wp_enqueue_script('atlast-agency-customize-controls', get_template_directory_uri() . '/admin/assets/js/customizer-controls.js', array('customize-controls'));
	}
endif;
add_action('customize_controls_enqueue_scripts', 'atlast_agency_customizer_scripts', 0);

add_action( 'widgets_init', 'atlast_agency_widgets_init' );
function atlast_agency_widgets_init() {



	register_sidebar( array(
		'name'          => __( 'Footer sidebar', 'atlast-agency' ),
		'description'   => __( ' This sidebar appears in the footer. You can use the customizer to select the layout this sidebar', 'atlast-agency' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<section id="%1$s" class="col-3 col-md-6 col-xs-12 footer-widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="footer-widget-title '.esc_attr(atlast_agency_random_colors(rand(1,4))).'">',
		'after_title'   => '</h3>',
	) );

}

if ( ! function_exists( 'atlast_agency_comment' ) ):
	function atlast_agency_comment( $comment, $args, $depth ) {

		extract( $args, EXTR_SKIP );

		if ( 'article' == $args['style'] ) {
			$tag       = 'article';
			$add_below = 'comment';
		} else {
			$tag       = 'article';
			$add_below = 'comment';
		}

		?>
        <div class="comments-container">
            <div class="container">
                <div class="columns">
                    <<?php echo esc_html( $tag ) ?>
					<?php comment_class( empty( $args['has_children'] ) ? 'col-12' : 'parent col-12' ) ?>
                    id="comment-<?php comment_ID() ?>"
                    itemscope itemtype="http://schema.org/Comment">
                    <div class="columns">


                        <div class="column comment-meta post-meta col-sm-12" role="complementary">
                            <h2 class="comment-author">
                                <a class="comment-author-link" href="<?php comment_author_url(); ?>"
                                   itemprop="author"><?php comment_author(); ?></a>
                            </h2>
                            <time class="comment-meta-item"
                                  datetime="<?php comment_date( 'Y-m-d' ) ?>T<?php comment_time( 'H:iP' ) ?>"
                                  itemprop="datePublished"><?php comment_date( 'jS F Y' ) ?>, <a
                                        href="#comment-<?php comment_ID() ?>"
                                        itemprop="url"><?php comment_time() ?></a>
                            </time>

							<?php if ( $comment->comment_approved == '0' ) : ?>
                                <p class="comment-meta-item"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'atlast-agency' ); ?></p>
							<?php endif; ?>
                        </div>

                        <figure class="column gravatar hide-sm comments-gravatar">
							<?php echo get_avatar( $comment, 65 ); ?>
                        </figure>

                    </div>


                    <div class="comment-content post-content" itemprop="text">
						<?php comment_text() ?>
                        <div class="comment-reply">
							<?php comment_reply_link( array_merge( $args, array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							) ) ) ?>
                        </div>

						<?php edit_comment_link( '<p class="comment-meta-item">' . __( 'Edit this comment', 'atlast-agency' ) . '</p>', '', '' ); ?>
                    </div>


                </div>

            </div>
        </div>
	<?php }
endif;


if ( ! function_exists( 'atlast_agency_comment_end' ) ):
	function atlast_agency_comment_end() {
		echo '</article>';
	}
endif;

add_action( 'tgmpa_register', 'atlast_agency_register_required_plugins' );

function atlast_agency_register_required_plugins() {

	$plugins = array(

		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => 'Contact Form by WPForms – Drag & Drop Form Builder for WordPress',
			'slug'     => 'wpforms-lite',
			'required' => false,
		),
        array(
			'name'     => 'Simple Page Ordering',
			'slug'     => 'simple-page-ordering',
			'required' => false,
		),

	);

	$config = array(
		'id'           => 'atlast-agency',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.

		'strings' => array(
			'page_title' => __( 'Install Required Plugins', 'atlast-agency' ),
			'menu_title' => __( 'Install Plugins', 'atlast-agency' ),

			'installing' => __( 'Installing Plugin: %s', 'atlast-agency' ),

			'updating'                        => __( 'Updating Plugin: %s', 'atlast-agency' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'atlast-agency' ),
			'notice_can_install_required'     => _n_noop(

				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'atlast-agency'
			),
			'notice_can_install_recommended'  => _n_noop(

				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'atlast-agency'
			),
			'notice_ask_to_update'            => _n_noop(

				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'atlast-agency'
			),
			'notice_ask_to_update_maybe'      => _n_noop(

				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'atlast-agency'
			),
			'notice_can_activate_required'    => _n_noop(

				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'atlast-agency'
			),
			'notice_can_activate_recommended' => _n_noop(

				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'atlast-agency'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'atlast-agency'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'atlast-agency'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'atlast-agency'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'atlast-agency' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'atlast-agency' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'atlast-agency' ),

			'plugin_already_active' => __( 'No action taken. Plugin %1$s was already active.', 'atlast-agency' ),

			'plugin_needs_higher_version' => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'atlast-agency' ),

			'complete'                       => __( 'All plugins installed and activated successfully. %1$s', 'atlast-agency' ),
			'dismiss'                        => __( 'Dismiss this notice', 'atlast-agency' ),
			'notice_cannot_install_activate' => __( 'There are one or more required or recommended plugins to install, update or activate.', 'atlast-agency' ),
			'contact_admin'                  => __( 'Please contact the administrator of this site for help.', 'atlast-agency' ),

			'nag_type' => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		)

	);

	tgmpa( $plugins, $config );
}

/*
 * Import the demo data
 */
function atlast_agency_import_demo() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Atlast Agency Demo Import', 'atlast-agency' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo_data/atlastagency.wordpress.2018-08-01.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo_data/akisthemes.info-demos-atlast-agency-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo_data/atlast-agency-export.dat',
			'import_notice'                => esc_html__( 'After importing this data everything will be in place like the demo.', 'atlast-agency' ),
			'preview_url'                  => esc_url( 'https://akisthemes.info/demos/atlast-agency' ),
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'atlast_agency_import_demo' );
/*
 * Import HomePage, Blog and menus
 */
function atlast_agency_after_demo_import() {
	$main_menu        = get_term_by( 'name', 'Main', 'nav_menu' );
	$copyright_menu   = get_term_by( 'name', 'Copyright Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
			'main-menu'      => $main_menu->term_id,
			'copyright-menu' => $copyright_menu->term_id,
		)
	);


	$front_page_id = get_page_by_title( 'HOME' );
	$blog_page_id  = get_page_by_title( 'Latest News' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}

add_action( 'pt-ocdi/after_import', 'atlast_agency_after_demo_import' );