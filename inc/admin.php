<?php

/***** Theme Info Page *****/

if (!function_exists('araiz_add_theme_info_page')) {
	function araiz_add_theme_info_page() {
		add_theme_page(__('Welcome to Araiz Theme', 'araiz'), __('Araiz Theme Info', 'araiz'), 'edit_theme_options', 'araiz', 'araiz_display_theme_info_page');
	}
}
add_action('admin_menu', 'araiz_add_theme_info_page');

if (!function_exists('araiz_display_theme_info_page')) {
	function araiz_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1><?php printf(__('Welcome to %1s %2s', 'araiz'), $theme_data->Name, $theme_data->Version ); ?></h1>
			<div class="theme-description"><?php echo $theme_data->Description; ?></div>
			<hr>
			<div class="theme-links clearfix">
				<p><strong><?php _e('Important Links:', 'araiz'); ?></strong>
					<a href="<?php echo esc_url('http://lodse.com/araiz-wordpress-blog-theme/'); ?>" target="_blank"><?php _e('Theme Info Page', 'araiz'); ?></a>
					<a href="<?php echo esc_url('http://lodse.com/forums/forum/support/araiz/'); ?>" target="_blank"><?php _e('Support Center', 'araiz'); ?></a>
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/araiz?filter=5'); ?>" target="_blank"><?php _e('Rate this theme', 'araiz'); ?></a>
				</p>
			</div>
			<hr>
			<div id="getting-started">
				<h3><?php printf(__('Getting Started with %s', 'araiz'), $theme_data->Name); ?></h3>
				<div class="row clearfix">
					<div class="col-1-2">
						<div class="section">
							<h4><?php _e('Theme Documentation', 'araiz'); ?></h4>
							<p class="about"><?php printf(__('Need any help to setup and configure %s? Please have a look at the instructions on the Theme Info Page or read the Documentations and Tutorials in our Support Center.', 'araiz'), $theme_data->Name); ?></p>
							<p>
								<a href="<?php echo esc_url('http://lodse.com/araiz-wordpress-blog-theme/'); ?>" target="_blank" class="button button-secondary"><?php _e('Visit Documentation', 'araiz'); ?></a>
							</p>
						</div>
						<div class="section">
							<h4><?php _e('Theme Options', 'araiz'); ?></h4>
							<p class="about"><?php printf(__('%s supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.',  'araiz'), $theme_data->Name); ?></p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e('Customize Theme', 'araiz'); ?></a>
							</p>
						</div>
						<div class="section">
							<h4><?php _e('Upgrade to Premium', 'araiz'); ?></h4>
							<p class="about"><?php _e('Need more features and options? Check out the Premium Version of this theme which comes with additional features and advanced customization options for your website.', 'araiz'); ?></p>
							<p>
								<a href="<?php echo esc_url('http://lodse.com/araiz-wordpress-blog-theme/'); ?>" target="_blank" class="button button-secondary"><?php _e('Learn more about the Premium Version', 'araiz'); ?></a>
							</p>
						</div>
					</div>
					<div class="col-1-2">
						<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					</div>
				</div>
			</div>
			<hr>
			<div id="theme-author">
				<p><?php printf(__('%1s is proudly brought to you by %2s. If you like this WordPress theme, %3s.', 'araiz'),
					$theme_data->Name,
					'<a target="_blank" href="http://www.lodse.com/" title="Lodse Themes">Lodse Themes</a>',
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/araiz?filter=5" title="Araiz Review">' . __('rate it', 'araiz') . '</a>'); ?>
				</p>
			</div>
		</div> <?php
	}
}

?>