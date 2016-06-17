<?php
/**
 * The about admin page.
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 */
class ABC_Documentation {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 1 );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Add a 'Documentation' menu item to the Appearance panel
	 *
	 * This function is attached to the 'admin_menu' action hook.
	 *
	 * @since 1.0.0
	 */
	public function admin_menu() {
		add_theme_page( sprintf( __( 'Welcome to %s %s', 'abacus' ), ABC_THEME_NAME, ABC_THEME_VERSION ), sprintf( __( '%s Theme Info', 'abacus' ), ABC_THEME_NAME ), 'edit_theme_options', 'abc_documentation', array( $this, 'abc_documentation' ) );
	}

	public function admin_init() {
		// Register license setting
		//delete_option( 'abc_license_keys' );
		register_setting('abc_licenses', 'abc_license_keys', array( $this, 'abc_sanitize_licenses' ) );
	}

	public function admin_enqueue_scripts( $hook ) {
		if ( 'appearance_page_abc_documentation' == $hook ) {
		    wp_enqueue_style( 'abc-about', ABC_THEME_URL . '/css/admin/about.css' );
		}
	}

	public function abc_sanitize_licenses( $new ) {
		$license_keys_option = get_option( 'abc_license_keys' );
		$license_array = apply_filters( 'abc_licenses_array', array() );

		foreach ( $license_array as $license_id => $license_value ) {
			$status = ( empty( $license_keys_option[$license_id]['status'] ) ) ? '' : $license_keys_option[$license_id]['status'];

			$license_call = 'activate_license';
			if ( ! empty( $new['license_key_deactivate'] ) ) {
				$license_call = ( $license_id == $new['license_key_deactivate'] ) ? 'deactivate_license' : $license_call;
				unset( $new['license_key_deactivate'] );
			}

			$api_params = array(
				'edd_action'=> $license_call,
				'license' 	=> $new[$license_id]['key'],
				'item_name' => urlencode( $license_value['plugin_name'] ), // the name of our product in EDD
				'url'       => home_url()
			);

			// Call the custom API.
			$response = wp_remote_post( 'https://alphabetthemes.com', array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
			if ( is_wp_error( $response ) ) {
				return false;
			}

			// decode the license data
			$new[$license_id]['status'] = json_decode( wp_remote_retrieve_body( $response ) );
		}

		return $new;
	}

	public function abc_documentation() {
		$abc_url = 'https://alphabetthemes.com';
		?>
		<div class="wrap about-wrap" id="custom-background">
			<h1><?php echo get_admin_page_title(); ?></h1>

			<div class="about-text">
				<?php printf( __( 'Enjoy the flexible design and efficient codebase that %s provides. Be sure to %scheck out the demo%s to see some of the possibilities.', 'abacus' ), ABC_THEME_NAME, '<a href="//' . sanitize_title( ABC_THEME_NAME ) . '.alphabetthemes.com/" target="_blank">', '</a>' ); ?>
			</div>

			<div class="theme-badge">
				<img src="<?php echo ABC_THEME_URL; ?>/images/monster-pointing-green.png" />
			</div>
			<hr />

			<div class="changelog point-releases">
				<h2>Enhance Your Website</h2>
				<p><?php printf( __( 'Upgrading %s with the ABC Premium Features plugin will unlock the following options to help you improve your site&rsquo;s look and functionality.', 'abacus' ), ABC_THEME_NAME ); ?></p>
			</div>

			<div class="feature-section two-col">
				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/custom-colors-plugin.jpg" />
						<h3 class="plugin-title">Custom Colors</h3>
					</div>
					<p><?php _e( 'Why settle on one color when you can choose from any color imaginable. With the Custom Color plugin, you have the ability to set different colors for text elements, page backgrounds and more.', 'abacus' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/font-manager-plugin.jpg" />
						<h3 class="plugin-title">Fonts Manager</h3>
					</div>
					<p><?php _e( 'A font can say a lot about a site, so why not test out a few to see which one might work better. With our Font Manager plugin, you can easily pick from over 600 Google Fonts or even set up Typekit.', 'abacus' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/extended-footer-plugin.jpg" />
						<h3 class="plugin-title">Custom Footer</h3>
					</div>
					<p><?php _e( 'Sometimes you need a little bit more space in your footer for widgets. With this plugin, you can add up to six columns above the footer and even customize the text in your footer notice.', 'abacus' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/social-icons.jpg" />
						<h3 class="plugin-title">Social Icons</h3>
					</div>
					<p><?php _e( 'Being socially active online is a must for any business. That&rsquo;s why we created the ABC Social Icons premium plugin. Now you can direct any of your visitors to the social networks you use so they can stay up to date.', 'abacus' ); ?></p>
				</div>
			</div>

			<div class="feature-section three-col" style="overflow:hidden;">
				<p class="want-more">
				<?php printf( __( 'Want more? Take a look at alphabetthemes.com to see what options are available when you upgrade. %sUpgrade now &rarr;%s', 'abacus' ), '<a href="' . esc_url( $abc_url ) . '/downloads/abc-premium-features/" class="button button-primary" target="_blank">', '</a>' ); ?> </p>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/docs.jpg" />
					</div>

					<h4><?php _e( 'View Documentation', 'abacus' ); ?></h4>
					<p><?php printf( __( 'You can read detailed information on how to use %s&rsquo;s features in our online documentation section.', 'abacus' ), ABC_THEME_NAME ); ?></p>
					<p><a href="<?php echo esc_url( $abc_url ); ?>/documentation/" class="button" target="_blank"><?php _e( 'View documentation &rarr;', 'abacus' ); ?></a></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo ABC_THEME_URL; ?>/images/free-plugins.jpg" />
					</div>

					<h4><?php _e( 'Install Free Plugins', 'abacus' ); ?></h4>
					<p><?php printf( __( 'Check out some available free plugins that work with %s.', 'abacus' ), ABC_THEME_NAME ); ?></p>
					<ul class="free-plugins">
						<li>
							<a href="https://wordpress.org/plugins/abc-responsive-videos/">ABC Responsive Videos</a>
						</li>
						<li>
							<a href="https://wordpress.org/plugins/jetpack/">Jetpack by WordPress.com</a>
						</li>
					</ul>
				</div>

				<div class="col">
					<h4 class="no-top"><?php _e( 'Need Support?', 'abacus' ); ?></h4>
					<p><?php printf( __( 'If you&rsquo;ve purchased a license from Alphabet Themes, you can access our %ssupport form%s to ask any questions you might have about one of our themes or plugins.', 'abacus' ), '<a href="' . esc_url( $abc_url ) . '/my-account/#tab_support" target="_blank">', '</a>' ); ?></p>

					<h4><?php printf( __( 'Are you enjoying %s?', 'abacus' ), ABC_THEME_NAME ); ?></h4>
					<p><?php printf( __( 'Why not leave a review on %sWordPress.org%s? We&rsquo;d really appreciate it! %s', 'abacus' ), '<a href="https://wordpress.org/themes/' . get_option( 'template' ) . '" target="_blank">', '</a>', convert_smilies( ';)' ) ); ?> </p>
				</div>
			</div>
			<?php
			// Apply filter that every custom plugin should hook into
			$license_array = apply_filters( 'abc_licenses_array', array() );
			if ( ! empty( $license_array ) ) :
				?>
				<div class="slidebox">
				<h2>License</h2>
				<p class="desc"><?php printf( __( 'Use the field below to activate the license key for the ABC Premium Features plugin.', 'abacus' ), ABC_THEME_NAME ); ?></p>
				<hr />

				<form method="post" action="options.php">
					<?php
					$license_keys_option = get_option( 'abc_license_keys' );
					settings_fields( 'abc_licenses' );
					wp_nonce_field( 'abc_licenses_nonce', 'abc_licenses_nonce' );
					?>
					<table class="form-table">
						<tbody>
							<?php foreach ( $license_array as $license_id => $license_values ) :
								$key = ( isset( $license_keys_option[$license_id]['key'] ) ) ? $license_keys_option[$license_id]['key'] : '';
								$status = ( empty( $license_keys_option[$license_id]['status'] ) ) ? '' : $license_keys_option[$license_id]['status']; ?>
								<tr valign="top">
									<th scope="row" valign="top">
										<?php _e( 'License Key', 'abacus' ); ?>
										<?php if( isset( $status->license ) !== false && $status->license == 'valid' ) { ?>
										<span style="color:green;">(<?php _e( 'active', 'abacus' ); ?>)</span>
										<?php } elseif ( isset( $status->error ) && 'expired' == $status->error ) { ?>
										<span style="color:red;">(<?php _e( 'expired', 'abacus' ); ?>)</span>
										<?php } else { ?>
										<span style="color:red;">(<?php _e( 'deactivated', 'abacus' ); ?>)</span>
										<?php } ?>
									</th>
									<td>
										<input id="abc_license_keys[<?php echo $license_id; ?>][key]" name="abc_license_keys[<?php echo $license_id; ?>][key]" type="text" class="regular-text" value="<?php echo esc_attr( $key ); ?>" />

										<?php if ( isset( $status->error ) && 'expired' == $status->error ) { ?>
											<p><small>
												<?php
												printf( __( 'This license key expired on %s. Please %srenew%s in order to activate.', 'abacus' ),
													date( 'F j, Y', strtotime( $status->expires ) ),
													'<a href="https://alphabetthemes.com/checkout/purchase-history/?action=manage_licenses&payment_id=' . $status->payment_id . '" target="_blank">',
													'</a>'
												);
												?>
											</small></p>
										<?php } ?>
										<?php if( isset( $status->license ) !== false && $status->license == 'valid' ) { ?>
											<label><input type="checkbox" name="abc_license_keys[license_key_deactivate]" value="<?php echo esc_attr( $license_id ); ?>" /> <?php _e( 'Deactivate', 'abacus' ); ?></label>
										<?php } ?>

									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<?php submit_button(); ?>
				</form>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}
}
$abc_documentation = new ABC_Documentation;