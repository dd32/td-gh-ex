<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package URVR
 */
?>

	</div><!-- #content -->
</div>

	<footer id="colophon" class="site-footer site-info" role="contentinfo">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="span12">
						<?php
							global $urvr;
							if( $urvr['footer-widgets'] ) {
								get_template_part('footer','widgets');
							} 
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="span12">
						<?php if( $urvr['footer-text'] ) : ?>
							<p><?php echo $urvr['footer-text']; ?></p>
						<?php else : ?>
							<p>
							<?php do_action( 'urvr_credits' ); ?>
							Powered by <a href="http://wordpress.org/"><?php printf( __( '%s', TEXTDOMAIN ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( __( 'Theme: %1$s by %2$s.', TEXTDOMAIN ), 'Abaris', '<a href="http://www.webulous.in" rel="author">Webulous</a>' ); ?>
							</p>
						<?php endif; ?>
					</div>
				</div><!-- .site-info -->			
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>