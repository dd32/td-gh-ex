<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Albar
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function kaira_premium_admin_menu() {
    global $kaira_upgrade_page;
    $kaira_upgrade_page = add_theme_page( __( 'Premium', 'albar' ), '<span class="premium-link">' . __( 'Premium', 'albar' ) . '</span>', 'edit_theme_options', 'premium_upgrade', 'kaira_render_upgrade_page' );
}
add_action( 'admin_menu', 'kaira_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function kaira_load_upgrade_page_scripts( $hook ) {
    global $kaira_upgrade_page;
    if ( $hook != $kaira_upgrade_page )
        return;
    
    wp_enqueue_style( 'kaira-upgrade-css', get_template_directory_uri() . '/upgrade/css/upgrade-admin.css' );
    wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), KAIRA_THEME_VERSION, true );
    wp_enqueue_script( 'kaira-upgrade-js', get_template_directory_uri() . '/upgrade/js/upgrade-custom.js', array( 'jquery' ), KAIRA_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'kaira_load_upgrade_page_scripts' );

/**
 * Render the premium upgrade/order page
 */
function kaira_render_upgrade_page() {
	$theme = basename( get_template_directory() ); // = kaira

	if ( isset( $_GET['action'] ) ) $action = $_GET['action'];
	else $action = 'view-page';

	switch ( $action ) {
		case 'view-page':
			
			get_template_part( 'upgrade/tpl/upgrade-page' );
			
			break;

		case 'order-entered' :
			
			$option_name = $theme . '_user_order_number';
			
			if ( isset( $_POST['user_order_number'] ) ) {
				set_theme_mod( $option_name, trim( $_POST['user_order_number'] ) );
			}
			
			// Validate the order number
			$result = wp_remote_get(
				add_query_arg( array(
					'order_number' => get_theme_mod( $option_name ),
					'action' => 'validate_order_number',
					'theme' => $theme
				), KAIRA_UPDATE_URL . '/premium/' . $theme . '/validate-order.php' )
			);
			
			$valid = null;
			if ( !is_wp_error( $result ) ) {
				$validation_result = unserialize( $result['body'] );
				$valid = isset( $validation_result['valid'] ) ? $validation_result['valid'] : null;
				if ( $valid ) {
					// Trigger a refresh of the theme update information
					set_site_transient( 'update_themes', null );
				}
			} ?>
			<div class="wrap upgrade-page-wrap">
    
			    <h2 class="upgrade-page-title">
			        <?php _e( "Order Number", 'albar' ) ?>
			    </h2>
			    
			    <div class="upgrade-page-inner-wrap">
			    	
			    	<div class="upgrade-order-number-info-form-after">
			    		
					    <h3 class="upgrade-page-sub-title"><?php _e( "Order Number: ", 'albar' ) ?><big><strong><?php echo get_theme_mod( $option_name ); ?></strong></big></h3>
					    
					    <?php if ( is_null( $valid ) ) : ?>
					    
							<p>
								<?php _e( "There was a problem contacting our validation servers.", 'albar' ) ?><br /><br />
								<?php _e( "Please try again later, or upgrade manually using the ZIP file we sent you.", 'albar' ) ?>
							</p>
							<p class="submit">
								<a href="<?php echo esc_url( admin_url( 'themes.php?page=premium_upgrade' ) ) ?>" class="upgrade-result-button">
									<?php _e( 'Back', 'albar' ) ?>
								</a>
							</p>
							
							<?php
							set_theme_mod( $option_name, null );
						elseif ( $valid ) : ?>
						
							<p>
								<?php _e( "We've validated your order number, and it works!", 'albar' ) ?>
								<br /><br />
								<?php
								printf(
									__( 'You can now update your theme on the <a href="%s">Themes page</a>,<br />but <strong>please note</strong> this can take a few minutes to show up so please be patient :)', 'albar' ),
									admin_url( 'themes.php' )
								); ?>
								<br /><br />
								<?php _e( 'This update will add all the premium features.', 'albar' ) ?>
							</p>
							<p class="submit">
								<?php
								$theme_update_url = wp_nonce_url( admin_url( 'update.php?action=upgrade-theme&amp;theme=' . urlencode( $theme ) ), 'upgrade-theme_' . $theme );
								$update_onclick = 'onclick="if ( confirm(\'' . esc_js( __( "Updating may lose the theme settings you've made to the free version. Click 'OK' to update.", 'albar' ) ) . '\') ) { return true; } return false;"'; ?>
								<a href="<?php echo esc_url( $theme_update_url ) ?>" <?php echo $update_onclick ?> class="upgrade-result-button">
									<?php _e( 'Update Theme Now', 'albar' ) ?>
								</a>
							</p>
							
						<?php else : ?>
						
							<p>
								<?php _e( "We couldn't validate your order number.", 'albar' ) ?><br />
								<?php _e( "There might be a problem with our validation server.", 'albar' ) ?><br /><br />
								<?php _e( "Please try again later, or upgrade manually using the ZIP file we sent you.", 'albar' ) ?>
							</p>
							<p class="submit">
								<a href="<?php echo esc_url( admin_url( 'themes.php?page=premium_upgrade' ) ) ?>" class="upgrade-result-button">
									<?php _e( 'Back', 'albar' ) ?>
								</a>
							</p>
						
							<?php
							set_theme_mod( $option_name, null );
						endif; ?>
				    
				    </div>
				    
			    </div>
			    
			</div>
			<?php
			break;
	}
}

/**
 * Add Premium Name and Order Number on WP Dashboard (Home)
 */
function kaira_premium_dashboard_note() {
	$theme = basename( get_template_directory() ); // = kaira
	$option_name = $theme . '_user_order_number';
	$order_number = get_theme_mod( $option_name );
	
	if ( !empty( $order_number ) && $order_number != '' ) {
    	echo '<a href="' . admin_url( 'themes.php' ) . '" class="premium-upgrade-info"><strong>' . ucfirst ( $theme ) . ' Premium</strong> upgrade available... <strong>Upgrade Now!</strong></a>';
	}
}
add_filter( 'rightnow_end', 'kaira_premium_dashboard_note' );
