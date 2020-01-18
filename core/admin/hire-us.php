<?php if (!function_exists('theme_hire_page')) {
	function theme_hire_page() {
	$page1=add_theme_page(__('Welcome to Enigma', 'enigma'), __('<span style="color:#ffc94a">Hire Us</span>', 'enigma'), 'edit_theme_options', 'hire-page', 'theme_display_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'theme_admin_info');
	}	
}
add_action('admin_menu', 'theme_hire_page');

function theme_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_stylesheet_directory_uri() .'/core/admin/bootstrap/css/bootstrap.css');
	wp_enqueue_style('hire',  get_stylesheet_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('fontawesome',  get_template_directory_uri() .'/css/font-awesome-5.11.2/css/all.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js',get_stylesheet_directory_uri() .'/core/admin/bootstrap/js/bootstrap.js');
} 
if (!function_exists('theme_display_theme_info_page')) {
	function theme_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
		
		<div class="row theme-heighlights">
			<div class="support-data">
				<h3 class="high-title"><?php esc_html_e( 'Get Things Done Quickly:', 'enigma' ); ?></h3>
				<ul>
					<li><i class="fa fa-star theme-icon"></i><?php esc_html_e( ' Hire once, A to Z WP customization.', 'enigma' ); ?></li>	 	
					<li><i class="fa fa-star theme-icon"></i><?php esc_html_e( ' Quick ticket support, quick solution', 'enigma' ); ?></li>					
					<li><i class="fa fa-star theme-icon"></i><?php esc_html_e( ' Dedicated expert working only for you!', 'enigma' ); ?></li>
				</ul>
			</div>
			<div class="col-md-12 blocks">
				<div class="col-md-4">
					<div class="col-md-12 hire-block">
						<span class="recent-ribbon"><?php esc_html_e( 'Starter Plan', 'enigma' ); ?></span>
						<h2><?php esc_html_e( 'Hire me for 01 Hr', 'enigma' ); ?></h2>
						
						<a href="<?php echo esc_url( __( 'skype:weblizar?chat', 'enigma' ) ); ?>" class="hire-btn" target="_blank"><?php esc_html_e( 'Hire Us - in $9', 'enigma' ); ?></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-12 hire-block">
						<span class="recent-ribbon"><?php esc_html_e( 'Economy Plan', 'enigma' ); ?></span>
						<h2><?php esc_html_e( 'Hire me for 5 Hr', 'enigma' ); ?></h2>
						
						<a href="<?php echo esc_url( __( 'skype:weblizar?chat', 'enigma' ) ); ?>" class="hire-btn" target="_blank"><?php esc_html_e( 'Hire Us - in $40', 'enigma' ); ?></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-12 hire-block">
						<span class="recent-ribbon"><?php esc_html_e( 'Valuable Plan', 'enigma' ); ?></span>
						<h2><?php esc_html_e( 'Hire me for 40 Hr', 'enigma' ); ?></h2>
						
						<a href="<?php echo esc_url( __( 'skype:weblizar?chat', 'enigma' ) ); ?>" class="hire-btn" target="_blank"><?php esc_html_e( 'Hire Us  - in $200', 'enigma' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>