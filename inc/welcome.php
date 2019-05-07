<?php
/**
 * Add theme welcome page
 *
 * @since Undedicated 2.0
 */
add_action( 'admin_menu', 'register_undedicated_intro_page' );
function register_undedicated_intro_page() {

	//add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
	add_theme_page( 'Undedicated WP Theme', 'Undedicated WP Theme', 'manage_options', 'undedicated', 'undedicated_theme_page' );

}

function undedicated_dashboard_page_style() {
    wp_enqueue_style('undedicated-welcome-css', get_template_directory_uri() . '/css/welcoe.css');
}


function undedicated_theme_page() {

	// Theme Info
	$undedicated_theme_info = wp_get_theme('undedicated');

    ?>
    <div class="wrap about-wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

		<div class="about-text">
			<p  class="about-description"><?php echo esc_attr($undedicated_theme_info->get('Name')); ?> <a href="<?php echo esc_url($undedicated_theme_info->get('ThemeURI')); ?>">(Version <?php echo esc_attr($undedicated_theme_info->get('Version')); ?>)</a>  by <a href="<?php echo esc_url($undedicated_theme_info->get('AuthorURI')); ?>" target="_blank"><?php echo esc_attr( $undedicated_theme_info->get('Author')); ?></a></p>
			<p class="about-description"><?php echo esc_attr($undedicated_theme_info->get('Description')); ?></p>
		</div>
		
		<div class="panel">
				<h3>ReduxThemes.com</h3>
				<p class="about-description">Thank you for rocking with WordPress and <?php echo esc_attr($undedicated_theme_info->get('Name')); ?>.</p>
				<p class="about-description"><span class="dashicons dashicons-megaphone"  style="color: #0073aa"></span> Customize the theme using <code>Appearance > Customize</code> menu. You can add logo, header image, social media links, choose layout, and more for your website.</p>
				<p class="about-description"><span class="dashicons dashicons-megaphone"  style="color: #0073aa"></span> We make free WordPress themes and plugins, absolutely FREE for good folks like you! Don't forget to rate the theme. Share your <i class="dashicons dashicons-heart" style="color: #f21a1a"></i> love by sending us some contributions to help us continue creating more free stuff like this.</p>

					<div class="plugin-card">
						<div class="plugin-card-top">
								<h3>Advertising Plugin</h3>
								<p>For adding advertisements in your website, get ADREDUX by us. It is a simple and efficient plugin that allows you to control and automatically insert ads in posts & pages. No bloating.</p>
						</div>
						<div class="plugin-card-bottom">
							<a class="button button-primary" href="<?php echo esc_url_raw( add_query_arg( array('s'=> 'adredux','tab'=> 'search','type'=> 'term',), admin_url( 'plugin-install.php' ) ) ); ?>">Get Adredux Plugin</a>
						</div>
					</div>

					<div class="plugin-card">
						<div class="plugin-card-top">
							<h3>Contribute & Help</h3>
								<p><span class="dashicons dashicons-heart" style="color: #f21a1a;"></span>  Found the theme useful? Consider supporting us to create free themes with some coffee. Send some love via donations & contributions. <span class="dashicons dashicons-editor-help"></span> For support, drop an email to <code>contact@reduxthemes.com</code></p>
						</div>

						<div class="plugin-card-bottom">
						<a href="http://reduxthemes.com/donate/" class="button button-primary">Donate & Support Us</a>
						</div>
					</div>

			</div>
    </div>
    <?php
    
}

/**
 * Add theme donate notice
 *
 * @since Undedicated 2.0
 */
 add_filter('admin_footer_text', 'undedicated_admin_footer');
function undedicated_admin_footer($default){
	// Theme Info
	$undedicated_theme_info = wp_get_theme('undedicated');

	return $default . ' ' . get_bloginfo('name') .  ' &mdash; powered by <span class="dashicons dashicons-heart" style="color: #f21a1a;"></span> <a href="' . esc_url_raw( add_query_arg( 'page', 'undedicated', admin_url( 'themes.php' ) ) ) . '">'. esc_attr($undedicated_theme_info->get('Name')) . ' WP theme</a>';

}