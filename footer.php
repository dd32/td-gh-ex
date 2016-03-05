<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Greenr
 */
?>

	</div><!-- #content -->
</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
		if( get_theme_mod( 'footer-widgets',true ) ) : ?>
		<div class="footer-top footer-widgets">
			<div class="container">
				<div class="row">
					<?php get_template_part('footer','widgets'); ?>
				</div>
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
                        <?php printf( __( 'Powered by <a href="%1$s">WordPress</a>', 'greenr' ), esc_url( 'http://wordpress.org/') ); ?>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by <a href="%2$s">Webulous</a>', 'greenr' ), 'Greenr',  esc_url('http://www.webulous.in') ); ?>
						</p>
					<?php endif; ?>
				</div>
				<div class="footer-right eight columns">      
					<?php dynamic_sidebar( 'footer-nav' ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>


