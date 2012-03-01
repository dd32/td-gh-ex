<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Skirmish
 * @since Skirmish 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		<div id="site-generator">
			<?php do_action( 'skirmish_credits' ); ?>
			&copy; <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <span class="sep"> | </span> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'skirmish' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'skirmish' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'skirmish' ), 'WordPress' ); ?></a> and <a href="http://generalthemes.com">General Themes</a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>