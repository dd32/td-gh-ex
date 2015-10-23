<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'rubine_add_theme_info_page');
function rubine_add_theme_info_page() {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'rubine-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		esc_html__( 'Theme Info', 'rubine-lite' ), 
		'edit_theme_options', 
		'rubine', 
		'rubine_display_theme_info_page'
	);
	
}


// Display Theme Info page
function rubine_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'rubine-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Important Links:', 'rubine-lite' ); ?></strong>
				<a href="http://themezee.com/themes/rubine/" target="_blank"><?php esc_html_e( 'Theme Page', 'rubine-lite' ); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php esc_html_e( 'Changelog', 'rubine-lite' ); ?></a>
				<a href="http://preview.themezee.com/rubine/" target="_blank"><?php esc_html_e( 'Theme Demo', 'rubine-lite' ); ?></a>
				<a href="http://themezee.com/docs/rubine-documentation/" target="_blank"><?php esc_html_e( 'Theme Documentation', 'rubine-lite' ); ?></a>
				<a href="http://wordpress.org/support/view/theme-reviews/rubine-lite?filter=5" target="_blank"><?php esc_html_e( 'Rate this theme', 'rubine-lite' ); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<h3><?php printf( esc_html__( 'Getting Started with %s', 'rubine-lite' ), $theme->get( 'Name' ) ); ?></h3>
						
					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'rubine-lite' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'rubine-lite' ); ?>
						</p>
						<p>
							<a href="http://themezee.com/docs/rubine-documentation/" target="_blank" class="button button-secondary">
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
					
					<div class="section">
						<h4><?php esc_html_e( 'Pro Version', 'rubine-lite' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need more features? Purchase the Pro Version to get additional features and advanced customization options.', 'rubine-lite' ); ?>
						</p>
						<p>
							<a href="http://themezee.com/themes/rubine/#PROVersion-1" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'rubine-lite' ), 'Rubine'); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'rubine-lite' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/rubine-lite?filter=5" title="Rubine Lite Review">' . esc_html__( 'rate it', 'rubine-lite' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'rubine_theme_info_page_css');
function rubine_theme_info_page_css() { 
	
	// Load styles and scripts only on themezee page
	if ( isset($_GET['page']) and $_GET['page'] == 'rubine' ) :
		
		// Embed theme info css style
		wp_enqueue_style('rubine-lite-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');
		
	endif;
}


?>