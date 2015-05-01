<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Atomic
 */
?>

</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="inner-wrap">
				<div id="footer-widgets" class="widget-area three clear">
					<div class="footer-widget-wrapper">
						<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-5' ); ?>
						<?php endif; ?>
					</div><!-- .footer-widget-wrapper -->
					<div class="footer-widget-wrapper">
						<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-6' ); ?>
						<?php endif; ?>
					</div><!-- .footer-widget-wrapper -->
					<div class="footer-widget-wrapper">
						<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
						<?php endif; ?>
					</div><!-- .footer-widget-wrapper -->
				</div><!-- #footer-widgets -->
				<?php if ( of_get_option( 'copyright', '1' ) && of_get_default('copyright') ) {
					echo '<div style="text-align: center;';
					
					if ( of_get_option( 'copyright', '' ) ) {
						$typography = of_get_option('copyright_typography');
					} else $typography = of_get_default('copyright_typography');
					
					echo 'font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
					
					echo of_get_option( 'copyright_text', of_get_default('copyright_text') ); echo '</div>';		
				} ?>
			</div><!-- .inner-wrap -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>