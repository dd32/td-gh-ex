<?php
/**
 * Ask to ate the theme on WordPress.org
 *
 */

if ( ! is_admin() || ! current_user_can( 'switch_themes' ) )
	return;

function travelify_rateme_message() {
	if ( isset( $_GET['travelify-rateme-dismiss'] ) )
		set_theme_mod( 'rateme-dismiss', true );

	$dismiss = get_theme_mod( 'rateme-dismiss', false );
	if ( $dismiss )
		return;
	?>
	<div class="updated travelify-rateme">
		<p><?php printf( __( 'Thank you for using Travelify! If you like the theme, please consider giving it a <a target="_blank" href="%s">high rating on WordPress.org</a>. Thank you! <a href="%s">(hide this message)</a>', 'travelify' ), 'http://wordpress.org/themes/travelify', add_query_arg( 'travelify-rateme-dismiss', 1 ) ); ?></p>
	</div>
	<?php
}
add_action( 'admin_notices', 'travelify_rateme_message' );