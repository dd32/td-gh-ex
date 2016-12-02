<?php

/**
 * Arouse info page
 *
 * @package Arouse
 */


add_action('admin_menu', 'arouse_theme_info');

function arouse_theme_info() {
	add_theme_page('Arouse WordPress Theme Information', 'Arouse Theme Info', 'edit_theme_options', 'arouse-info', 'arouse_info_display_content');
}


function arouse_info_display_content() { ?>
	
	<div class="arouse-theme-info">
		<?php 
			$arouse_details = wp_get_theme();
			$version = $arouse_details->get( 'Version' ); 
			$name = $arouse_details->get( 'Name' ); 
			$description = $arouse_details->get( 'Description' ); 
		?>
		<div class="arouse-info-header">
			<h1 class="arouse-info-title">
				<?php echo strtoupper( $name ) . ' ' . $version; ?>
			</h1>
		</div>
		<div class="arouse-info-body">
			<div class="arouse-theme-description">
				<p>
					<?php echo $description; ?>
				</p>
			</div>
			<div class="arouse-info-blocks">
				<div class="arouse-info-block aw-n-margin">
					<span class="dashicons dashicons-visibility"></span>
					<a href="<?php echo esc_url('http://themezhut.com/demo/arouse/'); ?>" target="_blank"><?php _e( 'View Demo', 'arouse' ); ?></a>
				</div>
				<div class="arouse-info-block">
					<span class="dashicons dashicons-book-alt"></span>
					<a href="<?php echo esc_url('http://themezhut.com/arouse-wordpress-theme-documentation/'); ?>" target="_blank"><?php _e( 'Documentation', 'arouse' ); ?></a>
				</div>
				<div class="arouse-info-block">
					<span class="dashicons dashicons-businessman"></span>
					<a href="<?php echo esc_url('http://themezhut.com/contact/'); ?>" target="_blank"><?php _e( 'Get Support', 'arouse' ); ?></a>
				</div>
				<div class="arouse-info-block aw-n-margin">
					<span class="dashicons dashicons-admin-generic"></span>
					<a href="<?php echo admin_url('customize.php'); ?>"><?php _e( 'Customize Site', 'arouse' ); ?></a>
				</div>
				<div class="arouse-info-block">
					<span class="dashicons dashicons-awards"></span>
					<a href="<?php echo esc_url('http://themezhut.com/themes/arouse-pro/'); ?>" target="_blank"><?php _e( 'Arouse Pro', 'arouse' ); ?></a>
				</div>
				<div class="arouse-info-block">
					<span class="dashicons dashicons-search"></span>
					<a href="<?php echo esc_url('http://themezhut.com/demo/arouse-pro/'); ?>" target="_blank"><?php _e( 'Arouse Pro Demo', 'arouse' ); ?></a>
				</div>
			</div>
		</div>
	</div>

<?php }