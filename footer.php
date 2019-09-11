<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bayn Lite
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="grid grid--4">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="site-info">
		<div class="container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bayn-lite' ) ); ?>">
				<?php
				/* translators: Wordpress */
				printf( esc_html__( 'Proudly powered by %s', 'bayn-lite' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: theme name and theme author url */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'bayn-lite' ), 'Bayn Lite', '<a href="' . esc_url( __( 'https://gretathemes.com/', 'bayn-lite' ) ) . '" rel="designer">' . esc_html__( 'GretaThemes', 'bayn-lite' ) . '</a>' );
			?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
