<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asagi_create_menu' ) ) {
	add_action( 'admin_menu', 'asagi_create_menu' );
	/**
	 * Adds our "Asagi" dashboard menu item
	 *
	 */
	function asagi_create_menu() {
		$asagi_page = add_theme_page( 'Asagi', 'Asagi', apply_filters( 'asagi_dashboard_page_capability', 'edit_theme_options' ), 'asagi-options', 'asagi_settings_page' );
		add_action( "admin_print_styles-$asagi_page", 'asagi_options_styles' );
	}
}

if ( ! function_exists( 'asagi_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Asagi dashboard page
	 *
	 */
	function asagi_options_styles() {
		wp_enqueue_style( 'asagi-options', get_template_directory_uri() . '/css/admin/style.css', array(), ASAGI_VERSION );
	}
}

if ( ! function_exists( 'asagi_settings_page' ) ) {
	/**
	 * Builds the content of our Asagi dashboard page
	 *
	 */
	function asagi_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="asagi-masthead clearfix">
					<div class="asagi-container">
						<div class="asagi-title">
							<a href="<?php echo esc_url(ASAGI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Asagi', 'asagi' ); ?></a> <span class="asagi-version"><?php echo ASAGI_VERSION; ?></span>
						</div>
						<div class="asagi-masthead-links">
							<?php if ( ! defined( 'ASAGI_PREMIUM_VERSION' ) ) : ?>
								<a class="asagi-masthead-links-bold" href="<?php echo esc_url(ASAGI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'asagi' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(ASAGI_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'asagi' ); ?></a>
                            <a href="<?php echo esc_url(ASAGI_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'asagi' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * asagi_dashboard_after_header hook.
				 *
				 */
				 do_action( 'asagi_dashboard_after_header' );
				 ?>

				<div class="asagi-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * asagi_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'asagi_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'asagi-settings-group' ); ?>
									<?php do_settings_sections( 'asagi-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="asagi_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'asagi' )
										);
										?>
									</div>

									<?php
									/**
									 * asagi_inside_options_form hook.
									 *
									 */
									 do_action( 'asagi_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Blog' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Colors' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Demo Import' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Hooks' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Import / Export' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Page Header' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Sections' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Spacing' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Typography' => array(
											'url' => ASAGI_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => ASAGI_THEME_URL,
									)
								);

								if ( ! defined( 'ASAGI_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox asagi-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'asagi' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated asagi-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'Learn more', 'asagi' ); ?></a>
													</div>
												</div>
												<div class="asagi-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * asagi_options_items hook.
								 *
								 */
								do_action( 'asagi_options_items' );
								?>
							</div>

							<div class="asagi-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="asagi_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'asagi' )
									);
									?>
								</div>

								<?php
								/**
								 * asagi_admin_right_panel hook.
								 *
								 */
								 do_action( 'asagi_admin_right_panel' );

								  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'asagi_admin_errors' ) ) {
	add_action( 'admin_notices', 'asagi_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function asagi_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_asagi-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'asagi-notices', 'true', esc_html__( 'Settings saved.', 'asagi' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'asagi-notices', 'imported', esc_html__( 'Import successful.', 'asagi' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'asagi-notices', 'reset', esc_html__( 'Settings removed.', 'asagi' ), 'updated' );
		}

		settings_errors( 'asagi-notices' );
	}
}