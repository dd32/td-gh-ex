<?php
/**
 * The template for displaying the footer.
 *
 * @package gump
 * @since gump 1.0
 */
?>

		</div><!-- #content -->

	</div><!-- .container -->

	<div class="container">

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-info">

				<?php if ( get_theme_mod( 'gump_footer' ) ) : ?>
					
					<?php echo get_theme_mod( 'gump_footer' ); ?>
				
				<?php else : ?>
					
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'gump' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'gump' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<a href="<?php echo esc_url( __( 'http://pankogut.com/', 'gump' ) ); ?>" rel="designer"><?php printf( __( 'Theme: %1$s by %2$s.', 'gump' ), 'gump', 'pankogut' ); ?></a>
				
				<?php endif; ?>

			</div><!-- .site-info -->
			
		</footer><!-- #colophon -->

	</div><!-- .container -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
