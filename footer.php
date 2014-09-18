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

	<footer id="colophon" class="site-footer site-info" role="contentinfo">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="span12">
						<?php
							//global $boxy;
							//if( $boxy['footer-widgets'] ) {
								get_template_part('footer','widgets');
							//} 
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="span12">
							<p>
							<?php do_action( 'boxy_credits' ); ?>
							Powered by <a href="http://wordpress.org/"><?php printf( __( '%s', 'boxy' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( __( 'Theme %1$s by %2$s.', 'boxy' ), 'Boxy', '<a href="http://www.webulous.in" rel="author">Webulous</a>' ); ?>
							</p>
					</div>
				</div><!-- .site-info -->			
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>