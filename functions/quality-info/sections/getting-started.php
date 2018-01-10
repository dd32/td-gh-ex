<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="quality-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="quality-info-title text-center"><?php echo __('About Quality Theme','quality'); ?><?php if( !empty($quality['Version']) ): ?> <sup id="quality-theme-version"><?php echo esc_attr( $quality['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="quality-tab-pane-half quality-tab-pane-first-half">
				<p><?php esc_html_e( 'This is a Business theme which is ideal for creating corporate, business websites. The premium version has tons of features. The Homepage has a number of sections for showing sliders, your portfolio, user reviews, latest news, services, call to action and much more. Each section in the HomePage Template is well designed according to business requirements.','quality');?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of business. It is compatible with popular plugins like Contact Form 7, WPML, Polylang, etc. The theme has a predefined version of a Contact page, Services page, Portfolio column layout pages, About Us and Blog layout pages, helping you to create an effective web presence.', 'quality' ); ?>
				</p>
				<h1 style="margin-top: 73px;"><?php esc_html_e( "Getting Started", 'quality' ); ?></h1>
				<div style="border-top: 1px solid #eaeaea;">
				<p style="margin-top: 16px;">
				
				<?php esc_html_e( 'Install and activate Webriti Companion plugin for taking full advantage of all the features this theme has to offer. Go to customizer and install Webriti Companion plugin', 'quality' ); ?>
				
				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the Customizer','quality');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="quality-tab-pane-half quality-tab-pane-first-half">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/quality-info/img/quality.png'; ?>" alt="<?php esc_html_e( 'Quality Blue Child Theme', 'quality' ); ?>" />
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="quality-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'quality' ); ?></h1>

			</div>
			<div class="col-md-6"> 
				<div class="quality-tab-pane-half quality-tab-pane-first-half">

					<a href="<?php echo esc_url('http://webriti.com/quality-free/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo __('Lite Demo','quality'); ?></p></a>
					
					
					<a href="<?php echo esc_url('http://webriti.com/quality'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo __('PRO Demo','quality'); ?></p></a>
					
					
					
				</div>
			</div>
			<div class="col-md-6">	
				
				<div class="quality-tab-pane-half quality-tab-pane-first-half">
					
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/quality'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo __('Your feedback is valuable to us','quality'); ?></p></a>
					
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/quality'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo __('Premium Theme Support','quality'); ?></p></a>
				</div>
			</div>
			
			
			<div class="col-md-6">	
				
				<div class="quality-tab-pane-half quality-tab-pane-first-half">
					
					<a href="<?php echo esc_url('https://webriti.com/quality/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo __('Premium Theme Details','quality'); ?></p></a>
					
				</div>
				
			</div>
			
			
			
			
		</div>	
		
		
		
		
	</div>
</div>	