<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=content div and all content after.
 *
 * @package Figure/Ground
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'main' ) ) : ?>
			<div class="widgets-container" role="complementary">
				<div class="widget-area">
					<?php dynamic_sidebar( 'main' ); ?>
				</div><!-- .widget-area -->
			</div><!-- .widgets-container -->
		<?php endif; ?>
		<div class="site-info">
			<?php do_action( 'figureground_credits' ); ?>
			&copy <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" id="footer-copy-name"><?php echo get_theme_mod( 'copy_name', get_bloginfo( 'name' ) ); ?></a>
			<?php if( get_theme_mod( 'powered_by_wp', true ) || is_customize_preview() ) { ?>
				<span class="wordpress-credit" <?php if ( ! get_theme_mod( 'powered_by_wp', true ) && is_customize_preview() ) { echo 'style="display: none;"'; } ?>>
					<span class="sep"> | </span><a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'figureground' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'figureground' ), 'WordPress' ); ?></a>
				</span>
			<?php } if( get_theme_mod( 'theme_meta', false ) || is_customize_preview() ) { ?>
				<span class="theme-credit" <?php if ( ! get_theme_mod( 'theme_meta', false ) && is_customize_preview() ) { echo 'style="display: none;"'; } ?>>
					<span class="sep"> | </span><?php printf( __( 'Theme: %1$s by %2$s.', 'figureground' ), 'Figure/Ground', '<a href="http://themes.halsey.co/" rel="designer">Halsey Themes</a>' ); ?>
				</span>
			<?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>