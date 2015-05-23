<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function promax_notice() {
	if ( isset( $_GET['activated'] ) ) {
		$return = '<div class="updated activation"><p><strong>';
					$promax = wp_get_theme();
		if ( isset( $_GET['previewed'] ) ) {
			$return .= sprintf( __( 'Settings saved and %s activated successfully.', 'promax' ), $promax->get( 'Name' ) );
		} else {
			$return .= sprintf( __( '%s activated successfully.', 'promax' ), $promax->get( 'Name' ) );
		}
		$return .= '</strong> <a href="' . esc_url(home_url('/')) . '">' . __( 'Visit site', 'promax' ) . '</a></p>';
		$return .= '<p>';
		$return .= ' <a class="button button-primary theme-options" href="' . admin_url( 'themes.php?page=options-framework' ) . '">' . __( 'Theme Options', 'promax' ) . '</a>';
		$return .= ' <a class="button button-primary help" href="http://forum.insertcart.com">' . __( 'Help Forum', 'promax' ) . '</a>';
		$return .= '</p></div>';
		echo $return;
	}
}
add_action( 'admin_notices', 'promax_notice' );

/*
 * Hide core theme activation message.
 */
function promax_admincss() { ?>
	<style>
	.themes-php #message2 {
		display: none;
	}
	.themes-php div.activation a {
		text-decoration: none;
	}
	</style>
<?php }
add_action( 'admin_head', 'promax_admincss' );
