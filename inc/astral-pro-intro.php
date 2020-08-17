<?php if (!function_exists('astral_info_page')) {
	function astral_info_page() {
	$page1=add_theme_page(__('Welcome to Astral', 'astral'), __('<span style="color:#ffe100">About Astral</span>', 'astral'), 'edit_theme_options', 'astral', 'astral_display_theme');
	
	add_action('admin_print_styles-'.$page1, 'astral_pro_info');
	}	
}
add_action('admin_menu', 'astral_info_page');

function astral_pro_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/css/bootstrap.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/css/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome.min.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/js/bootstrap.js');

	// Demo Import
	//wp_enqueue_script( 'plugin-install' );
	//wp_enqueue_script( 'updates' );
	//wp_enqueue_script( 'astral-about-page-css', get_template_directory_uri(). '/inc/js/about-astral-page.js' );

} 
if (!function_exists('astral_display_theme')) {
	function astral_display_theme() {
		$theme_data = wp_get_theme(); ?>
	<div class="wrap elw-page-welcome about-wrap seting-page">

	    <div class="row astral-pro">
	        <div class=" col-md-6">
	            <?php $wl_th_info = wp_get_theme(); ?>
					<h2><span class="astral-title"><?php esc_html_e('Astral - ','astral'); ?> <?php echo esc_html( $wl_th_info->get('Version') ); ?> </span></h2>						
				</p>
			</div>
			<div class=" col-md-6">
	            <p class="desc"><?php esc_html_e('Light and Easy to Customize WordPress Theme','astral'); ?></p>
			</div>
		</div> 
		
		<div class="container">
			<div class="row intro-section">
				<div class="col-md-9 document">
				<section id="tabs">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">

						<a class="nav-item nav-link active" id="nav-plugin-tab" data-toggle="tab" href="#nav-plugin" role="tab" aria-controls="nav-plugin" aria-selected="true"><?php esc_html_e('General Setting','astral'); ?></a>

						<a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php esc_html_e('Documentation','astral'); ?></a>
						<a class="nav-item nav-link" id="nav-support-tab" data-toggle="tab" href="#nav-support" role="tab" aria-controls="nav-support" aria-selected="true"><?php esc_html_e('Support Forum','astral'); ?></a>	
						
					</div>
				</nav>
				<div class="tab-content py-3 px-3" id="nav-tabContent">

					<!-- plugin -->
					<div class="tab-pane fade show active" id="nav-plugin" role="tabpanel" aria-labelledby="nav-plugin-tab">
						<div class="column-width-3">
							<h3><?php esc_html_e( 'Preview Demo', 'astral' ); ?></h3>
							<a class="demo_btn" target="_blank" href="http://demo.mywebapp.in/astral/">Theme Demo Preview</a>

							<div class="Customize pt-4">
								<h3><?php esc_html_e( 'Theme Customizer', 'astral' ); ?></h3>
								<p> <?php esc_html_e( 'Theme Customizer Astral supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.','astral' ); ?> </p>
								<a class="demo_btn" href="<?php echo admin_url() .'customize.php'; ?>">Start Customizing</a>
							</div>
						</div>
					</div>

					<!-- documentation -->
					<div class="tab-pane fade show " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<ol>
							<li> <?php esc_html_e('Create a New Page > Home','astral'); ?> </li>
							<li> <?php esc_html_e('Go to Appearance -> Customize > Homepage Settings -> select A static page option. Select Page which is created in last step','astral'); ?> </li>
							<li> <?php esc_html_e('Now Go to Customize -> Theme Settings -> General Settings.','astral'); ?> </li>
							<li> <?php esc_html_e('Select FrontPage Template option','astral'); ?> </li>
							<li> <?php esc_html_e('Save changes','astral'); ?> </li>
						</ol>
						<a class="add_page" target="_blank" href="<?php echo admin_url('/post-new.php?post_type=page') ?>"><?php esc_html_e('Add New Page','astral'); ?></a>
					</div>

					<!-- support forum -->
					<div class="tab-pane fade show" id="nav-support" role="tabpanel" aria-labelledby="nav-support-tab">
						<div class="info-box1">
							<p class="support-text">
						 	<?php esc_html_e('You are absolutely free to contact us and Astral team will be happy to help you.','astral'); ?> </p>
							<p class="support-text1"> <?php esc_html_e('We resolve your issues ASAP.','astral'); ?></p>
							<p style="display: block;padding-top: 10px;"> <a class="support-btn" target="_blank" href="<?php echo esc_url('https://wordpress.org/support/theme/astral/'); ?>"><?php esc_html_e('Free Support','astral'); ?></a></p>
						</div>
					</div>

				</div>
				</section>	
			</div>
			<div class="col-md-3">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/astral-custom-home-page.png">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row pl-3 pr-3">
			<div class="col-md-12 info-box">
				<div class="mywebapp-info">
					<h3><?php esc_html_e('Visit Our Latest Project','astral'); ?></h3>
					<p><?php esc_html_e('Our Aim is to be the most client-focused organisation, where we deliver extra importance to our client that gains their esteem and loyalty','astral'); ?></p>
					<a target="_blank" class="mywebapp-btn" href="<?php echo esc_url('http://mywebapp.in/'); ?>"><?php esc_html_e('Visit Our Site','astral'); ?></a>
				</div>		
			</div>
		</div>
	</div>


<?php
	}
}
?>