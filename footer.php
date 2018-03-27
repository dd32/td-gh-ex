<?php
/**
 * The template for displaying the footer
 *
 * @package fmi
 */
?>

	<footer id="colophon" class="site-footer">
    <div class="container">
		<div class="site-info clearfix">            
			<div class="site-info-social">
<?php if(get_theme_mod('social_email')):?>
<a href="<?php echo esc_url('mailto:'.antispambot(get_theme_mod('social_email'))); ?>" title="<?php esc_attr_e('Send Us an Email', 'fmi'); ?>"><i class="fa fa-envelope-o"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_skype')):?>
<a href="skype:<?php echo esc_html(get_theme_mod('social_skype')); ?>?userinfo" title="<?php esc_attr_e('Contact Us on Skype', 'fmi'); ?>"><i class="fa fa-skype"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_facebook')):?>
<a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Facebook', 'fmi'); ?>"><i class="fa fa-facebook"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_twitter')):?>
<a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" title="<?php esc_attr_e('Follow Us on Twitter', 'fmi'); ?>"><i class="fa fa-twitter"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_google_plus')):?>
<a href="<?php echo esc_url(get_theme_mod('social_google_plus')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Google Plus', 'fmi'); ?>"><i class="fa fa-google-plus"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_youtube')):?>
<a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank" title="<?php esc_attr_e('View our YouTube Channel', 'fmi'); ?>"><i class="fa fa-youtube"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_instagram')):?>
<a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" title="<?php esc_attr_e('Follow Us on Instagram', 'fmi'); ?>"><i class="fa fa-instagram"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_pinterest')):?>
<a href="<?php echo esc_url(get_theme_mod('social_pinterest')); ?>" target="_blank" title="<?php esc_attr_e('Pin Us on Pinterest', 'fmi'); ?>"><i class="fa fa-pinterest"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_linkedin')):?>
<a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on LinkedIn', 'fmi'); ?>"><i class="fa fa-linkedin"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_tumblr')):?>
<a href="<?php echo esc_url(get_theme_mod('social_tumblr')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Tumblr', 'fmi'); ?>"><i class="fa fa-tumblr"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_flickr')):?>
<a href="<?php echo esc_url(get_theme_mod('social_flickr')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Flickr', 'fmi'); ?>"><i class="fa fa-flickr"></i></a>
<?php endif; ?>
      </div>
      <div class="site-info-copyright">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fmi' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'fmi' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'fmi' ), 'Fmi', '<a href="http://forrss.com/">Forrss</a>' );
			?>
      </div>  
		</div><!-- .site-info -->
    </div>
  </footer><!-- #colophon -->

<?php
$show_back_to_top = get_theme_mod('general_show_totop_btn', 1);
if ($show_back_to_top) { 
?>
  <div id="back_top"><i class="fa fa-angle-up"></i></div>
<?php
}
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>