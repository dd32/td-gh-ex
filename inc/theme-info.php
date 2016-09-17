<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package Rubine
 */

/**
 * Add Theme Info page to admin menu
 */
function rubine_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'rubine-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ),
		esc_html__( 'Theme Info', 'rubine-lite' ),
		'edit_theme_options',
		'rubine',
		'rubine_theme_info_page'
	);

}
add_action( 'admin_menu', 'rubine_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function rubine_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'rubine-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'rubine-lite' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/rubine/', 'rubine-lite' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=rubine&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'rubine-lite' ); ?></a>
				<a href="http://preview.themezee.com/rubine/?utm_source=theme-info&utm_medium=textlink&utm_campaign=rubine&utm_content=demo" target="_blank"><?php esc_html_e( 'Theme Demo', 'rubine-lite' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/rubine-documentation/', 'rubine-lite' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=rubine&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'rubine-lite' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/rubine-lite/reviews/?filter=5', 'rubine-lite' ) ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'rubine-lite' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'rubine-lite' ), $theme->get( 'Name' ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'rubine-lite' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'rubine-lite' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/rubine-documentation/', 'rubine-lite' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=rubine&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'rubine-lite' ), 'Rubine' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'rubine-lite' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'rubine-lite' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'rubine-lite' ); ?></a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />

				</div>

			</div>

		</div>

		<hr>

		<div id="more-features">

			<h3><?php esc_html_e( 'Get more features', 'rubine-lite' ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Pro Version Add-on', 'rubine-lite' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on and get additional features and advanced customization options.', 'rubine-lite' ), 'Rubine' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/rubine-pro/', 'rubine-lite' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=rubine&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'rubine-lite' ), 'Rubine' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Recommended Plugins', 'rubine-lite' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'rubine-lite' ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-secondary">
								<?php esc_html_e( 'Install Plugins', 'rubine-lite' ); ?>
							</a>
						</p>
					</div>

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'rubine-lite' ),
				$theme->get( 'Name' ),
				'<a target="_blank" href="' . __( 'https://themezee.com/', 'rubine-lite' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=rubine" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/rubine-lite/reviews/?filter=5', 'rubine-lite' ) . '" title="' . esc_attr__( 'Review Rubine', 'rubine-lite' ) . '">' . esc_html__( 'rate it', 'rubine-lite' ) . '</a>'); ?>
			</p>

		</div>

	</div>

	<?php
}

/**
 * Enqueues CSS for Theme Info page
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function rubine_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_rubine' != $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'rubine-lite-theme-info-css', get_template_directory_uri() .'/css/theme-info.css' );

}
add_action( 'admin_enqueue_scripts', 'rubine_theme_info_page_css' );
