<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="elitepress-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="elitepress-info-title text-center"><?php echo __('About Elitepress Theme','elitepress'); ?><?php if( !empty($elitepress['Version']) ): ?> <sup id="elitepress-theme-version"><?php echo esc_attr( $elitepress['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="elitepress-tab-pane-half elitepress-tab-pane-first-half">
				<p><?php esc_html_e( 'ElitePress WordPress theme is developed for corporate business. It provides you simple and elegant look. Already thousands of users loving this theme because it is designed for multiple businesses like digital agency, freelancers, blogger, startup, portfolio, corporate and any kind of business. The theme is developed using Bootstrap 3 CSS framework that makes it friendly for all the devices like mobiles, tablets, laptops etc. In ElitePress Lite, you can easily set Social Media and Contact Info in Header, Slider, Callout, Services, Portfolios and 3 column widgetized footer. ','elitepress');?></p>
				<p>
				<?php esc_html_e( 'Couple of page templates are added one is Homepage and the second one is  full width page template. In the premium version, you will get boxed layout with background patterns, 7 predefined color schemes, feature for creating your custom color scheme, an eye-catching Slider, Services, Testimonials, Portfolio, Clients/ Sponsors, Blog Layouts, Layout Manager and Latest News. You will get Various page templates  like About, Service, Portfolio, Blog and Contact Us. The theme has supports for popular  plugins like WPML, Polylang and JetPack Gallery Extensions. Just navigate to Appearance / Customize to start customizing. Check premium version theme demo at https://webriti.com/demo/wp/elitepress', 'elitepress' ); ?>
				</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="elitepress-tab-pane-half elitepress-tab-pane-first-half">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/elitepress-info/img/elitepress.png'; ?>" alt="<?php esc_html_e( 'Appointment Blue Child Theme', 'elitepress' ); ?>" />
				</div>
			</div>	
		</div>
	
	
		 <div class="row">
		 
			<div class="elitepress-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'elitepress' ); ?></h1>

			</div>
			
			<div class="col-md-6"> 
				<div class="elitepress-tab-pane-half elitepress-tab-pane-first-half">

					<a href="<?php echo 'https://webriti.com/demo/wp/lite/elitepress/'; ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo __('Lite Demo','elitepress'); ?></p></a>
					
					<a href="<?php echo 'http://webriti.com/demo/wp/elitepress'; ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo __('Pro Demo','elitepress'); ?></p></a>
					
					<a href="<?php echo 'http://webriti.com/help/category/themes/elitepress/'; ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo _e('Premium Theme Support','elitepress'); ?></p></a>
					
				</div>
			</div>
			
			<div class="col-md-6">	
				<div class="elitepress-tab-pane-half elitepress-tab-pane-first-half">
					
					<a href="<?php echo 'http://webriti.com/elitepress'; ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo _e('Premium Theme Details','elitepress'); ?></p></a>
					
					<a href="<?php echo 'https://wordpress.org/support/view/theme-reviews/elitepress'; ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo _e('Your feedback is valuable to us','elitepress'); ?></p></a>
				</div>
			</div>
			
		</div>	
	</div>
</div>	