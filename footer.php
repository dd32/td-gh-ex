<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package puro
 * @since puro 1.0
 * @license GPL 2.0
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif; ?>

		<div class="clear"></div>

		<?php wp_nav_menu( array( 'theme_location' => 'social', 'container_class' => 'social-links-menu', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'fallback_cb' => '' ) ); ?>

		<?php $copyright_text = apply_filters( 'puro_copyright_text', siteorigin_setting( 'footer_copyright_text' ) ); ?>
		<div class="site-info">
			<?php 
			if ( ! empty( $copyright_text ) ) {
				echo '<span>' . wp_kses_post( $copyright_text ) . '</span>';
			}

			if ( function_exists( 'the_privacy_policy_link' ) && siteorigin_setting( 'footer_privacy_policy_link' ) ) {
				the_privacy_policy_link( '<span>', '</span>' );
			}

			if ( siteorigin_setting( 'footer_attribution' ) ) {
				/* translators: 1: Theme author. */
				echo '<span>' . sprintf( esc_html__( 'Theme by %1$s', 'puro' ), '<a href="https://purothemes.com/">Puro</a>' ) . '</span>';
			}
			?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
