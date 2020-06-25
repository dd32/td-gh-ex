<!-- Widgets Section -->
<?php
$rambo_pro_theme_options = rambo_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options ); ?>
<?php if ( is_active_sidebar( 'footer-widget-area' ) ){ ?>
<div class="hero-widgets-section">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>			
		</div>
	</div>
</div>
<?php } ?>
<!-- /Widgets Section -->
<?php
$rambo_pro_theme_options = rambo_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options ); ?>

<!-- Footer Section -->
<div class="footer-section">
	<div class="container">
		<div class="row">
			<div class="span8">
				<?php if( isset( $current_options['footer_copyright'] ) && $current_options['footer_copyright'] != '' ) { ?>
					<p><?php echo wp_kses_post($current_options['footer_copyright']); ?></p>	
				<?php } ?>
			</div>
			<div class="span4">
				<?php  
					if( is_active_sidebar('footer-social-icon-sidebar-area'))
					{
					dynamic_sidebar('footer-social-icon-sidebar-area');
					}
					else
					{
					$rambo_theme_options = rambo_theme_data_setup();
					$current_options = wp_parse_args(  get_option( 'rambo_theme_options', array() ), $rambo_theme_options );
					if(get_option( 'rambo_theme_options'))
					{
					if($current_options['footer_social_media_enabled']==true) {	
					?>
					<div class="footer_social pull-right">
				
					<?php if($current_options['social_media_facebook_link'] != '') { ?>
					<a href="<?php echo esc_url($current_options['social_media_facebook_link']);   ?>" class="facebook">&nbsp;</a>
					
					<?php } if($current_options['social_media_twitter_link'] != '') { ?>
					<a href="<?php echo esc_url($current_options['social_media_twitter_link']); ?>" class="twitter">&nbsp;</a>
					
					<?php } if($current_options['social_media_linkedin_link'] != '') { ?>
					<a href="<?php echo esc_url($current_options['social_media_linkedin_link']); ?>" class="linked-in">&nbsp;</a>
					
					<?php } if($current_options['social_media_google_plus'] != '') { ?>
					<a href="<?php echo esc_url($current_options['social_media_google_plus']); ?>" class="google_plus">&nbsp;</a>
					
					<?php } ?>
					
				</div>
					<?php } } } ?>
			</div>		
		</div>
	</div>		
</div>		
<!-- Footer Section-->

<?php
// custom css
if ( version_compare( $GLOBALS['wp_version'], '4.6', '>=' ) ): ?>
<?php
else :
	$rambo_pro_theme_options = rambo_theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
	if($current_options['webrit_custom_css']!='') :
		echo '<style>'.wp_filter_nohtml_kses($current_options['webrit_custom_css']).'</style>';
	endif;
endif;
wp_footer(); ?>
</body>
</html>