<?php $current_options = get_option('appointment_options',theme_data_setup()); ?>
<!-- Footer Section -->
<?php 
if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
<div class="footer-section">
	<div class="container">	
		<div class="row footer-widget-section">
			<?php  dynamic_sidebar( 'footer-widget-area' );	} ?>	
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- /Footer Section -->
<div class="clearfix"></div>
<!-- Footer Copyright Section -->
<!-- Custom css --->
<?php
if($current_options['webrit_custom_css']!='') {  ?>
<style>
<?php echo $current_options['webrit_custom_css']; ?>
</style>
<?php }  ?>
<!-- Custom css --->
<div class="footer-copyright-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="footer-copyright">
					<?php echo $current_options['footer_copyright_text'];?>
				</div>
			</div>
			
			<div class="col-md-4">
			<?php $current_options=get_option('appointment_options'); ?>
			<?php if($current_options['footer_social_media_enabled']=='on') { ?>
				<ul class="footer-contact-social">
				   <?php if($current_options['footer_social_media_facebook_link']!='') { ?>
					<li class="facebook"><a href="<?php echo esc_url($current_options['footer_social_media_facebook_link']); ?>" <?php if($current_options['footer_facebook_media_enabled']=='on'){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></li>
					<?php } if($current_options['footer_social_media_twitter_link']!='') { ?>
					<li class="twitter"><a href="<?php echo esc_url($current_options['footer_social_media_twitter_link']); ?>" <?php if($current_options['footer_twitter_media_enabled']=='on'){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></li>
					<?php } if($current_options['footer_social_media_linkedin_link']!='') { ?>
					<li class="linkedin"><a href="<?php echo esc_url($current_options['footer_social_media_linkedin_link']); ?>" <?php if($current_options['footer_linkedin_media_enabled']=='on'){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></li>
					<?php } if($current_options['footer_social_media_googleplus_link']!='') { ?>
					<li class="googleplus"><a href="<?php echo esc_url($current_options['footer_social_media_googleplus_link']); ?>" <?php if($current_options['footer_googleplus_media_enabled']=='on'){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"> </i></a></li>
					<?php } if($current_options['footer_social_media_skype_link']!='') { ?>
					<li class="skype"><a href="<?php echo esc_url($current_options['footer_social_media_skype_link']); ?>" <?php if($current_options['footer_skype_media_enabled']=='on'){ echo "target='_blank'"; } ?> ><i class="fa fa-skype"></i></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- /Footer Copyright Section -->
<?php wp_footer(); ?>
</body>
</html>