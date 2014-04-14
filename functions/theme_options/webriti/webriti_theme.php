<?php
add_action('admin_menu', 'webriti_admin_menu_pannel');  

function webriti_admin_menu_pannel() {

	$page2=add_theme_page( 'webriti_themes', 'Webriti Themes', 'edit_theme_options', 'webriti_themes', 'webriti_themes_function' );	
	//add_action('admin_print_styles-'.$page2, 'webriti_theme_admin_enqueue_script');	
	wp_enqueue_style('responsive',get_template_directory_uri().'/functions/theme_options/webriti/css/bootstrap-responsive.css'); 
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/functions/theme_options/webriti/css/webriti_theme.css'); 
}

function webriti_themes_function() {
?>
<div class="wrap">
	<div class="container-fluid">	
		<div class="row-fluid">
			<div class="span12" id="webriti_header">
				<h2 class="head_h2"><a href="http://www.webriti.com/" target="_blank">	
						<div style="font-size:35px;color:#fff; font-weight:bold; margin-top:10px; margin-bottom:10px;">Browse Premium Webriti Themes </div>
					</a>
				</h2>
			<!--	<h3>Our Themes</h3> -->
			</div>		
		</div>	
		<div class="row-fluid" id="Webriti_theme">
			<!-- -------------- Spasalon Pro ------------------- -->
			<div class="row-fluid webriti-container" >				
					<div class="theme-image span3">
						<a target="_blank" href="http://webriti.com/spasalon/">
							<img src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/webriti/images/spasalon.png">
						</a>
					</div>	
					<div class="theme-info span9">
						<a target="_blank" href="http://webriti.com/spasalon/" class="theme-name"><h4><?php _e('Spasalon Pro','busi_prof'); ?></h4></a>								
						<div class="theme-description">
							<p><?php _e('A responsive theme for SPA SALON and BEAUTY SALON type of business that uses multiple nav menus, Right-sidebar, Featured Slider and Beautifully designed home page all manage via option panel.','busi_prof'); ?></p>
							<p><?php _e('Spasalon is designed with content flexibility and Intuitive features in mind. Use these great core features to grow your business.','busi_prof'); ?></p>
							<p><?php _e('The majority of our themes contain responsive frameworks that mold perfectly to fit all your mobile and Apple devices.','busi_prof'); ?> </p>
							<p><?php _e('A responsive theme for SPA SALON and BEAUTY SALON type of business that uses multiple nav menus, Right-sidebar, Featured Slider.','busi_prof'); ?> </p>
						</div>
						<a target="_blank" href="http://webriti.com/spasalon/" class="buy btn btn-primary webrit_button"><?php _e('Buy Spasalon Pro','busi_prof'); ?></a>
						<a target="_blank" href="http://webriti.com/spasalon/" class="free btn btn-success webrit_button"><?php _e('View Demo','busi_prof'); ?></a>
					</div>				
			</div>
			<div class="row-fluid webriti-container" >				
					<div class="theme-image span3">
						<a target="_blank" href="http://webriti.com/rambo/">
							<img src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/webriti/images/busiprof.png">
						</a>
					</div>	
					<div class="theme-info span9">
						<a target="_blank" href="http://webriti.com/busiprof/" class="theme-name"><h4><?php _e('Busiprof Pro','busi_prof'); ?></h4></a>								
						<div class="theme-description">							
							<p><?php _e('A Beautiful and FLexible Responsive Businees Theme. It is ideal for creating a corporate website. It boasts of a highy functional Home Page and Widgetized Footer. Build an effective online presence with BusiProf.','busi_prof'); ?></p>
							<p><?php _e('Busiprof is designed with Flexibility in mind. Customize it to your hearts content with Sortable Project Areas, Services Areas and Testimonial Section. . Use these great features to build an effective online presence for your business','busi_prof'); ?></p>
							<p><?php _e('The majority of our themes contain responsive frameworks that adapt to Mobile Devices.','busi_prof'); ?></p>
							
						</div>
						<a target="_blank" href="http://webriti.com/busiprof/" class="buy btn btn-primary webrit_button"><?php _e('Buy busiprof Pro','busi_prof'); ?></a>
						<a target="_blank" href="http://webriti.com/busiprof/" class="free btn btn-success webrit_button"><?php _e('View Demo','busi_prof'); ?></a>
					</div>				
			</div>
			<div class="row-fluid webriti-container" >				
					<div class="theme-image span3">
						<a target="_blank" href="http://webriti.com/busipro/">
							<img src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/webriti/images/rambo.png">
						</a>
					</div>	
					<div class="theme-info span9">
						<a target="_blank" href="http://webriti.com/rambo/" class="theme-name"><h4><?php _e('Rambo Pro','busi_prof'); ?></h4></a>								
						<div class="theme-description">
							<p><?php _e('Rambo is a Responsive Multi-Purpose Wordpress Theme. It is ideal for creating a corporate website. It boasts of a highy functional Home Page .Very Cleaned Design.','busi_prof'); ?></p>
							<p><?php _e('Rambo is designed with Readability Flexibility in mind. Customize it to your hearts content with Sortable Project Areas, Services Areas and Call Out Section.Use these great features to build an effective online presence for your business.','busi_prof'); ?></p>
							<p><?php _e('All of our Theme contain Responsive frameworks that adapt to Mobile Devices.','busi_prof'); ?> </p>
						</div>						
						<a target="_blank" href="http://webriti.com/rambo/" class="buy btn btn-primary webrit_button"><?php _e('Buy Rambo Pro','busi_prof'); ?></a>
						<a target="_blank" href="http://webriti.com/rambo/" class="free btn btn-success webrit_button"><?php _e('View Demo','busi_prof'); ?></a>
						
					</div>				
			</div>
			<div class="row-fluid webriti-container" >				
					<div class="theme-image span3">
						<a target="_blank" href="http://webriti.com/busipro/">
							<img src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/webriti/images/hc_img.png">
						</a>
					</div>	
					<div class="theme-info span9">
						<a target="_blank" href="http://webriti.com/rambo/" class="theme-name"><h4><?php _e('Health Centre Pro','busi_prof'); ?></h4></a>								
						<div class="theme-description">
							<p><?php _e('Health Centre is a Responsive WordPress Theme. It is ideal for Gym/Health Healing Centre Owner.Very Cleaned Design.','busi_prof'); ?></p>
							<p><?php _e('Health Centre is designed with Readability Flexibility in mind. It is suitable for Dentists, Doctors , Surgeons, hospitals and other type of Medical Websites.','busi_prof'); ?></p>
							<p><?php _e('Build an effective online presence with HealthCentre','busi_prof'); ?></p>
						</div>						
						<a target="_blank" href="http://webriti.com/healthcentre/" class="buy btn btn-primary webrit_button"><?php _e('Buy Health Centre Pro','busi_prof'); ?></a>
						<a target="_blank" href="http://webriti.com/healthcentre/" class="free btn btn-success webrit_button"><?php _e('View Demo','busi_prof'); ?></a>
						
					</div>				
			</div>
		</div>	
	</div>
	<!-- container-fluid -->
</div>
<?php } ?>