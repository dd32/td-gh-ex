<!-- bhumi Callout Section -->
<?php $cpm_theme_options = bhumi_get_options(); ?>
<!-- Footer Widget Secton -->
<div class="bhumi_footer_widget_area">
	<div class="container">
		<div class="row">
			<?php
			if ( is_active_sidebar( 'footer-widget-area' ) ){
				dynamic_sidebar( 'footer-widget-area' );
			} else
			{
				$args = array(
				'before_widget' => '<div class="col-md-3 col-sm-6 bhumi_footer_widget_column">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="bhumi_footer_widget_title">',
				'after_title'   => '<div class="bhumi-footer-separator"></div></div>' );
				the_widget('WP_Widget_Pages', null, $args);
			} ?>
		</div>
	</div>
</div>
<div class="bhumi_footer_area">
		<div class="container">
			<div class="col-md-12">
			<p class="bhumi_footer_copyright_info cpm_rtl" >
			<?php if($cpm_theme_options['footer_customizations']) {
					echo esc_html($cpm_theme_options['footer_customizations']);
				}
			if($cpm_theme_options['developed_by_text']) {
				 echo "|" .esc_html($cpm_theme_options['developed_by_text']);
			 } ?>
			<a target="_blank" rel="nofollow" href="<?php if($cpm_theme_options['developed_by_link']) { echo esc_url($cpm_theme_options['developed_by_link']); } ?>"><?php if($cpm_theme_options['developed_by_bhumi_text']) { echo esc_html($cpm_theme_options['developed_by_bhumi_text']); } ?></a></p>
			<?php if($cpm_theme_options['footer_section_social_media_enbled'] == '1') { ?>
					<div class="bhumi_footer_social_div">
						<ul class="social">
							<?php if($cpm_theme_options['fb_link']!='') { ?>
							   <li class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html__('Facebook','bhumi'); ?>"><a  href="<?php echo esc_url($cpm_theme_options['fb_link']); ?>"><i class="fa fa-facebook"></i></a></li>
							<?php } if($cpm_theme_options['twitter_link']!='') { ?>
								<li class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html('Twitter','bhumi'); ?>"><a href="<?php echo esc_url($cpm_theme_options['twitter_link']) ; ?>"><i class="fa fa-twitter"></i></a></li>
							<?php } if($cpm_theme_options['linkedin_link']!='') { ?>
								<li class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html('LinkedIn','bhumi')?>"><a href="<?php echo esc_url($cpm_theme_options['linkedin_link']) ; ?>"><i class="fa fa-linkedin"></i></a></li>
							<?php } if($cpm_theme_options['youtube_link']!='') { ?>
								<li class="youtube" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html('Youtube','bhumi'); ?>"><a href="<?php echo esc_url($cpm_theme_options['youtube_link']) ; ?>"><i class="fa fa-youtube"></i></a></li>
			                <?php } if($cpm_theme_options['gplus']!='') { ?>
								<li class="gplus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html('Google Plus','bhumi')?>"><a href="<?php echo esc_url($cpm_theme_options['gplus']) ; ?>"><i class="fa fa-google-plus"></i></a></li>
			                <?php } if($cpm_theme_options['instagram']!='') { ?>
								<li class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html('Instagram','bhumi')?>"><a href="<?php echo esc_url($cpm_theme_options['instagram']) ; ?>"><i class="fa fa-instagram"></i></a></li>
			                <?php } ?>
						</ul>
					</div>
			<?php } ?>
			</div>
		</div>
</div>
<!-- /Footer Widget Secton -->
</div>
<a href="#" title="<?php echo esc_html__('Go Top','bhumi')?>" class="bhumi_scrollup" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>