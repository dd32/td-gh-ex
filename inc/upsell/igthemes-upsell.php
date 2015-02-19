<?php
/******************
* MORE THEMES
******************/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
// Add stylesheet for upsell page.
function base_upsell_style() {
	wp_enqueue_style( 'base-upsell-style', get_template_directory_uri() . '/inc/upsell/css/upsell.css');
}

// Add upsell page to the menu.
function base_add_upsell() {
	$page = add_theme_page(
		__( 'More Themes', 'base' ),
		__( 'More Themes', 'base' ),
		'administrator',
		'base-themes',
		'base_display_upsell'
	);
add_action( 'admin_print_styles-' . $page, 'base_upsell_style' );
}
add_action( 'admin_menu', 'base_add_upsell', 11 );

function base_display_upsell() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>
	<div class="wrap">
		<div class="container-fluid">
				<div id="upsell_themes">
                    
                    <div class="upsell-logo">
                        <a  href="http://iograficathemes.com" target="_blank" title="Iografica Themes">
						  <img src="<?php echo $directory_uri; ?>/inc/upsell/img/upsell-logo.png"/>
				        </a>
                        <h2><?php _e('Beautiful Premium and Free WordPress Themes and Plugins', 'base' ); ?></h2>
                    </div>
                    
					<?php
					// Set the argument array with author name.
					$args = array(
						'author' => 'iografica',
					);

					// Set the $request array.
					$request = array(
						'body' => array(
							'action'  => 'query_themes',
							'request' => serialize( (object)$args )
						)
					);
					$themes = base_get_themes( $request );
					$active_theme = wp_get_theme()->get( 'Name' );
					$counter = 1;

					// For currently active theme.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme == $theme->name ) {?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>
									<div class="theme-description">
                                        <p><?php echo substr( $theme->description, 0, 180). __( '...', 'base' );?></p>
									</div>
								</div>
								<div class="theme-details active">
									<span class="theme-name"><?php echo $theme->name; ?></span>
                                    <span class="theme-status"><?php _e( ' - current theme', 'base' ); ?></span>
                                    <span class="theme-buttons"><a class="button button-secondary" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php echo __( 'Customize', 'base' );?></a></span>
								</div>
							</div>
						<?php
						$counter++;
						break;
						}
					}
					// For all other themes.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme != $theme->name ) {
							// Set the argument array with author name.
							$args = array(
								'slug' => $theme->slug,
							);
							// Set the $request array.
							$request = array(
								'body' => array(
									'action'  => 'theme_information',
									'request' => serialize( (object)$args )
								)
							);
							$theme_details = base_get_themes( $request );
							?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>
									<div class="theme-description">
										<p><?php echo substr( $theme->description, 0, 180). __( '...', 'base' );?></p>
									</div>
								</div>
								<div class="theme-details">
									<span class="theme-name"><?php echo $theme->name; ?></span>
                                    <!-- Check if the theme is installed -->
									<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>

									<!-- Show the tick image notifying the theme is already installed. -->
									<span class="theme-status"><?php _e( '- installed', 'base' ); ?></span>
                                    
                                    <!-- Activate Button -->
                                    <span class="theme-buttons">
									<a  class="button button-primary activate" href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" ><?php echo __( 'Activate', 'base' );?></a>
                                    </span>
									<?php }	else {
										// Set the install url for the theme.
										$install_url = add_query_arg( array(
												'action' => 'install-theme',
												'theme'  => $theme->slug,
										), self_admin_url( 'update.php' ) );
									?>
                                    <!-- Install Button -->
                                     <span class="theme-buttons">
									<a class="button button-primary install" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'base' ); ?></a>
									<?php } ?>

									<!-- Preview button -->
									<a class="button button-secondary" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'base' ); ?></a>
                                    </span>
								</div>
							</div>
							<?php
							$counter++;
						}
					}?>
				</div> <!-- .upsell_themes -->
			</div> <!-- .container-fluid -->
		</div> <!-- .wrap -->

<?php
}

// Get all themeisle themes by using API.
function base_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'base_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}
	return $themes;
}