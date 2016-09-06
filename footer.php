<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BOXY
 */
?>
	</div><!-- #content -->

<?php do_action('boxy_before_footer'); ?>
	<footer id="colophon" class="site-footer footer-image " role="contentinfo">
	 <?php global $boxy;
       if ( get_theme_mod ('footer_overlay',false ) ) { 
		   echo '<div class="overlay overlay-footer"></div>';     
		} 
		if( get_theme_mod( 'footer-widgets' ,true ) ) : ?>
		<div class="footer-top">
			<div class="container">
				<?php get_template_part( 'footer', 'widgets' ); ?>
			</div>
		</div>
	<?php endif; ?>
		<div class="footer-bottom copy">
			<div class="container">
				<div class="eight columns">
					<?php if( get_theme_mod('copyright') ) : ?>
							<p><?php echo get_theme_mod('copyright'); ?></p>
						<?php else : ?>
							<p>
							 <?php printf( __( 'Powered by <a href="%1$s">WordPress</a>', 'boxy' ), esc_url( 'http://wordpress.org/') ); ?>
							<span class="sep"> | </span>
							<?php printf( __( 'Theme: %1$s by <a href="%2$s">Webulous</a>', 'boxy' ), 'boxy',  esc_url('http://www.webulous.in') ); ?>
							</p>
					   <?php endif; ?>
				</div>
				<div class="footer-right eight columns">      
					<?php dynamic_sidebar( 'footer-nav' ); ?>
				</div>
			</div>
		</div>
		<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
	</footer><!-- #colophon -->

	<?php do_action('boxy_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
