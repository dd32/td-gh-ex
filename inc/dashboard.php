<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'bhaga_create_menu' ) ) {
	add_action( 'admin_menu', 'bhaga_create_menu' );
	/**
	 * Adds our "Bhaga" dashboard menu item
	 *
	 */
	function bhaga_create_menu() {
		$bhaga_page = add_theme_page( 'Bhaga', 'Bhaga', apply_filters( 'bhaga_dashboard_page_capability', 'edit_theme_options' ), 'bhaga-options', 'bhaga_settings_page' );
		add_action( "admin_print_styles-$bhaga_page", 'bhaga_options_styles' );
	}
}

if ( ! function_exists( 'bhaga_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Bhaga dashboard page
	 *
	 */
	function bhaga_options_styles() {
		wp_enqueue_style( 'bhaga-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), BHAGA_VERSION );
	}
}

if ( ! function_exists( 'bhaga_settings_page' ) ) {
	/**
	 * Builds the content of our Bhaga dashboard page
	 *
	 */
	function bhaga_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="bhaga-masthead clearfix">
					<div class="bhaga-container">
						<div class="bhaga-title">
							<a href="<?php echo esc_url(BHAGA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Bhaga', 'bhaga' ); ?></a> <span class="bhaga-version"><?php echo esc_html( BHAGA_VERSION ); ?></span>
						</div>
						<div class="bhaga-masthead-links">
							<?php if ( ! defined( 'BHAGA_PREMIUM_VERSION' ) ) : ?>
								<a class="bhaga-masthead-links-bold" href="<?php echo esc_url(BHAGA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'bhaga' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(BHAGA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'bhaga' ); ?></a>
                            <a href="<?php echo esc_url(BHAGA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'bhaga' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * bhaga_dashboard_after_header hook.
				 *
				 */
				 do_action( 'bhaga_dashboard_after_header' );
				 ?>

				<div class="bhaga-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * bhaga_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'bhaga_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'bhaga-settings-group' ); ?>
									<?php do_settings_sections( 'bhaga-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="bhaga_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'bhaga' )
										);
										?>
									</div>

									<?php
									/**
									 * bhaga_inside_options_form hook.
									 *
									 */
									 do_action( 'bhaga_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Blog' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Colors' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Copyright' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Demo Import' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Hooks' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Import / Export' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Page Header' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Spacing' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Typography' => array(
											'url' => BHAGA_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => BHAGA_THEME_URL,
									)
								);

								if ( ! defined( 'BHAGA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox bhaga-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'bhaga' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated bhaga-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'bhaga' ); ?></a>
													</div>
												</div>
												<div class="bhaga-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * bhaga_options_items hook.
								 *
								 */
								do_action( 'bhaga_options_items' );
								?>
							</div>

							<div class="bhaga-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="bhaga_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'bhaga' )
									);
									?>
								</div>

								<?php
								/**
								 * bhaga_admin_right_panel hook.
								 *
								 */
								 do_action( 'bhaga_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Bhaga documentation', 'bhaga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'bhaga' ); ?></p>
                                    <a href="<?php echo esc_url(BHAGA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Bhaga documentation', 'bhaga' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'bhaga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'bhaga' ); ?></p>
                                    <a href="<?php echo esc_url(BHAGA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'bhaga' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'bhaga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Bhaga theme, show it to the world with Your review. Your feedback helps a lot.', 'bhaga' ); ?></p>
                                    <a href="<?php echo esc_url(BHAGA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'bhaga' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'bhaga_admin_errors' ) ) {
	add_action( 'admin_notices', 'bhaga_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function bhaga_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_bhaga-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'bhaga-notices', 'true', esc_html__( 'Settings saved.', 'bhaga' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'bhaga-notices', 'imported', esc_html__( 'Import successful.', 'bhaga' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'bhaga-notices', 'reset', esc_html__( 'Settings removed.', 'bhaga' ), 'updated' );
		}

		settings_errors( 'bhaga-notices' );
	}
}
