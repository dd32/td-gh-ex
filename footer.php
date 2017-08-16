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

	</div></div><!-- #content -->

	<footer id="colophon" class="site-footer">
    	<?php get_sidebar('footer'); ?>
        
		<div class="site-info"><div class="inner">
        	<div class="info-copyright">
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'fmi')); ?>"><?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf(esc_html__('Proudly powered by %s', 'fmi'), 'WordPress');
                ?></a>
                <span class="sep"> | </span>
                <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf(esc_html__('Theme: %1$s by %2$s.', 'fmi'), 'Fmi', '<a href="http://forrss.com/">Forrss</a>');
                ?>
			</div>
            <div class="info-social">
<?php
if(get_theme_mod('social_email')):
    echo '<a href="'.'mailto:'.antispambot(get_theme_mod('social_email'), 1).'" title="'.__('Send Us an Email', 'fmi').'"><i class="fa fa-envelope-o"></i></a>';endif;
if(get_theme_mod('social_skype')):
    echo '<a href="skype:'.get_theme_mod('social_skype').'?userinfo" title="'.__('Contact Us on Skype', 'fmi').'"><i class="fa fa-skype"></i></a>';endif;
if(get_theme_mod('social_facebook')):
    echo '<a href="'.get_theme_mod('social_facebook').'" target="_blank" title="'.__('Find Us on Facebook', 'fmi').'"><i class="fa fa-facebook"></i></a>';endif;
if(get_theme_mod('social_twitter')):
    echo '<a href="'.get_theme_mod('social_twitter').'" target="_blank" title="'.__('Follow Us on Twitter', 'fmi').'"><i class="fa fa-twitter"></i></a>';endif;
if(get_theme_mod('social_google_plus')):
    echo '<a href="'.get_theme_mod('social_google_plus').'" target="_blank" title="'.__('Find Us on Google Plus', 'fmi').'"><i class="fa fa-google-plus"></i></a>';endif;
if(get_theme_mod('social_youtube')):
    echo '<a href="'.get_theme_mod('social_youtube').'" target="_blank" title="'.__('View our YouTube Channel', 'fmi').'"><i class="fa fa-youtube"></i></a>';endif;
if(get_theme_mod('social_instagram')):
    echo '<a href="'.get_theme_mod('social_instagram').'" target="_blank" title="'.__('Follow Us on Instagram', 'fmi').'"><i class="fa fa-instagram"></i></a>';endif;
if(get_theme_mod('social_pinterest')):
    echo '<a href="'.get_theme_mod('social_pinterest').'" target="_blank" title="'.__('Pin Us on Pinterest', 'fmi').'"><i class="fa fa-pinterest"></i></a>';endif;
if(get_theme_mod('social_linkedin')):
    echo '<a href="'.get_theme_mod('social_linkedin').'" target="_blank" title="'.__('Find Us on LinkedIn', 'fmi').'"><i class="fa fa-linkedin"></i></a>';endif;
if(get_theme_mod('social_tumblr')):
    echo '<a href="'.get_theme_mod('social_tumblr').'" target="_blank" title="'.__('Find Us on Tumblr', 'fmi').'"><i class="fa fa-tumblr"></i></a>';endif;
if(get_theme_mod('social_flickr')):
    echo '<a href="'.get_theme_mod('social_flickr').'" target="_blank" title="'.__('Find Us on Flickr', 'fmi').'"><i class="fa fa-flickr"></i></a>';endif;
?>
        	</div>
			<div class="clear"></div>
		</div></div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    <div id="back_top"><i class="fa fa-angle-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
