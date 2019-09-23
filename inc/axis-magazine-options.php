<?php


function axis_magazine_theme_info_menu() {

	add_theme_page( 
		esc_html__('Welcome To Axis Magazine WordPress Theme', 'axis-magazine'), 
		esc_html__('Axis Magazine Theme Info', 'axis-magazine'), 
		'manage_options', 
		'axis_magazine_theme_info_options', 
		'axis_magazine_theme_info_display' 
	);

}


add_action( 'admin_menu', 'axis_magazine_theme_info_menu' );



function axis_magazine_theme_info_display() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html_e( 'You do not have sufficient permissions to access this page.', 'axis-magazine' ) );
	}
	
	?>
	<div class="wrap axis-magazine-adm">
		<h1 class="header-welcome"><?php esc_html_e('Welcome to Axis Magazine - 0.0.01', 'axis-magazine'); ?></h1>
		<div class="axis-magazine-adm-dsply-fl axis-magazine-adm-fl-wrap axis-magazine-adm-jc-sp-btw">

			<div class="axis-magazine-adm-wid-49 theme-para theme-doc axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Documentation','axis-magazine'); ?></h4>
				<p><?php esc_html_e('Documentation for this theme includes all theme information that is needed to get your site up and running', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://zidithemes.tumblr.com/post/186052368654/axis-magazine'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Theme Documentation', 'axis-magazine'); ?>
					</a>
				</p>
			</div>


			<div class="axis-magazine-adm-wid-49 theme-para theme-opt axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Options','axis-magazine'); ?></h4>
				<p class="">
					<?php esc_html_e('Axis Magazine Theme supports Theme Customizer. Click "Go To Customizer" to open the Customizer now.',  'axis-magazine'); ?>
				</p>
				<p>
					<a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Go To Customizer', 'axis-magazine'); ?>
					</a>
				</p>
			</div>


			<div class="axis-magazine-adm-wid-49 theme-para theme-support axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Support','axis-magazine'); ?></h4>
				<p><?php esc_html_e('Reach out in the theme support forums on zidithemes.tumblr.com', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/axis-magazine/'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Support Forum', 'axis-magazine'); ?>
					</a>
				</p>
			</div>


		</div>
	</div>
	<?php
}
?>
