<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'airballoon_add_theme_info_page');
function airballoon_add_theme_info_page() {
	
	add_theme_page( 
		__('Welcome to Air Balloon', 'airballoon-lite'), 
		__('Theme Info', 'airballoon-lite'), 
		'edit_theme_options', 
		'airballoon-lite', 
		'airballoon_display_theme_info_page'
	);
	
}


// Display Theme Info page
function airballoon_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme_data = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( __( 'Welcome to %1s %2s', 'airballoon-lite' ), $theme_data->Name, $theme_data->Version ); ?></h1>

		<div class="theme-description"><?php echo $theme_data->Description; ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php _e('Important Links:', 'airballoon-lite'); ?></strong>
				<a href="http://themezee.com/themes/air-balloon/" target="_blank"><?php _e('Theme Info Page', 'airballoon-lite'); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('Changelog', 'airballoon-lite'); ?></a>
				<a href="http://preview.themezee.com/air-balloon/" target="_blank"><?php _e('Theme Demo', 'airballoon-lite'); ?></a>
				<a href="http://themezee.com/docs/air-balloon-documentation/" target="_blank"><?php _e('Theme Documentation', 'airballoon-lite'); ?></a>
				<a href="http://wordpress.org/support/view/theme-reviews/air-balloon-lite?filter=5" target="_blank"><?php _e('Rate this theme', 'airballoon-lite'); ?></a>
				
				<span class="social-icons">
					<a href="http://themezee.com/newsletter/" target="_blank"><span class="genericon-mail"></span></a>
					<a href="https://www.facebook.com/ThemeZee" target="_blank"><span class="genericon-facebook"></span></a>
					<a href="https://twitter.com/ThemeZee" target="_blank"><span class="genericon-twitter"></a>
				</span>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">
		
			<h3><?php printf( __( 'Getting Started with %s', 'airballoon-lite' ), $theme_data->Name ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
						
					<div class="section">
						<h4><?php _e( 'Theme Documentation', 'airballoon-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Need any help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'airballoon-lite' ); ?></p>
						<p>
							<a href="http://themezee.com/docs/air-balloon-documentation/" target="_blank" class="button button-secondary"><?php _e('Visit Air Balloon Documentation', 'airballoon-lite'); ?></a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Theme Options', 'airballoon-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Air Balloon supports the awesome Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.', 'airballoon-lite' ); ?></p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">Customize Theme</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'PRO Version', 'airballoon-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Need more features? Check out the PRO version which comes with additional features and advanced customization options.', 'airballoon-lite' ); ?></p>
						<p>
							<a href="http://themezee.com/themes/air-balloon/#PROVersion-1" target="_blank" class="button button-secondary"><?php _e('Learn more about the PRO Version of Air Balloon', 'airballoon-lite'); ?></a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( __( 'Air Balloon is proudly brought to you by %1s. If you like this theme, %2s :) ', 'airballoon-lite' ), 
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/air-balloon-lite?filter=5" title="Air Balloon Lite Review">' . __( 'rate it', 'airballoon-lite' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'airballoon_theme_info_page_css');
function airballoon_theme_info_page_css() { 
	
	// Load styles and scripts only on themezee page
	if ( isset($_GET['page']) and $_GET['page'] == 'airballoon-lite' ) :
		
		// Embed theme info css style
		wp_enqueue_style('airballoon-lite-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');
		
		// Register Genericons
		wp_enqueue_style('airballoon-lite-genericons', get_template_directory_uri() . '/css/genericons.css');
		
	endif;
}


?>