<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fmi
 */

?>

	<footer id="colophon" class="site-footer">
    <div class="container">
		<div class="site-info clearfix">            
			<div class="site-info-social">
<?php if(get_theme_mod('social_email')):?>
<a href="<?php echo esc_url('mailto:'.antispambot(get_theme_mod('social_email'))); ?>" title="<?php esc_attr_e('Send Us an Email', 'fmi'); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_skype')):?>
<a href="skype:<?php echo esc_html(get_theme_mod('social_skype')); ?>?userinfo" title="<?php esc_attr_e('Contact Us on Skype', 'fmi'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_facebook')):?>
<a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Facebook', 'fmi'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_twitter')):?>
<a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" title="<?php esc_attr_e('Follow Us on Twitter', 'fmi'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_google_plus')):?>
<a href="<?php echo esc_url(get_theme_mod('social_google_plus')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Google Plus', 'fmi'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_youtube')):?>
<a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank" title="<?php esc_attr_e('View our YouTube Channel', 'fmi'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_instagram')):?>
<a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" title="<?php esc_attr_e('Follow Us on Instagram', 'fmi'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_pinterest')):?>
<a href="<?php echo esc_url(get_theme_mod('social_pinterest')); ?>" target="_blank" title="<?php esc_attr_e('Pin Us on Pinterest', 'fmi'); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_linkedin')):?>
<a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on LinkedIn', 'fmi'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_tumblr')):?>
<a href="<?php echo esc_url(get_theme_mod('social_tumblr')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Tumblr', 'fmi'); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if(get_theme_mod('social_flickr')):?>
<a href="<?php echo esc_url(get_theme_mod('social_flickr')); ?>" target="_blank" title="<?php esc_attr_e('Find Us on Flickr', 'fmi'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a>
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
  <button id="back_top" aria-label="<?php esc_attr_e( 'Top', 'fmi' ); ?>" value="<?php echo esc_attr_x( 'Top', 'top button', 'fmi' ); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i><span class="screen-reader-text"><?php echo esc_html_x( 'Top', 'top button', 'fmi' ); ?></span></button>
<?php
}
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
