<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Accent
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-wrapper">
			<div id="footer-widgets" class="widget-area four clear">
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
		</div><!-- .inner-wrapper -->
		<div class="site-info">
			<div class="inner-wrapper">
				<p><?php _e( 'Copyright &#169; '.date('Y'), 'accent' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>.</p>
				<?php printf( __( 'Powered by %1$s.', 'accent' ), '<a href="http://wordpress.org/">WordPress</a>' ); ?>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s.', 'accent' ), '<a href="https://wordpress.org/themes/accent">Accent</a>' ); ?>
			</div><!-- .inner-wrapper -->
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
