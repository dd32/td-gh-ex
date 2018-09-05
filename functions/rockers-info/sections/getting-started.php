<?php
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="rockers-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="rockers-info-title text-center"><?php echo __('About the Rockers theme','rockers'); ?><?php if( !empty($rockers['Version']) ): ?> <sup id="rockers-theme-version"><?php echo esc_attr( $rockers['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="rockers-tab-pane-half rockers-tab-pane-first-half">
				<p><?php esc_html_e( 'This theme is ideal for creating corporate and business websites. There is no separate premium version of the Rockers theme, Rockers is a child theme of SpicePress WordPress theme and premium version of  SpicePress have tons of features: a homepage with many sections where you can feature unlimited slides, portfolios, user reviews, latest news, services, calls to action and much more. Each section in the Homepage template is carefully designed to fit to all business requirements.','rockers');?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of activity. Rockers is compatible with popular plugins like WPML and Polylang. To help you create an effective and impactful web presence, Rockers has predefined versions of many pages: Contact, Services, Portfolios, About Us and Blog.', 'rockers' ); ?>
				</p>
				
				<a style="color:#fff; text-decoration:none;" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">
				<h1 style="margin-top: 73px; background: #0085ba;border-color: #0073aa #006799 #006799; color: #fff; padding: 5px 10px;"><?php esc_html_e( "Getting Started", 'rockers' ); ?></h1></a>
				<div>
				<p style="margin-top: 16px;">
				
				<?php esc_html_e( 'To take full advantage of all the features this theme has to offer, install and activate the SpiceBox plugin. Go to Customize and install the SpiceBox plugin.', 'rockers' ); ?>
				
				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" style="padding: 7px 15px;height: 40px; font-size: 16px;"><?php esc_html_e( 'Go to the Customizer','rockers');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="rockers-tab-pane-half rockers-tab-pane-first-half">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/functions/rockers-info/img/rockers.png'; ?>" alt="<?php esc_html_e( 'rockers theme', 'rockers' ); ?>" />
				</div>
			</div>	
		</div>
		
		<div class="row">
			<div class="rockers-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'rockers' ); ?></h1>

			</div>
			<div class="col-md-6"> 
				<div class="rockers-tab-pane-half rockers-tab-pane-first-half">

					<a href="<?php echo esc_url('https://rockers.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo __('Lite Demo','rockers'); ?></p></a>
					
					
					<a href="<?php echo esc_url('https://demo.spicethemes.com/?theme=spicepress'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo __('PRO Demo','rockers'); ?></p></a>
					
					
					
				</div>
			</div>
			<div class="col-md-6">	
				
				<div class="rockers-tab-pane-half rockers-tab-pane-first-half">
					
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/rockers'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo __('Your feedback is valuable to us','rockers'); ?></p></a>
					
					<a href="<?php echo esc_url('https://support.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo __('Premium Theme Support','rockers'); ?></p></a>
				</div>
			</div>
			
			
			<div class="col-md-6">	
				
				<div class="rockers-tab-pane-half rockers-tab-pane-first-half">
					
					<a href="<?php echo esc_url('https://spicethemes.com/spicepress/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo __('Premium Theme Details','rockers'); ?></p></a>
					
				</div>
				
			</div>
			
			
			
			
		</div>
		
	</div>
</div>	