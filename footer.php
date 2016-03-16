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
</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
global $boxy;

		if( get_theme_mod( 'footer-widgets' ) ) : ?>
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
							<?php printf( __( 'Powered by <a href="http://wordpress.org/">%1$s</a>', 'boxy' ), 'WordPress' ); ?>
							<span class="sep"> | </span>
							<?php printf( __( 'Theme: %1$s by %2$s.', 'boxy' ), 'Boxy', '<a href="http://www.webulousthemes.com" rel="author">Webulous Themes</a>' ); ?>
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
