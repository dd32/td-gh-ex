<?php

function puro_add_legacy_settings_page(){
	add_theme_page(
		__( 'Theme Settings', 'puro' ),
		__( 'Theme Settings', 'puro' ),
		'manage_options',
		'puro-legacy-settings',
		'puro_legacy_settings_page'
	);
}
add_action( 'admin_menu', 'puro_add_legacy_settings_page' );

function puro_legacy_settings_page(){
	?>
	<div class="wrap">
		<h2><?php _e( 'Puro Theme Settings Have Moved', 'puro' ) ?></h2>
		<p>
			<?php _e( 'Our theme settings now take advantage of the WordPress Customizer.', 'puro' ); ?>
			<?php _e( 'Navigate to <strong>Appearance > Customize > Theme Settings</strong> to access theme settings.', 'puro' ); ?>
		</p>
	</div>
	<?php
}