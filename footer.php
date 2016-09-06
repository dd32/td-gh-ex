<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Greenr
 */
 ?>
</div>
	<?php do_action('greenr_before_footer'); ?>
	<footer id="colophon" class="site-footer" role="contentinfo"><?php
			if ( get_theme_mod ('footer_overlay',false ) ) { 
			   echo '<div class="overlay overlay-footer"></div>';     
			} 
		    if( get_theme_mod( 'footer-widgets',true ) ) : ?>
				<div class="footer-top footer-widgets footer-image">
					<div class="container">
						<div class="row">
							<?php get_template_part('footer','widgets'); ?>
						</div>
					</div>
				</div><?php
	        endif; ?>
			<div class="footer-bottom copy">
				<div class="container">
					<div class="eight columns">
						<?php if( get_theme_mod('copyright') ) : ?>
								<p><?php echo get_theme_mod('copyright'); ?></p>
						<?php else : 
							do_action('greenr_credits');
						endif; ?>
					</div>
					<div class="footer-right eight columns">      
						<?php dynamic_sidebar( 'footer-nav' ); ?>
					</div>
				</div>
			</div>
		    <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>
	</footer><!-- #colophon -->
	<?php do_action('greenr_after_footer'); ?>
</div><!-- #page --> 

<?php wp_footer(); ?>
</body>
</html>


