<?php
/**
 * Theme On Boarding process wizard.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Ast_OnBoarding_Wizard initial setup
 */
if ( ! class_exists( 'Ast_OnBoarding_Wizard' ) ) {

	/**
	 * Ast_OnBoarding_Wizard initial setup
	 *
	 * @since 1.0.0
	 */
	class Ast_OnBoarding_Wizard {

		/**
		 * Member Varible
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			if ( apply_filters( 'ast_enable_setup_wizard', true ) && current_user_can( 'manage_options' ) ) {
				add_action( 'admin_menu', array( $this, 'admin_menus' ) );
				add_action( 'admin_init', array( $this, 'setup_wizard' ) );
			}

		}

		/**
		 * Add admin menus/screens.
		 */
		public function admin_menus() {
			add_theme_page( '', '', 'manage_options', 'ast-setup', '' );
		}

		/**
		 * Show the setup wizard.
		 */
		public function setup_wizard() {
			if ( empty( $_GET['page'] ) || 'ast-setup' !== $_GET['page'] ) {
				return;
			}
			$this->steps = array(
				'welcome' => array(
					'name'    => __( 'Welcome', 'astra-theme' ),
					'view'    => array( $this, 'ast_setup_welcome' ),
					'handler' => '',
				),
				'child_theme' => array(
					'name'    => __( 'Child Theme', 'astra-theme' ),
					'view'    => array( $this, 'ast_child_theme_demo' ),
					'handler' => array( $this, 'ast_child_theme_demo_save' ),
				),
				'site_identity' => array(
					'name'    => __( 'Site Identity', 'astra-theme' ),
					'view'    => array( $this, 'site_identity_demo' ),
					'handler' => array( $this, 'site_identity_demo_save' ),
				),
				'theme_config' => array(
					'name'    => __( 'Theme Configuration', 'astra-theme' ),
					'view'    => array( $this, 'ast_theme_config' ),
					'handler' => array( $this, 'ast_theme_config_save' ),
				),
				'support' => array(
					'name'    => __( 'Support', 'astra-theme' ),
					'view'    => array( $this, 'support' ),
					'handler' => array( $this, 'support_save' ),
				),
				'setup_ready' => array(
					'name'    => __( 'Ready!', 'astra-theme' ),
					'view'    => array( $this, 'ast_setup_ready' ),
					'handler' => '',
				),
			);

			$this->step = isset( $_GET['step'] ) ? sanitize_key( $_GET['step'] ) : current( array_keys( $this->steps ) );

			$admin_asset_uri = AST_THEME_URI . 'admin/assets/';
			$suffix     = '';

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'ast-setup', $admin_asset_uri . 'ast-setup-wizard.css', array( 'dashicons', 'install' ), AST_THEME_VERSION );

			wp_register_script( 'iris', admin_url( 'js/iris.min.js' ),array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
		    wp_register_script( 'wp-color-picker', admin_url( 'js/color-picker.min.js' ), array( 'iris' ), false,1 );
		    $colorpicker_l10n = array(
				'clear'         => __( 'Clear', 'astra-theme' ),
				'defaultString' => __( 'Default', 'astra-theme' ),
				'pick'          => __( 'Select Color', 'astra-theme' ),
			);
		    wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );

		    wp_enqueue_media();
			wp_register_script( 'ast-setup', $admin_asset_uri . 'ast-setup-wizard.js', array( 'jquery' ), AST_THEME_VERSION, true );

			if ( ! empty( $_POST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) {
				call_user_func( $this->steps[ $this->step ]['handler'] );
			}

			ob_start();
			$this->setup_wizard_header();
			$this->setup_wizard_steps();
			$this->setup_wizard_content();
			$this->setup_wizard_footer();
			exit;
		}

		/**
		 * Get next step link
		 */
		public function get_next_step_link() {
			$keys = array_keys( $this->steps );
			return add_query_arg( 'step', $keys[ array_search( $this->step, array_keys( $this->steps ) ) + 1 ] );
		}

		/**
		 * Setup Wizard Header.
		 */
		public function setup_wizard_header() {
			?>

			<?php wp_print_scripts( array( 'iris', 'wp-color-picker', 'ast-setup' ) ); ?>
			<?php do_action( 'admin_print_styles' ); ?>
			<?php do_action( 'admin_head' ); ?>

			<div class="ast-setup wp-core-ui">
				<h1 id="ast-logo"><a href="#"><img src="<?php echo AST_THEME_URI . 'assets/images/logo-white.png'; ?>" alt="Astra" /></a></h1>
			<?php
		}

		/**
		 * Setup Wizard Footer.
		 */
		public function setup_wizard_footer() {
			?>
				<?php if ( 'setup_ready' === $this->step ) : ?>
					<a class="ast-return-to-dashboard" href="<?php echo esc_url( admin_url() ); ?>"><?php _e( 'Return to the WordPress Dashboard', 'astra-theme' ); ?></a>
				<?php endif; ?>

			</div><!-- .ast-setup .wp-core-ui -->
			<?php
		}

		/**
		 * Output the steps.
		 */
		public function setup_wizard_steps() {
			$ouput_steps = $this->steps;
			array_shift( $ouput_steps );
			?>
			<ol class="ast-setup-steps">
				<?php foreach ( $ouput_steps as $step_key => $step ) : ?>
					<li class="<?php
					if ( $step_key === $this->step ) {
						echo 'active';
					} elseif ( array_search( $this->step, array_keys( $this->steps ) ) > array_search( $step_key, array_keys( $this->steps ) ) ) {
						echo 'done';
					}
					?>">
						<a href="<?php echo esc_url( admin_url( 'themes.php?page=ast-setup&step=' . $step_key ) ); ?>">
							<?php echo esc_html( $step['name'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ol>
			<?php
		}

		/**
		 * Output the content for the current step.
		 */
		public function setup_wizard_content() {
			echo '<div class="ast-setup-content">';
			call_user_func( $this->steps[ $this->step ]['view'] );
			echo '</div>';
		}

		/**
		 * Introduction step.
		 */
		public function ast_setup_welcome() {
			?>
			<h1><?php _e( 'Welcome to the world of Astra Theme!', 'astra-theme' ); ?></h1>
			<p><?php _e( 'Thank you for choosing Astra Theme to power your WordPress! This quick setup wizard will help you configure the basic settings. <strong>It\' completely optional and shouldn\'t take longer than five minutes.</strong>', 'astra-theme' ); ?></p>
			<p class="ast-setup-actions step">
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next"><?php _e( 'Let\'s Go!', 'astra-theme' ); ?></a>
				<a href="<?php echo esc_url( admin_url() ); ?>" class="button button-large"><?php _e( 'Not right now', 'astra-theme' ); ?></a>
			</p>
			<?php
		}

		/**
		 * Child Theme
		 */
		public function ast_child_theme_demo() {
			?>
			<h1><?php _e( 'Setup Astra Child Theme ( Optional )', 'astra-theme' ); ?></h1>
			<form method="post">

				<p><?php _e( 'Create and Activate Astra child theme. If you are going to make changes to the theme source code please use a <a href="https://codex.wordpress.org/Child_Themes" target="_blank">Child Theme</a> rather than modifying the main theme.', 'astra-theme' ); ?></p>

				<p class="ast-setup-actions step">
					<input type="submit" class="uct-activate button-primary button button-large button-next" value="<?php _e( 'Continue', 'astra-theme' ); ?>" name="save_step" />
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'astra-theme' ); ?></a>
					<?php wp_nonce_field( 'ast-setup' ); ?>
				</p>
			</form>
			<script>
			(function($) {
				$(function() {
					$(document).on('click', '.uct-activate', function() {
						$.post('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', { action: 'uct_activate' }, function(response) {
							$('.uct-notice')
								.removeClass('notice-error')
								.addClass('notice-success')
								.find('p').html(response);
						});
					});
				});
			})(jQuery);
			</script>
			<?php
		}

		/**
		 * Child Theme
		 */
		public function site_identity_demo() {

			?>
			<h1><?php _e( 'Site Identity', 'astra-theme' ); ?></h1>
			<form method="post">

				<p>
					<?php _e( 'Setup the site title, tagline and logo.', 'astra-theme' ); ?>
				</p>


				<table class="form-table ast-theme-config">
					<tr>
						<th scope="row">
							<label for="site-title"><?php _e( 'Site Title', 'astra-theme' ); ?></label>
						</th>
						<td>
							<input type="text" name="site-title" value="<?php bloginfo( 'name' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="site-tagline"><?php _e( 'Site Tagline', 'astra-theme' ); ?></label>
						</th>
						<td>
							<input type="text" name="site-tagline" value="<?php bloginfo( 'description' ); ?>" />
						</td>
					</tr>
				</table>

				<p class="ast-setup-actions step">
					<input type="submit" class="uct-activate button-primary button button-large button-next" value="<?php _e( 'Continue', 'astra-theme' ); ?>" name="save_step" />
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'astra-theme' ); ?></a>
					<?php wp_nonce_field( 'ast-setup' ); ?>
				</p>
			</form>
			<?php
		}

		/**
		 * Save Locale Settings.
		 */
		public function site_identity_demo_save() {
			check_admin_referer( 'ast-setup' );

			// Update site title & tagline.
			update_option( 'blogdescription', sanitize_text_field( $_POST['site-tagline'] ) );
			update_option( 'blogname', sanitize_text_field( $_POST['site-title'] ) );

			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Child Theme Title.
		 */
		public function ast_child_theme_demo_save() {
			// check_admin_referer( 'ast-setup' ).
			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Locale settings
		 */
		public function ast_theme_config() {

			$text_color       = ast_get_option( 'text-color' );
			$link_color       = ast_get_option( 'link-color' );
			$link_hover_color = ast_get_option( 'link-h-color' );
			$site_sidebar     = ast_get_option( 'site-sidebar-layout' );

			$defaults                 = Ast_Theme_Options::defaults();
			$default_text_color       = $defaults['text-color'];
			$default_link_color       = $defaults['link-color'];
			$default_link_hover_color = $defaults['link-h-color'];
			?>

			<h1><?php _e( 'Basic Theme Setup', 'astra-theme' ); ?></h1>
			<form method="post">
				<table class="form-table ast-theme-config">
					<tr>
						<th scope="row"><label for="text-color"><?php _e( 'Text Color', 'astra-theme' ); ?></label></th>
						<td>
							<input class="ast-color-picker" type="text" id="text-color" name="text-color" size="2" value="<?php echo esc_attr( $text_color ); ?>" data-default-color="<?php echo esc_attr( $default_text_color ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="link-color"><?php _e( 'Link Color', 'astra-theme' ); ?></label></th>
						<td>
							<input class="ast-color-picker" type="text" id="link-color" name="link-color" size="2" value="<?php echo esc_attr( $link_color ); ?>" data-default-color="<?php echo esc_attr( $default_link_color ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="link-h-color"><?php _e( 'Link Hover Color', 'astra-theme' ); ?></label></th>
						<td>
							<input class="ast-color-picker" type="text" id="link-h-color" name="link-h-color" size="2" value="<?php echo esc_attr( $link_hover_color ); ?>" data-default-color="<?php echo esc_attr( $default_link_hover_color ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="site-sidebar-layout"><?php _e( 'Sidebar Layout', 'astra-theme' ); ?></label></th>
						<td>
							<select id="site-sidebar-layout" name="site-sidebar-layout" required>
								<?php
								$layout = array(
									'no-sidebar'	=> __( 'No Sidebar', 'astra-theme' ),
									'left-sidebar'	=> __( 'Left Sidebar', 'astra-theme' ),
									'right-sidebar'	=> __( 'Right Sidebar', 'astra-theme' ),
								);

								$ouput_layout = '';
								foreach ( $layout as $key => $value ) {
									$checked = '';
									if ( $key == $site_sidebar ) {
										$checked = 'selected="selected"';
									}
									$ouput_layout .= '<option ' . esc_attr( $checked ) . ' value="' . esc_attr( $key ) . '">' . esc_attr( $value ) . '</option>';
								}

								echo $ouput_layout;
								?>
							</select>
						</td>
					</tr>
				</table>
				<p class="ast-setup-actions step">
					<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'astra-theme' ); ?>" name="save_step" />
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'astra-theme' ); ?></a>
					<?php wp_nonce_field( 'ast-setup' ); ?>
				</p>
			</form>
			<?php
		}

		/**
		 * Support
		 */
		public function support() {
			?>

			<h1><?php _e( 'Help and Support', 'astra-theme' ); ?></h1>

			<form method="post">
				<p>
					<?php _e( 'This theme comes with 6 months item support from purchase date (with the option to extend this period). This license allows you to use this theme on a single website. Please purchase an additional license to use this theme on another website.', 'astra-theme' ); ?>
				</p>

				<p class="success"> <?php _e( 'Item Support <strong>DOES</strong> Include:', 'astra-theme' ); ?></p>

				<ul>
					<li> <?php _e( 'Availability of the author to answer questions', 'astra-theme' ); ?> </li>
					<li> <?php _e( 'Answering technical questions about item features', 'astra-theme' ); ?> </li>
					<li> <?php _e( 'Assistance with reported bugs and issues', 'astra-theme' ); ?> </li>
					<li> <?php _e( 'Help with bundled 3rd party plugins', 'astra-theme' ); ?> </li>
				</ul>

				<p class="success"> <?php _e( 'Item Support <strong>DOES NOT</strong> Include:', 'astra-theme' ); ?></p>
				<ul>
					<li> <?php _e( 'Customization services (this is available through <a href="#" target="_blank">Envato Studio</a>)', 'astra-theme' ); ?> </li>
					<li> <?php _e( 'Installation services (this is available through <a href="#" target="_blank">Envato Studio</a>)', 'astra-theme' ); ?> </li>
					<li> <?php _e( 'Help and Support for non-bundled 3rd party plugins (i.e. plugins you install yourself later on)', 'astra-theme' ); ?> </li>
				</ul>

				<p class="ast-setup-actions step">
					<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'astra-theme' ); ?>" name="save_step" />
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'astra-theme' ); ?></a>
					<?php wp_nonce_field( 'ast-setup' ); ?>
				</p>
			</form>
			<?php
		}

		/**
		 * Save Locale Settings.
		 */
		public function support_save() {
			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Save Locale Settings.
		 */
		public function ast_theme_config_save() {
			check_admin_referer( 'ast-setup' );

			$text_color       	= sanitize_text_field( $_POST['text-color'] );
			$link_color 		= sanitize_text_field( $_POST['link-color'] );
			$link_hover_color	= sanitize_text_field( $_POST['link-h-color'] );
			$site_sidebar   	= sanitize_text_field( $_POST['site-sidebar-layout'] );

			$theme_options = Ast_Theme_Options::get_options();

			$theme_options['text-color']   = $text_color;
			$theme_options['link-color']   = $link_color;
			$theme_options['link-h-color'] = $link_hover_color;
			$theme_options['site-sidebar-layout'] = $site_sidebar;

			update_option( 'ast-settings', $theme_options );

			// Refresh Options.
			Ast_Theme_Options::refresh();

			do_action( 'ast_onboarding_step_theme_confing' );

			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Final step.
		 */
		public function ast_setup_ready() {
		?>
			<a href="<?php echo esc_url( 'https://twitter.com/share' ); ?>" class="twitter-share-button" data-url="" data-text="Astra Theme" data-via="Astra" data-size="large"><?php _e( 'Tweet', 'astra-theme' ); ?></a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			<h1><?php _e( 'Your Theme is Ready!', 'astra-theme' ); ?></h1>

			<div class="ast-setup-next-steps">
				<div class="ast-setup-next-steps-last">

					<p class="success">
						<?php _e( 'Congratulations! The theme has been activated and your website is ready. Login to your WordPress dashboard to make changes and modify any of the default content to suit your needs.', 'astra-theme' ); ?>
					</p>
					<p>
						<?php _e( 'Please come back and <a href="#" target="_blank">leave a 5-star rating</a> if you are happy with this theme. <br/>Follow <a  href="https://twitter.com/brainstormforce" target="_blank">Astra</a> on Twitter to see updates. Thanks! ', 'astra-theme' ); ?>
					</p>

					<hr />

					<table class="form-table ast-theme-config">
						<tr>
							<th scope="row">
								<h2><?php _e( 'Next Steps', 'astra-theme' ); ?></h2>

								<input type="button" class="button button-primary button-hero" value="<?php _e( 'Configure Astra Addon', 'astra-theme' ); ?>" /><br/>
								<center><a href="<?php echo esc_url( home_url() ); ?>" class="button button-hero"> <?php _e( 'View Website', 'astra-theme' ); ?> </a></center>

							</th>
							<th scope="row">
								<h2><?php _e( 'Learn More', 'astra-theme' ); ?></h2>
								<ul>
									<li class="video-walkthrough"><i class="dashicons dashicons-admin-collapse"></i><a href="#">Watch video walkthroughs</a></li>
									<li class="newsletter"><i class="dashicons dashicons-admin-plugins"></i><a href="#">Astra Addon</a></li>
									<li class="learn-more"><i class="dashicons dashicons-star-filled"></i> <a href="#">Learn more about getting started</a></li>
								</ul>
							</th>
						</tr>
					</table>

				</div>
			</div>
			<?php
		}
	}
}// End if().

/**
 * Kicking this off by calling 'get_instance()' method
 */
$ast_onboarding_wizard = Ast_OnBoarding_Wizard::get_instance();
