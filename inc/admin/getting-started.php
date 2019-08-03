<?php
/**
 * Getting Started Page. 
 *
 * @package ArileWP
 */

require get_template_directory() . '/inc/admin/class-getting-start-plugin-helper.php';


// Adding Getting Started Page in admin menu

if( ! function_exists( 'arilewp_getting_started_menu' ) ) :
function arilewp_getting_started_menu() {	
		$plugin_count = null;
		if ( !is_plugin_active( 'arile-extra/arile-extra.php' ) ):	
			$plugin_count =	'<span class="awaiting-mod action-count">1</span>';
		endif;
	    /* translators: %1$s %2$s: about */		
		$title = sprintf(esc_html__('About %1$s %2$s', 'arilewp'), esc_html( ARILEWP_THEME_NAME ), $plugin_count);
		/* translators: %1$s: welcome page */	
		add_theme_page(sprintf(esc_html__('Welcome to %1$s', 'arilewp'), esc_html( ARILEWP_THEME_NAME ), esc_html(ARILEWP_THEME_VERSION)), $title, 'edit_theme_options', 'arilewp-getting-started', 'arilewp_getting_started_page');
}
endif;
add_action( 'admin_menu', 'arilewp_getting_started_menu' );

// Load Getting Started styles in the admin
if( ! function_exists( 'arilewp_getting_started_admin_scripts' ) ) :
function arilewp_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_arilewp-getting-started' != $hook ) return;

    wp_enqueue_style( 'arilewp-getting-started', get_template_directory_uri() . '/inc/admin/css/getting-started.css', false, ARILEWP_THEME_VERSION );
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'arilewp-getting-started', get_template_directory_uri() . '/inc/admin/js/getting-started.js', array( 'jquery' ), ARILEWP_THEME_VERSION, true );
    wp_enqueue_script( 'arilewp-recommended-plugin-install', get_template_directory_uri() . '/inc/admin/js/recommended-plugin-install.js', array( 'jquery' ), ARILEWP_THEME_VERSION, true );    
    wp_localize_script( 'arilewp-recommended-plugin-install', 'arilewp_start_page', array( 'activating' => __( 'Activating ', 'arilewp' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'arilewp_getting_started_admin_scripts' );


// Plugin API
if( ! function_exists( 'arilewp_call_plugin_api' ) ) :
function arilewp_call_plugin_api( $slug ) {
	require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'arilewp_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'arilewp_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}
endif;

// Callback function for admin page.
if( ! function_exists( 'arilewp_getting_started_page' ) ) :
function arilewp_getting_started_page() { ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3>
				<?php 
				/* translators: %1$s %2$s: welcome message */	
				printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'arilewp' ), esc_html( ARILEWP_THEME_NAME ), esc_html( ARILEWP_THEME_VERSION ) ); ?></h3>
				<p><?php esc_html_e( 'ArileWP is a creative and professional multipurpose WordPress theme that is suited for business, consultant, finance, digital agency, industries, online shop and many other various site types.', 'arilewp' ); ?></p>
			</div>
			<div class="intro right">
				<a target="_blank" href="#"><img src="<?php echo get_template_directory_uri();  ?>/inc/admin/images/logo.png"></a>
			</div>
		</div>
		<div class="panels">
			<ul class="inline-list">
			    <li class="current">
					<a id="getting-started-panel" href="#">
						<?php esc_html_e( 'Getting Started', 'arilewp' ); ?>
					</a>
				</li>
				<li class="recommended-plugins-active">
					<a id="plugins" href="#">
						<?php esc_html_e( 'Recommended Actions', 'arilewp' ); 
						if ( !is_plugin_active( 'arile-extra/arile-extra.php' ) ):  ?>
							<span class="plugin-not-active">1</span>
						<?php endif; ?>
					</a>
				</li>
				<li>
                	<a id="useful-plugin-panel" href="#">
						<?php esc_html_e( 'Useful Plugins', 'arilewp' ); ?>
					</a>
				</li>
				<li>
					<a id="free-pro-panel" href="#">
						<?php esc_html_e( 'Free Vs Pro', 'arilewp' ); ?>
					</a>
				</li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/inc/admin/tabs/getting-started-panel.php'; ?>
				<?php require get_template_directory() . '/inc/admin/tabs/recommended-plugins-panel.php'; ?>
				<?php require get_template_directory() . '/inc/admin/tabs/useful-plugin-panel.php'; ?>
				<?php require get_template_directory() . '/inc/admin/tabs/free-vs-pro-panel.php'; ?>
			</div>
			<div class="panel">
				<div class="panel-aside panel-column w-50">
					<h4><?php esc_html_e( 'Support', 'arilewp' ); ?></h4>
					<p><?php esc_html_e( 'Still having a problem after using all the documentation? No Problem!! Our dedicated support team will help you to solve your problem. Hope you are enjoying our ArileWP theme.', 'arilewp' ); ?></p>
					<a class="button button-primary" href="#" title="<?php esc_attr_e( 'Get Support', 'arilewp' ); ?>"><?php esc_html_e( 'Get Support', 'arilewp' ); ?></a>
				</div>
			   <div class="panel-aside panel-column w-50">
					<h4><?php esc_html_e( 'Leave us a review', 'arilewp' ); ?></h4>
					<p><?php esc_html_e( 'If you are enjoying our arilewp theme. So we will be waiting for your beautiful feedback. We will appreciate you with love.', 'arilewp' ); ?></p>
					<a class="button button-primary" href="#" title="<?php esc_attr_e( 'Submit a review', 'arilewp' ); ?>"><?php esc_html_e( 'Submit a review', 'arilewp' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
endif;


/**
 * Admin notice 
 */
class arilewp_screen {
 	public function __construct() {
		/* notice  Lines*/
		add_action( 'load-themes.php', array( $this, 'arilewp_activation_admin_notice' ) );
	}
	public function arilewp_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'arilewp_admin_notice' ), 99 );
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function arilewp_admin_notice() {
		?>			
		<div class="updated notice is-dismissible arilewp-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'arilewp'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing ArileWP theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "arilewp"), '<a href="' . esc_url( admin_url( 'themes.php?page=arilewp-getting-started' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=arilewp-getting-started' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with ArileWP','arilewp'); ?></a></p>
		</div>
		<?php
	}
	
}
$GLOBALS['arilewp_screen'] = new arilewp_screen();